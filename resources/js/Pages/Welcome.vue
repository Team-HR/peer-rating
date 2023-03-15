<template>
  <guest-nav v-if="!$page.props.auth.user"></guest-nav>
  <authed-nav v-else></authed-nav>

  <!-- RSP -->

  <div class="grid grid-nogutter surface-section text-800 p-2">
    <div class="col-12 md:col-6 p-6 text-center md:text-left flex  flex-wrap align-items-center fade-in">
      <section>
        <span class="block text-6xl font-bold mb-1">RSP</span>
        <div class="text-4lg text-yellow-500 font-bold mb-3">
          (RECRUITMENT, SELECTION, AND PLACEMENT)
        </div>
        <p class="mt-0 mb-4 text-700 line-height-3">
          A strategy for attraction, screening, selecting and
          onboarding qualified persong based on relative
          qualifications and competence in adherence to the merit,
          fitness and equality principles.
        </p>
        <Button label="Learn More" type="button" class="mr-3 p-button-raised"></Button>
      </section>
    </div>
    <div class="col-12 md:col-6">
      <img src="../Pages/images/36111135.jpg" alt="Image" class="md:ml-auto block md:h-full rsp-Image"
        style="clip-path: polygon(8% 0, 100% 0%, 100% 100%, 0 100%)" />
    </div>
  </div>


  <div class="surface-section px-4 py-8 md:px-6 lg:px-8 text-center">
    <div class="mb-3 font-bold text-3xl">
      <span class="text-900">One Product, </span>
      <span class="text-blue-600">Many Solutions</span>
    </div>
    <div class="text-700 mb-6">
      Ac turpis egestas maecenas pharetra convallis posuere morbi leo
      urna.
    </div>
    <div class="grid">
      <div class="col-12 md:col-4 mb-4 px-5" v-for="rsp in RSP" :key="rsp">
        <span class="p-3 shadow-2 mb-3 inline-block surface-card" style="border-radius: 10px">
          <img :src="rsp.path" style="height: 40px; width: 40px;">
        </span>
        <div class="text-900 text-xl mb-3 font-medium">{{ rsp.title }}</div>
        <span class="text-500 line-height-3">{{ rsp.content }}</span>
      </div>
    </div>
  </div>
  <!-- end RSP -->
  <!-- start SPMS-->
  <div class="grid grid-nogutter row flex-row-reverse surface-50 text-800 p-2">
    <div class="col-12 md:col-6 p-6 text-center md:text-left flex align-items-center fade-in">
      <section>
        <span class="block text-6xl font-bold mb-1 text-orange-500">SPMS</span>
        <div class="text-4lg text-yellow-500 font-bold mb-3">
          (STRATEGIC PERFORMANCE MANAGEMENT SYSTEM)
        </div>
        <p class="mt-0 mb-4 text-700 line-height-3">
          A Mechanism that links employee perfomance with organizational performance to enhance the performance to enhance
          the performance orientation of the compensation system.It ensures that the employee achieves the objectives set
          by the organization and the organization on the other hand achieves the objectives that it has set in its
          strategic plan.
        </p>
        <Button label="Learn More" type="button" class="mr-3 p-button-raised"></Button>
      </section>

    </div>
    <div class="col-12 md:col-6">
      <img src="../Pages/images/36111135.jpg" alt="Image" class="md:ml-auto block md:h-full rsp-Image"
        style="clip-path: polygon(8% 0, 100% 0%, 100% 100%, 0 100%)" />
    </div>
  </div>

  <div class="surface-section px-4 py-8 md:px-6 lg:px-8 text-center">
    <div class="mb-3 font-bold text-3xl">
      <span class="text-900">One Product, </span>
      <span class="text-blue-600">Many Solutions</span>
    </div>
    <div class="text-700 mb-6">
      Ac turpis egestas maecenas pharetra convallis posuere morbi leo
      urna.
    </div>
    <div class="grid">
      <div class="col-12 md:col-4 mb-4 px-5" v-for="spms in SPMS" :key="spms">
        <span class="p-3 shadow-2 mb-3 inline-block surface-card" style="border-radius: 10px">
          <img :src="spms.path" style="height: 40px; width: 40px;">
        </span>
        <div class="text-900 text-xl mb-3 font-medium">{{ spms.title }}</div>
        <span class="text-500 line-height-3">{{ spms.content }}</span>
      </div>
    </div>
  </div>
  <!-- end SPMS -->
  <!-- L and D -->
  <div class="grid grid-nogutter surface-section text-800 p-2">
    <div class="col-12 md:col-6 p-6 text-center md:text-left flex  flex-wrap align-items-center fade-in">
      <section>
        <span class="block text-6xl font-bold mb-1">L AND D</span>
        <div class="text-4lg text-yellow-500 font-bold mb-3">
          (LEARNING AND DEVELOPMENT)
        </div>
        <p class="mt-0 mb-4 text-700 line-height-3">
          An approach that uses competencies as the standards against which employee development needs are assessed and priorities are set against the need of the organization it utilizes competencies as the foundation for designning targeted programs with learning outcomes that targeted programs with learning outcomes that directly link to the competency requirments.
        </p>
        <Button label="Learn More" type="button" class="mr-3 p-button-raised"></Button>
      </section>
    </div>
    <div class="col-12 md:col-6">
      <img src="../Pages/images/36111135.jpg" alt="Image" class="md:ml-auto block md:h-full rsp-Image"
        style="clip-path: polygon(8% 0, 100% 0%, 100% 100%, 0 100%)" />
    </div>
  </div>

  <div class="surface-section px-4 py-8 md:px-6 lg:px-8 text-center">
    <div class="mb-3 font-bold text-3xl">
      <span class="text-900">One Product, </span>
      <span class="text-blue-600">Many Solutions</span>
    </div>
    <div class="text-700 mb-6">
      Ac turpis egestas maecenas pharetra convallis posuere morbi leo
      urna.
    </div>
    <div class="grid">
      <div class="col-12 md:col-4 mb-4 px-5" v-for="ld in LD" :key="ld">
        <span class="p-3 shadow-2 mb-3 inline-block surface-card" style="border-radius: 10px">
          <img :src="ld.path" style="height: 40px; width: 40px;">
        </span>
        <div class="text-900 text-xl mb-3 font-medium">{{ ld.title }}</div>
        <span class="text-500 line-height-3">{{ ld.content }}</span>
      </div>
    </div>
  </div>
  <!-- end LD -->
  <!-- start RR -->
  <div class="grid grid-nogutter row flex-row-reverse surface-50 text-800 p-2">
    <div class="col-12 md:col-6 p-6 text-center md:text-left flex align-items-center fade-in">
      <section>
        <span class="block text-6xl font-bold mb-1 text-orange-500">R and R</span>
        <div class="text-4lg text-yellow-500 font-bold mb-3">
          (REWARDS AND RECOGNITION)
        </div>
        <p class="mt-0 mb-4 text-700 line-height-3">
          A system designed to encourage creatively 
        </p>
        <Button label="Learn More" type="button" class="mr-3 p-button-raised"></Button>
      </section>

    </div>
    <div class="col-12 md:col-6">
      <img src="../Pages/images/36111135.jpg" alt="Image" class="md:ml-auto block md:h-full rsp-Image"
        style="clip-path: polygon(8% 0, 100% 0%, 100% 100%, 0 100%)" />
    </div>
  </div>

  <div class="surface-section px-4 py-8 md:px-6 lg:px-8 text-center">
    <div class="mb-3 font-bold text-3xl">
      <span class="text-900">One Product, </span>
      <span class="text-blue-600">Many Solutions</span>
    </div>
    <div class="text-700 mb-6">
      Ac turpis egestas maecenas pharetra convallis posuere morbi leo
      urna.
    </div>
    <div class="grid">
      <div class="col-12 md:col-4 mb-4 px-5" v-for="spms in SPMS" :key="spms">
        <span class="p-3 shadow-2 mb-3 inline-block surface-card" style="border-radius: 10px">
          <img :src="spms.path" style="height: 40px; width: 40px;">
        </span>
        <div class="text-900 text-xl mb-3 font-medium">{{ spms.title }}</div>
        <span class="text-500 line-height-3">{{ spms.content }}</span>
      </div>
    </div>
  </div>
  <!-- end RR -->
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
      isVisible: false,
      display: true,
      displayBasic: false,
      RSP: [
        {
          path: "./images/publication.gif",
          title: "Publication",
          content:
            "LGU Bayawan shall pubish the vacant positions authorized to be filled and their corresponding qualification standards and plantilla numbers in the CSC Bulletin of Vacant positions in the Government in the CSC website or through other modes of publication.",
        },
        {
          path: "./images/job.gif",
          title: "Job Application",
          content:
            "All interested applicants, including those who are qualified next-in-rank, shall submit their application letter, resume, and all certificates to support their credentials and qualification..",
        },
        {
          path: "./images/metal-detector.gif",
          title: "Screening",
          content:
            "The HRMO shall conduct a preliminary evaluation of the qualification of all candidates. Those initially qualified shall udnergo further assessment, such as written examinations, skill test, interview, and others..",
        },
        {
          path: "./images/job-interview.gif",
          title: "Job Interview",
          content:
            "Selection line-up shall now be deliberated upon during a HRMPSB meeting, on the basis of Education, Training, Experience, and Competency(interview).",
        },
        {
          path: "./images/seminar.gif",
          title: "Deliberation",
          content:
            "HRMPSB shall make a systematic assessment of the competence and qualifications of candidates for appointment to the corresponding level of positions. They shall submit the list of candidates recommended for appointment, specifying the highest five(5) qualified candidates from which the appointing authority shall choose the applicant to be appointed.",
        },
        {
          path: "./images/metal-detector.gif",
          title: "Appointment",
          content:
            "The LCE/Appointing Authority shall assess the merits of HRMPSB's recommendation for appointment. In the exercise of sound discretion, select, in so far as practicable, from among the top five(5) ranking applicants deemed most qualified for appoinment to the vacant position.",
        },
      ],

      SPMS: [
        {
          path: "./images/wedding.gif",
          title: "Performance Planning & Commitment",
          content:
            "This is done all the start of the performance period where heads of offices meet with the supervisors and staff and agree on the outputs that should be accomplished based on the goals/objectives of the organization.During this stage, success indicators are determined. These are performance-level yardsticks consisting of performance measures and performance targets..",
        },
        {
          path: "./images/monitor.gif",
          title: "Performance Monitoring & Coaching",
          content:
            "The responsibility of the supervisor to periodically check the work performance of the subordinate all throughout the performance.",
        },
        {
          path: "./images/rating.gif",
          title: "Performance Review & Evaluation",
          content:
            "All departments shall undergo a department performance review and evaluation. Similarly, employees will undergo an assessment of their accomplishments vis-a-vis their individual targets, which are linked to the department targets specified in their IPCR.",
        },
        {
          path: "./images/publication.gif",
          title: "Performance Rewards & Development Planning",
          content:
            "Both supervisors and employee identify training programs or other development interventions that can improve the employee's competencies and performance.",
        },
      ],

      LD: [
        {
          path: "./images/award.gif",
          title: "Identification of Competency Gap/Training Needs Analysis",
          content:
            "Identify and analyze training needs basod on Competency Gap Analysis and Training Needs Analysis(TNA).",
        },
        {
          path: "./images/publication.gif",
          title: "Learning & Development Plan",
          content:
            "Design on Annual I&D Plan that will address the competency requirement of the organization.",
        },
        {
          path: "./images/publication.gif",
          title: "Determine Target Participants",
          content:
            "Determine Target Participants who will engage/participate on the identified learning and development intervention.",
        },
        
        {
          path: "./images/publication.gif",
          title: "Conduct Training",
          content:
            "The identified participants attend the scheduled training.",
        },
        {
          path: "./images/publication.gif",
          title: "Evaluation",
          content:
            "Obtain information/feedback of the effectiveness of the training/workshop conducted.",
        },
        {
          path: "./images/publication.gif",
          title: "Consolidation",
          content:
            "Integration and evaluation of training feedbacks to assess if target outcomes are achieved.",
        },
      ],

      RR: [
        {
          title: "Identification of Competency Gap/Training Needs Analysis",
          content:
            "Identify and analyze training needs basod on Competency Gap Analysis and Training Needs Analysis(TNA).",
        },
        {
          title: "Learning & Development Plan",
          content:
            "Design on Annual I&D Plan that will address the competency requirement of the organization.",
        },
        {
          title: "Determine Target Participants",
          content:
            "Determine Target Participants who will engage/participate on the identified learning and development intervention.",
        },
        {
          title: "Performance Rewards & Development Planning",
          content:
            "Both supervisors and employee identify training programs or other development interventions that can improve the employee's competencies and performance.",
        },
        {
          title: "Conduct Training",
          content:
            "The identified participants attend the scheduled training.",
        },
        {
          title: "Evaluation",
          content:
            "Obtain information/feedback of the effectiveness of the training/workshop conducted.",
        },
        {
          title: "Consolidation",
          content:
            "Integration and evaluation of training feedbacks to assess if target outcomes are achieved.",
        },
      ],
    };
  },

  created() { },
  methods: {
    openBasic() {
      this.displayBasic = true;
    },

    closeBasic() {
      this.displayBasic = false;
    },
  },
  mounted() {
    window.addEventListener("scroll", this.handleScroll);
    this.handleScroll();
  },
  beforeUnmount() {
    window.removeEventListener("scroll", this.handleScroll);
  },
};
</script>

<style>
.container {
  max-width: 1500px;
  margin: 0 auto;
  padding: 0 15px;
  box-sizing: border-box;
}

.rsp-Image {
  width: 100%;
  max-width: 500px;
  height: auto;
}

.hide {
  opacity: 0;
  transition: opacity 0.5s ease-in-out;
}</style>
