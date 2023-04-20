<template>
  <AuthLayout>
    <div class="grid">
      <div class="wto col-12 lg:col-12 shadow-2 p-3 flex flex-column surface-card">
        <h1 class="text-400 text-center">Support Function Form</h1>
        <div class="flex flex-column gap-2">
          <div class="flex flex-column">
            <label for="MFO">MFO</label>
            <InputText id="username" v-model="mfo" aria-describedby="username-help" placeholder="MFO" />
          </div>
          <div class="form-group">
            <label for="SuccessIndicator">Success Indicators</label>
            <InputText type="text" id="value2" v-model="successIndicator" class="w-full"
              placeholder="Success Indicator" />
          </div>
          <div class="form-group">
            <label for="Percentage">Percentage</label>
            <InputText type="text" id="value3" v-model="percentage" class="w-full" placeholder="Percentage" />
          </div>
          <div class="form-group">
            <label for="value3">Form Type</label><br />
            <Dropdown v-model="formType" editable :options="type" optionLabel="form" placeholder="Select a Form"
              class="w-full md:w-14rem" />
          </div>
        </div>
        <br /><br />
      </div>
    </div>
    <br />

    <!-- support functions -->
    <div class="grid shadow-2 border-round-xl p-4">
      <div class="flex flex-row col-12 lg:col-4 surface-card shadow-2 border-round-xl p-2">
        <div class="w-full">
          <h2 class="text-400">Quality</h2>
          <div>
            <span class="p-float-label">
              <Textarea class="w-full" v-model="q5" rows="2" cols="30" />
              <label>5</label>
            </span>
            <span class="p-float-label">
              <Textarea class="w-full" v-model="q5" rows="2" cols="30" />
              <label>4</label>
            </span>
            <span class="p-float-label">
              <Textarea class="w-full" v-model="q5" rows="2" cols="30" />
              <label>3</label>
            </span>
            <span class="p-float-label">
              <Textarea class="w-full" v-model="q5" rows="2" cols="30" />
              <label>2</label>
            </span>
            <span class="p-float-label">
              <Textarea class="w-full" v-model="q5" rows="2" cols="30" />
              <label>1</label>
            </span>
          </div>
        </div>
      </div>

      <div class="flex flex-row gap-3 col-12 lg:col-4 surface-card shadow-2 border-round-xl p-2">
        <div class="w-full">
          <h2 class="text-400">Efficiency</h2>
          <div>
            <span class="p-float-label">
              <Textarea class="w-full" v-model="q5" rows="2" cols="30" />
              <label>5</label>
            </span>
            <span class="p-float-label">
              <Textarea class="w-full" v-model="q5" rows="2" cols="30" />
              <label>4</label>
            </span>
            <span class="p-float-label">
              <Textarea class="w-full" v-model="q5" rows="2" cols="30" />
              <label>3</label>
            </span>
            <span class="p-float-label">
              <Textarea class="w-full" v-model="q5" rows="2" cols="30" />
              <label>2</label>
            </span>
            <span class="p-float-label">
              <Textarea class="w-full" v-model="q5" rows="2" cols="30" />
              <label>1</label>
            </span>
          </div>
        </div>
      </div>
      <div class="flex flex-row gap-3 col-12 lg:col-4 surface-card shadow-2 border-round-xl p-2">
        <div class="w-full">
          <h2 class="text-400">Timeliness</h2>
          <div>
            <span class="p-float-label">
              <Textarea class="w-full" v-model="q5" rows="2" cols="30" />
              <label>5</label>
            </span>
            <span class="p-float-label">
              <Textarea class="w-full" v-model="q5" rows="2" cols="30" />
              <label>4</label>
            </span>
            <span class="p-float-label">
              <Textarea class="w-full" v-model="q5" rows="2" cols="30" />
              <label>3</label>
            </span>
            <span class="p-float-label">
              <Textarea class="w-full" v-model="q5" rows="2" cols="30" />
              <label>2</label>
            </span>
            <span class="p-float-label">
              <Textarea class="w-full" v-model="q5" rows="2" cols="30" />
              <label>1</label>
            </span>
          </div>
        </div>
      </div>
      <Button type="submit" label="Submit" class="w-full" />
    </div>
    <div class="card">
      <!-- <ul>
        <li v-for="product in state.products" :key="product.id">{{ product.title }}</li>
      </ul>
      <h5>Limit: {{ state.limit }}</h5> -->
    </div>
    <!-- end support function -->
      <DataTable :value="suppFuncDataDeptHead">
        <columns v-for="col of columns" :key="col.field" :field="col.field" :header="col.header"></columns>
        <columns header="Actions"  style="min-width: 8rem">
          <template #body="slotProps">
            <Button icon="pi pi-check" text rounded aria-label="Filter" class="mr-2" />
            <Button icon="pi pi-times" severity="danger" text rounded aria-label="Cancel" />
          </template>
        </columns>
      </DataTable>  
  </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated";
