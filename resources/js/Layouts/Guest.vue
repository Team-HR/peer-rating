<template>
  <navbar class="fixed top-0 left-0 w-full">
    <template #links>
      <!-- <Button class="p-button p-button-secondary" label="Rating Scale Matrix"></Button> -->
      <!-- <Button class="p-button" label="Login"></Button> -->
    </template>
    <template #right-items>
      <Button
        class="p-button p-button-text p-button-lg font-bold text-teal-700"
        icon="bi bi-box-arrow-in-right"
        label="Login"
        @click="$inertia.get('/login')"
      ></Button>
      <!-- <Button
        class="p-button ml-2"
        label="Register"
        @click="$inertia.get('/register')"
      ></Button> -->
    </template>
  </navbar>
  <div class="mt-7">
    <slot />
  </div>
</template>
<script>
import Navbar from "@/Components/Navbar.vue";
export default {
  components: {
    Navbar,
  },
};
</script>