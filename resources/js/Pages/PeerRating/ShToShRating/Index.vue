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
    <PmsToolbar />
    <Card class="w-full">
      <template #title>
        <Button
          class="mr-5 p-button-text p-button-sm"
          icon="pi pi-arrow-left"
          @click="history_back()"
          label="Back"
        ></Button>
        <span class="uppercase"
          >SECTION HEAD TO SECTION HEAD RATING | {{ department.name }}</span
        >
      </template>
      <template #content>
        <form class="mb-5" action="post" @submit.prevent="create()">
          <Dropdown
            v-model="form.employee"
            :options="employees"
            optionLabel="full_name"
            placeholder="Add the supervisor"
            :filter="true"
            filterPlaceholder="Search name"
            class="mr-2"
          />

          <Button :disabled="!form.employee" class="ml-2" type="submit">Add</Button>
        </form>

        <table class="my-2">
          <tr>
            <th>#</th>
            <th>NAME</th>
            <th>RATING</th>
            <th colspan="2">OPTIONS</th>
          </tr>
          <tr>
            <td class="text-center" colspan="4" v-if="ratees.length == 0">
              Please add the list of personnel same from the form...
            </td>
          </tr>
          <tr v-for="(ratee, i) in ratees" :key="ratee.id">
            <td>{{ i + 1 }}</td>
            <td
              :class="ratee.is_complete ? 'text-primary-700 font-bold' : 'text-gray-700'"
            >
              {{ ratee.full_name }}
            </td>
            <td class="text-center">{{ ratee.rating }}</td>
            <td>
              <inertia-link :href="`${current_url}/${ratee.id}`">open</inertia-link>
            </td>
            <td>
              <a href="#" @click.prevent="remove_ratee(ratee.id)">delete</a>
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
import PmsToolbar from "@/Layouts/PmsToolbar.vue";
export default {
  props: {
    employees: Array,
    department: Object,
    ratees: Array,
  },
  components: {
    AuthLayout,
    PmsToolbar,
  },
  data() {
    return {
      current_url: document.location.pathname,
      form: this.$inertia.form({
        SysEmployee: {},
      }),
    };
  },
  methods: {
    create() {
      this.form.post(this.current_url, {
        onSuccess: () => this.form.reset(),
      });
    },
    remove_ratee(id) {
      this.$inertia.delete(this.current_url + "/" + id);
    },

    history_back() {
      history.back();
    },
  },
  mounted() {
    Inertia.reload({ only: ["ratees"] });
  },
};
</script>
