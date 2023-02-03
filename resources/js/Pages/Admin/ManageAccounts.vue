<template>
    <auth-layout>
        <Card class="w-full mb-3">
            <template #subtitle>
                <div class="flex align-items-center w-full  pb-2 pl-2 pr-3">
                    <p class="text-5xl w-10">Manage Accounts </p>
                </div>
                <div class="mb-5 pl-3">
                    <span class="p-input-icon-left">
                        <i class="pi pi-search" />
                        <InputText type="text" placeholder="Search For Employee" class="search-input" />
                    </span>
                </div>
            </template>
        </Card>
        <Card>
            <template #content>
                <DataTable :value="user" responsiveLayout="scroll" stripedRows>
                    <Column field="fname" header="First Name"></Column>
                    <Column field="lname" header="Last Name"></Column>
                    <Column field="ml" header="M.I"></Column>
                    <Column field="type" header="Type"></Column>
                    <Column field="" header="">
                    <template #body>
                        <Button icon="pi pi-pencil" class="p-button-rounded p-button-success mr-2"  />
                    </template></Column>
                </DataTable>
            </template>
        </Card>
    </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";
import userAccnt from "@/Api/Accounts";
export default {
    data() {
        return {
            user: []
        }
    },
    components: {
        AuthLayout,
    },
    mounted() {
        this.user = userAccnt.getAccounts();
    },
    methods: {

    }
}
</script>
