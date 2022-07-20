<template>
  <navbar class="fixed top-0 left-0 w-full">
    <template #links>
      <Button
        v-for="(item, i) in items"
        :key="i"
        @click="$inertia.get(item.to)"
        class="mx-1"
        :class="is_active_url(item.to) ? 'shadow-2' : ''"
      >
        {{ item.label }}
      </Button>
    </template>
    <template #right-items>
      <span class="mr-5 text-white">{{ `${$page.props.auth.user.username} (${$page.props.auth.user.roles})` }}</span>
      <Button @click="$inertia.post(route('logout'))" class="p-button-danger">
        Logout
      </Button>
    </template>
  </navbar>
  <div class="mt-7">
    <!-- {{ roles }} -->
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
          icon: "",
          label: "Dashboard",
          to: "/dashboard",
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
  },
};
</script>