<template>
  <auth-layout>
    <Card class="w-full">
      <template #content>
        <Toolbar class="mb-4">
          <template #start>
            <Button
              label="New"
              icon="pi pi-plus"
              class="p-button-success mr-2"
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
          responsiveLayout="scroll"
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
          <Column
            field="id"
            header="ID#"
            :sortable="true"
            style="min-width: 1rem"
          ></Column>
          <Column
            field="last_name"
            header="Last Name"
            :sortable="true"
            style="min-width: 8rem"
          ></Column>
          <Column
            field="first_name"
            header="First Name"
            :sortable="true"
            style="min-width: 8rem"
          >
          </Column>
          <Column
            field="middle_name"
            header="Middle Name"
            :sortable="true"
            style="min-width: 10rem"
          ></Column>
          <Column
            field="gender"
            header="Gender"
            :sortable="true"
            style="min-width: 12rem"
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
    employees: null,
  },
  components: {
    AuthLayout,
  },
  data() {
    return {
      selectedProducts: null,
      filters: {},
    };
  },
  methods: {
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