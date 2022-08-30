<style scoped>
table,
th,
td {
  font-size: 14px;
  padding: 5px;
  border: 0.5px solid rgb(185, 185, 185);
  border-collapse: collapse;
}
</style>

<template>
  <auth-layout>
    <PmsToolbar />
    <Card class="w-full">
      <template #title>
        <Button
          label="Back"
          class="p-button-sm p-button-raised p-button-text mb-3"
          icon="bi bi-arrow-left"
          @click="go_back()"
        ></Button>
        <br />
        <span class="uppercase"
          ><i class="bi bi-book mr-2"></i> Performance Commitment Review | Core
          Functions</span
        ></template
      >
      <template #subtitle>
        <span class="text-xl"
          >{{ $page.props.auth.user.sys_department_name }} ( {{ period.period }},
          {{ period.year }})</span
        >
        <br />
        Accomplish Core Functions</template
      >
      <template #content>
        <!-- <div v-for="(row, o) in rows" : key="o">{{ row }}</div> -->

        <table class="w-full">
          <thead>
            <tr>
              <th>%</th>
              <th class="w-3">MFO/PAP</th>
              <th class="w-3">Success <br />Indicator</th>
              <th>Actual <br />Accomplishments</th>
              <th>Q</th>
              <th>E</th>
              <th>T</th>
              <th>A</th>
              <th>Remarks</th>
              <th>
                <!-- Documentation -->
                <i class="bi bi-folder"></i>
              </th>
            </tr>
          </thead>
          <template v-for="(row, r) in rows" :key="r">
            <tr
              v-if="row.rowspan == 0 && row.si_only == false"
              :class="row.mfo_only ? 'bg-primary-50' : ''"
            >
              <td v-if="!row.mfo_only"></td>
              <!-- if  mfo has no success indicator (title) conditioned colspan if has multiple success indicator -->
              <td :colspan="row.mfo_only ? 10 : 1">
                <div :style="indent(row.level)">
                  <span>
                    <strong class="mr-2">{{ row.code }}</strong>
                    {{ row.title }}
                  </span>
                </div>
              </td>
              <!-- if mfo with only one success indicator -->
              <template v-if="!row.mfo_only">
                <td>{{ row.success_indicator }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>only one si</td>
                <td></td>
                <td></td>
                <td></td>
              </template>
            </tr>
            <!-- sub mfo with initial success indicator  -->
            <tr v-else-if="row.rowspan > 0 && row.si_only == false">
              <td><a href="javascript::void(0)">--%</a></td>
              <td :rowspan="row.rowspan">
                <div :style="indent(row.level)">
                  <span>
                    <strong class="mr-2">{{ row.code }}</strong>
                    {{ row.title }}
                  </span>
                </div>
              </td>
              <td>{{ row.success_indicator }}</td>
              <td>acc</td>
              <td>q</td>
              <td>e</td>
              <td>starting si</td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <!-- succeding success indicator from above -->
            <tr v-else>
              <td></td>
              <td>{{ row.success_indicator }}</td>
              <td></td>
              <td></td>
              <td></td>
              <td>another si</td>
              <td></td>
              <td></td>
            </tr>
          </template>
          <tr v-if="rows.length < 1">
            <td class="p-5 bg-gray-300" colspan="10" style="text-align: center">
              No records found!
            </td>
          </tr>
        </table>
      </template>
    </Card>
  </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";
import PmsToolbar from "@/Layouts/PmsToolbar";

export default {
  props: {
    employees: null,
    form_status: null,
    period: null,
    rows: null,
  },
  components: {
    AuthLayout,
    PmsToolbar,
  },
  data() {
    return {
      current_url: document.location.pathname,
      error: {},
      form: this.$inertia.form({}),
    };
  },
  methods: {
    indent(level) {
      var margin = "";
      if (level > 0) {
        margin = "margin-left:" + level * 20 + "px;";
      }
      return margin;
    },
    validate() {},
    submit_form() {},
    go_back() {
      // window.history.back();
      var pathname = document.location.pathname;
      pathname = pathname.split("/");
      pathname = `/${pathname[1]}/${pathname[2]}/${pathname[3]}`;
      // console.log(pathname);
      this.$inertia.get(
        pathname,
        {},
        {
          replace: true,
          onSuccess: () => {
            // if (toast) {
            //   this.$toast.add(toast);
            // }
          },
        }
      );
    },
  },
  created() {},
  mounted() {},
};
</script>
