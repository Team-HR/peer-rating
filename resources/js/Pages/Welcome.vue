<template>
  <guest-nav v-if="!$page.props.auth.user"></guest-nav>
  <authed-nav v-else></authed-nav>




 

  <div class="bodys">
    <div class="carousel">
    <div class="slides">
      <img src="../Pages/images/1613477375284-01.jpeg" alt="slide image" class="slide">
      <img src="../Pages/images/20170905182728_IMG_5474-01-01.jpeg" alt="slide image" class="slide">
      <img src="../Pages/images/DSC_6185-01-02.jpeg" alt="slide image" class="slide">
    </div>
    <div class="controls">
      <div class="control prev-slide">&#9668;</div>
      <div class="control next-slide">&#9658;</div>
    </div>
  </div>
    <div class="cards w-auto reveal" >
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
    </div>
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
        <h2 class="rsp-h1 fadeinleft  animation-duration-1000">STRATEGIC PERFORMANCE MANAGEMENT SYSTEM</h2>
        A strategic for attaching, screening, selecting and onboarding qualified persons based on relative
        qualifications and competence in adherence to the merit, fitness and quality principles
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
   

    // carousel
    const delay = 6000; //ms

    const slides = document.querySelector(".slides");
    const slidesCount = slides.childElementCount;
    const maxLeft = (slidesCount - 1) * 100 * -1;

    let current = 0;

    function changeSlide(next = true) {
      if (next) {
        current += current > maxLeft ? -100 : current * -1;
      } else {
        current = current < 0 ? current + 100 : maxLeft;
      }

      slides.style.left = current + "%";
    }

    let autoChange = setInterval(changeSlide, delay);
    const restart = function () {
      clearInterval(autoChange);
      autoChange = setInterval(changeSlide, delay);
    };

    // Controls
    document.querySelector(".next-slide").addEventListener("click", function () {
      changeSlide();
      restart();
    });

    document.querySelector(".prev-slide").addEventListener("click", function () {
      changeSlide(false);
      restart();
    });
    // end of carousel

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