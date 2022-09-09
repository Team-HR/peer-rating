<template>
  <auth-layout>
    <Card class="w-full">
      <template #content>
        <Dialog
          header="ADD EMPLOYEE"
          v-model:visible="add_employee_modal"
          :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
          :style="{ width: '50vw' }"
          :modal="true"
        >
          <form id="add_new_form" class="card" @submit.prevent="add_employee()">
            <div class="formgrid grid">
              <div class="field col-12 md:col-4">
                <label for="last_name">Last Name:</label>
                <InputText
                  class="w-full uppercase"
                  id="last_name"
                  type="text"
                  v-model="form.last_name"
                  placeholder="e.g. De la Cruz"
                  required
                  autofocus
                />
                <small class="ml-2">*Required</small>
              </div>
              <div class="field col-12 md:col-4">
                <label for="first_name">First Name:</label>
                <InputText
                  class="w-full uppercase"
                  id="first_name"
                  type="text"
                  v-model="form.first_name"
                  placeholder="e.g. Juan"
                  required
                />
                <small class="ml-2">*Required</small>
              </div>
              <div class="field col-12 md:col-4">
                <label for="middle_name">Middle Name:</label>
                <InputText
                  class="w-full uppercase"
                  id="middle_name"
                  type="text"
                  v-model="form.middle_name"
                  placeholder="e.g. Rizal"
                />
              </div>
              <div class="field col-12 md:col-4">
                <label for="ext_name">Name Extension:</label>
                <InputText
                  class="w-full uppercase"
                  id="ext_name"
                  type="text"
                  v-model="form.ext"
                  placeholder="e.g. Jr."
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
              @click="add_employee_modal = false"
            />
            <Button
              form="add_new_form"
              type="submit"
              label="Yes"
              icon="pi pi-check"
            />
          </template>
        </Dialog>

        <Toolbar class="mb-4">
          <template #start>
            <Button
              label="New"
              icon="pi pi-plus"
              class="p-button-success mr-2"
              @click="prompt_add_employee()"
            />
          </template>
          <template #end> </template>
        </Toolbar>
        <DataTable
          class="p-datatable-sm"
          :value="employees"
          dataKey="id"
          :paginator="true"
          :rows="10"
          :filters="filters"
          paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
          :rowsPerPageOptions="[5, 10, 25]"
          currentPageReportTemplate="Showing {first} to {last} of {totalRecords} products"
        >
          <template #header>
            <div
              class="
                table-header
                flex flex-column
                md:flex-row md:justiify-content-between
              "
            >
              <h5 class="mb-2 md:m-0 p-as-md-center"></h5>
              <span class="p-input-icon-left">
                <i class="pi pi-search" />
                <InputText
                  v-model="filters['global'].value"
                  placeholder="Search..."
                />
              </span>
            </div>
          </template>
          <Column style="width: 5px">
            <template #body>
              <Button
                class="p-button-sm p-button-text"
                icon="pi pi-folder"
                label="View"
              ></Button>
            </template>
          </Column>
          <Column
            field="id"
            header="ID#"
            :sortable="true"
            style="width: 10px"
          ></Column>
          <Column
            field="full_name"
            header="Name"
            :sortable="true"
            style="min-width: 8rem"
          ></Column>
          <!-- <Column
            field="last_name"
            header="Last Name"
            :sortable="true"
            style="width: 5px"
          ></Column>
          <Column
            field="first_name"
            header="First Name"
            :sortable="true"
            style="width: 5px"
          >
          </Column>
          <Column
            field="middle_name"
            header="Middle Name"
            :sortable="true"
            style="width: 5px"
          ></Column>-->
          <Column
            field="gender"
            header="Gender"
            :sortable="true"
            style="width: 5px"
          >
          </Column>
        </DataTable>
      </template>
    </Card>
  </auth-layout>
</template>

<script>
import { FilterMatchMode } from "primevue/api";
import AuthLayout from "@/Layouts/Authenticated";

export default {
  props: {
    error: null,
    employees: null,
  },
  components: {
    AuthLayout,
  },
  data() {
    return {
      current_url: document.location.pathname,
      add_employee_modal: false,
      selectedProducts: null,
      filters: {},
      form: this.$inertia.form({
        last_name: null,
        first_name: null,
        middle_name: null,
        ext: null,
      }),
    };
  },
  methods: {
    add_employee() {
      // console.log(this.current_url);
      this.form.post(this.current_url, {
        onSuccess: () => {
          this.add_employee_modal = false;
          this.clear_form();
        },
      });
    },
    prompt_add_employee() {
      this.clear_form();
      this.add_employee_modal = true;
    },
    clear_form() {
      this.form.last_name = null;
      this.form.first_name = null;
      this.form.middle_name = null;
      this.form.ext = null;
    },
    initFilters() {
      this.filters = {
        global: { value: null, matchMode: FilterMatchMode.CONTAINS },
      };
    },
  },
  created() {
    this.initFilters();
  },
  mounted() {
    // console.log(this.$inertia.page.url);
  },
};
</script>

<style scoped>
.table-header {
  display: flex;
  align-items: center;
  justify-content: space-between;

  @media screen and (max-width: 960px) {
    align-items: start;
  }
}
</style>