<template>
  <nav
    class="flex justify-content-between bg-white flex-wrap shadow-4 py-1"
    style="z-index: 100; position: relative"
  >
    <div class="flex align-items-center justify-content-center">
      <!-- logo -->
      <Button
        class="p-button p-button-primary p-button-lg p-button-text ml-2 mr-5"
        @click="$inertia.get('/')"
        ><img src="/favicon.ico" alt="Icon" class="mr-2" width="50" />
        <span class="text-2xl text-gray-700 integrated">Integrated HRIS</span>
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
<style >
.integrated {
	 text-transform: uppercase;
	 background: linear-gradient(to right, #30cfd0 0%, #330867 100%);
	 -webkit-background-clip: text;
	 -webkit-text-fill-color: transparent;	
}
 
</style>
