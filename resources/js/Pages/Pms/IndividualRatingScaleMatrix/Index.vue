<template>
  <auth-layout>
    <period-selector icon="bi bi-book" title="Individual Rating Scale"
                     description="View your individual rating scale matrix." path="/pms/irsm/"></period-selector>
  </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";
import PeriodSelector from "@/Components/Pms/PeriodSelector.vue";

export default {
  // props: {
  //   periods: null,
  // },
  components: {
    AuthLayout,
    PeriodSelector
  },
  data() {
    return {
      // period_id: null
    };
  },
  mounted() {
  },
};
</script>


