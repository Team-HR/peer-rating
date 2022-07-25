<style scoped>
table,
th,
td {
  padding: 5px; 
  border: 0.5px solid black;
  border-collapse: collapse;
}
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
          >Peer Rating: {{ department.name }} - {{ office.name }}</span
        >
      </template>
      <template #content>
        <form action="post" @submit.prevent="add_new_peer()">
          <!-- <input type="text" v-model="form.name" /> -->
          <Dropdown
            v-model="form.employee"
            :options="employees"
            optionLabel="full_name"
            placeholder="Add a personnel"
            :filter="true"
            filterPlaceholder="Search name"
          />
          <Button :disabled="!form.employee" class="ml-2" type="submit"
            >Add</Button
          >
        </form>
        <table class="my-2">
          <tr>
            <th>#</th>
            <th>NAME</th>
            <th>RATING</th>
            <th colspan="2">OPTIONS</th>
          </tr>
          <tr>
            <td class="text-center" colspan="4" v-if="peers.length == 0">
              Please add the list of personnel same from the form...
            </td>
          </tr>
          <tr v-for="(peer, i) in peers" :key="peer.id">
            <td>{{ i + 1 }}</td>
            <td>{{ peer.full_name }}</td>
            <td class="text-center">{{ peer.rating }}</td>
            <td>
              <inertia-link :href="`${current_url}/${peer.id}`"
                >open</inertia-link
              >
            </td>
            <td>
              <a href="#" @click.prevent="remove_peer(peer.id)">delete</a>
            </td>
          </tr>
        </table>
      </template>
    </Card>
  </auth-layout>
</template>


<script>
import AuthLayout from "@/Layouts/Authenticated";
import { Inertia } from "@inertiajs/inertia";
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
      current_url: document.location.pathname,
      form: this.$inertia.form({
        department: this.department,
        office: this.office,
        employee: null,
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
    remove_peer(id) {
      const url = this.current_url;
      this.$inertia.delete(`${url}/${id}`, {
        onBefore: () => confirm("Are you sure you want to delete this user?"),
      });
    },
    history_back() {
      history.back();
    },
  },
  mounted() {
    Inertia.reload({ only: ["peers"] });
  },
};
</script>
