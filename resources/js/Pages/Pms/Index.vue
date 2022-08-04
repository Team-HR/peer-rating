<template>
  <auth-layout>
    <PmsToolbar />
    <Card class="w-full">
      <template #content>
        <h1>PMS</h1>
      </template>
    </Card>
  </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";
import PmsToolbar from "@/Layouts/PmsToolbar";
export default {
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


