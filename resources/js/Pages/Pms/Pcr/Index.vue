<template>
  <auth-layout>
    <period-selector icon="bi bi-input-cursor-text" title="Performance Commitment Review"
      description="Accomplish your performance commitment review" path="/pms/pcr/"></period-selector>
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
