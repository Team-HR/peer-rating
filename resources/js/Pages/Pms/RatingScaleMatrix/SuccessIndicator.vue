<template>
  <auth-layout>
    <PmsToolbar />
    <Card class="w-full">
      <template #title>
        <span class="uppercase"
          ><i class="bi bi-book mr-2"></i> Rating Scale Matrix | Success
          Indicator</span
        >
      </template>
      <template #subtitle>Add/Edit/Delete Success Indicator/s</template>
      <template #content>
        <Button
          label="Cancel"
          icon="bi bi-arrow-left"
          class="p-button-danger p-button-sm p-button-text p-button-raised mx-3"
          @click="go_back()"
        ></Button>

        <Button
          label="Save"
          icon="bi bi-save"
          class="p-button-primary p-button-sm p-button-text p-button-raised"
          @click="save_form()"
        ></Button>

        <div class="m-5">
          <div class="text-xl w-full mb-2">
            <span class="mr-3">MFO/PAP:</span>
            <span>{{ $page.props.mfo.code }})</span>
            {{ ` ` }}
            <span>{{ $page.props.mfo.title }}</span>
            <br />
          </div>

          <!-- AddEdit form start -->

          <form id="add_edit_form" @submit.prevent="add_edit_submit()">
            <div class="formgrid grid">
              <div class="field col-12">
                <label>Success Indicator:</label>
                <small class="ml-2">*Required</small>

                <br />
                <Textarea
                  class="w-full"
                  v-model="form.success_indicator"
                  rows="5"
                  :autoResize="true"
                  placeholder="Example: 100% (_/_) of applicant requirements prepared..."
                  required
                />
              </div>
              <div class="field col-12">
                <label>Measures:</label> <small class="ml-2">*Required</small>

                <div class="field-checkbox">
                  <Checkbox
                    id="quality"
                    name="quality"
                    binary
                    v-model="has_quality"
                  />
                  <label for="quality">Quality</label>
                </div>
                <div class="field-checkbox">
                  <Checkbox
                    id="efficiency"
                    name="efficiency"
                    binary
                    v-model="has_efficiency"
                  />
                  <label for="efficiency">Efficiency</label>
                </div>
                <div class="field-checkbox">
                  <Checkbox
                    id="timeliness"
                    name="timeliness"
                    binary
                    v-model="has_timeliness"
                  />
                  <label for="timeliness">Timeliness</label>
                </div>

                <div class="formgrid grid">
                  <div class="field col" :hidden="!has_quality">
                    <label>Quality:</label>
                    <div class="p-inputgroup mb-1" v-for="(i, k) in 5" :key="k">
                      <span class="p-inputgroup-addon">
                        {{ 5 - i + 1 }}
                      </span>
                      <InputText
                        :value="form.quality[k].description"
                        @input="
                          update('quality', k, 5 - i + 1, $event.target.value)
                        "
                      />
                    </div>
                  </div>
                  <div class="field col" :hidden="!has_efficiency">
                    <label>Efficiency:</label>
                    <div class="p-inputgroup mb-1" v-for="(i, k) in 5" :key="k">
                      <span class="p-inputgroup-addon">
                        {{ 5 - i + 1 }}
                      </span>
                      <InputText
                        @input="
                          update(
                            'efficiency',
                            k,
                            5 - i + 1,
                            $event.target.value
                          )
                        "
                      />
                    </div>
                  </div>
                  <div class="field col" :hidden="!has_timeliness">
                    <label>Timeliness:</label>
                    <div class="p-inputgroup mb-1" v-for="(i, k) in 5" :key="k">
                      <span class="p-inputgroup-addon">
                        {{ 5 - i + 1 }}
                      </span>
                      <InputText
                        @input="
                          update(
                            'timeliness',
                            k,
                            5 - i + 1,
                            $event.target.value
                          )
                        "
                      />
                    </div>
                  </div>
                </div>
              </div>

              <div class="field col-12">
                <label>In-Charge:</label> <small class="ml-2">*Required</small>
                <br />
                <EmployeePicker
                  :options="employees"
                  @changed="getEmployeePicks"
                />
              </div>
            </div>
          </form>

          <!-- AddEdit form end -->
        </div>
      </template>
    </Card>
  </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";
import PmsToolbar from "@/Layouts/PmsToolbar";
import EmployeePicker from "@/Components/EmployeePicker.vue";
export default {
  props: {
    periods: null,
    employees: null,
  },
  components: {
    AuthLayout,
    PmsToolbar,
    EmployeePicker,
  },
  data() {
    return {
      period_id: null,
      has_quality: false,
      has_efficiency: false,
      has_timeliness: false,
      in_charge: null,
      form: this.$inertia.form({
        id: null,
        success_indicator: null,
        quality: [],
        efficiency: [],
        timeliness: [],
        in_charges: [],
      }),
    };
  },
  methods: {
    update(type, i, score, val) {
      this.form[type][i] = { score: score, description: val };
    },
    getEmployeePicks(value) {
      this.form.in_charges = value;
      console.log(this.form);
    },
    go_back() {
      window.history.back();
    },
    save_form() {
      console.log(this.form);
    },
  },
  mounted() {},
};
</script>


