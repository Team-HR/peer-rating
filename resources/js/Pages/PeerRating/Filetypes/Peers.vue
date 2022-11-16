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
            showClear
          />
          <Button :disabled="!form.employee" class="ml-2" type="submit">Add</Button>
          <Button
            class="ml-2 p-button-text"
            type="button"
            @click="exec_add_others_modal()"
            >Not in the list?</Button
          >
        </form>

        <Dialog
          header="Add non-permanent/casual/coterm/elective Personnel"
          v-model:visible="add_others_modal"
          :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
          :style="{ width: '50vw' }"
          :modal="true"
        >
          <form id="other_form" class="card" @submit.prevent="save_other()">
            <div class="formgrid grid">
              <div class="field col-12 md:col-3">
                <label for="last_name">Last Name:</label>
                <InputText
                  class="w-full"
                  id="last_name"
                  type="text"
                  v-model="other_employee.last_name"
                  placeholder="e.g. De la Cruz"
                  required
                  autofocus
                />
                <small class="ml-2">*Required</small>
              </div>
              <div class="field col-12 md:col-4">
                <label for="first_name">First Name:</label>
                <InputText
                  class="w-full"
                  id="first_name"
                  type="text"
                  v-model="other_employee.first_name"
                  placeholder="e.g. Juan"
                  required
                />
                <small class="ml-2">*Required</small>
              </div>
              <div class="field col-12 md:col-3">
                <label for="middle_name">Middle Name:</label>
                <InputText
                  class="w-full"
                  id="middle_name"
                  type="text"
                  v-model="other_employee.middle_name"
                  placeholder="e.g. Rizal"
                />
              </div>
              <div class="field col-12 md:col-2">
                <label for="ext_name">Ext:</label>
                <InputText
                  class="w-full"
                  id="ext_name"
                  type="text"
                  v-model="other_employee.ext"
                  placeholder="e.g. Jr."
                />
              </div>
              <div class="field col-12 md:col-12">
                <label for="remarks">Remarks:</label>
                <!-- <InputText
                  class="w-full"
                  id="remarks"
                  type="text"
                  v-model="other_employee.remarks"
                  placeholder="Enter remark/s to note..."
                /> -->
                <Textarea
                  v-model="other_employee.remarks"
                  :autoResize="true"
                  rows="5"
                  class="w-full"
                  placeholder="Enter remark/s to note..."
                />
              </div>
            </div>
          </form>

          <template #footer>
            <Button
              type="button"
              label="No"
              icon="pi pi-times"
              class="p-button-text"
              @click="add_others_modal = false"
            />
            <Button form="other_form" type="submit" label="Yes" icon="pi pi-check" />
          </template>
        </Dialog>

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
            <td
              :class="peer.is_complete ? 'text-primary-700 font-bold' : 'text-gray-700'"
            >
              {{ peer.full_name }}
            </td>
            <td class="text-center">{{ peer.rating }}</td>
            <td>
              <inertia-link :href="`${current_url}/${peer.id}`">open</inertia-link>
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
import PmsToolbar from "@/Layouts/PmsToolbar.vue";
export default {
  props: {
    employees: Array,
    department: Object,
    office: Object,
    peers: Array,
  },
  components: {
    AuthLayout,
    PmsToolbar,
  },
  data() {
    return {
      current_url: document.location.pathname,
      add_others_modal: false,
      form: this.$inertia.form({
        department: this.department,
        office: this.office,
        employee: null,
      }),
      other_employee: this.$inertia.form({
        last_name: null,
        first_name: null,
        middle_name: null,
        ext: null,
        remarks: null,
      }),
    };
  },
  methods: {
    save_other() {
      this.other_employee.post(this.current_url + "/other", {
        onSuccess: () => {
          this.add_others_modal = false;
        },
      });
    },

    exec_add_others_modal() {
      this.add_others_modal = true;
    },

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
