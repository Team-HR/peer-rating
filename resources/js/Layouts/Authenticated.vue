<template>
  <navbar class="fixed top-0 left-0 w-full topnav" id="myTopnav">
    <template #links>
      <Button v-for="(item, i) in items" :key="i" @click="$inertia.get(item.to)" class="mx-1"
        :class="is_active_url(item.to) ? 'p-button-raised' : ''" v-tooltip="item.description" :icon="item.icon"
        :label="item.label" />

      <Button href="javascript:void(0);" class="icon" @click="nav_func()" id="buttonNav">
        <i class="pi pi-bars"></i>
      </Button>
    </template>
    <template #right-items>
      <Button class="mr-5 text-white">{{
          `${$page.props.auth.user.username} (${$page.props.auth.user.roles})`
      }}</Button>
      <Button @click="$inertia.post(route('logout'))" class="p-button-danger">
        Logout
      </Button>
    </template>
  </navbar>
  <div class="mx-auto mt-7">
    <slot />
  </div>
</template>
<script>
import Navbar from "@/Components/Navbar.vue";
export default {
  components: {
    Navbar,
  },
  data() {
    return {
      // roles: JSON.parse(this.$page.props.auth.user.roles),
      active_url: this.$inertia.page.url,
      items: [
        {
          label: "Dashboard",
          to: "/dashboard",
          icon: "bi bi-house-heart",
        },
        {
          label: "Employees",
          to: "/employees",
          icon: "bi bi-people",
        },
        {
          icon: "",
          label: "PMS",
          to: "/pms",
          description: "Performance Management System",
          icon: "bi bi-graph-up-arrow",
        },
      ],
    };
  },
  methods: {
    is_active_url(url) {
      const navlink = this.active_url.split("/")[1];
      if (navlink === url.split("/")[1]) {
        return true;
      }
      return false;
    },

    nav_func() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
        console.log(x);
      }
    }
  },

  mounted() {

  }
};
</script>

