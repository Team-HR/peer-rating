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
    <Card class="w-full">
      <template #title>
        <Button label="Back" class="p-button-sm p-button-raised p-button-text mb-3" icon="bi bi-arrow-left"
                @click="go_back()"></Button>
        <!-- <br />
        <span><i class="bi bi-book mr-2"></i> {{ pms_pcr_status.full_name }}</span> -->
      </template>
      <template #subtitle>
        <!-- <span class="text-xl">{{ pms_pcr_status.sys_department }} ( {{ period.period }},
          {{ period.year }})</span>
        <span class="uppercase ml-2 font-bold text-green-700 p-2 border-1 border-green-700 border-round">{{
          pms_pcr_status.form_type
        }}</span> -->
        <!-- This here shows the individual's pcr form. -->
      </template>
      <template #content>
        <PcrForm :pms_pcr_status="pms_pcr_status" />
      </template>
    </Card>
  </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";
import PcrForm from "@/Components/Pms/PcrForm.vue";

export default {
  props: {
    period: null,
    pms_pcr_status: null,
    core_functions: null
  },
  components: {
    AuthLayout,
    PcrForm
  },
  data() {
    return {
      current_url: document.location.pathname,
    };
  },
  methods: {
    go_back() {
      window.history.back();
    },

  },
  created() { },
  mounted() { },
};
</script>
