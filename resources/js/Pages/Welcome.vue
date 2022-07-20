<template>
  <guest-nav v-if="!$page.props.auth.user"></guest-nav>
  <authed-nav v-else></authed-nav>
  <div>
    <Card v-if="false" style="width: 90%; margin: auto; margin-top: 20px" class="h-full">
      <template #header>
        <img src="" height="400" />
      </template>
      <template #title>
        {{ `Integrated HRIS`.toUpperCase() }}
      </template>
      <template #subtitle> {{ `LGU Bayawan City` }} </template>
      <template #content>
        <div>
          Integrated HRIS stands for "Integrated Human Resource Information
          System". It aims to automate and link the four core system processes
          of human resource management and development, namely:
          <ol>
            <li>Recruitment, Selection, and Placement (RSP),</li>
            <li>Learning and Development (L&D),</li>
            <li>Performance Management (PM), and</li>
            <li>Rewards and Recognition (R&R)</li>
          </ol>
        </div>
      </template>
      <template #footer> </template>
    </Card>
  </div>
</template>

<script>
// Layouts
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