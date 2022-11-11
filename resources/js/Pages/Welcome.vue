<template>
  <guest-nav v-if="!$page.props.auth.user"></guest-nav>
  <authed-nav v-else></authed-nav>
    <div class="bodys">
      s
      <div class="cards">        
        <h1 class="core">FOUR CORES OF HR SYSTEM</h1>
        <img src="../Pages/images/Vector.png" alt="">
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
          <Button class=" p-button-info readmore">Read More</Button>
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
             <Button class="p-button-info readmore2">Read More</Button>
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
          <Button class=" p-button-info readmore3">Read More</Button>
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
          <Button class=" p-button-info readmore4">Read More</Button>
        </div>
      </div>
      <div class="rsp">
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
          A strategic for attaching, screening, selecting and onboarding qualified persons based on relative
          qualifications and competence in adherence to the merit, fitness and quality principles
        </div>
      </div>
      <div class="rsp">
        <div class="rsp-1 ">
          <img src="../Pages/images/business-plan.png" alt="" class="img-rsp1">
          <h2 class="rsp-h1 fadeinleft  animation-duration-1000">STRATEGIC PERFORMANCE MANAGEMENT SYSTEM</h2>
          A strategic for attaching, screening, selecting and onboarding qualified persons based on relative
          qualifications and competence in adherence to the merit, fitness and quality principles
        </div>
        <div class="rsp-2">
          <Accordion :active-index="0">
            <AccordionTab v-for="RSP in RSP" :key="RSP.title" :header="RSP.title">
              <p>{{ RSP.content }}</p>
            </AccordionTab>
          </Accordion>
        </div>
      </div>
      <div class="rsp">
        <div class="rsp-1 ">
          <Accordion :active-index="0">
            <AccordionTab v-for="RSP in RSP" :key="RSP.title" :header="RSP.title">
              <p>{{ RSP.content }}</p>
            </AccordionTab>
          </Accordion>
        </div>
        <div class="rsp-2">
          <img src="../Pages/images/mind-mapping.png" alt="" class="img-rsp1">
          <h2 class="rsp-h1 fadeinleft  animation-duration-1000">RECRUITMENT, SELECTION AND PLACEMENT</h2>
          A strategic for attaching, screening, selecting and onboarding qualified persons based on relative
          qualifications and competence in adherence to the merit, fitness and quality principles
        </div>
      </div>


      <div class="rsp">
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
          content: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        },
        {
          title: "Job Application",
          content: "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Consectetur, adipisci velit, sed quia non numquam eius modi."
        },
        {
          title: "Screening",
          content: "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus."
        },
        {
          title: "Job Interview",
          content: "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus."
        },
        {
          title: "Deliberation",
          content: "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus."
        },
        {
          title: "Appointment",
          content: "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus."
        }
      ]

    };
  },
  methods: {
    openBasic() {
      this.displayBasic = true;
    },

    closeBasic() {
      this.displayBasic = false;
    },
  },
  mounted() { },
};
</script>

<style scoped>
.rsp-dion{
  background-color: blue;
}
</style>