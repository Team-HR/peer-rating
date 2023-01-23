<template>
  <auth-layout>
    <div>
      <DataTable :value="products" responsiveLayout="scroll" stripedRows  v-model:selection="selectedDepartment" dataKey="id">
        <Column field="departments" header="Departments"></Column>
        <Column field="done" header="Done"></Column>
        <Column selectionMode="multiple" headerStyle="width: 3em"></Column>
      </DataTable>  
    </div>
  </auth-layout>
</template> 

<script>
import AuthLayout from "@/Layouts/Authenticated";
import PmsToolbar from "@/Layouts/PmsToolbar";
// import {ref , onMounted} from 'vue';
import ProductService from '@/Api/DepartmentsMap';
import departments from '@/departments'

// export default{
//   setup(){
//     onMounted(() => {
//       productService.value.getProductsSmall().then(data => products.value = data);
//     })

//     const selectedDepartment = ref();
//     const products = ref();
//     const productService = ref(new ProductService());

//     return {products, productService,selectedDepartment}
    
//   },
//   components: {
//     AuthLayout,
//     PmsToolbar,
//   },
// }
export default {
  data() {
    return {
      skills:{},
      selectedDepartment: [],
      products: null
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
    // console.log(this.productService.getProductsSmall());
  },
  mounted() {
    this.skills = departments.department();
    this.productService.getProductsSmall().then(data => this.products = data);
  },
  
  methods: {

  }
};
</script>
