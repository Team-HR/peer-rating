<style scoped>
table,
th,
td {
  font-size: 12px;
  padding: 5px;
  border: 0.5px solid rgba(117, 79, 255, 0.25);
  border-collapse: collapse;
}
</style>

<template>
  <div class="flex justify-content-center flex-wrap">
    <!-- {{ form_status }} -->
    <Card style="font-size: 12px; width:11.7in; /*height: 8.3in;*/">
      <template #content>
        <!-- signatories start -->
        <table class="mt-0" style="width: 100%;">
          <tr>
            <td colspan="4">
              <div class="flex justify-content-center flex-wrap my-3">
                <b v-if="form_status.form_type == 'ipcr'">INDIVIDUAL PERFORMANCE COMMITMENT AND REVIEW (IPCR)</b>
                <b v-else-if="form_status.form_type == 'spcr'">SECTION PERFORMANCE COMMITMENT AND REVIEW (SPCR)</b>
                <b v-else>___ PERFORMANCE COMMITMENT AND REVIEW</b>
              </div>
              <div class="m-3"> I, <b class="uppercase">{{ form_status.sys_employee.full_name_fmle }}</b>,
                <span>{{ form_status.position.position_title }}</span> of the <b class="uppercase">{{
                  form_status.sys_department.full_name }}</b> commit to deliver and agree to be rated on the attainment of
                the following
                targets in
                accordance with the indicated measures for the period {{ form_status.period.period }}, {{
                  form_status.period.year }}
              </div>
              <div class="flex justify-content-end flex-wrap mt-5 mb-2">
                <div class="text-center">
                  <u><b class="uppercase">{{ form_status.sys_employee.full_name_fmle }}</b></u>
                  <br>
                  Ratee
                </div>
              </div>
            </td>
          </tr>
          <tr style="background-color: #00ff0024;">
            <td style="width: 25%;">
              <div class="mb-3" style="font-size: 9px;">Reviewed By:</div>
              <br>
              <div class="text-center">
                <u class="uppercase">{{ form_status.signatories_inputs.immediate_supervisor.full_name_fmle }}</u>
                <br>
                Immediate Superior
              </div>
            </td>
            <td style="width: 25%;">
              <div class="mb-3" style="font-size: 9px;">Noted By:</div>
              <br>
              <div class="text-center">
                <u class="uppercase">{{ form_status.signatories_inputs.department_head.full_name_fmle }}</u>
                <br>
                Department Head
              </div>
            </td>
            <td style="width: 25%;">
              <div class="mb-3" style="font-size: 9px;">Approved By:</div>
              <br>
              <div class="text-center">
                <u class="uppercase">{{ form_status.signatories_inputs.head_of_agency }}</u>
                <br>
                Head of Agency
              </div>
            </td>
            <td style="width: 25%;">
              <div class="mb-3" style="font-size: 9px;">Date:</div>
              <br>
              <div class="text-center">
                <u>{{ form_status.date_accomplished }}</u>
                <br>
                <span style="opacity: 0%;">Date Accomplished</span>
              </div>
            </td>
          </tr>
        </table>
        <!-- signatories end -->

        <!-- strat and core function start -->
        <table class="mt-2" style="width: 100%;">
          <tbody>
            <tr style="background:#00c4ff36;font-size:14px">
              <th rowspan="2" style="padding:20px">MFO / PAP</th>
              <th rowspan="2">Success Indicator</th>
              <th rowspan="2" style="display:none">Alloted Budget<br>for 2021 (whole<br>year)</th>
              <th rowspan="2" style="display:none">Individual/s or <br> Division Accountable</th>
              <th rowspan="2">Actual Accomplishments</th>
              <th colspan="4" style="width:40px">Rating Matrix</th>
              <th rowspan="2">Remarks</th>
            </tr>
            <tr style="font-size:12px;background:#00c4ff36;font-size:14px">
              <th>Q</th>
              <th>E</th>
              <th>T</th>
              <th>A</th>
            </tr>
          </tbody>
          <tbody style="font-size:14px">
            <tr style="background:#f7f70026">
              <td colspan="8"><b>Strategic Function</b> <span v-if="strategic_function">(<b style="color:blue">{{
                strategic_function.percent }}%</b>)</span></td>
            </tr>
            <tr v-if="strategic_function">
              <td class="text-center" style="width:25%">{{ strategic_function.function_title }} </td>
              <td class="text-center" style="width:25%">{{ strategic_function.success_indicator }}</td>
              <td class="text-center" style="width:25%">{{ strategic_function.actual_accomplishment }}</td>
              <td></td>
              <td></td>
              <td></td>
              <td class="text-center">{{ strategic_function.final_numerical_rating }}</td>
              <td></td>
            </tr>
            <tr v-else>
              <td colspan="8" class="text-center text-gray-500">N/A</td>
            </tr>
            <tr style="background:#f7f70026">
              <td colspan="8"><b>Core Function</b> (<b style="color:blue">60%</b>)</td>
            </tr>
            <!-- core function start -->
            <template v-for="(row, r) in rows" :key="r">
              <tr v-if="row.rowspan == 0 && row.si_only == false" :class="row.mfo_only ? '_bg-primary-50' : ''">
                <!-- <td v-if="!row.mfo_only" class="text-center">
                  <template v-if="row.pms_pcr_core_function_data">
                    <span v-if="row.pms_pcr_core_function_data.percent
                      ">{{ row.pms_pcr_core_function_data.percent }}%
                    </span>
                  </template>
                </td> -->
                <!-- if  mfo has no success indicator (title) conditioned colspan if has multiple success indicator -->
                <td :colspan="row.mfo_only ? 11 : 1">
                  <div :style="indent(row.level)">
                    <span>
                      <strong class="mr-2">{{ row.code }}</strong>
                      {{ row.title }}
                    </span>
                  </div>
                </td>
                <!-- if mfo with only one success indicator -->
                <template v-if="!row.mfo_only">
                  <td>{{ row.success_indicator }}</td>
                  <template v-if="row.pms_pcr_core_function_data">
                    <template v-if="!row.pms_pcr_core_function_data
                      .not_applicable
                      ">
                      <td>
                        {{
                          row.pms_pcr_core_function_data.actual
                        }}
                      </td>
                      <td class="text-center">
                        {{
                          row.pms_pcr_core_function_data.quality
                        }}
                      </td>
                      <td class="text-center">
                        {{
                          row.pms_pcr_core_function_data
                            .efficiency
                        }}
                      </td>
                      <td class="text-center">
                        {{
                          row.pms_pcr_core_function_data
                            .timeliness
                        }}
                      </td>
                      <td class="text-center _text-yellow-700">
                        {{
                          row.pms_pcr_core_function_data.average
                        }}
                      </td>
                      <td class="text-center">
                        {{
                          row.pms_pcr_core_function_data.remarks
                        }}
                      </td>
                    </template>
                    <template v-else>
                      <td colspan="6" class="text-center text-blue-700">
                        {{
                          row.pms_pcr_core_function_data.actual
                        }}
                      </td>
                    </template>
                    <!-- <td></td>
                    <td class="text-center">
                      <Button v-if="!row.pms_pcr_core_function_data
                            .not_applicable
                          " label="Edit" icon="bi bi-pencil" class="p-button-sm p-button-text p-2 m-1"
                              @click="edit_accomplishment(row)" />
                      <Button v-else label="Edit" icon="bi bi-pencil" class="p-button-sm p-button-text p-2 m-1"
                              @click="edit_not_applicable(row)" />
                      <Button label="Clear" icon="bi bi-arrow-counterclockwise"
                              class="p-button-sm p-button-text p-button-warning p-2 m-1"
                              @click="confirm_accomplishment_reset(row)" />
                    </td> -->
                  </template>
                  <template v-else>
                    <td colspan="8" class="text-center">
                      <!-- <Button label="Add Accomplishment" class="p-button-text p-button-small p-button-raised w-4 p-1"
                              @click="add_accomplishment(row)"></Button>
                      <Button label="Not Applicable"
                              class="p-button-danger p-button-small p-button-raised w-4 mt-2 ml-3 p-1"
                              @click="not_applicable(row)"></Button> -->
                    </td>
                  </template>
                </template>
              </tr>
              <!-- sub mfo with initial success indicator  -->
              <tr v-else-if="row.rowspan > 0 && row.si_only == false">
                <!-- <td class="text-center text-center">
                  <template v-if="row.pms_pcr_core_function_data">
                    <span v-if="row.pms_pcr_core_function_data.percent
                      ">{{
    row.pms_pcr_core_function_data.percent
  }}%</span>
                  </template>
                </td> -->
                <td :rowspan="row.rowspan">
                  <div :style="indent(row.level)">
                    <span>
                      <strong class="mr-2">{{ row.code }}</strong>
                      {{ row.title }}
                    </span>
                  </div>
                </td>
                <td>{{ row.success_indicator }}</td>
                <!-- accomplish interface start -->
                <template v-if="row.pms_pcr_core_function_data">
                  <template v-if="!row.pms_pcr_core_function_data
                    .not_applicable
                    ">
                    <td>
                      {{ row.pms_pcr_core_function_data.actual }}
                    </td>
                    <td class="text-center">
                      {{ row.pms_pcr_core_function_data.quality }}
                    </td>
                    <td class="text-center">
                      {{
                        row.pms_pcr_core_function_data.efficiency
                      }}
                    </td>
                    <td class="text-center">
                      {{
                        row.pms_pcr_core_function_data.timeliness
                      }}
                    </td>
                    <td class="text-center _text-yellow-700">
                      {{ row.pms_pcr_core_function_data.average }}
                    </td>
                    <td class="text-center">
                      {{ row.pms_pcr_core_function_data.remarks }}
                    </td>
                  </template>
                  <template v-else>
                    <td colspan="6" class="text-center text-blue-700">
                      {{ row.pms_pcr_core_function_data.actual }}
                    </td>
                  </template>
                  <!-- <td></td>
                  <td class="text-center">
                    <Button v-if="!row.pms_pcr_core_function_data
                      .not_applicable
                      " label="Edit" icon="bi bi-pencil" class="p-button-sm p-button-text p-2 m-1"
                            @click="edit_accomplishment(row)" />
                    <Button v-else label="Edit" icon="bi bi-pencil" class="p-button-sm p-button-text p-2 m-1"
                            @click="edit_not_applicable(row)" />
                    <Button label="Clear" icon="bi bi-arrow-counterclockwise"
                            class="p-button-sm p-button-text p-button-warning p-2 m-1"
                            @click="confirm_accomplishment_reset(row)" />
                  </td> -->
                </template>
                <template v-else>
                  <td colspan="8" class="text-center">
                    <!-- <Button label="Add Accomplishment" class="p-button-text p-button-small p-button-raised w-4 p-1"
                            @click="add_accomplishment(row)"></Button>
                    <Button label="Not Applicable"
                            class="p-button-danger p-button-small p-button-raised w-4 mt-2 ml-3 p-1"
                            @click="not_applicable(row)"></Button> -->
                  </td>
                </template>
                <!-- accomplish interface end -->
              </tr>
              <!-- succeding success indicator from above -->
              <tr v-else>
                <!-- <td class="text-center">
                  <template v-if="row.pms_pcr_core_function_data">
                    <span v-if="row.pms_pcr_core_function_data.percent
                      ">{{
    row.pms_pcr_core_function_data.percent
  }}%</span>
                  </template>
                </td> -->
                <td>{{ row.success_indicator }}</td>
                <template v-if="row.pms_pcr_core_function_data">
                  <template v-if="!row.pms_pcr_core_function_data
                    .not_applicable
                    ">
                    <td>
                      {{ row.pms_pcr_core_function_data.actual }}
                    </td>
                    <td class="text-center">
                      {{ row.pms_pcr_core_function_data.quality }}
                    </td>
                    <td class="text-center">
                      {{
                        row.pms_pcr_core_function_data.efficiency
                      }}
                    </td>
                    <td class="text-center">
                      {{
                        row.pms_pcr_core_function_data.timeliness
                      }}
                    </td>
                    <td class="text-center _text-yellow-700">
                      {{ row.pms_pcr_core_function_data.average }}
                    </td>
                    <td class="text-center">
                      {{ row.pms_pcr_core_function_data.remarks }}
                    </td>
                  </template>
                  <template v-else>
                    <td colspan="6" class="text-center text-blue-700">
                      {{ row.pms_pcr_core_function_data.actual }}
                    </td>
                  </template>
                  <!-- <td></td>
                  <td class="text-center">
                    <Button v-if="!row.pms_pcr_core_function_data
                      .not_applicable
                      " label="Edit" icon="bi bi-pencil" class="p-button-sm p-button-text p-2 m-1"
                            @click="edit_accomplishment(row)" />
                    <Button v-else label="Edit" icon="bi bi-pencil" class="p-button-sm p-button-text p-2 m-1"
                            @click="edit_not_applicable(row)" />
                    <Button label="Clear" icon="bi bi-arrow-counterclockwise"
                            class="p-button-sm p-button-text p-button-warning p-2 m-1"
                            @click="confirm_accomplishment_reset(row)" />
                  </td> -->
                </template>
                <template v-else>
                  <td colspan="8" class="text-center">
                    <!-- <Button label="Add Accomplishment" class="p-button-text p-button-small p-button-raised w-4 p-1"
                            @click="add_accomplishment(row)"></Button>
                    <Button label="Not Applicable"
                            class="p-button-danger p-button-small p-button-raised w-4 mt-2 ml-3 p-1"
                            @click="not_applicable(row)"></Button> -->
                  </td>
                </template>
              </tr>
            </template>
            <tr v-if="rows.length < 1">
              <td class="p-5 bg-gray-300" colspan="11" style="text-align: center">
                No records found!
              </td>
            </tr>
            <!-- core function end -->




























            <tr style="background:#f7f70026;">
              <td colspan="8"><b>Support Function</b></td>

              <td style="display:none"></td>
              <td style="display:none"></td>
            </tr>
            <tr>
              <td style="width:25%">Attendance to LGU Activities = 2 %</td>
              <td style="width:25%">80% of LGU Activities attended </td>
              <td style="display:none"></td>
              <td style="display:none"></td>
              <td style="">100% (3/3) LGU Activities attended.</td>
              <td style=""></td>
              <td style="">5</td>
              <td style=""></td>
              <td>0.1</td>
              <td></td>
            </tr>

            <tr>
              <td style="width:25%">Attendance during Monday Morning Program = 2 %</td>
              <td style="width:25%">80% of Monday Morning Program attended</td>
              <td style="display:none"></td>
              <td style="display:none"></td>
              <td style="">100% (20/20) of Monday Morning Program attended</td>
              <td style=""></td>
              <td style="">5</td>
              <td style=""></td>
              <td>0.1</td>
              <td></td>
            </tr>

            <tr>
              <td style="width:25%">Attendance to Regular Staff Meeting = 2 %</td>
              <td style="width:25%">80% of regular staff meeting attended</td>
              <td style="display:none"></td>
              <td style="display:none"></td>
              <td style="">100% (3/3) of regular staff meeting attended</td>
              <td style=""></td>
              <td style="">5</td>
              <td style=""></td>
              <td>0.1</td>
              <td></td>
            </tr>

            <tr>
              <td style="width:25%">Submission of IPCR = 1 %</td>
              <td style="width:25%">Submitted on or before the date required</td>
              <td style="display:none"></td>
              <td style="display:none"></td>
              <td style="">Submitted on or before July 14, 2023</td>
              <td style=""></td>
              <td style=""></td>
              <td style="">5</td>
              <td>0.05</td>
              <td></td>
            </tr>

            <tr>
              <td style="width:25%">Submission of DTR = 1 %</td>
              <td style="width:25%">Submitted on or before the 5th day of the succeeding month</td>
              <td style="display:none"></td>
              <td style="display:none"></td>
              <td style="">Submitted on or before the 5th day of the succeeding month</td>
              <td style=""></td>
              <td style=""></td>
              <td style="">5</td>
              <td>0.05</td>
              <td></td>
            </tr>

            <tr>
              <td style="width:25%">Wearing of prescribed Uniform or ID = 2 %</td>
              <td style="width:25%">100% compliant</td>
              <td style="display:none"></td>
              <td style="display:none"></td>
              <td style="">100% compliant to wearing of proper uniform.</td>
              <td style=""></td>
              <td style="">5</td>
              <td style=""></td>
              <td>0.1</td>
              <td></td>
            </tr>

            <tr>
              <td style="width:25%">Rating on Attendance = 5 %</td>
              <td style="width:25%">Based on CSC Standards </td>
              <td style="display:none"></td>
              <td style="display:none"></td>
              <td style="">10 applied leaves during then semester.</td>
              <td style=""></td>
              <td style="">3</td>
              <td style=""></td>
              <td>0.15</td>
              <td></td>
            </tr>

            <tr>
              <td style="width:25%">Rating on Punctuality = 5 %</td>
              <td style="width:25%">Based on CSC Standards</td>
              <td style="display:none"></td>
              <td style="display:none"></td>
              <td style="">4-6 times of tardiness per month.</td>
              <td style=""></td>
              <td style="">3</td>
              <td style=""></td>
              <td>0.15</td>
              <td></td>
            </tr>

          </tbody>
        </table>
        <!-- strat and core function end -->



        <!-- summary start -->

        <table class="mt-2" style="width: 100%;">
          <tbody>
            <tr style="font-size:12px;background:#f7f70026">
              <td colspan="2">
                <p style="font-size:9px">SUMMARYOF RATING</p>
              </td>
              <td>
                <p style="font-size:9px;text-align:center">TOTAL</p>
              </td>
              <td colspan="3">
                <p style="font-size:9px">Final Numerical Rating</p>
              </td>
              <td colspan="2">
                <p style="font-size:9px">Final Adjectival Rating</p>
              </td>

            </tr>
            <tr>
              <td>Strategic Objectives</td>
              <td>Total Weight Allocation:20%</td>
              <td>
                <b>0.93</b>
              </td>
              <td colspan="3" rowspan="3">
                <b> 4.51</b>
              </td>
              <td colspan="2" rowspan="3">
                <b>OUTSTANDING</b>
              </td>

            </tr>
            <tr>
              <td>Core Functions</td>
              <td>Total Weight Allocation:60%</td>
              <td>
                <b>2.78</b>
              </td>

            </tr>
            <tr>
              <td>Support Functions</td>
              <td>Total Weight Allocation:20%</td>
              <td>
                <b>0.8</b>
              </td>

            </tr>
            <tr>
              <td colspan="8" style="font-size:12px">
                <b>Comments and Recommendation For Development Purpose</b>

                :
                <br>
                <p style="margin-left: 25px">

                </p>
                <br>
                <br>
                <br>
              </td>

            </tr>
          </tbody>
        </table>
        <!-- summary end -->

        <!-- final signatories start -->

        <table class="mt-2" style="width: 100%;">
          <thead style="background-color: #00ff0024;">
            <tr>
              <td style="font-size:10px">Discussed: Date:</td>
              <td style="font-size:10px">Assessed by: Date:</td>
              <td style="font-size:10px"></td>
              <td style="font-size:10px">Reviewed: Date:</td>
              <td style="font-size:10px">Final Rating by:</td>
              <td style="font-size:10px">Date:</td>
            </tr>
            <tr>
              <td style="text-align:center;width:16%; vertical-align:bottom;">
                <span style="font-size:11px"><b>FRANZ JOSHUA ALCAZAR VALENCIA </b></span>
              </td>
              <td style="text-align:center;width:16%">
                <p style="font-size:9px; margin-bottom: 25px;"> I certified that I discussed my assessment of the
                  performance with the employee:</p>

                <p style="font-size:11px"><b>VERONICA GRACE P. MIRAFLOR</b></p>
              </td>
              <td style="text-align:center;width:16%">
                <p style="font-size:9px; margin-bottom: 25px;">I certified that I discussed with the employee how they are
                  rated:</p>

                <p style="font-size:11px;"><b>VERONICA GRACE P. MIRAFLOR</b></p>
              </td>
              <td style="text-align:center;width:16%;vertical-align:bottom;">
                <span style="font-size:9px;">
                  (all PMT member will sign)
                </span>
              </td>
              <td style="text-align:center;width:16%;vertical-align:bottom;">
                <span style="font-size:11px"><b>JOHN T. RAYMOND, JR.</b></span>
              </td>
              <td style="text-align:center;width:9.2%">
              </td>
            </tr>
            <tr style="font-size:9px">
              <td style="text-align:center;width:16%">Ratee</td>
              <td style="text-align:center;width:16%">Supervisor</td>
              <td style="text-align:center;width:16%">Department Head</td>
              <td style="text-align:center;width:16%"></td>
              <td style="text-align:center;width:16%">Head of Agency</td>
              <td style="text-align:center;width:9.2%"></td>
            </tr>
          </thead>
        </table>
        <!-- final signatories end -->

      </template>
    </Card>
  </div>
</template>
<script>
export default {
  props: {
    form_status: null,
    strategic_function: null,
    rows: null
  },
  components: {
    // AuthLayout,
  },
  data() {
    return {
      current_url: document.location.pathname,
    };
  },
  created() {

  },
  computed: {


  },
  methods: {
    indent(level) {
      var margin = "";
      if (level > 0) {
        margin = "margin-left:" + level * 20 + "px;";
      }
      return margin;
    },
    go_back() {
      window.history.back();
    },
  },

  mounted() {

  },
};
</script>
