<template>
  <auth-layout>
    <Card class="w-full h-30rem">
      <template #title>
        <span class="uppercase">Peer Rating Jan-June 2022</span>
      </template>
      <template #content>
        Departments:
        <form method="post" @submit.prevent="add_new_department()">
          <input type="text" v-model="form.department" />
          <button type="submit">Add</button>
        </form>
        <br />
        <ol>
          <li v-for="department in departments" :key="department.id"><a href="#" @click="$inertia.get('/peer-rating-2022/'+department.id+'/files')"> open</a> {{department.name}}</li>
        </ol>
      </template>
    </Card>
  </auth-layout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated";

export default {
  props: {
    departments: Array,
  },
  components: {
    AuthLayout,
  },
  data() {
    return {
      form: this.$inertia.form({
        department: "",
      }),
    };
  },
  methods: {
    add_new_department() {
      this.form.post("/peer-rating-2022", {
        onSuccess: () => this.form.reset(),
      });
    },
  },
  mounted() {},
};
</script>
