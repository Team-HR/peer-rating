<style scoped>
table,
th,
td {
  padding: 5px;
  border: 0.5px solid black;
  border-collapse: collapse;
}
</style>

<template>
  <auth-layout>
    <PmsToolbar />
    <Card class="w-full">
      <template #title
        ><span class="uppercase"
          ><i class="bi bi-book mr-2"></i> Rating Scale Matrix |
          {{ period_id }}</span
        ></template
      >
      <template #subtitle
        >Edit or review your Department/Section's Rating Scale Matrix</template
      >
      <template #content>
        {{ auth.user }}
        <Toast />

        <!-- ####################### Table Start########################### -->

        <table class="w-full">
          <thead>
            <tr>
              <th></th>
              <th>MFO/PAP</th>
              <th>Success Indicator</th>
              <th>Performance Measure</th>
              <th>Quality</th>
              <th>Efficiency</th>
              <th>Timeliness</th>
              <th>In Charge</th>
              <th>Options</th>
            </tr>
          </thead>
          <template v-for="row in rows" :key="row.index">
            <!-- if  -->
            <tr v-if="row.rowspan == 0 && row.si_only == false">
              <td>
                <!-- <p>test {{ row.rowspan }}</p> -->
                <!-- <Menu :model="get_menus(row)" /> -->
                <!-- <Button type="button" label="Toggle" @click="toggle()" /> -->
                <Menu :ref="`menu${row.id}`" :model="get_menu_items(row)" />
              </td>
              <td :colspan="row.mfo_only ? 9 : 1">
                <span :style="indent(row.level)">
                  {{ `${row.code}) ${row.title}` }}
                </span>
              </td>
              <template v-if="!row.mfo_only">
                <td>{{ row.success_indicator }}</td>
                <td
                  v-html="performance_measures(row.performance_measures)"
                ></td>
                <td v-html="performance_measure_criteria(row.quality)"></td>
                <td v-html="performance_measure_criteria(row.efficiency)"></td>
                <td v-html="performance_measure_criteria(row.timeliness)"></td>
                <td v-html="in_charge(row.in_charges)"></td>
                <td>Edit Delete</td>
              </template>
            </tr>
            <tr v-else-if="row.rowspan > 0 && row.si_only == false">
              <td :rowspan="row.rowspan">
                <p>id: {{ row.id }}</p>
              </td>
              <td :rowspan="row.rowspan">
                <span :style="indent(row.level)">
                  {{ `${row.code}) ${row.title}` }}
                </span>
              </td>
              <td>{{ row.success_indicator }}</td>
              <td v-html="performance_measures(row.performance_measures)"></td>
              <td v-html="performance_measure_criteria(row.quality)"></td>
              <td v-html="performance_measure_criteria(row.efficiency)"></td>
              <td v-html="performance_measure_criteria(row.timeliness)"></td>
              <td v-html="in_charge(row.in_charges)"></td>
              <td>Edit Delete</td>
            </tr>
            <tr v-else>
              <td>{{ row.success_indicator }}</td>
              <td v-html="performance_measures(row.performance_measures)"></td>
              <td v-html="performance_measure_criteria(row.quality)"></td>
              <td v-html="performance_measure_criteria(row.efficiency)"></td>
              <td v-html="performance_measure_criteria(row.timeliness)"></td>
              <td v-html="in_charge(row.in_charges)"></td>
              <td>Edit Delete</td>
            </tr>
          </template>
          <tr v-if="rows.length < 1">
            <td class="p-5 bg-gray-300" colspan="9" style="text-align: center">
              No records found!
            </td>
          </tr>
        </table>

        <!-- ####################### Table End ########################### -->
      </template>
    </Card>
  </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";
import PmsToolbar from "@/Layouts/PmsToolbar";
export default {
  props: {
    auth: null,
    period_id: null,
    rows: null,
  },
  components: {
    AuthLayout,
    PmsToolbar,
  },
  data() {
    return {};
  },
  methods: {
    // toggle(event) {
    //   this.$refs["menu1"].toggle(event);
    // },
    get_menu_items(row) {
      var items = [
        {
          label: "Options",
          items: [
            {
              label: "Update",
              // icon: "pi pi-refresh",
              command: () => {
                this.$toast.add({
                  severity: "success",
                  summary: "Updated",
                  detail: "Data Updated",
                  life: 3000,
                });
              },
            },
            {
              label: "Delete",
              // icon: "pi pi-times",
              command: () => {
                this.$toast.add({
                  severity: "warn",
                  summary: "Delete",
                  detail: "Data Deleted",
                  life: 3000,
                });
              },
            },
          ],
        },
      ];

      return items;
    },
    performance_measures(arr) {
      var html = "";
      if (!arr) return html;
      for (let index = 0; index < arr.length; index++) {
        html += arr[index] + "<br/>";
      }
      return html;
    },
    performance_measure_criteria(arr) {
      var html = "";
      if (!arr) return html;
      for (let index = 0; index < arr.length; index++) {
        html += `${arr[index].score} - ${arr[index].description}` + "<br/>";
      }
      return html;
    },
    in_charge(arr) {
      var html = "";
      if (!arr) return html;
      for (let index = 0; index < arr.length; index++) {
        html += `${arr[index].full_name}` + "<br/>";
      }
      return html;
    },
    indent(level) {
      var margin = "";
      if (level > 0) {
        margin = "margin-left:" + level * 20 + "px;";
      }
      return margin;
    },
  },
  mounted() {
    console.log();
  },
};
</script>


