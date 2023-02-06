<template>
  <guest-nav v-if="!$page.props.auth.user">


    <div class="bodys">
      <div class="s flex">
        <div data-am-fadeshow="next-prev-navigation autoplay">
          <!-- Radio -->
          <input type="radio" name="css-fadeshow" id="slide-1" />
          <input type="radio" name="css-fadeshow" id="slide-2" />
          <input type="radio" name="css-fadeshow" id="slide-3" />
          <input type="radio" name="css-fadeshow" id="slide-4" />

          <!-- Slides -->
          <div class="fs-slides">
            <div class="fs-slide"
                 style="background-image: url(https://images.unsplash.com/photo-1460500063983-994d4c27756c?crop=entropy&fit=crop&fm=jpg&h=1325&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=2550);">
              <div
                   style="position: absolute; height:auto;width:auto;top: 50%; left: 40%; transform: translate(-50%, -50%); color: white; font-family: sans-serif;  text-shadow: 0 0 20px rgba(0,0,0,0.5);">
                <h1 style="margin-top: 0; margin-bottom: 0.8vw; font-size: 3vw; font-weight: bold;">RECRUITMENT,
                  SELECTION AND PLACEMENT</h1>
                <p style="font-size: 1.5vw; font-weight: 100; margin-top: 0;">A strategy for attracting, screening,
                  selecting and onboarding qualified persons based on relative qualifications and competence in
                  adherance to the merit, fitness and equality principles.
                </p>
                <div id="section1">
                  <Button>Read More</Button>
                </div>

              </div>
            </div>
            <div class="fs-slide"
                 style="background-image: url(https://images.unsplash.com/photo-1440557653082-e8e186733eeb?crop=entropy&fit=crop&fm=jpg&h=1325&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=2500);">
              <div
                   style="position: absolute; height:auto;width:auto;top: 50%; left: 40%; transform: translate(-50%, -50%); color: white; font-family: sans-serif;  text-shadow: 0 0 20px rgba(0,0,0,0.5);">
                <h1 style="margin-top: 0; margin-bottom: 0.8vw; font-size: 3vw; font-weight: bold;">STRATEGIC
                  PERFORMANCE MANAGEMENT SYSTEM</h1>
                <p style="font-size: 1.5vw; font-weight: 100; margin-top: 0;">A mechanism that links employee
                  performance with organizational performance to enhance the performance orientation of the compensatopm
                  system, It ensures that the employee achieves the objectives set by the organization and the
                  organization, on the other hand, achieves the objectives that it has set in its strategic plan.
                </p>
                <Button class="" onclick="document.location='#section2'">Read More</Button>
              </div>
            </div>
            <div class="fs-slide"
                 style="background-image: url(https://images.unsplash.com/photo-1449057528837-7ca097b3520c?crop=entropy&fit=crop&fm=jpg&h=1325&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=2500);">
              <div
                   style="position: absolute; height:auto;width:auto;top: 50%; left: 40%; transform: translate(-50%, -50%); color: white; font-family: sans-serif;  text-shadow: 0 0 20px rgba(0,0,0,0.5);">
                <h1 style="margin-top: 0; margin-bottom: 0.8vw; font-size: 3vw; font-weight: bold;">LEARNING AND
                  DEVELOPMENT</h1>
                <p style="font-size: 1.5vw; font-weight: 100; margin-top: 0;">AAn approach that uses competencies as the
                  standards against which employee development needs are assessed and piorities are set against the need
                  of the organization. It utilizes competencies as the foundation for designning targeted programs with
                  learning outcomes that directly link to the competency requirements.
                </p>
                <Button class="" onclick="document.location='#section3'">Read More</Button>
              </div>
            </div>
            <div class="fs-slide"
                 style="background-image: url(https://images.unsplash.com/photo-1440557653082-e8e186733eeb?crop=entropy&fit=crop&fm=jpg&h=1325&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=2500);">
              <div
                   style="position: absolute; height:auto; width:auto;top: 50%; left: 40%; transform: translate(-50%, -50%); color: white; font-family: sans-serif;  text-shadow: 0 0 20px rgba(0,0,0,0.5);">
                <h1 style="margin-top: 0; margin-bottom: 0.8vw; font-size: 3vw; font-weight: bold;">REWARDS &
                  RECOGNITION</h1>
                <p style="font-size: 1.5vw; font-weight: 100; margin-top: 0;">A system designed to encourage creativity,
                  innovativeness, efficiency, integrity, and productivity in the public service by recognizing and
                  rewarding offcials and employees for their suggestions, inventions, supervisor accomplishments, and
                  other personal efforts with contribute to the efficiency, economy or for other extraordinary acts or
                  services in the public interest.
                </p>
                <Button class="" onclick="document.location='#section1'">Read More</Button>
              </div>
            </div>
          </div>

          <!-- Quick Navigation -->
          <div class="fs-quick-nav">
            <label class="fs-quick-btn" for="slide-1"></label>
            <label class="fs-quick-btn" for="slide-2"></label>
            <label class="fs-quick-btn" for="slide-3"></label>
            <label class="fs-quick-btn" for="slide-4"></label>

          </div>

          <!-- Prev Navigation -->
          <div class="fs-prev-nav">
            <label class="fs-prev-btn" for="slide-1"></label>
            <label class="fs-prev-btn" for="slide-2"></label>
            <label class="fs-prev-btn" for="slide-3"></label>
            <label class="fs-quick-btn" for="slide-4"></label>
          </div>

          <!-- Next Navigation -->
          <div class="fs-next-nav">
            <label class="fs-next-btn" for="slide-1"></label>
            <label class="fs-next-btn" for="slide-2"></label>
            <label class="fs-next-btn" for="slide-3"></label>
            <label class="fs-quick-btn" for="slide-4"></label>
          </div>
        </div>
      </div>
      <!-- <div class="cards w-auto reveal">
      <h1 class="core">FOUR CORES OF HR SYSTEM</h1>
      <img src="../Pages/images/Vector4.png" alt="">
      <div class="card1">
        <img class="img1" src="../Pages/images/cv.png">
        <div>
          <h5 style="text-align: center;font-size: 12px;">RECRUITMENT, SELECTION AND PLACEMENT</h5>
        </div>
        <div>
          <p style="text-align: center; padding: 5px;font-size: 15px;">A strategic for attaching, screening, selecting
            and onboarding qualified persons based on relative qualifications and competence in adherence to the
            merit,
            fitness and quality principles</p>
        </div>
        <Button class=" p-button-info readmore" onclick="document.location='#section1'">Read More</Button>
      </div>
      <div class="card2">
        <img src="../Pages/images/statistics.png" class="img1" alt="">
        <div>
          <h5 style="text-align: center;font-size: 12px;">STRATEGIC PERFORMANCE MANAGEMENT SYSTEM</h5>
        </div>
        <div>
          <p style="text-align: center; padding: 5px;font-size: 15px;">A mechanism that links employee performance
            with
            organizational performance to enhance the performance orientation of the compensation system.It ensures
            that
            the employee achieves the objectives set by the organazation and the organization on the other hand,
            achieves the objectives that it has set in its strategic plan.</p>
        </div>
        <Button class="p-button-info readmore2" onclick="document.location='#section2'">Read More</Button>
      </div>
      <div class="card3">
        <img src="../Pages/images/online-lesson.png" class="img1" alt="">
        <div>
          <h5 style="text-align: center;font-size: 12px;">LEARNING AND DEVELOPMENT</h5>
        </div>
        <div style="top:25px;">
          <p style="text-align: center; padding: 5px;font-size: 15px;">An approach that uses competencies on the
            standards against which employee development needs are assessed and priorities are set againts the need of
            the organization and utilizes competencies as the foundation for designing targeted programs with learning
            outcomes that directly link to the competency requirments.</p>
        </div>
        <Button class=" p-button-info readmore3" onclick="document.location='#section3'">Read More</Button>
      </div>
      <div class="card4">
        <img src="../Pages/images/shield.png" class="img1" alt="">
        <div>
          <h5 style="text-align: center;font-size: 12px;">RECRUITMENT, SELECTION AND PLACEMENT</h5>
        </div>
        <div>
          <p style="text-align: center; padding: 5px;font-size: 15px;">A system designed to encourage creatively
            innovativeness ,effeciency,
            integrety and productivity in the public service by recognizing and rewarding officials and employees for
            thier suggestions, invention, supervisor accomplishments and the economy or other improvements in
            government
            operations in the public interest.</p>
        </div>
        <Button class=" p-button-info readmore4" onclick="document.location='#section4'">Read More</Button>
      </div>
    </div> -->
      <!-- RSP -->
      <div class="rsp reveal section" data-background-color="transparent" id="section1">
        <div class="rsp-1">
          <img class="rsp-img" src="../Pages/images/Vector1.png" alt="">
          <Accordion :active-index="3">
            <AccordionTab v-for="RSP in RSP" :key="RSP.title" :header="RSP.title">
              <p>{{ RSP.content }}</p>
            </AccordionTab>
          </Accordion>
        </div>
        <div class="rsp-2">
          <img src="../Pages/images/human-resources.png" alt="" class="img-rsp1">
          <h2 class="rsp-h1 fadeinleft  animation-duration-1000">RECRUITMENT, SELECTION AND PLACEMENT</h2>
          A strategy for attracting, screening, selecting and onboarding qualified persons based on relative
          qualifications and competence in adherance to the merit, fitness and equality principles.
        </div>
      </div>
      <!-- SPMS -->
      <div class="rsp reveal" id="section2">
        <div class="rsp-1 ">
          <img src="../Pages/images/business-plan.png" alt="" class="img-rsp1">
          <h2 class="rsp-h1 fadeinleft  animation-duration-1000">STRATEGIC PERFORMANCE MANAGEMENT SYSTEM</h2>
          A mechanism that links employee performance with organizational performance to enhance the performance
          orientation of the compensatopm system, It ensures that the employee achieves the objectives set by the
          organization and the organization, on the other hand, achieves the objectives that it has set in its strategic
          plan.
        </div>
        <div class="rsp-2">
          <Accordion :active-index="0">
            <AccordionTab v-for="SPMS in SPMS" :key="SPMS.title" :header="SPMS.title">
              <p>{{ SPMS.content }}</p>
            </AccordionTab>
          </Accordion>
        </div>
      </div>
      <!-- L and D -->
      <div class="rsp reveal" id="section3">
        <div class="rsp-1 ">
          <Accordion :active-index="0">
            <AccordionTab v-for="LD in LD" :key="LD.title" :header="LD.title">
              <p>{{ LD.content }}</p>
            </AccordionTab>
          </Accordion>
        </div>
        <div class="rsp-2">
          <img src="../Pages/images/mind-mapping.png" alt="" class="img-rsp1">
          <h2 class="rsp-h1 fadeinleft  animation-duration-1000">LEARNING AND DEVELOPMENT</h2>
          An approach that uses competencies as the standards against which employee development needs are assessed and
          piorities are set against the need of the organization. It utilizes competencies as the foundation for
          designning targeted programs with learning outcomes that directly link to the competency requirements.
        </div>
      </div>

      <!-- R & R -->
      <div class="rsp reveal" id="section4">
        <img class="rsp-img2" src="../Pages/images/Vector3.png" alt="">
        <div class="rsp-1 ">
          <img src="../Pages/images/trophy.png" alt="" class="img-rsp1">
          <h2 class="rsp-h1 fadeinleft  animation-duration-1000">REWARDS & RECOGNITION</h2>
          A system designed to encourage creativity, innovativeness, efficiency, integrity, and productivity in the
          public service by recognizing and rewarding offcials and employees for their suggestions, inventions,
          supervisor accomplishments, and other personal efforts with contribute to the efficiency, economy or for other
          extraordinary acts or services in the public interest.
        </div>
        <div class="rsp-2">
          <Accordion :active-index="1">
            <AccordionTab v-for="RSP in RSP" :key="RSP.title" :header="RSP.title">
              <p>{{ RSP.content }}</p>
            </AccordionTab>
          </Accordion>
        </div>
      </div>
    </div>

  </guest-nav>
  <authed-nav v-else></authed-nav>

