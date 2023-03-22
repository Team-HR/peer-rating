
<style scoped>
table,
th,
td {
  font-size: 14px;
  padding: 5px;
  border: 0.5px solid rgb(185, 185, 185);
  border-collapse: collapse;
}
</style>

<template>
  <div>
    <div class="border-0 border-round border-indigo-300 p-3">
      <div class="text-2xl text-center font-bold text-indigo-900 mb-5">{{ formTypes[pms_pcr_status.form_type] }}</div>
      <p>
        I, <span class="font-bold">{{ pms_pcr_status.sys_employee.full_name_fmle }}</span> , {{
          pms_pcr_status.position.position_title
        }}
        of the
        <span class="font-bold">{{ pms_pcr_status.sys_department.full_name }}</span> commit to deliver and agree to be
        rated on the attainment of the following
        targets in accordance with the
        indicated measures for the period {{ pms_pcr_status.period.period }}, {{ pms_pcr_status.period.year }}.
      </p>

      <div class="grid text-center">
        <div class="col">
          <b>{{ pms_pcr_status.signatories_inputs.immediate_supervisor.full_name }}</b> <br>
          Immediate Supervisor
        </div>
        <div class="col">
          <b>{{ pms_pcr_status.signatories_inputs.department_head.full_name }}</b> <br>
          Department Head
        </div>
        <div class="col">
          <b>{{ pms_pcr_status.signatories_inputs.head_of_agency }}</b> <br>
          Head of Agency
        </div>
        <div class="col">
          <b>{{ pms_pcr_status.date_accomplished }}</b> <br>
          Date Accomplished
        </div>
      </div>
    </div>


    <!-- table strategic function start -->
    <table class="mt-3 w-full">
      <thead>
        <tr>
          <th colspan="6" class="text-left uppercase bg-indigo-500 text-white">Strategic Function</th>
        </tr>
        <tr class="bg-indigo-100">
          <th style="width: 37.5px;">20%</th>
          <th>Strategic Function</th>
          <th>Success Indicator</th>
          <th>Actual Accomplishment</th>
          <th>Final Numerical Rating</th>
          <th>Options</th>
        </tr>
      </thead>
      <template v-if="rows_strat && rows_strat.length > 0">
        <tr v-for="row, s in rows_strat" :key="s">
          <td colspan="2">
            {{ row.function_title }}
          </td>
          <td>
            {{ row.success_indicator }}
          </td>
          <td>
            {{ row.actual_accomplishment }}
          </td>
          <td class="text-center">
            {{ row.final_numerical_rating }}
          </td>
          <td class="text-center">
            <Button label="Edit" icon="bi bi-pencil" class="p-button-sm p-button-text p-2 m-1"
                    @click="add_edit_accomplishment(row)" />
            <Button label="Clear" icon="bi bi-arrow-counterclockwise"
                    class="p-button-sm p-button-text p-button-warning p-2 m-1"
                  @click="confirm_accomplishment_reset(row)" />
        </td>
      </tr>
    </template>
      <template v-else>
        <tr>
          <!-- <td colspan="5" class="text-center text-gray-500">No records found!</td> -->
          <td colspan="6" class="text-center">
            <Button class="p-button-sm mr-3" label="Add Accomplishment" @click="add_edit_accomplishment()" />
            <!-- <Button
                                  class="p-button-sm p-button-danger"
                                  label="Not Applicable"
                                  @click="not_applicable()"
                                /> -->
          </td>
        </tr>
      </template>
    </table>
    <!-- table strategic function end -->



    <!-- table core function start -->
    <CodeFunctionsEditor :pms_pcr_status="pms_pcr_status" />
    <!-- table core functions end -->



    <!-- table support function start -->
    <table class="mt-3 w-full">
      <thead>
        <tr>
          <th colspan="11" class="text-left uppercase bg-indigo-500 text-white">Support Functions</th>
        </tr>
        <tr>
          <th>{{ support_functions.total_percentage_weight }}%</th>
          <th>Support Function</th>
          <th>Success Indicator</th>
          <th>Actual Accomplishment</th>
          <th style="width: 40px">Q</th>
          <th style="width: 40px">E</th>
          <th style="width: 40px">T</th>
          <th style="width: 40px">
            A ({{ support_functions.total_numerical_rating ? support_functions.total_numerical_rating : "" }})
          </th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        <tr v-if="!rows_support">
          <td class="text-center bg-gray-300 p-5" colspan="9">
            No records found! Please setup the support functions.
          </td>
        </tr>
        <tr v-for="(row, i) in rows_support" :key="i">
          <!-- <td colspan="8">{{row}}</td> -->
          <td class=" text-center">{{ row.percent }}%</td>
          <td class="">{{ row.support_function }}</td>
          <td class="">{{ row.success_indicator }}</td>
          <template v-if="row.id">
            <td class="">{{ row.accomplishment }}</td>
            <td class="text-center">{{ row.quality }}</td>
            <td class="text-center">{{ row.efficiency }}</td>
            <td class="text-center">{{ row.timeliness }}</td>
            <td class="text-center">{{ row.average }}</td>
            <td class="text-center">
              <Button label="Edit" class="p-button-text p-button-primary p-button-small w-4 p-1"
                      icon="bi bi-pencil-square" @click="openAddEditModal(row)" />
              <Button label="Clear" class="p-button-text p-button-warning p-button-small w-4 p-1"
                      icon="bi bi-arrow-counterclockwise" type="button" @click="resetAccomplishment(row.id)" />
            </td>
          </template>
          <template v-else>
            <td colspan="6" class="text-center">
              <Button label="Add Accomplishment" class="p-button-raised p-button-text p-button-small w-4 p-1"
                      icon="bi bi-check2-circle" @click="openAddEditModal(row)" />
            </td>
          </template>
        </tr>
      </tbody>
    </table>
    <!-- table support function end -->
  </div>
