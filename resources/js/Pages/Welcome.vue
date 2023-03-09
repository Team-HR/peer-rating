<template>
  <guest-nav v-if="!$page.props.auth.user"></guest-nav>
  <authed-nav v-else></authed-nav>




  <!-- <div class="carousel__article">
    <div class="carousel__nav"><span class="carousel__arrow" id="moveLeft">
        <svg class="carousel__icon" width="24" height="24" viewbox="0 0 24 24">
          <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
        </svg></span><span class="carousel__arrow" id="moveRight">
        <svg class="carousel__icon" width="24" height="24" viewbox="0 0 24 24">
          <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
        </svg></span></div>
    <div class="carousel__article--carousel-item carousel-item--1">
      <div class="carousel-item__image"></div>
      <div class="carousel-item__info">
        <div class="carousel-item__container">
          <h1 class="carousel-item__title">Title for Carousel Article</h1>
          <h2 class="carousel-item__subtitle">30 JANUARI 2019 </h2>
          <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
            accusantium doloremque laudantium, totam rem aperiam.</p><a class="carousel-item__btn" href="#">LIHAT
            SELENGKAPNYA </a>
        </div>
      </div>
    </div>
    <div class="carousel__article--carousel-item carousel-item--2">
      <div class="carousel-item__image"></div>
      <div class="carousel-item__info">
        <div class="carousel-item__container">
          <h2 class="carousel-item__subtitle">The big window </h2>
          <h1 class="carousel-item__title">Minimal window</h1>
          <p class="carousel-item__description">Clear Glass Window With Brown and White Wooden Frame iste natus error
            sit voluptatem accusantium doloremque laudantium.</p><a class="carousel-item__btn" href="#">Read the
            article</a>
        </div>
      </div>
    </div>
    <div class="carousel__article--carousel-item carousel-item--3">
      <div class="carousel-item__image"></div>
      <div class="carousel-item__info">
        <div class="carousel-item__container">
          <h2 class="carousel-item__subtitle">Tropical palms </h2>
          <h1 class="carousel-item__title">Palms</h1>
          <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
            accusantium doloremque laudantium, totam rem aperiam.</p><a class="carousel-item__btn" href="#">Explore
            the palms</a>
        </div>
      </div>
    </div>
    <div class="carousel__article--carousel-itemcarousel-item--4">
      <div class="carousel-item__image"></div>
      <div class="carousel-item__info">
        <div class="carousel-item__container">
          <h2 class="carousel-item__subtitle">Beach </h2>
          <h1 class="carousel-item__title">The beach </h1>
          <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
            accusantium doloremque laudantium, totam rem aperiam.</p><a class="carousel-item__btn" href="#">Explore
            the beach</a>
        </div>
      </div>
    </div>
    <div class="carousel-item carousel-item--5">
      <div class="carousel-item__image"></div>
      <div class="carousel-item__info">
        <div class="carousel-item__container">
          <h2 class="carousel-item__subtitle">The white building </h2>
          <h1 class="carousel-item__title">White building</h1>
          <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
            accusantium doloremque laudantium, totam rem aperiam.</p><a class="carousel-item__btn" href="#">Read the
            article</a>
        </div>
      </div>
    </div>
  </div> -->
  <!-- end carousel -->
  <!-- start body -->
  <!-- RSP -->
  <div class="grid grid-nogutter surface-section text-800">asdasdasdasdasdasd
    <div class="col-12 md:col-6 p-6 text-center md:text-left flex align-items-center ">
      <section>
        <span class="block text-6xl font-bold mb-1">RECRUITMENT,SELECTION</span>
        <div class="text-6xl text-primary font-bold mb-3">AND PLACEMENT</div>
        <p class="mt-0 mb-4 text-700 line-height-3">A strategy for attracting, screening ,selecting and on boarding
          qualifed person based on relative qualifications and competence in adherence to the merit, fitness and equality
          principles.</p>

        <Button label="Learn More" type="button" class="p-button-outlined"></Button>
      </section>
    </div>
    <div class="col-12 md:col-6 overflow-hidden">
      <img src="../Pages/images/welcome-image.jpg" class="md:ml-auto block md:h-full"
        style="clip-path: polygon(8% 0, 100% 0%, 100% 100%, 0 100%)" />
    </div>
  </div>
  <br>
  <!-- SPMS -->
 
  <!-- End RSP -->
  <!-- end body -->

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
  <!-- <div class="rsp reveal section" data-background-color="transparent" id="section1">
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
  </div> -->
  <!-- SPMS -->
  <!-- <div class="rsp reveal" id="section2">
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
  </div> -->
  <!-- L and D -->
  <!-- <div class="rsp reveal" id="section3">
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
  </div> -->

  <!-- R & R -->
  <!-- <div class="rsp reveal" id="section4">
    <img class="rsp-img2" src="../Pages/images/Vector3.png" alt="">
    <div class="rsp-1 ">
      <img src="../Pages/images/trophy.png" alt="" class="img-rsp1">
      <h2 class="rsp-h1 fadeinleft  animation-duration-1000">REWARDS & RECOGNITION</h2>
      A system designed to encourage creativity, innovativeness, efficiency, integrity, and productivity in the public
      service by recognizing and rewarding offcials and employees for their suggestions, inventions, supervisor
      accomplishments, and other personal efforts with contribute to the efficiency, economy or for other extraordinary
      acts or services in the public interest.
    </div>
    <div class="rsp-2">
      <Accordion :active-index="1">
        <AccordionTab v-for="RSP in RSP" :key="RSP.title" :header="RSP.title">
          <p>{{ RSP.content }}</p>
        </AccordionTab>
      </Accordion>
    </div>
  </div> -->