</template>  
<script>
// import "../../css/welcome.min.css";
import GuestNav from "@/Layouts/Guest.vue";
import AuthedNav from "@/Layouts/Authenticated.vue";
import PhotoService from "../Layouts/PhotoService";



export default {
  props: {},
  components: {
    GuestNav,
    AuthedNav,
  },
  data() {
    return {

      display: true,
      displayBasic: false,
      RSP: [
        {

          title: "Publication",
          content: "LGU Bayawan shall pubish the vacant positions authorized to be filled and their corresponding qualification standards and plantilla numbers in the CSC Bulletin of Vacant positions in the Government in the CSC website or through other modes of publication."
        },
        {
          title: "Job Application",
          content: "All interested applicants, including those who are qualified next-in-rank, shall submit their application letter, resume, and all certificates to support their credentials and qualification.."
        },
        {
          title: "Screening",
          content: "The HRMO shall conduct a preliminary evaluation of the qualification of all candidates. Those initially qualified shall udnergo further assessment, such as written examinations, skill test, interview, and others.."
        },
        {
          title: "Job Interview",
          content: "Selection line-up shall now be deliberated upon during a HRMPSB meeting, on the basis of Education, Training, Experience, and Competency(interview)."
        },
        {
          title: "Deliberation",
          content: "HRMPSB shall make a systematic assessment of the competence and qualifications of candidates for appointment to the corresponding level of positions. They shall submit the list of candidates recommended for appointment, specifying the highest five(5) qualified candidates from which the appointing authority shall choose the applicant to be appointed."
        },
        {
          title: "Appointment",
          content: "The LCE/Appointing Authority shall assess the merits of HRMPSB's recommendation for appointment. In the exercise of sound discretion, select, in so far as practicable, from among the top five(5) ranking applicants deemed most qualified for appoinment to the vacant position."
        }
      ],

      SPMS: [
        {
          title: "Performance Planning & Commitment",
          content: "This is done all the start of the performance period where heads of offices meet with the supervisors and staff and agree on the outputs that should be accomplished based on the goals/objectives of the organization.During this stage, success indicators are determined. These are performance-level yardsticks consisting of performance measures and performance targets.."
        },
        {
          title: "Performance Planning & Commitment",
          content: "The responsibility of the supervisor to periodically check the work performance of the subordinate all throughout the performance."
        },
        {
          title: "Performance Review & Evaluation",
          content: "All departments shall undergo a department performance review and evaluation. Similarly, employees will undergo an assessment of their accomplishments vis-a-vis their individual targets, which are linked to the department targets specified in their IPCR."
        },
        {
          title: "Performance Rewards & Development Planning",
          content: "Both supervisors and employee identify training programs or other development interventions that can improve the employee's competencies and performance."
        },

      ],

      LD: [
        {
          title: "Identification of Competency Gap/Training Needs Analysis",
          content: "Identify and analyze training needs basod on Competency Gap Analysis and Training Needs Analysis(TNA)."
        },
        {
          title: "Learning & Development Plan",
          content: "Design on Annual I&D Plan that will address the competency requirement of the organization."
        },
        {
          title: "Determine Target Participants",
          content: "Determine Target Participants who will engage/participate on the identified learning and development intervention."
        },
        {
          title: "Performance Rewards & Development Planning",
          content: "Both supervisors and employee identify training programs or other development interventions that can improve the employee's competencies and performance."
        },
        {
          title: "Conduct Training",
          content: "The identified participants attend the scheduled training."
        },
        {
          title: "Evaluation",
          content: "Obtain information/feedback of the effectiveness of the training/workshop conducted."
        },
        {
          title: "Consolidation",
          content: "Integration and evaluation of training feedbacks to assess if target outcomes are achieved."
        },

      ],

      RR: [
        {
          title: "Identification of Competency Gap/Training Needs Analysis",
          content: "Identify and analyze training needs basod on Competency Gap Analysis and Training Needs Analysis(TNA)."
        },
        {
          title: "Learning & Development Plan",
          content: "Design on Annual I&D Plan that will address the competency requirement of the organization."
        },
        {
          title: "Determine Target Participants",
          content: "Determine Target Participants who will engage/participate on the identified learning and development intervention."
        },
        {
          title: "Performance Rewards & Development Planning",
          content: "Both supervisors and employee identify training programs or other development interventions that can improve the employee's competencies and performance."
        },
        {
          title: "Conduct Training",
          content: "The identified participants attend the scheduled training."
        },
        {
          title: "Evaluation",
          content: "Obtain information/feedback of the effectiveness of the training/workshop conducted."
        },
        {
          title: "Consolidation",
          content: "Integration and evaluation of training feedbacks to assess if target outcomes are achieved."
        },
      ]
    };
  },

  created() {

  },
  methods: {
    openBasic() {
      this.displayBasic = true;
    },

    closeBasic() {
      this.displayBasic = false;
    },
  },
  mounted() {



  },
};

function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}
window.addEventListener("scroll", reveal);




// scroll animation



</script>


<style scoped>

</style>