</template>

<script>



import axios from 'axios';
import CodeFunctionsEditor from '@/Components/Pms/Pcr/CoreFunctionsEditor.vue';

export default {
  props: ["pms_pcr_status"],
  components: {
    CodeFunctionsEditor
  },
  // emits: ["update:modelValue"],
  data() {
    return {
      formTypes: {
        ipcr: "INDIVIDUAL PERFORMANCE COMMITMENT AND REVIEW (IPCR)",
        spcr: "SECTION PERFORMANCE COMMITMENT AND REVIEW (SPCR)",
        dspcr: "DIVISION PERFORMANCE COMMITMENT AND REVIEW (DSPCR)",
        dpcr: "DEPARTMENT PERFORMANCE COMMITMENT AND REVIEW (DSPCR)",
      },
      core_functions: {},
      support_functions: {},
      rows: [],
      rows_strat: [],
      rows_support: []
      // content: this.modelValue,
    };
  },
  methods: {
    // changeInput(event) {
    //   this.$emit("update:modelValue", event.target.value); // previously was `this.$emit('input', title)`
    // },
    indent(level) {
      var margin = "";
      if (level > 0) {
        margin = "margin-left:" + level * 20 + "px;";
      }
      return margin;
    },
  },

  created() {

    axios.post("/api/pms/pcr_data", {
      pms_pcr_status_id: this.pms_pcr_status.id,
      pms_period_id: this.pms_pcr_status.pms_period_id,
      sys_employee_id: this.pms_pcr_status.sys_employee_id
    }).then(({ data }) => {
      // console.log(data);
      this.core_functions = data
      this.rows = data.rows
      this.rows_strat = data.rows_strat
      this.support_functions = data.rows_support
      this.rows_support = data.rows_support.data
    })

    // console.log(this.pms_pcr_status);
  },



  mounted() {





  }
};
</script>

