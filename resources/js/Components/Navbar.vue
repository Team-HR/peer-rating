<template>
  <nav
    class="flex justify-content-between bg-white flex-wrap shadow-4 py-1"
    style="z-index: 100; position: relative"
  >
    <div class="flex align-items-center justify-content-center">
      <!-- logo -->
      <Button
        class="p-button p-button-lg p-button-text ml-2 mr-5"
        @click="$inertia.get('/')"
        ><img src="/favicon.ico" alt="Icon" class="mr-2" width="50" />
        <span class="text-teal-700 text-2xl">Integrated HRIS</span>
      </Button>
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
