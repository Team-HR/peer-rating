<template>
  <auth-layout>
    <Card class="w-full h-30rem">
      <template #content>
        <Button @click="$inertia.get('/peer-rating-2022')"
          >Peer Rating 2022</Button
        >
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
  mounted() {
    // console.log(this.$inertia.page.url);
  },
};
</script>
