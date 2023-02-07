<template>
    <auth-layout>
        <Card class="w-auto mb-3">
            <template #subtitle>
                <div class="flex align-items-center w-full  pb-2 pl-2 pr-3">
                    <p class="text-5xl w-10">Manage Accounts </p>
                </div>
                <div class="mb-5 pl-3">
                    <span class="p-input-icon-left">
                        <i class="pi pi-search" />
                        <InputText type="text" placeholder="Search For Employee" class="search-input"
                            v-model="filters['global'].value" />
                    </span>
                </div>
            </template>
        </Card>
        <Card>
            <template #content>
                <DataTable :value="user" responsiveLayout="scroll" stripedRows selectionMode="single"
                    v-model:selection="selectedtable" :filters="filters">
                    <Column field="fname" header="First Name"></Column>
                    <Column field="lname" header="Last Name"></Column>
                    <Column field="ml" header="M.I"></Column>
                    <Column field="type" header="Type"></Column>
                    <Column field="" header="">
                        <template #body>
                            <Button icon="pi pi-folder" class="p-button-rounded p-button-success mr-2"
                                @click="openModal" />
                        </template>
                    </Column>
                </DataTable>
            </template>
        </Card>
        <Dialog header="Account Infomation" v-model:visible="display" :modal="true"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }">
            <div>
                <h4>Last Name:</h4>
                <InputText type="text" v-model="input.lname" id="lname" disabled class="w-auto" />
                <h4>First Name:</h4>
                <InputText type="text" v-model="input.fname" disabled class="w-auto" />
                <h4>M.I:</h4>
                <InputText type="text" v-model="input.mi" disabled class="w-auto" />
                <h4>Gender:</h4>
                <InputText type="text" v-model="input.gender" disabled class="w-auto" />
                <h4>Employment Status:</h4>
                <InputText type="text" v-model="input.status" disabled class="w-auto" />
                <h4>Nature of Assignment</h4>
                <InputText type="text" v-model="input.assignment" disabled class="w-auto" />
            </div>
        </Dialog>
    </auth-layout>
</template>
<script>
import { FilterMatchMode } from 'primevue/api';
import AuthLayout from "@/Layouts/Authenticated";
import userAccnt from "@/Api/Accounts";
export default {
    data() {
        return {
            display: false,
            selectedtable: [],
            user: [],
            filters: {},
            initFilters() {
                this.filters = {
                    'global': { value: null, matchMode: FilterMatchMode.CONTAINS }
                }
            },
          
        }
    },
    components: {
        AuthLayout,
    },
    created() {
        this.initFilters();
    },
    mounted() {
        this.user = userAccnt.getAccounts();
    },
    methods: {
        openModal() {
            this.display = true;
        },
    }
}
</script>
