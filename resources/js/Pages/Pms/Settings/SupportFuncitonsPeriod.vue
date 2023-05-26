<template>
    <auth-layout>
        <Card class="mx-auto">
            <template #title><i class="bi bi-gear"></i> Settings : Setup Support Functions</template>
            <template #subtitle>Setup Support Functions for this period</template>
            <template #content>

                <h3 class="">{{ period.period }} {{ period.year }}</h3>

                <Dropdown v-model="supportFunction.form_type" :options="formTypes" optionLabel="name"
                          placeholder="Select the form type" class="w-full md:w-14rem" />


                <h3>
                    {{ supportFunction.form_type.name }}
                </h3>

                <Button :disabled="supportFunction.form_type.name == null" @click="addDialog = true" label="Add" icon="pi pi-plus" class="my-3"/>
                <Dialog v-model:visible="addDialog" modal header="Add New Support Function" :style="{ width: '50vw' }">
                    <form @submit.prevent="submitAddSupportFunction()">
                        <div class="flex flex-column gap-2">
                            <label for="support_function">Support Function</label>

                            <InputText id="support_function" type="text" v-model="supportFunction.support_function"
                                       placeholder="Enter support function" required />
                        </div>

                        <div class="flex flex-column gap-2 mt-3">
                            <label for="success_indicator">Success Indicator</label>

                            <InputText id="success_indicator" type="text" v-model="supportFunction.success_indicator"
                                       placeholder="Enter success indicator" required />
                        </div>

                        <!-- <div class="flex flex-column gap-2 mt-3">
                            <label for="success_indicator">Success Indicator</label>

                            <InputText id="success_indicator" type="text" v-model="supportFunction.success_indicator"
                                       placeholder="Enter success indicator" required />
                        </div> -->

                        <div class="flex-column gap-2 mt-3">
                            <Button type="submit" label="Save" class="mr-2"></Button>
                            <Button type="button" @click="addDialog = !addDialog" label="Cancel"
                                    severity="secondary"></Button>
                        </div>
                    </form>
                </Dialog>


                <DataTable :value="supportFunctions" tableStyle="min-width: 50rem">
                    <Column field="support_function" header="Support Function"></Column>
                    <Column field="success_indicator" header="Success Indicator"></Column>
                </DataTable>


            </template>
        </Card>
    </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";
import PeriodSelector from "@/Components/Pms/PeriodSelector.vue"
export default {
    components: {
        AuthLayout,
        PeriodSelector
    },
    props: {
        period: Object
    },
    data() {
        return {
            current_url: document.location.pathname,
            supportFunction: this.$inertia.form({
                support_function: null,
                success_indicator: null,
                form_type: {}
            }),
            addDialog: false,
            supportFunctions: [
                {
                    support_function: "test support_function",
                    success_indicator: "test success_indicator"
                }
            ],
            formTypes: [
                { name: 'IPCR', code: 'ipcr' },
                { name: 'SPCR', code: 'spcr' },
                { name: 'DIVISION SPCR', code: 'dspcr' },
                { name: 'DPCR', code: 'dpcr' },
            ]
        };
    },
    methods: {
        submitAddSupportFunction() {
            // console.log(this.current_url);
            this.supportFunction.post(this.current_url, {
                preserveScroll: true,
                onSuccess: () => {
                    this.$toast.add({
                        severity: "success",
                        summary: "Success!",
                        detail: "New support function added!",
                        life: 3000,
                    });
                    this.clearSupportFunctionForm()
                }
            })
        },
        clearSupportFunctionForm() {
            this.supportFunction.support_function = null
            this.supportFunction.success_indicator = null
            this.supportFunction.form_type = {}
        }
    },
    mounted() {
    },
};
</script>

