<template>
  <auth-layout>
    <Card class="w-full h-30rem">
      <template #title>
        <span class="uppercase">Peer Rating Jan-June 2022</span>
      </template>
      <template #content>
        <!-- Departments: -->
        <form class="mb-5" method="post" @submit.prevent="add_new_department()">
          <!-- <input type="text" v-model="form.department" /> -->
          <InputText
            type="text"
            v-model="form.department"
            placeholder="Add a Department"
          />
          <Button :disabled="!form.department" class="ml-2" type="submit"
            >Add</Button
          >
        </form>
        <!-- <ol> -->
        <template v-for="(department, i) in departments" :key="department.id">
          <Button
            class="p-button-text p-button-raised uppercase m-2"
            icon="pi pi-folder"
            @click="
              $inertia.get('/peer-rating-2022/' + department.id + '/files')
            "
            :label="`${i + 1}. ${department.name}`"
          >
          </Button>
        </template>
        <!-- </ol> -->
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
