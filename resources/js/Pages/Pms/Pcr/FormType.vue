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
        <form @submit.prevent="">
          <div class="w-full">
            <h3>Agency:</h3>
            <div class="field-radiobutton">
              <input
                id="agency1"
                type="radio"
                name="employee_from"
                value="lgu"
                v-model="form.employee_from"
              />
              <label for="agency1">(LGU) Local Government Unit</label>
            </div>
            <div class="field-radiobutton">
              <input
                id="agency2"
                type="radio"
                name="employee_from"
                value="nga"
                v-model="form.employee_from"
              />
              <label for="agency2">(NGA) National Government Agency</label>
            </div>
          </div>
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
        employee_from: null,
      }),
    };
  },
  methods: {
    go_back() {
      window.history.back();
    },
  },
  mounted() {},
};
</script>


