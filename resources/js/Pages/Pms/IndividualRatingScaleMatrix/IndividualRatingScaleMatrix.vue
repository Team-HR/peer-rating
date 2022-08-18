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
      <template #title
        ><span class="uppercase"
          ><i class="bi bi-book mr-2"></i>Individual Rating Scale Matrix</span
        ></template
      >
      <template #subtitle>Individual Rating Scale Matrix</template>
      <template #content> </template>
    </Card>
  </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";
import PmsToolbar from "@/Layouts/PmsToolbar";
export default {
  props: {
    auth: null,
    period: null,
    period_id: null,
    rows: null,
  },
  components: {
    AuthLayout,
    PmsToolbar,
  },
  data() {
    return {};
  },
  methods: {},
  mounted() {},
};
</script>