</template>  
<script>
import $ from 'jquery';
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
$(function () {
  setInterval(function () { $("#moveRight").trigger("click"); }, 3000);
  $('.carousel__article--carousel-item').eq(0).addClass('active');
  var total = $('.carousel__article--carousel-item').length;
  var current = 0;
  $('#moveRight').on('click', function () {
    var next = current;
    current = current + 1;
    setSlide(next, current);
  });
  $('#moveLeft').on('click', function () {
    var prev = current;
    current = current - 1;
    setSlide(prev, current);
  });
  function setSlide(prev, next) {
    var slide = current;
    if (next > total - 1) {
      slide = 0;
      current = 0;
    }
    if (next < 0) {
      slide = total - 1;
      current = total - 1;
    }
    $('.carousel__article--carousel-item').eq(prev).removeClass('active');
    $('.carousel__article--carousel-item').eq(slide).addClass('active');
    setTimeout(function () {

    }, 800);


    console.log('current ' + current);
    console.log('prev ' + prev);
  }
});

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
@import url('https://fonts.googleapis.com/css?family=Lato:400,900|Oswald:700');

* {
  box-sizing: border-box;
}

html {
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  display: flex;
  display: -webkit-flex;
  justify-content: center;
  -webkit-justify-content: center;
  align-items: center;
  -webkit-align-items: center;
}

body {
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  display: flex;
  display: -webkit-flex;
  justify-content: center;
  -webkit-justify-content: center;
  align-items: center;
  -webkit-align-items: center;
  background-color: #eaeaea;
}

.carousel__article {
  width: 100%;
  height: 100%;
  display: flex;
  max-width: 900px;
  max-height: 550px;
  overflow: hidden;
  position: relative;
}

.carousel__article--carousel-item {
  visibility: visible;
  display: flex;
  width: 100%;
  height: 100%;
  align-items: center;
  justify-content: flex-end;
  -webkit-align-items: center;
  -webkit-justify-content: flex-end;
  position: relative;
  background-color: #fff;
  flex-shrink: 0;
  -webkit-flex-shrink: 0;
  position: absolute;
  z-index: 0;
  transition: 0.6s all linear;
}

.carousel-item__info {
  height: 100%;
  display: flex;
  justify-content: center;
  flex-direction: column;
  display: -webkit-flex;
  -webkit-justify-content: center;
  -webkit-flex-direction: column;
  order: 1;
  left: 0;
  margin: auto;
  padding: 0 40px;
  width: 40%;
}

