<template>
  <auth-layout>
    <PmsToolbar />
    <Card class="w-full">
      <template #title
        ><span class="uppercase"
          ><i class="bi bi-book mr-2"></i> Rating Scale Matrix |
          {{ period_id }}</span
        ></template
      >
      <template #subtitle
        >Edit or review your Department/Section's Rating Scale Matrix</template
      >
      <template #content> </template>
    </Card>
  </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";
import PmsToolbar from "@/Layouts/PmsToolbar";
export default {
  props: {
    period_id: null,
  },
  components: {
    AuthLayout,
    PmsToolbar,
  },
  data() {
    return {};
  },
  mounted() {},
};
</script>


