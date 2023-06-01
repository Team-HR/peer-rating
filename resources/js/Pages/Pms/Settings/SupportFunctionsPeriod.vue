<template>
    <auth-layout>
        <Card class="mx-auto">
            <template #title><i class="bi bi-gear"></i> Settings : Setup Support Functions</template>
            <template #subtitle>Setup Support Functions for this period</template>fg ik1
            <template #content>

                <h3 class="">{{ period.period }} {{ period.year }}</h3>

                <Dropdown v-model="form.form_type" :options="formTypes" optionLabel="name"
                          placeholder="Select the form type" class="w-full md:w-14rem" @change="getSupportFunctions()" />
                <br>
                <Button :disabled="form.form_type.name == null" @click="addSupportFunction()" label="Add" icon="pi pi-plus"
                        class="my-3" />

                <!-- <h3>
                    {{ form.form_type.name }}
                </h3> -->



                <DataTable :value="supportFunctions" tableStyle="min-width: 50rem">
                    <Column field="percent" header="% Weight">
                        <template #body="slotProps">
                            {{ slotProps.data.percent }}%
                        </template>
                    </Column>
                    <Column field="support_function" header="Support Function"></Column>
                    <Column field="success_indicator" header="Success Indicator"></Column>
                    <Column header="Options">
                        <template #body="slotProps">
                            <!-- {{ slotProps.data }}  -->
                            <Button label="Edit" @click="editSupportFunction(slotProps.data)"></Button>
                        </template>
                    </Column>
                </DataTable>



                <Dialog v-model:visible="addDialog" modal
                        :header="!form.id ? 'Add New Support Function' : 'Edit Support Function'"
                        :style="{ width: '50vw' }">
                    <form @submit.prevent="submitAddSupportFunction()">
                        <div class="formgrid grid">
                            <div class="field col-12">
                                <label>Support Function:</label>
                                <small class="ml-2">*Required</small>
                                <br />
                                <Textarea class="w-full" v-model="form.support_function" rows="5" :autoResize="true"
                                          placeholder="Enter support functions here..." />
                            </div>
                            <div class="field col-12">
                                <label>Success Indicator:</label>
                                <small class="ml-2">*Required</small>
                                <br />
                                <Textarea class="w-full" v-model="form.success_indicator" rows="5" :autoResize="true"
                                          placeholder="Enter success indicator here..." />
                            </div>
                            <div class="field col-12">
                                <label>Percent:</label>
                                <small class="ml-2">*Required</small>
                                <br />
                                <!-- <InputText type="number" class="w-3" v-model="form.percent" rows="5"
                                           placeholder="__ %" /> -->

                                <InputNumber v-model="form.percent" inputId="percent" suffix="%" placeholder="__ %" />

                            </div>
                            <div class="field col-12">
                                <label>Measures:</label> <small class="ml-2">*Required</small>

                                <div class="field-checkbox">
                                    <Checkbox id="quality" name="quality" binary v-model="has_quality" />
                                    <label for="quality">Quality</label>
                                </div>
                                <div class="field-checkbox">
                                    <Checkbox id="efficiency" name="efficiency" binary v-model="has_efficiency" />
                                    <label for="efficiency">Efficiency</label>
                                </div>
                                <div class="field-checkbox">
                                    <Checkbox id="timeliness" name="timeliness" binary v-model="has_timeliness" />
                                    <label for="timeliness">Timeliness</label>
                                </div>

                                <div class="formgrid grid">
                                    <div class="ffield col-12 md:col-4" :hidden="!has_quality">
                                        <label>Quality:</label>
                                        <div class="p-inputgroup mb-1" v-for="(i, k) in 5" :key="k">
                                            <span class="p-inputgroup-addon">
                                                {{ 5 - i + 1 }}
                                            </span>
                                            <InputText v-model="form.quality[k]" />
                                        </div>
                                    </div>
                                    <div class="field col-12 md:col-4" :hidden="!has_efficiency">
                                        <label>Efficiency:</label>
                                        <div class="p-inputgroup mb-1" v-for="(i, k) in 5" :key="k">
                                            <span class="p-inputgroup-addon">
                                                {{ 5 - i + 1 }}
                                            </span>
                                            <InputText v-model="form.efficiency[k]" />
                                        </div>
                                    </div>
                                    <div class="field col-12 md:col-4" :hidden="!has_timeliness">
                                        <label>Timeliness:</label>
                                        <div class="p-inputgroup mb-1" v-for="(i, k) in 5" :key="k">
                                            <span class="p-inputgroup-addon">
                                                {{ 5 - i + 1 }}
                                            </span>
                                            <InputText v-model="form.timeliness[k]" />
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <!-- <div class="field col-12">
                <label>In-Charge:</label> <small class="ml-2">*Required</small>
                <br />
                <EmployeePicker :initSelections="form.in_charges" :options="employees" @changed="getEmployeePicks" />
              </div> -->
                        </div>

                        <div class="flex-column">
                            <Button type="submit" label="Save" class="mr-2"></Button>
                            <Button type="button" @click="cancelSubmitAddSupportFunction()" label="Cancel"
                                    severity="secondary"></Button>
                        </div>

                    </form>
                </Dialog>

                <Toast></Toast>

            </template>
        </Card>
    </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";
