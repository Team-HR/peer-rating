<template>
  <auth-layout>
    <div class="flex align-items-center w-full">
      <p class="text-5xl w-10">RSM Status</p>
    </div>
    <div class="flex justify-content-start gap-3 mb-5">
      <Dropdown v-model="selectedPeriod" :options="periods" optionLabel="SelectPeriod" placeholder="Select a Period" />
      <Dropdown v-model="selectedYear" :options="yearPeriod" optionLabel="SelectYear" placeholder="Select a Year" />
      <Button label="Generate" />
    </div>
    <div class="mb-5">
      <span class="p-input-icon-left">
        <i class="pi pi-search" />
        <InputText type="text" placeholder="Search" v-model="filters['departments'].value"/>
      </span>
    </div>
    <div>
      <DataTable :value="products" responsiveLayout="scroll" stripedRows v-model:selection="selectedDepartment"
        dataKey="id" :filters="filters">
        <Column field="departments" header="Departments"></Column>
        <Column field="done" header="Done"></Column>
        <Column selectionMode="multiple" headerStyle="width: 3em"></Column>
      </DataTable>
    </div>
  </auth-layout>
</template> 

<script>
import { FilterMatchMode } from 'primevue/api';
import AuthLayout from "@/Layouts/Authenticated";
import PmsToolbar from "@/Layouts/PmsToolbar";
import ProductService from '@/Api/DepartmentsMap';


export default {
  data() {
    return {
      selectedDepartment: [],
      products: null,
      selectedPeriod: "",
      selectedYear: "",
      filters: {},
      periods: [{
        SelectPeriod: 'January - June',
      },
      {
        SelectPeriod: 'July - December'
      }],
      yearPeriod: [
        {
          SelectYear: 2021,
        },
        {
          SelectYear: 2020,
        },
        {
          SelectYear: 2019,
        },
        {
          SelectYear: 2018,
        },
      ],
      initFilters() {
        this.filters ={
          'departments': { value: null, matchMode: FilterMatchMode.CONTAINS }
        }
      }
    }
  },
  departmentRec: null,
  components: {
    AuthLayout,
    PmsToolbar,
  },
  productService: null,
  created() {
    this.productService = new ProductService();
    this.initFilters();
  },
  mounted() {
    this.productService.getProductsSmall().then(data => this.products = data);
  },

  methods: {
  }
  
};
</script>
