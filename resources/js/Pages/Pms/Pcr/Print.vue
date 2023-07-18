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
              <td colspan="8"><b>Strategic Function</b></td>
            </tr>
            <tr>
              <td style="width:25%">Organizational Development </td>
              <td style="width:25%">Formulation and Initial Implementation of ICT Training on Agri-Extension Technicians
              </td>
              <td style="width:25%">Formulation and Initial Implementation of ICT Training on Agri-Extension Technicians
              </td>
              <td></td>
              <td></td>
              <td></td>
              <td>4.67</td>
              <td></td>
            </tr>
            <tr style="background:#f7f70026">
              <td colspan="8"><b>Core Function</b> (<b style="color:blue">60 %</b>)</td>
            </tr>
            <tr>
              <td style="padding-left:5;width:25%">H. Administrative Services</td>
              <td style="width:25%"></td>
              <td style="display:none"></td>
              <td style="display:none"></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td style="padding-left:20;width:25%">04. HRIS Development</td>
              <td style="width:25%"></td>
              <td style="display:none"></td>
              <td style="display:none"></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr style="width:25%;">
              <td>
                <div class="segment">

                  <p style="padding-left:35;">
                    <a class="ui black label">
                      <span style="">15 %</span>
                    </a>
                    a. Maintenance of Office Computers
                  </p>
                </div>
              </td>
              <td style="width:25%">100% of computer software and hardware maintained every month.<br>
                <br>
                <br>
              </td>
              <td style="display:none"></td>
              <td style="display:none"> </td>
              <td style="width:25%;"> 95% (19/20) of computer software and hardware maintained every month.<br>
                <br>
              </td>
              <td style=""></td>
              <td style="">4</td>
              <td style="">5</td>
              <td>0.67</td>
              <td></td>
            </tr>
            <tr style="width:25%;">
              <td>
                <div class="segment">

                  <p style="padding-left:35;">
                    <a class="ui black label">
                      <span style="">20 %</span>
                    </a>
                    b. Database Management
                  </p>
                </div>
              </td>
              <td style="width:25%">Database accurately updated everyday.<br>
              </td>
              <td style="display:none"></td>
              <td style="display:none"> </td>
              <td style="width:25%;"> Database accurately updated and backed-up everyday.</td>
              <td style="">5</td>
              <td style=""></td>
              <td style="">5</td>
              <td>1</td>
              <td></td>
            </tr>
            <tr style="width:25%;">
              <td>
                <div class="segment">

                  <p style="padding-left:35;">
                    <a class="ui black label">
                      <span style="">15 %</span>
                    </a>
                    c. IHRIS Development
                  </p>
                </div>
              </td>
              <td style="width:25%">IHRIS accurately developed.</td>
              <td style="display:none"></td>
              <td style="display:none"> </td>
              <td style="width:25%;"> IHRIS accurately developed.<br>
                <br>
              </td>
              <td style="">5</td>
              <td style=""></td>
              <td style=""></td>
              <td>0.75</td>
              <td></td>
            </tr>
            <tr style="width:25%; page-break-after: always !important;">
              <td>
                <div class="segment">

                  <p style="padding-left:35;">
                    <a class="ui black label">
                      <span style="">10 %</span>
                    </a>
                    d. Modules Developed and Deployed
                  </p>
                </div>
              </td>
              <td style="width:25%">100% of modules accurately developed every month.<br>
              </td>
              <td style="display:none"></td>
              <td style="display:none"> </td>
              <td style="width:25%;"> 25% (1/4) of modules accurately developed every month.</td>
              <td style="">5</td>
              <td style="">1</td>
              <td style="">5</td>
              <td>0.36</td>
              <td></td>
            </tr>
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
                <center><b>0.93</b></center>
              </td>
              <td colspan="3" rowspan="3">
                <center><b> 4.51</b></center>
              </td>
              <td colspan="2" rowspan="3">
                <center><b>OUTSTANDING</b></center>
              </td>

            </tr>
            <tr>
              <td>Core Functions</td>
              <td>Total Weight Allocation:60%</td>
              <td>
                <center><b>2.78</b></center>
              </td>

            </tr>
            <tr>
              <td>Support Functions</td>
              <td>Total Weight Allocation:20%</td>
              <td>
                <center><b>0.8</b></center>
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
    data: null,
    form_status: null,
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
    go_back() {
      window.history.back();
    },
  },

  mounted() {

  },
};
</script>
