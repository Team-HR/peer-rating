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
                :disabled="item.is_disabled"
              ></Button>
            </td>
            <td>{{ item.label }}</td>
            <td class="" v-html="item.status"></td>
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
    test() {
      console.log(this.form_status);
      return this.form_status.agency
        ? `${this.form_status.signatories_inputs.immediate_supervisor.full_name} - ${this.form_status.department_head}`
        : "Set Form Type first!";
    },
  },
  created() {
    var items = [
      {
        no: 1,
        href: this.current_url + "/form_type/" + this.form_status.id,
        label: "Form Type",
        status: (() => {
          var agency = this.form_status.agency
            ? this.form_status.agency.toUpperCase()
            : "________";
          var form_type = this.form_status.form_type
            ? this.form_status.form_type.toUpperCase()
            : "________";
          return this.form_status.agency
            ? `Agency: <b class="text-green-700_ mr-3"> ${agency} </b>
               Type: <b class="text-green-700_ mr-3"> ${form_type}</b>`
            : "Please set Form Type!";
        })(),
      },
      {
        no: 2,
        href: this.current_url + "/signatories/" + this.form_status.id,
        label: "Signatories",
        status: (() => {
          if (!this.form_status.agency) return "Set Form Type first!";
          // return this.form_status.signatories_inputs;
          var immediate_supervisor,
            department_head,
            head_of_agency = "";
          if (this.form_status.agency == "lgu") {
            immediate_supervisor = this.form_status.signatories_inputs
              .immediate_supervisor
              ? this.form_status.signatories_inputs.immediate_supervisor.full_name
              : "_________";
            department_head = this.form_status.signatories_inputs.department_head
              ? this.form_status.signatories_inputs.department_head.full_name
              : "_________";
          } else {
            immediate_supervisor = this.form_status.signatories_inputs
              .immediate_supervisor
              ? this.form_status.signatories_inputs.immediate_supervisor
              : "_________";
            department_head = this.form_status.signatories_inputs.department_head
              ? this.form_status.signatories_inputs.department_head
              : "_________";
          }
          head_of_agency = this.form_status.signatories_inputs.head_of_agency
            ? this.form_status.signatories_inputs.head_of_agency
            : "_________";
          return `Immediate Supervisor: <b class="text-green-700_ mr-3"> ${immediate_supervisor}</b>
                    Department Head:<b class="text-green-700_ mr-3"> ${department_head}</b> Head of Agency: <b class="text-green-700_">${head_of_agency}</b>`;
        })(),
        is_disabled: !this.form_status.agency ? true : false,
      },
      {
        no: 3,
        href: this.current_url + "/core_functions/" + this.form_status.id,
        label: "Core Functions",
        status: (() => {
          var total_percentage_weight = this.form_status.total_percentage_weight
            ? this.form_status.total_percentage_weight
            : "_________";
          var total_average_rating = this.form_status.total_average_rating
            ? this.form_status.total_average_rating
            : "_________";
          return this.status_text(total_percentage_weight, total_average_rating);
        })(),
      },
      {
        no: 4,
        href: this.current_url + "/strategic_function/" + this.form_status.id,
        label: "Strategic Function",
        status: (() => {
          var total_percentage_weight = this.form_status.strat_total_percentage_weight
            ? this.form_status.strat_total_percentage_weight
            : "_________";
          var total_average_rating = this.form_status.strat_total_average_rating
            ? this.form_status.strat_total_average_rating
            : "_________";
          return this.status_text(total_percentage_weight, total_average_rating);
        })(),
      },
      {
        no: 5,
        href: this.current_url + "/support_functions",
        label: "Support Function",
        status: (() => {
          var total_percentage_weight = this.form_status.support_total_percentage_weight
            ? this.form_status.support_total_percentage_weight
            : "_________";
          var total_average_rating = this.form_status.support_total_average_rating
            ? this.form_status.support_total_average_rating
            : "_________";
          return this.status_text(total_percentage_weight, total_average_rating);
        })(),
        is_disabled: !this.form_status.agency ? true : false,
      },
      {
        no: 6,
        href: this.current_url + "/submit",
        label: "Finalize",
        status: (() => {
          var total_percentage_weight = this.form_status.overall_percentage_weight
            ? this.form_status.support_total_percentage_weight
            : "_________";
          var total_average_rating = this.form_status.overall_numerical_rating
            ? this.form_status.support_total_average_rating
            : "_________";
          return `Total Percentage Weight (%): <b class="text-green-700_ mr-3">${total_percentage_weight}%</b>Total Numerical Rating: <b class="text-green-700_ mr-3">${total_average_rating}</b>`;
        })(),
      },
    ];

    this.items = items;
  },

  methods: {
    status_text(total_percentage_weight, total_average_rating) {
      return `Percentage Weight (%): <b class="text-green-700_ mr-3">${total_percentage_weight}%</b>Rating: <b class="text-green-700_ mr-3">${total_average_rating}</b>`;
    },
  },

  mounted() {
    // console.log(this.form_status);
  },
};
</script>
