<template>
  <auth-layout>
    <Card class="w-full">
      <template #title> <i class="bi bi-input-cursor-text"></i> <span class="uppercase"> Performance Commitment
          Review</span></template>
      <template #subtitle>Accomplish your performance commitment review</template>
      <template #content>
        <form @submit.prevent="$inertia.get('/pms/pcr/' + period_id)" class="">
          <label class="mr-2">Selected Period:</label>
          <Dropdown autofocus class="mr-2" v-model="period_id" :options="periods" optionLabel="text" optionValue="id"
                    placeholder="Please select a period" />
          <Button :disabled="!period_id" type="submit"
                  :class="!period_id ? 'p-button p-button-primary p-button-text disabled' : 'p-button p-button-primary'"
                  :icon="!period_id ? 'bi bi-arrow-left' : 'bi bi-folder'" :label="!period_id ? 'Open' : 'Open'" />
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
