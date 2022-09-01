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
        <!-- table start -->
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
              <td v-if="!row.mfo_only" class="text-center">
                <Button
                  label="-- %"
                  class="p-button-sm p-button-secondary p-button-raised p-1"
                ></Button>
              </td>
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
              <td class="text-center">
                <Button
                  label="-- %"
                  class="p-button-sm p-button-secondary p-button-raised p-1"
                ></Button>
              </td>
              <td :rowspan="row.rowspan">
                <div :style="indent(row.level)">
                  <span>
                    <strong class="mr-2">{{ row.code }}</strong>
                    {{ row.title }}
                  </span>
                </div>
              </td>
              <td>{{ row.success_indicator }}</td>
              <template v-if="false">
                <td>acc</td>
                <td>q</td>
                <td>e</td>
                <td>starting si</td>
                <td></td>
                <td></td>
                <td></td>
              </template>
              <template v-else>
                <td colspan="7" class="text-center">
                  <Button
                    label="Add Accomplishment"
                    class="p-button-text p-button-small p-button-raised w-4 p-1"
                    @click="add_accomplishment(row)"
                  ></Button>

                  <Button
                    label="Not Applicable"
                    class="p-button-danger p-button-small p-button-raised w-4 mt-2 ml-3 p-1"
                  ></Button>
                </td>
              </template>
            </tr>
            <!-- succeding success indicator from above -->
            <tr v-else>
              <td class="text-center">
                <Button
                  label="-- %"
                  class="p-button-sm p-button-secondary p-button-raised p-1"
                ></Button>
              </td>
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
        <!-- table end -->
        <!-- add accomplishment modal start -->
        <Dialog
          header="Edit Accomplishment"
          v-model:visible="edit_accomplishment_modal"
          :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
          :style="{ width: '50vw' }"
          :modal="true"
        >
          <form @submit.prevent="submit_accomplishment()" id="accomplishment_form">
            <div class="field">
              <div class="font-bold">Success Indicator:</div>
              <span>{{ core_function.success_indicator }}</span>
            </div>
            <div class="field">
              <div class="font-bold">Actual Accomplishment:</div>
              <Textarea
                v-model="accomplishment.actual"
                :autoResize="true"
                rows="5"
                class="w-full"
                placeholder="Enter your actual accomplishment here based on the success indicator above."
                required
              />
            </div>
            <!-- <div class="field">
              {{ core_function }}
            </div> -->
            <div class="field">
              <div class="font-bold">Quality:</div>
              <template v-for="(quality, i) in core_function.quality" :key="i">
                <div v-if="quality">
                  <input
                    type="radio"
                    name="quality"
                    :value="5 - i"
                    :id="`quality${i}`"
                    v-model="accomplishment.quality"
                    required
                  />
                  <label :for="`quality${i}`">{{ `${5 - i} - ${quality}` }}</label>
                </div>
              </template>
            </div>
            <div class="field">
              <div class="font-bold">Efficiency:</div>
              <template v-for="(efficiency, i) in core_function.efficiency" :key="i">
                <div v-if="efficiency">
                  <input
                    type="radio"
                    name="efficiency"
                    :value="5 - i"
                    :id="`efficiency${i}`"
                    v-model="accomplishment.efficiency"
                    required
                  />
                  <label :for="`efficiency${i}`">{{ `${5 - i} - ${efficiency}` }}</label>
                </div>
              </template>
            </div>
            <div class="field">
              <div class="font-bold">Timeliness:</div>
              <template v-for="(timeliness, i) in core_function.timeliness" :key="i">
                <div v-if="timeliness">
                  <input
                    type="radio"
                    name="timeliness"
                    :value="5 - i"
                    :id="`timeliness${i}`"
                    v-model="accomplishment.timeliness"
                    required
                  />
                  <label :for="`timeliness${i}`">{{ `${5 - i} - ${timeliness}` }}</label>
                </div>
              </template>
            </div>
            <div class="field">
              <div class="font-bold">Percentage Weight:</div>
              <!-- <InputNumber placeholder="-- % " /> -->
              <InputNumber
                inputId="percent"
                v-model="accomplishment.percent"
                suffix="%"
                placeholder="--%"
                required
              />
            </div>
            <div class="field">
              <div class="font-bold">Remarks:</div>
              <Textarea
                :autoResize="true"
                rows="5"
                class="w-full"
                placeholder="Enter remarks here."
                v-model="accomplishment.remarks"
              />
            </div>
          </form>

          <template #footer>
            <Button
              label="No"
              icon="pi pi-times"
              @click="edit_accomplishment_modal = false"
              class="p-button-text"
            />
            <Button
              label="Yes"
              icon="pi pi-check"
              autofocus
              type="submit"
              form="accomplishment_form"
            />
          </template>
        </Dialog>
        <!-- add accomplishment modal end -->
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
      edit_accomplishment_modal: false,
      core_function: null,
      accomplishment: this.$inertia.form({
        id: null,
        pms_rating_scale_matrix_success_indicator_id: null,
        actual: null,
        quality: null,
        efficiency: null,
        timeliness: null,
        percent: null,
        remarks: null,
        not_applicable: false,
      }),
    };
  },
  methods: {
    submit_accomplishment() {
      // console.log(this.accomplishment);
      this.accomplishment.post(this.current_url + "/accomplishment", {
        onSuccess: () => {
          this.edit_accomplishment_modal = false;
        },
      });
    },
    add_accomplishment(row) {
      this.core_function = row;
      this.accomplishment.pms_rating_scale_matrix_success_indicator_id =
        row.pms_rating_scale_matrix_success_indicator_id;
      this.edit_accomplishment_modal = true;
    },
    clear_accomplishment() {},
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
