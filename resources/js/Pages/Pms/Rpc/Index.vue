<template>
  <auth-layout>
    <Card class="w-full">
      <template #title><span class="uppercase"><i class="bi bi-book mr-2"></i> REVIEW PERFORMANCE COMMITMENT AND
          REVIEW</span></template>
      <template #subtitle>Review your personnel's Performance Commitment and Review</template>
      <template #content>
        <form @submit.prevent="$inertia.get('/pms/rpc/' + period_id)">
          <label class="mr-2">Selected Period:</label>
          <Dropdown autofocus class="mr-2" v-model="period_id" :options="periods" optionLabel="text" optionValue="id"
                    placeholder="Please select a period" />
          <Button :disabled="!period_id" type="submit" :class="!period_id ? 'p-button-text' : 'p-button-primary'"
                  :icon="!period_id ? 'bi bi-arrow-left' : 'bi bi-folder'"
                  :label="!period_id ? 'Select a period first' : 'Open'" />
        </form>
      </template>
    </Card>
  </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";
export default {
  props: {
    periods: null,
  },
  components: {
    AuthLayout,
  },
  data() {
    return {
      period_id: null,
    };
  },
  mounted() { },
};
</script>
