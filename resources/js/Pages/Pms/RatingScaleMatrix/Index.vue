<template>
  <auth-layout>
    <period-selector icon="bi bi-book" title="Department Rating Scale Matrix"
                     description="Edit or review your Department/Section's Rating Scale Matrix"
                     path="/pms/rsm/"></period-selector>
  </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";
import PeriodSelector from "@/Components/Pms/PeriodSelector.vue";
export default {
  props: {
    // periods: null,
  },
  components: {
    AuthLayout,
    PeriodSelector
  },
  data() {
    return {
      // period_id: null,
    };
  },
  mounted() { },
};
</script>


