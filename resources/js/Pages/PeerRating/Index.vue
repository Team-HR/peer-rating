<template>
  <auth-layout>
    <Card class="w-full h-30rem">
      <template #title>
        <span class="uppercase">Peer Rating Jan-June 2022</span>
      </template>
      <template #content>
        <Toast />
        <ConfirmDialog></ConfirmDialog>
        <!-- Departments: -->
        <form class="mb-5" method="post" @submit.prevent="add_new_department()">
          <!-- <input type="text" v-model="form.department" /> -->
          <InputText type="text" v-model="form.department" placeholder="Add a Department" />
          <Button :disabled="!form.department" class="ml-2" type="submit">Add</Button>
        </form>
        <!-- <template v-for="(department, i) in departments" :key="department.id">
          <Button
            class="p-button-text p-button-raised uppercase m-2"
            icon="pi pi-folder"
            @click="
              $inertia.get('/peer-rating-2022/' + department.id + '/files')
            "
            :label="`${i + 1}. ${department.name}`"
          >
          </Button>
        </template> -->
        <DataTable :value="departments" responsiveLayout="scroll" class="mt-2 p-datatable-sm" selectionMode="single">
          <Column field="id" header="ID" style="width: 20px"></Column>
          <Column header="OPTIONS" headerStyle="text-align: center;" style="width: 350px; text-align: center">
            <template #body="slotProps">
              <!-- {{slotProps}} -->
              <Button class="p-button-text p-button-sm mr-2" label="Open" @click="
                $inertia.get(
                  '/peer-rating-2022/' + slotProps.data.id + '/files'
                )
              "></Button>
              <Button class="p-button-text p-button-sm p-button-success mr-2" label="Rename"
                @click="edit_record(slotProps.data)"></Button>
              <Button class="p-button-text p-button-sm p-button-danger" label="Delete"
                @click="delete_record(slotProps.data.id)"></Button>
            </template>
          </Column>
          <Column field="name" header="OFFICE"></Column>
        </DataTable>

        <!-- edit modal start -->
        <Dialog v-model:visible="edit_modal" modal 
        :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
        :style="{ width: '30vw' }">
          <template #header>
            <h3>Rename Office</h3>
          </template>

          <form id="rename_form" @submit.prevent="rename_save()" class="card">
            <div class="formgrid grid">
              <div class="field col-12 md:col-8">
                <label for="office_name_input">Name of Office:</label><br />
                <InputText class="w-full" id="office_name_input" type="text" v-model="edit_form.name" />
              </div>
            </div>

          </form>

          <template #footer>
            <Button label="No" icon="pi pi-times" class="p-button-text" @click="edit_modal = false" />
            <Button form="rename_form" label="Save" icon="pi pi-save" autofocus type="submit" />
          </template>
        </Dialog>
        <!-- edit modal end -->
      </template>
    </Card>
  </auth-layout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated";
import { Inertia } from "@inertiajs/inertia";
export default {
  props: {
    departments: Array,
  },
  components: {
    AuthLayout,
  },
  data() {
    return {
      edit_modal: false,
      current_url: document.location.pathname,
      form: this.$inertia.form({
        department: "",
      }),
      edit_form: this.$inertia.form({
        id: null,
        name: null,
      }),
    };
  },
  methods: {
    edit_record(data) {
      console.log(data);
      this.edit_form.id = data.id;
      this.edit_form.name = data.name;
      this.edit_modal = true;
    },
    rename_save() {
      this.edit_form.patch(this.current_url, {
        preserveScroll: true,
        onSuccess: () => {
          this.edit_modal = false;
          this.$toast.add({
            severity: "success",
            summary: "Success",
            detail: "Record updated",
            life: 3000,
          });
        },
      });
    },
    delete_record(id) {
      this.$confirm.require({
        message: "Do you want to delete this record?",
        header: "Delete Confirmation",
        icon: "pi pi-info-circle",
        acceptClass: "p-button-danger",
        accept: () => {
          this.$inertia.delete(this.current_url + "/" + id, {
            onSuccess: (page) => {
              this.$toast.add({
                severity: "info",
                summary: "Confirmed",
                detail: "Record deleted",
                life: 3000,
              });
            },
          });
        },
        // reject: () => {
        //   this.$toast.add({
        //     severity: "error",
        //     summary: "Rejected",
        //     detail: "You have rejected",
        //     life: 3000,
        //   });
        // },
      });
    },

    add_new_department() {
      this.form.post("/peer-rating-2022", {
        onSuccess: () => this.form.reset(),
      });
    },
  },
  mounted() {
    Inertia.reload({ only: ["departments"] });
  },
};
</script>