import { ref } from "vue";
import suppFunc from "@/Api/SupportFunctions";
import axios from "axios";
import { reactive, onMounted } from 'vue';

export default {
  setup() {
    const state = reactive({
      products: []
    });

    const employees = ([]);
    const successIndicator = ref("");
    const percentage = ref("");
    const mfo = ref("");
    const formType = ref();
    const q5 = ref();
    // table for support funcs  

    const suppFuncDataDeptHead = ref([]);
    const columns = [
      { field: "mfo", header: "MFO" },
      { field: "successIndicators", header: "Success Indicators" },
      { field: "quallity", header: "Quality" },
      { field: "efficiency", header: "Efficiency" },
      { field: "timeliness", header: "Timeliness" },
      { field: "percentage", header: "Percentage" },
    ];

    const type = ref([
      { form: "IPCR" },
      { form: "SPMS/DIVISION" },
      { form: "DPCR" },
    ]);

    onMounted(() => {
      axios.get('https://dummyjson.com/products/category/smartphones')
        .then(res => {
          const data = res.data;
          state.products = data.products
          state.limit = data.limit
          console.log(state)
        })
        .catch(error => {
          console.log(error);
        });
    });

    return {
      successIndicator,
      percentage,
      mfo,
      formType,
      type,
      q5,
      columns,
      suppFuncDataDeptHead,
      state
    };
  },


  data() {
    return {

    }
  },
  components: {
    AuthLayout,
  },

  mounted() {
    this.suppFuncDataDeptHead = suppFunc.getFuncs();
  },
  created() {

  }
};
</script>

<style >
/* start browsejob */
.browsejob {
  display: flex;
  width: 1920px;
  background: #fdfdfd;
  border-bottom: 2px solid #f0f0f0;
}

.jobs {
  display: flex;
  flex-wrap: wrap;
  gap: 60px;
}

.dataAndops {
  gap: 14px;
  width: 327.25px;
  color: #5D74FD;
  align-items: center;
  font-family: 'Lexend Deca';
  font-style: normal;
  font-weight: 700;
  font-size: 18px;
}

.underDevOps {
  flex-direction: column;
  gap: 14px;
  width: 321px;
  font-style: normal;
  font-weight: 500;
  font-size: 16px;
  color: #414042;
}

.devOpsItem {
  margin-bottom: 14px;
}

/* end browseJob */
.wto {
  width: 90%;
  max-width: 700px;
  background-color: #ffffff;
  border-radius: 10px;
  padding: 0 30px 0 30px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.text-400 {
  font-weight: 400;
}

.gap-2>* {
  margin-top: 10px;
  margin-bottom: 10px;
}

label {
  font-size: 14px;
  color: #6b7280;
}

.InputText {
  width: 100%;
  padding: 12px;
  border: 1px solid #e5e7eb;
  border-radius: 4px;
  font-size: 16px;
  color: #374151;
  transition: border-color 0.2s ease-in-out;
}

.InputText:focus {
  outline: none;
  border-color: #6366f1;
}

.card {
  margin-top: 20px;
  padding: 10px;
  background-color: #f3f4f6;
  border-radius: 4px;
}

.Dropdown .p-dropdown-label {
  font-size: 16px;
  color: #374151;
  padding: 10px;
  border: 1px solid #e5e7eb;
  border-radius: 4px;
  transition: border-color 0.2s ease-in-out;
}

.Dropdown .p-dropdown-label:hover,
.Dropdown .p-dropdown-label:focus-within {
  border-color: #6366f1;
}

.Dropdown .p-dropdown-items {
  border: none;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.Dropdown .p-dropdown-item {
  font-size: 16px;
  color: #374151;
  padding: 10px;
}

.Dropdown .p-dropdown-item.p-highlight {
  background-color: #6366f1;
  color: #ffffff;
}

.Button {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  font-weight: 600;
  color: #ffffff;
  background-color: #6366f1;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
}

.Button:hover {
  background-color: #4f46e5;
}

.center-label {
  display: block;
  text-align: center;
}
</style>

