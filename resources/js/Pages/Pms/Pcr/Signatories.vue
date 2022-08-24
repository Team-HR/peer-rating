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
          Signatories</span
        ></template
      >
      <template #subtitle>
        <span class="text-xl"
          >{{ $page.props.auth.user.sys_department_name }} ( {{ period.period }},
          {{ period.year }})</span
        >
        <br />
        Set signatories</template
      >
      <template #content>
        <form @submit.prevent="submit_form()" class="w-full ml-5">
          <div class="field">
            <h3>SUPERVISOR:</h3>
            <InputText placeholder="Name of your supervisor" />
          </div>
          <div class="field">
            <h3>DEPARTMENT HEAD:</h3>
            <InputText placeholder="Name of your department head" />
          </div>
          <div class="field">
            <h3>HEAD OF AGENCY:</h3>
            <InputText placeholder="Name of your agency head" />
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
    form_type: null,
    period: null,
  },
  components: {
    AuthLayout,
    PmsToolbar,
  },
  data() {
    return {
      current_url: document.location.pathname,
      error: {
        agency: "",
        form_type: "",
      },
      form: this.$inertia.form({
        agency: null,
        form_type: null,
      }),
    };
  },
  methods: {
    validate() {
      this.error.agency = !this.form.agency ? "Please select the agency." : null;
      this.error.form_type = !this.form.form_type ? "Please select the form type." : null;
      return this.error.agency || this.error.form_type ? false : true;
    },
    submit_form() {
      if (this.form.agency == "nga") {
        this.form.form_type = "ipcr";
      }
      if (this.validate()) {
        this.form.post(this.current_url, {
          onSuccess: () => {
            this.go_back();
          },
        });
      }
    },
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
  created() {
    if (this.form_type) {
      this.form.agency = this.form_type.agency;
      this.form.form_type = this.form_type.form_type;
    }
  },
  mounted() {},
};
</script>
