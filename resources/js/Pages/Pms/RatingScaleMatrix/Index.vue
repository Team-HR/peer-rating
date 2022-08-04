<template>
  <auth-layout>
    <PmsToolbar />
    <Card class="w-full">
      <template #title
        ><span class="uppercase"
          ><i class="bi bi-book mr-2"></i> Rating Scale Matrix</span
        ></template
      >
      <template #subtitle
        >Edit or review your Department/Section's Rating Scale Matrix</template
      >
      <template #content>
        <form @submit.prevent="$inertia.get('/pms/rsm/' + period_id)">
          <label class="mr-2">Selected Period:</label>
          <Dropdown
            autofocus
            class="mr-2"
            v-model="period_id"
            :options="periods"
            optionLabel="period"
            optionValue="id"
            placeholder="Please select a period"
          />
          <Button
            :disabled="!period_id"
            type="submit"
            class="p-button-text"
            :icon="!period_id ? 'bi bi-arrow-left' : 'bi bi-folder'"
            :label="!period_id ? 'Select a period first' : 'Open'"
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
  components: {
    AuthLayout,
    PmsToolbar,
  },
  data() {
    return {
      period_id: null,
      periods: [
        {
          id: 2,
          period: "January - June, 2022",
        },
      ],
    };
  },
  mounted() {},
};
</script>


