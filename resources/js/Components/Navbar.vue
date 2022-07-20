<template>
  <nav class="flex justify-content-between flex-wrap bg-primary py-1">
    <div class="flex align-items-center justify-content-center">
      <!-- logo -->
      <Button
        class="p-button p-button-lg text-white p-button-text ml-2 mr-5 font-bold"
        @click="$inertia.get('/')"
        ><img src="/favicon.ico" alt="Icon" class="mr-2" width="40"> {{`INTEGRATED HRIS`}}</Button
      >
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