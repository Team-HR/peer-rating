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
          ><i class="bi bi-book mr-2"></i> Performance Commitment Review</span
        ></template
      >
      <template #subtitle>
        <span class="text-xl"
          >{{ $page.props.auth.user.sys_department_name }} (
          {{ period.period }}, {{ period.year }})</span
        >
        <br />
        Accomplish/Review your Performance Commitments</template
      >
      <template #content>
        <table>
          <tr>
            <th>Option</th>
            <th>Form</th>
            <th>Status</th>
          </tr>
          <tr v-for="(item, i) in items" :key="i">
            <td>
              <Button
                @click="$inertia.get(item.href)"
                label="Open"
                class="p-button-sm"
              ></Button>
            </td>
            <td>{{ item.label }}</td>
            <td>Done!</td>
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
    period: null,
  },
  components: {
    AuthLayout,
    PmsToolbar,
  },
  data() {
    return {
      current_url: document.location.pathname,
      items: [
        {
          no: 1,
          href: document.location.pathname + "/form_type",
          label: "Form Type",
        },
        {
          no: 2,
          href: document.location.pathname + "/signatories",
          label: "Signatories",
        },
        {
          no: 3,
          href: document.location.pathname + "/core_functions",
          label: "Core Functions",
        },
        {
          no: 4,
          href: document.location.pathname + "/strategic_functions",
          label: "Strategic Function",
        },
        {
          no: 5,
          href: document.location.pathname + "/support_functions",
          label: "Support Function",
        },
        {
          no: 6,
          href: document.location.pathname + "/submit",
          label: "Submit",
        },
      ],
    };
  },
  methods: {
    go_back() {
      window.history.back();
    },
  },
  mounted() {
    // console.log(this.current_url);
  },
};
</script>


