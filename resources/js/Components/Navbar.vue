<template >
  <nav class="flex justify-content-between flex-wrap bg-primary fixed top-0 left-0">
    <div class="flex-1">
      <!-- logo -->
      <a class="p-button p-button-lg text-white p-button-text  font-bold" @click="$inertia.get('/')"><img
          src="/favicon.ico" alt="Icon" class="mr-2" width="40"> {{ `INTEGRATED HRIS` }}</a>
      <slot name="links" />
    </div>
    <div class="flex align-items-center justify-content-center mx-2">
      <slot name="right-items" />
    </div>
  </nav>
</template>
<script>
export default {
  props: {
    title: "",
  },
};
</script>