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
          >SECTION HEAD RATING | OFFICE SECTIONS IN {{ department.name }}</span
        >
      </template>
      <template #content>
        <Toast />
        <ConfirmDialog></ConfirmDialog>

        <form class="mb-5" action="post" @submit.prevent="create()">
          <InputText
            type="text"
            v-model="form.name"
            placeholder="Add an office section"
            class="mr-2"
          />

          <Dropdown
            showClear
            v-model="form.supervisor"
            :options="employees"
            optionLabel="full_name"
            placeholder="Add the supervisor"
            :filter="true"
            filterPlaceholder="Search name"
            class="mr-2"
          />

          <Dropdown
            showClear
            v-model="form.office"
            :options="offices"
            optionLabel="name"
            placeholder="Link to Office (required)"
            :filter="true"
            filterPlaceholder="Search office"
          />

          <Button
            :disabled="!form.name || !form.office"
            class="ml-2"
            type="submit"
            >Add</Button
          >
        </form>

        <!-- <template v-for="(section, i) in sections" :key="section.id">
          <Button
            class="p-button-text p-button-raised uppercase m-2"
            icon="pi pi-folder"
            @click="
              $inertia.get(
                `/peer-rating-2022/${department.id}/section-head-rating/${section.id}`
              )
            "
            :label="`${i + 1}. ${section.name}`"
          >
          </Button>
        </template> -->

        <DataTable :value="sections" responsiveLayout="scroll" class="mt-2">
          <Column field="id" header="ID" style="width: 20px"></Column>
          <Column header="OPTION" style="width: 350px">
            <template #body="slotProps">
              <!-- {{ slotProps.data }} -->
              <Button
                class="p-button-text mr-2"
                label="Open"
                @click="
                  $inertia.get(
                    `/peer-rating-2022/${department.id}/section-head-rating/${slotProps.data.id}`
                  )
                "
              ></Button>
              <Button
                class="p-button-text p-button-success"
                label="Rename"
                @click="edit_section(slotProps.data)"
              ></Button>

              <Button
                class="p-button-text p-button-danger"
                label="Delete"
                @click="delete_record(slotProps.data.id)"
              ></Button>
            </template>
          </Column>
          <Column field="name" header="OFFICE" class="uppercase"> </Column>
        </DataTable>

        <!-- rename modal start -->
        <Dialog v-model:visible="edit_modal" :style="{ width: '25vw' }">
          <template #header>
            <h3>Rename Office</h3>
          </template>

          <form id="update_form" @submit.prevent="save_edit_section()">
            <div class="field">
              <label for="name_input">Name of Section:</label><br />
              <InputText
                class="w-full"
                id="name_input"
                type="text"
                v-model="edit_form.name"
              />
            </div>

            <div class="field">
              <label>Supervisor:</label><br />
              <Dropdown
                showClear
                v-model="edit_form.supervisor"
                :options="employees"
                optionLabel="full_name"
                placeholder="Add the supervisor"
                :filter="true"
                filterPlaceholder="Search name"
                class="mr-2 w-full"
              />
            </div>

            <div class="field">
              <label>Linked Office:</label><br />
              <Dropdown
                showClear
                v-model="edit_form.office"
                :options="offices"
                optionLabel="name"
                placeholder="Link to Office (required)"
                :filter="true"
                filterPlaceholder="Search office"
                class="w-full"
              />
            </div>
          </form>

          <template #footer>
            <Button
              label="No"
              icon="pi pi-times"
              class="p-button-text"
              @click="edit_modal = false"
            />
            <Button
              label="Save"
              icon="pi pi-save"
              autofocus
              form="update_form"
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

export default {
  props: {
    employees: Array,
    department: Object,
    sections: Array,
    offices: Array,
  },
  components: {
    AuthLayout,
  },
  data() {
    return {
      edit_modal: false,
      current_url: document.location.pathname,
      form: this.$inertia.form({
        name: "",
        supervisor: null,
        office: null,
      }),
      edit_form: this.$inertia.form({
        id: null,
        name: null,
        supervisor: null,
        office: null,
      }),
    };
  },
  methods: {
    create() {
      this.form.post(this.current_url, {
        onSuccess: () => this.form.reset(),
      });
    },
    edit_section(data) {
      console.log(data);
      this.edit_form.id = data.id;
      this.edit_form.name = data.name;
      this.edit_form.supervisor = data.supervisor;
      this.edit_form.office = data.office;
      this.edit_modal = true;
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
    save_edit_section() {
      // console.log(this.edit_form);
      this.edit_form.patch(this.current_url, {
        preserveScroll: true,
        onSuccess: () => {
          this.$toast.add({
            severity: "success",
            summary: "Success",
            detail: "Record updated",
            life: 3000,
          });
          this.edit_modal = false;
        },
      });
    },
    history_back() {
      history.back();
    },
  },
  mounted() {},
};
</script>
