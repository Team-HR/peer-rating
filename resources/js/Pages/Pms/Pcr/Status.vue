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
        <ol>
          <li v-for="(item, i) in items" :key="i">
            <inertia-link href="#"><i class="bi bi-gear"></i> <span>Setup</span></inertia-link>
            <span class="mx-3">Status: Not configured! </span>
            <span class="text-lg mL-3 uppercase">{{ item.label }} </span>
          </li>
        </ol>
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
      items: [
        {
          no: 1,
          label: "Form Type",
        },
        {
          no: 2,
          label: "Signatories",
        },
        {
          no: 3,
          label: "Core Functions",
        },
        {
          no: 4,
          label: "Strategic Function",
        },
        {
          no: 5,
          label: "Support Function",
        },
        {
          no: 6,
          label: "Finalize",
        },
      ],
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


