<template>
  <auth-layout>
    <PmsToolbar />
    <Card class="mx-auto" style="width: 24rem; margin-bottom: 2em">
      <template #header>
        <!-- <i class="bi bi-book mr-2"></i> -->
      </template>
      <template #title
        ><span class="uppercase"> Performance Commitment Review</span></template
      >
      <template #subtitle>Accomplish/Review your commitments</template>
      <template #content>
        <form
          @submit.prevent="$inertia.get('/pms/pcr/' + period_id)"
          class="flex align-items-center justify-content-center"
        >
          <!-- <label class="mr-2">Selected Period:</label> -->
          <br />
          <Dropdown
            autofocus
            class="mr-2"
            v-model="period_id"
            :options="periods"
            optionLabel="text"
            optionValue="id"
            placeholder="Please select a period"
          />
          <Button
            :disabled="!period_id"
            type="submit"
            :class="!period_id ? 'p-button p-button-primary p-button-text disabled' : 'p-button p-button-primary'"
            :icon="!period_id ? 'bi bi-arrow-left' : 'bi bi-folder'"
            :label="!period_id ? 'Open' : 'Open'"
          />
        </form>
      </template>
    </Card>
  </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";
import PmsToolbar from "@/Layouts/PmsToolbar";
export default {
  props: {
    periods: null,
  },
  components: {
    AuthLayout,
    PmsToolbar,
  },
  data() {
    return {
      period_id: null,
    };
  },
  mounted() {},
};
</script>
