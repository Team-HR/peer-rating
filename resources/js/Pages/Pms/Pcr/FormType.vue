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
          ><i class="bi bi-book mr-2"></i> Performance Commitment Review | Set
          Form Type</span
        ></template
      >
      <template #subtitle>
        <span class="text-xl"
          >{{ $page.props.auth.user.sys_department_name }} (
          {{ period.period }}, {{ period.year }})</span
        >
        <br />
        Set form type</template
      >
      <template #content>
        <form @submit.prevent="submit_form()" class="w-full ml-5">
          <div class="field">
            <h3>EMPLOYEER:</h3>
            <div class="field-radiobutton">
              <RadioButton
                inputId="agency1"
                name="employee_from"
                value="lgu"
                v-model="form.agency"
              />
              <label for="agency1">(LGU) Local Government Unit</label>
            </div>
            <div class="field-radiobutton">
              <RadioButton
                inputId="agency2"
                name="employee_from"
                value="nga"
                v-model="form.agency"
              />
              <label for="agency2">(NGA) National Government Agency</label>
            </div>
          </div>
          <div class="field">
            <h3>PCR TYPE:</h3>
            <div class="field-radiobutton">
              <RadioButton
                inputId="type1"
                name="form_type"
                value="ipcr"
                v-model="form.type"
              />
              <label for="type1">IPCR</label>
            </div>

            <div v-if="form.agency != 'nga'">
              <div class="field-radiobutton">
                <RadioButton
                  inputId="type2"
                  name="form_type"
                  value="spcr"
                  v-model="form.type"
                />
                <label for="type2">SPCR</label>
              </div>
              <div class="field-radiobutton">
                <RadioButton
                  inputId="type3"
                  name="form_type"
                  value="dspcr"
                  v-model="form.type"
                />
                <label for="type3">DIVISION SPCR</label>
              </div>
              <div class="field-radiobutton">
                <RadioButton
                  inputId="type4"
                  name="form_type"
                  value="dpcr"
                  v-model="form.type"
                />
                <label for="type4">DPCR</label>
              </div>
            </div>
          </div>
          <Button icon="bi bi-save" label="Save" type="submit"></Button>
        </form>
      </template>
    </Card>
  </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";
import PmsToolbar from "@/Layouts/PmsToolbar";

export default {
  props: {
    period: null,
  },
  components: {
    AuthLayout,
    PmsToolbar,
  },
  data() {
    return {
      current_url: document.location.pathname,
      form: this.$inertia.form({
        agency: null,
        type: null,
      }),
    };
  },
  watch: {
    "form.agency"(newValue, oldValue) {
      // console.log(newValue);
      if (newValue == "nga") {
        this.form.type = "ipcr";
      } else {
        this.form.type = null;
      }
    },
  },
  methods: {
    submit_form() {
      console.log(this.form);
    },
    go_back() {
      window.history.back();
    },
  },
  mounted() {},
};
</script>


