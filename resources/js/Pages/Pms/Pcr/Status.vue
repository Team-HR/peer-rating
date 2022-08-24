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
          >{{ $page.props.auth.user.sys_department_name }} ( {{ period.period }},
          {{ period.year }})</span
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
                @click="$inertia.get(item.href, {}, { replace: true })"
                label="Open"
                class="p-button-sm"
              ></Button>
            </td>
            <td>{{ item.label }}</td>
            <td class="uppercase" v-html="item.status"></td>
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
    form_status: null,
  },
  components: {
    AuthLayout,
    PmsToolbar,
  },
  data() {
    return {
      current_url: document.location.pathname,
      items: [],
    };
  },
  methods: {
    go_back() {
      window.history.back();
    },
  },
  created() {
    var items = [
      {
        no: 1,
        href: this.current_url + "/form_type/" + this.form_status.id,
        label: "Form Type",
        status: `${this.form_status.agency} - ${this.form_status.form_type}`,
      },
      {
        no: 2,
        href: this.current_url + "/signatories/" + this.form_status.id,
        label: "Signatories",
      },
      {
        no: 3,
        href: this.current_url + "/core_functions",
        label: "Core Functions",
      },
      {
        no: 4,
        href: this.current_url + "/strategic_functions",
        label: "Strategic Function",
      },
      {
        no: 5,
        href: this.current_url + "/support_functions",
        label: "Support Function",
      },
      {
        no: 6,
        href: this.current_url + "/submit",
        label: "Submit",
      },
    ];

    this.items = items;
  },
  mounted() {
    // console.log(this.form_status);
  },
};
</script>
