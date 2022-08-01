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
          >Peer Rating | Offices in {{ department.name }}</span
        >
      </template>
      <template #content>
        <Toast />
        <ConfirmDialog></ConfirmDialog>
        <form class="mb-5" action="post" @submit.prevent="add_new_office()">
          <!-- <input type="text" v-model="form.name" /> -->
          <InputText
            type="text"
            v-model="form.name"
            placeholder="Add an office"
          />
          <Button :disabled="!form.name" class="ml-2" type="submit">Add</Button>
        </form>
        <!-- 
        <template v-for="(office, i) in offices" :key="office.id">
          <Button
            class="p-button-text p-button-raised uppercase m-2"
            icon="pi pi-folder"
            @click="
              $inertia.get(
                `/peer-rating-2022/${department.id}/peer-rating/${office.id}/peers`
              )
            "
            :label="`${i + 1}. ${office.name}`"
          >
          </Button>
        </template> -->
        <!-- {{ offices }} -->
        <DataTable
          :value="offices"
          responsiveLayout="scroll"
          class="mt-2 p-datatable-sm"
          selectionMode="single"
        >
          <Column field="id" header="ID" style="width: 20px"></Column>
          <Column
            header="OPTIONS"
            headerStyle="text-align: center;"
            style="width: 350px; text-align: center"
          >
            <template #body="slotProps">
              <!-- {{slotProps}} -->
              <Button
                class="p-button-text p-button-sm mr-2"
                label="Open"
                @click="
                  $inertia.get(
                    `/peer-rating-2022/${department.id}/peer-rating/${slotProps.data.id}/peers`
                  )
                "
              ></Button>
              <Button
                class="p-button-text p-button-sm p-button-success mr-2"
                label="Rename"
                @click="rename_office(slotProps.data)"
              ></Button>
              <Button
                class="p-button-text p-button-sm p-button-danger"
                label="Delete"
                @click="delete_record(slotProps.data.id)"
              ></Button>
            </template>
          </Column>
          <Column field="name" header="OFFICE"></Column>
        </DataTable>
        <!-- rename modal start -->
        <Dialog v-model:visible="rename_modal" :style="{ width: '25vw' }">
          <template #header>
            <h3>Rename Office</h3>
          </template>

          <form id="rename_form" @submit.prevent="rename_save()">
            <div class="field">
              <label for="office_name_input">Name of Office:</label><br />
              <InputText
                class="w-full"
                id="office_name_input"
                type="text"
                v-model="edit_form.name"
              />
            </div>
          </form>

          <template #footer>
            <Button
              label="No"
              icon="pi pi-times"
              class="p-button-text"
              @click="rename_modal = false"
            />
            <Button
              form="rename_form"
              label="Save"
              icon="pi pi-save"
              autofocus
              type="submit"
            />
          </template>
        </Dialog>
        <!-- rename modal end -->
      </template>
    </Card>
  </auth-layout>
</template>


<script>
import AuthLayout from "@/Layouts/Authenticated";
import { Inertia } from "@inertiajs/inertia";

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
      current_url: document.location.pathname,
      rename_modal: false,
      form: this.$inertia.form({
        department: this.department,
        name: "",
      }),
      edit_form: this.$inertia.form({
        id: null,
        name: null,
      }),
    };
  },
  methods: {
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
                severity: "success",
                summary: "Deleted",
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

    // delete_record(){

    // },
    history_back() {
      history.back();
    },
    add_new_office() {
      this.form.post(this.current_url, {
        onSuccess: () => this.form.reset(),
      });
    },
    rename_office(data) {
      this.edit_form.id = data.id;
      this.edit_form.name = data.name;
      this.rename_modal = true;
    },
    rename_save() {
      this.edit_form.patch(this.current_url, {
        preserveScroll: true,
        onSuccess: () => {
          this.edit_form.reset();
          this.rename_modal = false;
          Inertia.reload({ only: ["offices"] });
          this.$toast.add({
            severity: "success",
            summary: "Updated",
            detail: "Record updated",
            life: 3000,
          });
        },
      });
    },
  },
  mounted() {
    // console.log(this.offices);
    Inertia.reload({ only: ["offices"] });
  },
};
</script>
