<style scoped>
.verticalTableHeader {
  writing-mode: vertical-lr;
  transform: rotate(180deg);
}
</style>
<template>
  <auth-layout>
    <Card class="w-full">
      <template #title>
        <Button
          class="p-button-text p-button-sm mr-5"
          icon="pi pi-arrow-left"
          label="Back"
          @click="history_back()"
        ></Button>
        <span class="uppercase"
          >Peer Rating <i style="color: grey">(Jan-June 2022)</i>:: {{ department }}</span
        >
      </template>
      <template #content>
        <h1 class="text-center text-red-400 text-8xl">Access Temporarily Forbidden</h1>
      </template>
    </Card>
  </auth-layout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated";
import { Inertia } from "@inertiajs/inertia";

export default {
  props: {
    department_id: "",
    department: String,
    offices: Array,
  },
  components: {
    AuthLayout,
  },
  data() {
    return {};
  },
  methods: {
    history_back() {
      history.back();
    },
    create() {
      this.form.post("/peer-rating-2022/" + this.department_id + "/offices", {
        onSuccess: () => this.form.reset("name"),
      });
    },
  },
  mounted() {
    // Inertia.reload({ only: ["reports"] });
  },
};
</script>
