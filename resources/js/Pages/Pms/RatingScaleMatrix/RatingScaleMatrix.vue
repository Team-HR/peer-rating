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
            <tr v-if="row.rowspan == 0 && row.si_only == false" :class="row.mfo_only ? 'bg-primary-50': ''">
              <td></td>
              <td :colspan="row.mfo_only ? 9 : 1">
                <div :style="indent(row.level)">
                  <Button
                    type="button"
                    class="p-button-tex p-button-text py-0 px-2 m-0 mr-2"
                    @click="toggle($event, row.id)"
                  >
                    <i class="bi bi-gear"></i>
                  </Button>
                  <Menu
                    :ref="`menu${row.id}`"
                    :model="get_menu_items()"
                    :popup="true"
                  />
                  <span>
                    <strong class="mr-2">{{ row.code }}</strong>
                    {{ row.title }}
                  </span>
                </div>
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
                <div :style="indent(row.level)">
                  <Button
                    type="button"
                    class="p-button-tex p-button-text py-0 px-2 m-0 mr-2"
                    @click="toggle($event, row.id)"
                  >
                    <i class="bi bi-gear"></i>
                  </Button>
                  <Menu
                    :ref="`menu${row.id}`"
                    :model="get_menu_items()"
                    :popup="true"
                  />
                  <span>
                    <strong class="mr-2">{{ row.code }}</strong>
                    {{ row.title }}
                  </span>
                </div>
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
        <Button
          class="my-5"
          icon="pi pi-plus"
          label="Add New MFO/PAP"
          @click="add_modal = !add_modal"
        ></Button>
        <!-- ############################       Add Modal Start        ############################# -->
        <Dialog
          header="ADD NEW MFO/PAP"
          v-model:visible="add_modal"
          :modal="true"
        >
          <form id="add_new_form" class="card" @submit.prevent="submit_add()">
            <div class="formgrid grid">
              <div class="field col-12">
                <label class="mr-2">Parent MFO/PAP:</label>
                <br />
                <Dropdown
                  showClear
                  v-model="form.parent_id"
                  :options="parents"
                  optionLabel="label"
                  optionValue="id"
                  placeholder="Select parent if available (Leave blank if none)"
                />
              </div>
              <div class="field col-4">
                <label>Code:</label>
                <InputText
                  class="w-full"
                  type="text"
                  v-model="form.code"
                  placeholder="e.g. A., A.1., B.,B.1"
                  required
                />
                <small class="ml-2">*Required</small>
              </div>
              <div class="field col-8">
                <label>MFO/PAP Title:</label>
                <InputText
                  class="w-full"
                  type="text"
                  v-model="form.title"
                  placeholder="e.g. Recruitment Services"
                  required
                />
                <small class="ml-2">*Required</small>
              </div>
            </div>
          </form>

          <template #footer>
            <Button
              type="button"
              label="No"
              icon="pi pi-times"
              class="p-button-text"
              @click="add_modal = false"
            />
            <Button
              form="add_new_form"
              type="submit"
              label="Yes"
              icon="pi pi-check"
            />
          </template>
        </Dialog>
        <!-- ############################       Add Modal End        ############################# -->

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
    parents: null,
  },
  components: {
    AuthLayout,
    PmsToolbar,
  },
  data() {
    return {
      current_url: document.location.pathname,
      add_modal: false,
      menu: [],
      form: this.$inertia.form({
        parent_id: null,
        code: null,
        title: null,
      }),
    };
  },
  watch: {
    add_modal(newValue, oldValue) {
      if (!newValue) {
        this.clear_form();
      }
    },
  },
  methods: {
    submit_add() {
      console.log(this.form);
      this.form.post(this.current_url, {
        onSuccess: () => {
          this.add_modal = false;
          this.clear_form();
        },
      });
    },
    clear_form() {
      this.form.parent_id = null;
      this.form.code = null;
      this.form.title = null;
    },
    toggle(event, id) {
      const menu = `menu${id}`;
      this.$refs[menu][0].toggle(event);
    },
    get_menu_items() {
      var items = [
        {
          label: "MFO/PAP",
          items: [
            {
              label: "Edit",
              icon: "bi bi-input-cursor-text",
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
              label: "Change Parent",
              icon: "bi bi-arrow-down-up",
              command: () => {
                this.$toast.add({
                  severity: "warn",
                  summary: "Deleted",
                  detail: "Data Deleted",
                  life: 3000,
                });
              },
            },
          ],
        },
        {
          label: "SUCCESS INDICATOR",
          items: [
            {
              label: "Add New",
              icon: "pi pi-plus",
              command: () => {
                this.$toast.add({
                  severity: "success",
                  summary: "Updated",
                  detail: "Data Updated",
                  life: 3000,
                });
              },
            },
          ],
        },
        {
          label: "SUB-FUNCTION",
          items: [
            {
              label: "Add Sub",
              icon: "bi bi-arrow-return-right",
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
    console.log(this.parents);
  },
};
</script>


