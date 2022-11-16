<template>
  <auth-layout>
    <PmsToolbar />
    <Card class="w-8 mx-auto">
      <template #content>
        <div class="flex">
          <img class="w-1 mr-2" src="../../../../public/images/business-plan.png" />
          <h1 class="my-auto">PERFORMANCE MANAGEMENT SYSTEM</h1>
        </div>
        <p class="text-xl">
          A mechanism that links employee performance with organizational performance to
          enhance the performance orientation of the compensatopm system, It ensures that
          the employee achieves the objectives set by the organization and the
          organization, on the other hand, achieves the objectives that it has set in its
          strategic plan.
        </p>
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
    return {};
  },
  mounted() {},
};
</script>
