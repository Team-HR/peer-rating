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
          ><i class="bi bi-book mr-2"></i> Performance Commitment Review | Support
          Functions</span
        ></template
      >
      <template #subtitle>
        <span class="text-xl"
          >{{ $page.props.auth.user.sys_department_name }} ( {{ period.period }},
          {{ period.year }})</span
        >
        <br />
        Accomplish Support Functions</template
      >
      <template #content>
        <div class="mx-5"></div>
        <!-- Dialogs and Toast start-->
        <ConfirmDialog></ConfirmDialog>
        <Toast />
        <!-- Dialogs and Toast end-->
        <table class="w-full">
          <thead>
            <th>Support Function</th>
            <th>Success Indicator</th>
            <th>Actual Accomplishment</th>
            <th>Q</th>
            <th>E</th>
            <th>T</th>
            <th>A</th>
            <th>Options</th>
          </thead>
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
      accomplishment_modal: false,
      not_applicable_modal: false,
      accomplishment: this.$inertia.form({
        id: null,
        function_title: null,
        success_indicator: null,
        actual_accomplishment: null,
        final_numerical_rating: null,
        remarks: null,
        not_applicable: null,
      }),
    };
  },
  methods: {
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
    this.$inertia.reload({ only: ["rows"] });
  },
  mounted() {},
};
</script>
