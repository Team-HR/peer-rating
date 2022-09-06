<template>
  <nav class="flex bg-primary fixed top-0 left-0 topnav" id="myTopnav">
    <!-- logo -->
    <a class="active p-button p-button-lg text-white p-button-text font-bold" @click="$inertia.get('/')"><img
        src="/favicon.ico" alt="Icon" class="mr-2" width="40"> {{ `INTEGRATED HRIS` }}</a>
    <slot name="links" />
    <Button href="javascript:void(0);" class="icon flex flex-1 align-items-center justify-content-end mx-2"
      @click="nav_func()" id="buttonNav">
      <i class="pi pi-bars"></i>
    </Button>
    <slot name="right-items" />
  </nav>
</template>
<script>
export default {
  props: {
    title: "",
  },
  methods: {
    nav_func() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
        console.log(x);
      }
    }
  },
};
</script> 