.carousel-item__image {
  width: 60%;
  height: 100%;
  order: 2;
  align-self: flex-end;
  flex-basis: 60%;
  -webkit-order: 2;
  -webkit-align-self: flex-end;
  -webkit-flex-basis: 60%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  transform: translateX(100%);
  transition: 0.6s all ease-in-out;
}

.carousel-item__subtitle {
  font-family: 'Open Sans', sans-serif;
  letter-spacing: 0.3px;
  font-size: 0.7em;
  text-transform: uppercase;
  margin-top: 10px;
  color: #7e7e7e;
  font-weight: 900;
  transform: translateY(25%);
  opacity: 0;
  visibility: hidden;
  transition: 0.4s all ease-in-out;
}

.carousel-item__title {
  margin: 15px 0 0 0;
  font-family: 'Oswald', sans-serif;
  font-size: 30px;
  letter-spacing: 0.3px;
  font-weight: 700;
  color: #2c2c2c;
  transform: translateY(25%);
  opacity: 0;
  visibility: hidden;
  transition: 0.6s all ease-in-out;
}

.carousel-item__description {
  transform: translateY(25%);
  opacity: 0;
  visibility: hidden;
  transition: 0.6s all ease-in-out;
  margin-top: 35px;
  font-family: 'Lato', sans-serif;
  font-size: 1em;
  color: #7e7e7e;
  line-height: 22px;
  margin-bottom: 35px;
}

.carousel-item--1 .carousel-item__image {
  background-image: url('https://images.pexels.com/photos/1194420/pexels-photo-1194420.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
}

.carousel-item--2 .carousel-item__image {
  background-image: url('https://images.pexels.com/photos/921294/pexels-photo-921294.png?auto=compress&cs=tinysrgb&h=750&w=1260');
}

.carousel-item--3 .carousel-item__image {
  background-image: url('https://images.pexels.com/photos/92733/pexels-photo-92733.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260');
}

.carousel-item--4 .carousel-item__image {
  background-image: url('https://images.pexels.com/photos/1008732/pexels-photo-1008732.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260');
}

.carousel-item--5 .carousel-item__image {
  background-image: url('https://images.pexels.com/photos/1029614/pexels-photo-1029614.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');
}

.carousel-item__btn {
  width: 35%;
  color: #2c2c2c;
  font-family: 'Lato', sans-serif;
  letter-spacing: 0.2px;
  font-size: 11px;
  text-transform: uppercase;
  margin: 0;
  width: 35%;
  font-weight: 700;
  text-decoration: none;
  transform: translateY(25%);
  opacity: 0;
  visibility: hidden;
  transition: 0.6s all ease-in-out;
}

.carousel-item__btn:hover {
  text-decoration: none;
  color: inherit;
}

.carousel-item__btn:after {
  font-family: "Material Icons";
  content: "\e5cc";
  vertical-align: middle;
}

.carousel__nav {
  position: absolute;
  right: 0;
  z-index: 2;
  background-color: #fff;
  bottom: 0;
}

.carousel__icon {
  display: inline-block;
  vertical-align: middle;
  width: 16px;
  fill: #5d5d5d;
}

.carousel__arrow {
  cursor: pointer;
  display: inline-block;
  padding: 11px 15px;
  position: relative;
}

.carousel__arrow:nth-child(1):after {
  content: '';
  right: -3px;
  position: absolute;
  width: 1px;
  background-color: #b0b0b0;
  height: 14px;
  top: 50%;
  margin-top: -7px;
}

.active {
  z-index: 1;
  display: flex;
  visibility: visible;
}

.active .carousel-item__subtitle,
.active .carousel-item__title,
.active .carousel-item__description,
.active .carousel-item__btn {
  transform: translateY(0);
  opacity: 1;
  transition: 0.6s all ease-in-out;
  visibility: visible;
}

.active .carousel-item__image {
  transition: 0.6s all ease-in-out;
  transform: translateX(0);
}
</style>