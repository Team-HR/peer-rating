<template>
  <auth-layout>
    <Card class="mx-auto">
      <template #title><i class="bi bi-gear"></i> Settings</template>
      <template #subtitle>Configure Performance Management System</template>
      <template #content>

        <template v-for="item in items">
          <Button class="m-3" style="height:85px; width: 300px;" :label="item.label" @click="$inertia.get(item.path)"></Button>
        </template>

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
      items: [
        {
          label: "Periods",
          path: "/pms/settings/periods"
        },
        {
          label: "Support Functions",
          path: "/pms/settings/support_functions"
        }
      ]
    };
  },
  mounted() { },
};
</script>

