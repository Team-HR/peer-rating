<template>
  <auth-layout>
    <Toolbar class="mb-3">
      <template #start>
        <Button
          v-for="(tool, i) in tools"
          :key="i"
          class="mr-2 p-button-text"
          :icon="tool.icon"
          :label="tool.title"
        >
          <!-- <i class="pi pi-check mr-2"></i>
          <span>{{ tool.title }}</span> -->
        </Button>
      </template>

      <template #end>
        <!-- <Button icon="pi pi-search" class="mr-2" />
        <Button icon="pi pi-calendar" class="p-button-success mr-2" />
        <Button icon="pi pi-times" class="p-button-danger" /> -->
      </template>
    </Toolbar>
    <Card class="w-full">
      <template #content>
        <h1>PMS</h1>
      </template>
    </Card>
  </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";

export default {
  components: {
    AuthLayout,
  },
  data() {
    return {
      tools: [
        {
          title: "PCR",
          href: "/pms/pcr",
          description: "",
          icon: "bi bi-input-cursor-text"
        },
        {
          title: "Individual RSM",
          href: "/pms/irsm",
          description: "",
          icon: "bi bi-person-lines-fill",
        },
        {
          title: "Review PCRs",
          href: "/pms/rpc",
          description: "",
          icon: "bi bi-list-check",
        },
        {
          title: "PMT Dashboard",
          href: "/pms/pmt",
          description: "",
          icon: "bi bi-braces-asterisk",
        },
        {
          title: "Mother RSM",
          href: "/pms/rsm",
          description: "",
          icon: "bi bi-book",
        },
      ],
    };
  },
  mounted() {},
};
</script>