import PeriodSelector from "@/Components/Pms/PeriodSelector.vue"
import axios from "axios";
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
            has_quality: false,
            has_efficiency: false,
            has_timeliness: false,
            form: this.$inertia.form({
                id: null,
                support_function: null,
                success_indicator: null,
                quality: [],
                efficiency: [],
                timeliness: [],
                percent: null,
                form_type: { name: 'IPCR', code: 'ipcr' }
                // in_charges: [],
            }),
            supportFunction: this.$inertia.form({
                support_function: null,
                success_indicator: null,
                form_type: {}
            }),
            addDialog: false,
            supportFunctions: [
                // {
                //     support_function: "test support_function",
                //     success_indicator: "test success_indicator"
                // }
            ],
            formTypes: [
                { name: 'IPCR', code: 'ipcr' },
                { name: 'SPCR', code: 'spcr' },
                { name: 'DIVISION SPCR', code: 'dspcr' },
                { name: 'DPCR', code: 'dpcr' },
            ]
        };
    },
    watch: {
        addDialog(newValue, oldValue) {
            if (!newValue) {
                this.clearSupportFunctionForm()
            }
        },
    },
    methods: {
        addSupportFunction() {
            // this.$inertia.get(this.current_url + "/create", { form_type: this.supportFunction.form_type }, {
            //     replace: true,
            // })
            // supportFunction.form_type

            this.addDialog = true
        },

        submitAddSupportFunction() {

            // console.log(this.current_url);
            // return false;
            this.form.post(this.current_url + "/create", {
                preserveScroll: true,
                onSuccess: () => {
                    var msg = !this.form.id ? "New support function added!" : "Support function updated!"
                    this.$toast.add({
                        severity: "success",
                        summary: "Success!",
                        detail: msg,
                        life: 3000,
                    });
                    this.cancelSubmitAddSupportFunction()
                    this.getSupportFunctions()
                }
            })
        },

        cancelSubmitAddSupportFunction() {
            this.addDialog = false;
        },

        clearSupportFunctionForm() {
            // this.supportFunction.support_function = null
            // this.supportFunction.success_indicator = null
            // this.supportFunction.form_type = {}

            this.has_quality = false
            this.has_efficiency = false
            this.has_timeliness = false

            this.form.id = null
            this.form.support_function = null
            this.form.success_indicator = null
            this.form.quality = []
            this.form.efficiency = []
            this.form.timeliness = []
            this.form.percent = null
            // this.form.form_type = {}
        },

        getSupportFunctions() {
            const form_type = this.form.form_type
            axios.post(this.current_url, {
                form_type: form_type
            })
                .then(({ data }) => {
                    // console.log(data)
                    this.supportFunctions = data
                })
                .catch(err => {
                    console.error(err);
                })
        },

        editSupportFunction(data) {
            console.log(data);
            this.addDialog = true
            this.form.id = data.id
            this.form.support_function = data.support_function
            this.form.success_indicator = data.success_indicator
            this.form.quality = data.quality
            this.form.efficiency = data.efficiency
            this.form.timeliness = data.timeliness
            this.form.percent = data.percent

            if (data.quality.length > 0) {
                this.has_quality = true
            }
            if (data.efficiency.length > 0) {
                this.has_efficiency = true
            }
            if (data.timeliness.length > 0) {
                this.has_timeliness = true
            }

        }
    },
    mounted() {
        this.getSupportFunctions()
    },
};
</script>


