<template>
  <guest-nav v-if="!$page.props.auth.user"></guest-nav>
  <authed-nav v-else></authed-nav>

  <div>
    <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active cc">
          <img
            src="images/a.jpg"
            class="active opacity-70 cch"
            alt="image-a"
            style="width: 100%"
          />
        </div>
        <div class="carousel-item cc">
          <img
            src="images/b.jpg"
            class="opacity-70 cch"
            alt="image-b"
            style="width: 100%"
          />
        </div>
        <div class="carousel-item cc">
          <img
            src="images/c.jpg"
            class="opacity-70 cch"
            alt="image-c"
            style="width: 100%"
          />
        </div>
        <div class="carousel-item cc">
          <img
            src="images/d.jpg"
            class="opacity-70 cch"
            alt="image-d"
            style="width: 100%"
          />
        </div>
      </div>

      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselControls"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselControls"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div class="hrm-title">
      <strong>HUMAN RESOURCE MANAGEMENT & DEVELOPMENT</strong>
    </div>

    <br /><br /><br /><br /><br />

    <div class="container" id="rsp">
      <div class="row">
        <div class="col">
          <p class="display-1">R S P</p>
          <br />
          <p class="display-6">RECRUITMENT, SELECTION, AND PLACEMENT</p>
        </div>
        <div class="col-8">
          <p class="lead">
            A strategy for attracting, screening, selecting and onboarding
            qualified persons based on relative qualifications and competence in
            adherance to the merit, fitness and equality principles.
          </p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item bg-yellow-light-1">
              <strong>Publication:</strong>&nbsp;LGU Bayawan shall pubish the
              vacant positions authorized to be filled and their corresponding
              qualification standards and plantilla numbers in the CSC Bulletin
              of Vacant positions in the Government in the CSC website or
              through other modes of publication.
            </li>
            <li class="list-group-item bg-yellow-light-2">
              <strong>Job Application:</strong>&nbsp;All interested applicants,
              including those who are qualified next-in-rank, shall submit their
              application letter, resume, and all certificates to support their
              credentials and qualification.
            </li>
            <li class="list-group-item bg-yellow-light-3">
              <strong>Screening:</strong>&nbsp;The HRMO shall conduct a
              preliminary evaluation of the qualification of all candidates.
              Those initially qualified shall udnergo further assessment, such
              as written examinations, skill test, interview, and others.
            </li>
            <li class="list-group-item bg-yellow-light-4">
              <strong>Job Interview:</strong>&nbsp;Selection line-up shall now
              be deliberated upon during a HRMPSB meeting, on the basis of
              Education, Training, Experience, and Competency(interview).
            </li>
            <li class="list-group-item bg-yellow-light-5">
              <strong>Deliberation:</strong>&nbsp; HRMPSB shall make a
              systematic assessment of the competence and qualifications of
              candidates for appointment to the corresponding level of
              positions. They shall submit the list of candidates recommended
              for appointment, specifying the highest five(5) qualified
              candidates from which the appointing authority shall choose the
              applicant to be appointed.
            </li>
            <li class="list-group-item bg-yellow-light-6">
              <strong>Appointment:</strong>&nbsp;The LCE/Appointing Authority
              shall assess the merits of HRMPSB's recommendation for
              appointment. In the exercise of sound discretion, select, in so
              far as practicable, from among the top five(5) ranking applicants
              deemed most qualified for appoinment to the vacant position.
            </li>
          </ul>
        </div>
      </div>
    </div>

    <br /><br /><br /><br />

    <div class="container" id="spms">
      <div class="row">
        <div class="col">
          <p class="display-1">SPMS</p>
          <br />
          <p class="display-6">STRATEGIC PERFORMANCE MANAGEMENT SYSTEM</p>
        </div>
        <div class="col-8">
          <p class="lead">
            A mechanism that links employee performance with organizational
            performance to enhance the performance orientation of the
            compensatopm system, It ensures that the employee achieves the
            objectives set by the organization and the organization, on the
            other hand, achieves the objectives that it has set in its strategic
            plan.
          </p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item bg-orange-light-3">
              <strong>Performance Planning & Commitment:</strong>&nbsp;This is
              done all the start of the performance period where heads of
              offices meet with the supervisors and staff and agree on the
              outputs that should be accomplished based on the goals/objectives
              of the organization. During this stage, success indicators are
              determined. These are performance-level yardsticks consisting of
              performance measures and performance targets.
            </li>
            <li class="list-group-item bg-orange-light-4">
              <strong>Performance Monitoring and Coaching:</strong>&nbsp;The
              responsibility of the supervisor to periodically check the work
              performance of the subordinate all throughout the performance.
            </li>
            <li class="list-group-item bg-orange-light-5">
              <strong>Performance Review & Evaluation:</strong>&nbsp;All
              departments shall undergo a department performance review and
              evaluation. Similarly, employees will undergo an assessment of
              their accomplishments vis-a-vis their individual targets, which
              are linked to the department targets specified in their IPCR.
            </li>
            <li class="list-group-item bg-orange-light-6">
              <strong>Performance Rewards & Development Planning:</strong
              >&nbsp;Both supervisors and employee identify training programs or
              other development interventions that can improve the employee's
              competencies and performance.
            </li>
          </ul>
        </div>
      </div>
    </div>

    <br /><br /><br /><br />

    <div class="container" id="ld">
      <div class="row">
        <div class="col">
          <p class="display-1">L & D</p>
          <br />
          <p class="display-6">LEARNING AND DEVELOPMENT</p>
        </div>
        <div class="col-8">
          <p class="lead">
            An approach that uses competencies as the standards against which
            employee development needs are assessed and piorities are set
            against the need of the organization. It utilizes competencies as
            the foundation for designning targeted programs with learning
            outcomes that directly link to the competency requirements.
          </p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item bg-green-light-1">
              <strong
                >Identification of Competency Gap/Training Needs
                Analysis:</strong
              >&nbsp;Identify and analyze training needs basod on Competency Gap
              Analysis and Training Needs Analysis(TNA).
            </li>
            <li class="list-group-item bg-green-light-2">
              <strong>Learning & Development Plan:</strong>&nbsp;Design on
              Annual I&D Plan that will address the competency requirement of
              the organization.
            </li>
            <li class="list-group-item bg-green-light-3">
              <strong>Determine Target Participants:</strong>&nbsp;Determine
              Target Participants who will engage/participate on the identified
              learning and development intervention.
            </li>
            <li class="list-group-item bg-green-light-4">
              <strong>Conduct Training:</strong>&nbsp;The identified
              participants attend the scheduled training.
            </li>
            <li class="list-group-item bg-green-light-5">
              <strong>Evaluation:</strong>&nbsp; Obtain information/feedback of
              the effectiveness of the training/workshop conducted.
            </li>
            <li class="list-group-item bg-green-light-6">
              <strong>Consolidation:</strong>&nbsp;Integration and evaluation of
              training feedbacks to assess if target outcomes are achieved.
            </li>
          </ul>
        </div>
      </div>
    </div>

    <br /><br /><br /><br />

    <div class="container" id="rr">
      <div class="row">
        <div class="col">
          <p class="display-1">R & R</p>
          <br />
          <p class="display-6">Rewards and Recognition</p>
        </div>
        <div class="col-8">
          <p class="lead">
            A system designed to encourage creativity, innovativeness,
            efficiency, integrity, and productivity in the public service by
            recognizing and rewarding offcials and employees for their
            suggestions, inventions, supervisor accomplishments, and other
            personal efforts with contribute to the efficiency, economy or for
            other extraordinary acts or services in the public interest.
          </p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item bg-blue-light-4">
              <strong>Nomination:</strong>&nbsp;Each department submits
              nominations for outstanding employees.
            </li>
            <li class="list-group-item bg-blue-light-5">
              <strong>Praise Reviews Qualification:</strong>&nbsp;Screening of
              nominations based on given criteria/qualifications.
            </li>
            <li class="list-group-item bg-blue-light-6">
              <strong>Conduct Interview:</strong>&nbsp;PRAISE committee members
              interview qualified nominees.
            </li>
            <li class="list-group-item bg-blue-light-7">
              <strong>Conduct Evaluation:</strong>&nbsp;Uses star-rating in
              evaluating nominees, interview peers, supervisors/department heads
              and clients for verification.
            </li>
            <li class="list-group-item bg-blue-light-8">
              <strong>Assess Results:</strong>&nbsp;Consolidates evaluation to
              conferment of awards.
            </li>
            <li class="list-group-item bg-blue-light-9">
              <strong>Recognition:</strong>&nbsp;Conferment of awards and to
              outstanding employees.
            </li>
          </ul>
        </div>
      </div>
    </div>

    <br /><br /><br /><br />

    <div
      class="container text-center display-2 animate__animated animate__fadeIn"
      id="summary"
    >
      SUMMARY
    </div>

    <br /><br /><br />

    <div class="container text-center">
      <div class="row">
        <div class="col">
          <div class="animate__animated animate__fadeIn">
            <p class="display-6 text-center">R S P</p>
            <p class="h5 text-center">RECRUITMENT, SELECTION, AND PLACEMENT</p>
            <p class="text-center lead main-text">
              A strategy for attracting, screening, selecting and onboarding
              qualified persons based on relative qualifications and competence
              in adherance to the merit, fitness and equality principles
            </p>
          </div>
          <div
            class="accordion animate__animated animate__zoomIn"
            id="accordion1"
          >
            <div class="accordion-item bg-yellow-light-1">
              <h2 class="accordion-header" id="headingOne">
                <button
                  class="accordion-button collapsed bg-yellow-light-1"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a1collapseOne"
                  aria-expanded="false"
                  aria-controls="collapseOne"
                >
                  <i class="bi bi-1-circle h5"></i>&nbsp;&nbsp;<strong
                    >Publication</strong
                  >
                </button>
              </h2>
              <div
                id="a1collapseOne"
                class="accordion-collapse collapse"
                aria-labelledby="headingOne"
                data-bs-parent="#accordion1"
              >
                <div class="accordion-body">
                  LGU Bayawan shall pubish the vacant positions authorized to be
                  filled and their corresponding qualification standards and
                  plantilla numbers in the CSC Bulletin of Vacant positions in
                  the Government in the CSC website or through other modes of
                  publication.
                </div>
              </div>
            </div>
            <div class="accordion-item bg-yellow-light-2">
              <h2 class="accordion-header" id="headingTwo">
                <button
                  class="accordion-button collapsed bg-yellow-light-2"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a1collapseTwo"
                  aria-expanded="false"
                  aria-controls="collapseTwo"
                >
                  <i class="bi bi-2-circle h5"></i>&nbsp;&nbsp;<strong
                    >Job Application</strong
                  >
                </button>
              </h2>
              <div
                id="a1collapseTwo"
                class="accordion-collapse collapse"
                aria-labelledby="headingTwo"
                data-bs-parent="#accordion1"
              >
                <div class="accordion-body">
                  All interested applicants, including those who are qualified
                  next-in-rank, shall submit their application letter, resume,
                  and all certificates to support their credentials and
                  qualification.
                </div>
              </div>
            </div>
            <div class="accordion-item bg-yellow-light-3">
              <h2 class="accordion-header" id="headingThree">
                <button
                  class="accordion-button collapsed bg-yellow-light-3"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a1collapseThree"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  <i class="bi bi-3-circle h5"></i>&nbsp;&nbsp;<strong
                    >Screening</strong
                  >
                </button>
              </h2>
              <div
                id="a1collapseThree"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordion1"
              >
                <div class="accordion-body">
                  The HRMO shall conduct a preliminary evaluation of the
                  qualification of all candidates. Those initially qualified
                  shall udnergo further assessment, such as written
                  examinations, skill test, interview, and others.
                </div>
              </div>
            </div>
            <div class="accordion-item bg-yellow-light-4">
              <h2 class="accordion-header" id="headingFour">
                <button
                  class="accordion-button collapsed bg-yellow-light-4"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a1collapseFour"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  <i class="bi bi-4-circle h5"></i>&nbsp;&nbsp;<strong
                    >Job Interview</strong
                  >
                </button>
              </h2>
              <div
                id="a1collapseFour"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordion1"
              >
                <div class="accordion-body">
                  Selection line-up shall now be deliberated upon during a
                  HRMPSB meeting, on the basis of Education, Training,
                  Experience, and Competency(interview).
                </div>
              </div>
            </div>
            <div class="accordion-item bg-yellow-light-5">
              <h2 class="accordion-header" id="headingFive">
                <button
                  class="accordion-button collapsed bg-yellow-light-5"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a1collapseFive"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  <i class="bi bi-5-circle h5"></i>&nbsp;&nbsp;<strong
                    >Deliberation</strong
                  >
                </button>
              </h2>
              <div
                id="a1collapseFive"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordion1"
              >
                <div class="accordion-body">
                  HRMPSB shall make a systematic assessment of the competence
                  and qualifications of candidates for appointment to the
                  corresponding level of positions. They shall submit the list
                  of candidates recommended for appointment, specifying the
                  highest five(5) qualified candidates from which the appointing
                  authority shall choose the applicant to be appointed.
                </div>
              </div>
            </div>
            <div class="accordion-item bg-yellow-light-6">
              <h2 class="accordion-header" id="headingSix">
                <button
                  class="accordion-button collapsed bg-yellow-light-6"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a1collapseSix"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  <i class="bi bi-6-circle h5"></i>&nbsp;&nbsp;<strong
                    >Appointment</strong
                  >
                </button>
              </h2>
              <div
                id="a1collapseSix"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordion1"
              >
                <div class="accordion-body">
                  The LCE/Appointing Authority shall assess the merits of
                  HRMPSB's recommendation for appointment. In the exercise of
                  sound discretion, select, in so far as practicable, from among
                  the top five(5) ranking applicants deemed most qualified for
                  appoinment to the vacant position.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="animate__animated animate__fadeIn">
            <p class="display-6 text-center">SPMS</p>
            <p class="h5 text-center">
              STRATEGIC PERFORMANCE MANAGEMENT SYSTEM
            </p>
            <p class="text-center lead main-text">
              A mechanism that links employee performance with organizational
              performance to enhance the performance orientation of the
              compensatopm system, It ensures that the employee achieves the
              objectives set by the organization and the organization, on the
              other hand, achieves the objectives that it has set in its
              strategic plan.
            </p>
          </div>
          <div
            class="accordion animate__animated animate__zoomIn"
            id="accordion2"
          >
            <div class="accordion-item bg-orange-light-3">
              <h2 class="accordion-header" id="headingOne">
                <button
                  class="accordion-button collapsed bg-orange-light-3"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a2collapseOne"
                  aria-expanded="false"
                  aria-controls="collapseOne"
                >
                  <i class="bi bi-1-circle h5"></i>&nbsp;&nbsp;<strong
                    >Performance Planning & Commitment</strong
                  >
                </button>
              </h2>
              <div
                id="a2collapseOne"
                class="accordion-collapse collapse"
                aria-labelledby="headingOne"
                data-bs-parent="#accordion2"
              >
                <div class="accordion-body">
                  This is done all the start of the performance period where
                  heads of offices meet with the supervisors and staff and agree
                  on the outputs that should be accomplished based on the
                  goals/objectives of the organization.
                  <br />
                  During this stage, success indicators are determined. These
                  are performance-level yardsticks consisting of performance
                  measures and performance targets.
                </div>
              </div>
            </div>
            <div class="accordion-item bg-orange-light-4">
              <h2 class="accordion-header" id="headingTwo">
                <button
                  class="accordion-button collapsed bg-orange-light-4"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a2collapseTwo"
                  aria-expanded="false"
                  aria-controls="collapseTwo"
                >
                  <i class="bi bi-2-circle h5"></i>&nbsp;&nbsp;<strong
                    >Performance Monitoring and Coaching</strong
                  >
                </button>
              </h2>
              <div
                id="a2collapseTwo"
                class="accordion-collapse collapse"
                aria-labelledby="headingTwo"
                data-bs-parent="#accordion2"
              >
                <div class="accordion-body">
                  The responsibility of the supervisor to periodically check the
                  work performance of the subordinate all throughout the
                  performance.
                </div>
              </div>
            </div>
            <div class="accordion-item bg-orange-light-5">
              <h2 class="accordion-header" id="headingThree">
                <button
                  class="accordion-button collapsed bg-orange-light-5"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a2collapseThree"
                  aria-expanded="false"
                  aria-controls="collapseTwo"
                >
                  <i class="bi bi-3-circle h5"></i>&nbsp;&nbsp;<strong
                    >Performance Review & Evaluation</strong
                  >
                </button>
              </h2>
              <div
                id="a2collapseThree"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordion2"
              >
                <div class="accordion-body">
                  All departments shall undergo a department performance review
                  and evaluation. Similarly, employees will undergo an
                  assessment of their accomplishments vis-a-vis their individual
                  targets, which are linked to the department targets specified
                  in their IPCR.
                </div>
              </div>
            </div>
            <div class="accordion-item bg-orange-light-6">
              <h2 class="accordion-header" id="headingFour">
                <button
                  class="accordion-button collapsed bg-orange-light-6"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a2collapseFour"
                  aria-expanded="false"
                  aria-controls="collapseTwo"
                >
                  <i class="bi bi-4-circle h5"></i>&nbsp;&nbsp;<strong
                    >Performance Rewards & Development Planning</strong
                  >
                </button>
              </h2>
              <div
                id="a2collapseFour"
                class="accordion-collapse collapse"
                aria-labelledby="headingFour"
                data-bs-parent="#accordion2"
              >
                <div class="accordion-body">
                  Both supervisors and employee identify training programs or
                  other development interventions that can improve the
                  employee's competencies and performance.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="animate__animated animate__fadeIn">
            <p class="display-6 text-center">L & D</p>
            <p class="h5 text-center">LEARNING AND DEVELOPMENT</p>
            <p class="text-center lead main-text">
              An approach that uses competencies as the standards against which
              employee development needs are assessed and piorities are set
              against the need of the organization. It utilizes competencies as
              the foundation for designning targeted programs with learning
              outcomes that directly link to the competency requirements.
            </p>
          </div>
          <br />
          <div
            class="accordion animate__animated animate__zoomIn"
            id="accordion3"
          >
            <div class="accordion-item bg-green-light-1">
              <h2 class="accordion-header" id="headingOne">
                <button
                  class="accordion-button collapsed bg-green-light-1"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a3collapseOne"
                  aria-expanded="false"
                  aria-controls="collapseOne"
                >
                  <i class="bi bi-1-circle h5"></i>&nbsp;&nbsp;<strong
                    >Identification of Competency Gap/Training Needs
                    Analysis</strong
                  >
                </button>
              </h2>
              <div
                id="a3collapseOne"
                class="accordion-collapse collapse"
                aria-labelledby="headingOne"
                data-bs-parent="#accordion3"
              >
                <div class="accordion-body">
                  Identify and analyze training needs basod on Competency Gap
                  Analysis and Training Needs Analysis(TNA).
                </div>
              </div>
            </div>
            <div class="accordion-item bg-green-light-2">
              <h2 class="accordion-header" id="headingTwo">
                <button
                  class="accordion-button collapsed bg-green-light-2"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a3collapseTwo"
                  aria-expanded="false"
                  aria-controls="collapseTwo"
                >
                  <i class="bi bi-2-circle h5"></i>&nbsp;&nbsp;<strong
                    >Learning & Development Plan</strong
                  >
                </button>
              </h2>
              <div
                id="a3collapseTwo"
                class="accordion-collapse collapse"
                aria-labelledby="headingTwo"
                data-bs-parent="#accordion3"
              >
                <div class="accordion-body">
                  Design on Annual I&D Plan that will address the competency
                  requirement of the organization.
                </div>
              </div>
            </div>
            <div class="accordion-item bg-green-light-3">
              <h2 class="accordion-header" id="headingThree">
                <button
                  class="accordion-button collapsed bg-green-light-3"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a3collapseThree"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  <i class="bi bi-3-circle h5"></i>&nbsp;&nbsp;<strong
                    >Determine Target Participants</strong
                  >
                </button>
              </h2>
              <div
                id="a3collapseThree"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordion3"
              >
                <div class="accordion-body">
                  Determine Target Participants who will engage/participate on
                  the identified learning and development intervention.
                </div>
              </div>
            </div>
            <div class="accordion-item bg-green-light-4">
              <h2 class="accordion-header" id="headingFour">
                <button
                  class="accordion-button collapsed bg-green-light-4"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a3collapseFour"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  <i class="bi bi-4-circle h5"></i>&nbsp;&nbsp;<strong
                    >Conduct Training</strong
                  >
                </button>
              </h2>
              <div
                id="a3collapseFour"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordion3"
              >
                <div class="accordion-body">
                  The identified participants attend the scheduled training.
                </div>
              </div>
            </div>
            <div class="accordion-item bg-green-light-5">
              <h2 class="accordion-header" id="headingFive">
                <button
                  class="accordion-button collapsed bg-green-light-5"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a3collapseFive"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  <i class="bi bi-5-circle h5"></i>&nbsp;&nbsp;<strong
                    >Evaluation</strong
                  >
                </button>
              </h2>
              <div
                id="a3collapseFive"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordion3"
              >
                <div class="accordion-body">
                  Obtain information/feedback of the effectiveness of the
                  training/workshop conducted.
                </div>
              </div>
            </div>
            <div class="accordion-item bg-green-light-6">
              <h2 class="accordion-header" id="headingSix">
                <button
                  class="accordion-button collapsed bg-green-light-6"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a3collapseSix"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  <i class="bi bi-6-circle h5"></i>&nbsp;&nbsp;<strong
                    >Consolidation</strong
                  >
                </button>
              </h2>
              <div
                id="a3collapseSix"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordion3"
              >
                <div class="accordion-body">
                  Integration and evaluation of training feedbacks to assess if
                  target outcomes are achieved.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="animate__animated animate__fadeIn">
            <p class="display-6 text-center">R & R</p>
            <p class="h5 text-center">REWARDS & RECOGNITION</p>
            <p class="text-center lead main-text">
              A system designed to encourage creativity, innovativeness,
              efficiency, integrity, and productivity in the public service by
              recognizing and rewarding offcials and employees for their
              suggestions, inventions, supervisor accomplishments, and other
              personal efforts with contribute to the efficiency, economy or for
              other extraordinary acts or services in the public interest.
            </p>
          </div>
          <br />
          <div
            class="accordion animate__animated animate__zoomIn"
            id="accordion4"
          >
            <div class="accordion-item bg-blue-light-4">
              <h2 class="accordion-header" id="headingOne">
                <button
                  class="accordion-button collapsed bg-blue-light-4"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a4collapseOne"
                  aria-expanded="false"
                  aria-controls="collapseOne"
                >
                  <i class="bi bi-1-circle h5"></i>&nbsp;&nbsp;<strong
                    >Nomination</strong
                  >
                </button>
              </h2>
              <div
                id="a4collapseOne"
                class="accordion-collapse collapse"
                aria-labelledby="headingOne"
                data-bs-parent="#accordion4"
              >
                <div class="accordion-body">
                  Each department submits nominations for outstanding employees.
                </div>
              </div>
            </div>
            <div class="accordion-item bg-blue-light-5">
              <h2 class="accordion-header" id="headingTwo">
                <button
                  class="accordion-button collapsed bg-blue-light-5"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a4collapseTwo"
                  aria-expanded="false"
                  aria-controls="collapseTwo"
                >
                  <i class="bi bi-2-circle h5"></i>&nbsp;&nbsp;<strong
                    >Praise Reviews Qualification</strong
                  >
                </button>
              </h2>
              <div
                id="a4collapseTwo"
                class="accordion-collapse collapse"
                aria-labelledby="headingTwo"
                data-bs-parent="#accordion4"
              >
                <div class="accordion-body">
                  Screening of nominations based on given
                  criteria/qualifications.
                </div>
              </div>
            </div>
            <div class="accordion-itembg-blue-light-6">
              <h2 class="accordion-header" id="headingThree">
                <button
                  class="accordion-button collapsed bg-blue-light-6"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a4collapseThree"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  <i class="bi bi-3-circle h5"></i>&nbsp;&nbsp;<strong
                    >Conduct Review</strong
                  >
                </button>
              </h2>
              <div
                id="a4collapseThree"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordion4"
              >
                <div class="accordion-body">
                  PRAISE committee members interview qualified nominees.
                </div>
              </div>
            </div>
            <div class="accordion-item bg-blue-light-7">
              <h2 class="accordion-header" id="headingFour">
                <button
                  class="accordion-button collapsed bg-blue-light-7"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a4collapseFour"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  <i class="bi bi-4-circle h5"></i>&nbsp;&nbsp;<strong
                    >Conduct Evaluation</strong
                  >
                </button>
              </h2>
              <div
                id="a4collapseFour"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordion4"
              >
                <div class="accordion-body">
                  Uses star-rating in evaluating nominees, interview peers,
                  supervisors/department heads and clients for verification.
                </div>
              </div>
            </div>
            <div class="accordion-item bg-blue-light-8">
              <h2 class="accordion-header" id="headingFive">
                <button
                  class="accordion-button collapsed bg-blue-light-8"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a4collapseFive"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  <i class="bi bi-5-circle h5"></i>&nbsp;&nbsp;<strong
                    >Assess Results</strong
                  >
                </button>
              </h2>
              <div
                id="a4collapseFive"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordion4"
              >
                <div class="accordion-body">
                  Consolidates evaluation to conferment of awards.
                </div>
              </div>
            </div>
            <div class="accordion-item bg-blue-light-9">
              <h2 class="accordion-header" id="headingSix">
                <button
                  class="accordion-button collapsed bg-blue-light-9"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#a4collapseSix"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  <i class="bi bi-6-circle h5"></i>&nbsp;&nbsp;<strong
                    >Recognition</strong
                  >
                </button>
              </h2>
              <div
                id="a4collapseSix"
                class="accordion-collapse collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordion4"
              >
                <div class="accordion-body">
                  Conferment of awards and to outstanding employees.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <a href="#" class="float" id="up">
      <h1><i class="bi bi-arrow-up-circle text-gray"></i></h1>
    </a>

    <br /><br /><br />
  </div>
