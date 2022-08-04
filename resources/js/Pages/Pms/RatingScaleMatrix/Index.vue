<template>
  <auth-layout>
    <PmsToolbar />
    <Card class="w-full">
      <template #title
        ><span class="uppercase">Rating Scale Matrix</span></template
      >
      <template #subtitle
        >Create or Review the Matrix of your Department</template
      >
      <template #content>
        <form @submit.prevent="">
          <label class="mr-2"> SELECT PERIOD:</label>
          <Dropdown
            class="mr-2"
            v-model="selected_period"
            :options="periods"
            optionLabel="period"
            optionValue="id"
            placeholder="Select a Period"
          />
          <Button class="p-button-text" icon="bi bi-folder" label="Go" />
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
      selected_period: null,
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


