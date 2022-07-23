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
        <span class="uppercase"
          >Peers: {{ department.name }} - {{ office.name }}</span
        >
      </template>
      <template #content>
        <form action="post" @submit.prevent="add_new_peer()">
          <!-- <input type="text" v-model="form.name" /> -->
          <Dropdown
            v-model="form.employee"
            :options="employees"
            optionLabel="full_name"
            placeholder="Select a personnel"
            :filter="true"
            filterPlaceholder="Find Car"
          />

          <button type="submit">Add</button>
        </form>
        <ol>
          <li v-for="peer in peers" :key="peer.id">
            <inertia-link
              :href="`/peer-rating-2022/${department.id}/peer-rating/${office.id}/peer/${peer.id}`"
              >open</inertia-link
            >
            {{ peer.full_name }}
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
    employees: Array,
    department: Object,
    office: Object,
    peers: Array,
  },
  components: {
    AuthLayout,
  },
  data() {
    return {
      form: this.$inertia.form({
        department: this.department,
        office: this.office,
        employee: "",
      }),
    };
  },
  methods: {
    add_new_peer() {
      const url = document.location.pathname;
      this.form.post(url, {
        onSuccess: () => this.form.reset(),
      });
    },
    history_back() {
      history.back();
    },
  },
  mounted() {},
};
</script>
