<template>
    <auth-layout>
        <Card class="w-full">
            <template #header>
                <div class="flex align-items-center w-full p-2">
                    <p class="md:text-7xl text-5xl w-10">Manage Accounts</p>
                </div>
            </template>
            <template #content>
                <div class="md:flex-auto flex justify-content-start gap-3 mb-5 sm:gap-3 sm:gap-3">
                    <Dropdown v-model="selectedPeriod" :options="periods" optionLabel="SelectPeriod"
                        placeholder="Select a Period" class="dropDown" />
                    <Dropdown v-model="selectedYear" :options="yearPeriod" optionLabel="SelectYear"
                        placeholder="Select a Year" />
                    <Button label="Generate" @click="showData" class="p-button-sm button" />
                </div>
                <div class="mb-5">
                    <span class="p-input-icon-left">
                        <i class="pi pi-search" />
                        <InputText type="text" placeholder="Search" v-model="filters['departments'].value"
                            class="search-input" />
                    </span>
                </div>
                <div v-if="!showTable" class="Error">   
                    <h1 style="text-align: center" class=" md:text-center">
                        <br />
                        Select Period to display Data
                    </h1>
                </div>
                <div class="field col-12 md:col-6" v-if="loading">
                    <Skeleton class="mb-2"></Skeleton>
                    <Skeleton width="20rem" class="mb-2"></Skeleton>
                    <Skeleton width="20rem" class="mb-2"></Skeleton>
                    <Skeleton width="20rem" class="mb-2"></Skeleton>
                    <Skeleton width="20rem" class="mb-2"></Skeleton>
                </div>
                <div>
                    <DataTable :value="products" responsiveLayout="scroll" stripedRows
                        v-model:selection="selectedDepartment" selectionMode="single" dataKey="id" :filters="filters"
                        v-if="showTable">
                        <Column field="departments" header="Departments"></Column>
                        <Column field="done" header="Done"></Column>
                        <Column selectionMode="multiple" headerStyle="width: 3em"></Column>
                    </DataTable>
                </div>
            </template>
        </Card>
    </auth-layout>
</template>

<script>
import { FilterMatchMode } from "primevue/api";
import AuthLayout from "@/Layouts/Authenticated";
import PmsToolbar from "@/Layouts/PmsToolbar";
import ProductService from "@/Api/DepartmentsMap";

export default {
    data() {
        return {
            loading: false,
            showTable: false,
            selectedDepartment: [],
            products: null,
            selectedPeriod: "",
            selectedYear: "",
            filters: {},
            periods: [
                {
                    SelectPeriod: "January - June",
                },
                {
                    SelectPeriod: "July - December",
                },
            ],
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
                this.filters = {
                    departments: {
                        value: null,
                        matchMode: FilterMatchMode.CONTAINS,
                    },
                };
            },
        };
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
        this.productService
            .getProductsSmall()
            .then((data) => (this.products = data));
    },

    methods: {
        showData() {
            if (this.selectedPeriod && this.selectedYear) {
                this.loading = true;
                setTimeout(() => {
                    this.showTable = true;
                    this.loading = false;
                }, 1000);
            }
        },
    },
};
</script>
<style>
.Error {
    text-align: center;
    color: #0000002b;
}

.button {
    background-color: #3f51b5;
    color: #fff;
    padding: 10px 20px;
    border: none;
    transition: all 0.2s ease-in-out;
}

.button:hover {
    transform: translateY(-5px);
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
}
</style>
