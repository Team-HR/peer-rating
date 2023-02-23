<template>
  <auth-layout>
    <div class="m-auto">
      <Card class="w-auto mb-3">
        <template #subtitle>
          <div class="flex align-items-center w-full pb-2 pl-2 pr-3">
            <p class="text-5xl w-10">Manage Accounts</p>
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
            <Column v-for="col in columns" :field="col.field" :header="col.header" :key="col.id" class="uppercase">
            </Column>
            <Column field="" header="">
              <template #body="slotProps">
                <Button icon="pi pi-folder" class="button-rounded button-success mr-2"
                  @click="openDetails(slotProps.data)" />
              </template>
            </Column>
          </DataTable>
        </template>
      </Card>
      <Dialog header="Account Infomation" v-model:visible="display" :modal="true"
        :breakpoints="{ '960px': '75vw', '640px': '100vw' }" :style="{ width: '80vw' }" class="mydialog">
        <div class="flex grid justify-content-between m-3 mb-3">
          <div>
            <h4>Last Name:</h4>
            <InputText type="text" v-model="selectedAccount.lname" disabled class="w-auto uppercase" />
          </div>
          <div>
            <h4>First Name:</h4>
            <InputText type="text" v-model="selectedAccount.fname" disabled class="w-auto uppercase" />
          </div>
          <div>
            <h4>M.I:</h4>
            <InputText type="text" v-model="selectedAccount.ml" disabled class="w-auto uppercase" />
          </div>
          <div>
            <h4>Gender:</h4>
            <InputText type="text" v-model="selectedAccount.gender" disabled class="w-auto uppercase" />
          </div>
          <div>
            <h4>Employment Status:</h4>
            <InputText type="text" v-model="selectedAccount.status" disabled class="w-auto uppercase" />
          </div>
          <div>
            <h4>Username:</h4>
            <InputText type="text" v-model="selectedAccount.username" class="w-auto" />
          </div>
        </div>
        <div v-for="category of categories" :key="category.key" class="field-checkbox m-3">
          <Checkbox :inputId="category.key" name="category" :value="category.name" v-model="selectedCategories" />
          <label :for="category.key">{{ category.name }}</label>
        </div>
        <div class="m-2 gap-2 flex">
          <Button label="Update" class="Update w-full" @click="update" />
          <Button label="Reset Password" class="reset w-full" @click="resetPass" />
        </div>
      </Dialog>
      <Toast ref="toast" />
    </div>
  </auth-layout>
</template>
<script>

import { ref } from "vue";
import { useToast } from "primevue/usetoast";
import { FilterMatchMode } from "primevue/api";
import AuthLayout from "@/Layouts/Authenticated";
import userAccnt from "@/Api/Accounts";

export default {
  setup() {
    const toast = useToast();
    const display = ref(false);


    const update = () => {
      toast.add({ 
        severity: 'success',
        summary: 'Profile Updated',
        detail: 'Done',
        life: 3000
      });
      display.value = false;
    }

    const resetPass = () => {
      toast.add({
        severity: 'success',
        summary: 'Password reset to default',
        detail: 'Done',
        life: 3000
      });
      display.value = false;
    }

    return { display, toast, update, resetPass };
  },
  data() {
    return {

      selectedCategories: [],
      user: [],
      select: 0,
      selectedAccount: {
        fname: "",
        lname: "",
        ml: "",
        type: "",
        username: "",
        gender: "",
        status: "",
      },
      // display: false,
      selectedtable: [],
      filters: {},
      initFilters() {
        this.filters = {
          global: {
            value: null,
            matchMode: FilterMatchMode.CONTAINS,
          },
        };
      },
      columns: [
        { field: "fname", header: "First Name" },
        { field: "lname", header: "Last Name" },
        { field: "ml", header: "M.I" },
        { field: "type", header: "Type" },
      ],
      categories: [
        {
          name: "Administrative Officer-in-charge if RMS Encodinf per department",
          key: "A",
        },
        { name: "PMT", key: "M" },
        { name: "Supervisor / Department Head", key: "P" },
      ],


    };
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
    openDetails(data) {
      this.display = true;
      this.selectedAccount.fname = data.fname;
      this.selectedAccount.lname = data.lname;
      this.selectedAccount.ml = data.ml;
      this.selectedAccount.type = data.type;
      this.selectedAccount.username = data.username;
      this.selectedAccount.status = data.status;
      this.selectedAccount.gender = data.gender;
    },

  },
  computed: {},
};
</script>
<style>
.p-grid {
  margin: 20px;
}

.p-col-12 {
  padding: 10px;
}

.mydialog {
  max-width: 800px;
  width: 90%;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

.mydialog .p-dialog-header {
  background-color: #0078d7;
  color: #fff;
  border-radius: 8px 8px 0 0;
}

.mydialog .p-dialog-header .p-dialog-title {
  font-size: 1.2rem;
  font-weight: bold;
}

.mydialog .p-dialog-content {
  padding: 1rem;
}

.mydialog .p-dialog-footer {
  border-top: none;
  text-align: right;
  padding: 1rem;
}

.mydialog .p-button {

  color: #fff;
  border-radius: 4px;
  border: none;
}

.mydialog .p-button:focus {
  outline: none;
  box-shadow: none;
}

input[type="text"]:disabled {
  opacity: 1;
  background-color: #ebebeb;
  color: #555;
}

.Update {
  background-color: rgb(4, 172, 4);
}

.reset {
  background-color: rgb(214, 10, 10);
}
</style>
