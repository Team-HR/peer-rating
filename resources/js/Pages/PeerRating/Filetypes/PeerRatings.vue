<style scoped>
</style>


<template>
  <auth-layout>
    <Card class="w-full">
      <template #title>
        <Button
          class="mr-5 p-button-text p-button-sm"
          icon="pi pi-arrow-left"
          @click="history_back()"
          label="Back"
        ></Button>
        <span class="uppercase">Offices in {{ department.name }}</span>
      </template>
      <template #content>
        <form action="post" @submit.prevent="add_new_office()">
          <input type="text" v-model="form.name" />
          <button type="submit">Add</button>
        </form>

        <ol>
          <li v-for="office in offices" :key="office.id">
            <inertia-link
              :href="`/peer-rating-2022/${department.id}/peer-rating/${office.id}/peers`"
              >open</inertia-link
            >
            {{ office }}
          </li>
        </ol>
      </template>
    </Card>
  </auth-layout>
</template>


<script>
import AuthLayout from "@/Layouts/Authenticated";

export default {
  props: {
    department: Object,
    offices: Array,
  },
  components: {
    AuthLayout,
  },
  data() {
    return {
      form: this.$inertia.form({
        department: this.department,
        name: "",
      }),
    };
  },
  methods: {
    history_back() {
      history.back();
    },
    add_new_office() {
      // http://127.0.0.1:8000/peer-rating-2022/2/peer-ratings
      const url = document.location.pathname;
      // console.log(url);
      this.form.post(url, {
        onSuccess: () => this.form.reset(),
      });
    },
  },
  mounted() {
    // console.log(this.offices);
  },
};
</script>