</template>

<script>
import "../../css/welcome.min.css";
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
  mounted() {},
};
</script>

<style scoped>
.main-text {
  overflow-x: hidden;
  height: 350px;
}

.accordion-item {
  border: 0px;
}

.accordion-button:not(.collapsed) {
  color: inherit;
  background: #fff;
}

.accordion-button:not(.collapsed)::after {
  filter: brightness(0%) invert(10%);
}

.box {
  position: absolute;
  top: 38%;
  left: 50%;
  transform: translateX(-50%) translateY(-50%);
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.float {
  position: fixed;
  bottom: 50px;
  right: 50px;
  border-radius: 50px;
  text-align: center;
}

div#spms:hover {
  animation: headShake;
  animation-duration: 1s;
}

div#rsp:hover {
  animation: headShake;
  animation-duration: 1s;
}

div#ld:hover {
  animation: headShake;
  animation-duration: 1s;
}

div#rr:hover {
  animation: headShake;
  animation-duration: 1s;
}

.hrm-title {
  font-size: 90px;
  font-family: custom-font;
  -webkit-text-stroke: 1px black;
  color: white;
  text-shadow: 3px 4px 0 #000, -2px -2px 0 #000, 2px -2px 0 #000,
    -2px 2px 0 #000, 2px 2px 0 #000;
  text-align: center;
  position: absolute;
  top: 57%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.cc {
  height: 100%;
  width: 100%;
  object-fit: contain;
}

.cch {
  max-width: 100%;
  max-height: 100%;
}

#up {
  opacity: 50%;
}

#up:hover {
  opacity: 100%;
}
</style>