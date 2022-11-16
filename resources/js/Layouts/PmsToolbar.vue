<template>
  <Toolbar class="mb-3 bg-blue-50 w-full">
    <template #start>
      <h3 class="mr-3 uppercase">
        <i class="bi bi-graph-up-arrow mr-2"></i> Performance Management System
      </h3>
      <div class="pl-4 grid">
        <template v-for="(item, i) in items" :key="i">
          <Button
            class="mr-2"
            :class="is_active_url(item.href) ? 'p-button-raised' : 'p-button-text '"
            :icon="item.icon"
            :label="item.title"
            @click="$inertia.get(item.href)"
          />
        </template>
      </div>
    </template>

    <template #end>
      <!-- <Button icon="pi pi-search" class="mr-2" />
        <Button icon="pi pi-calendar" class="p-button-success mr-2" />
        <Button icon="pi pi-times" class="p-button-danger" /> -->
    </template>
  </Toolbar>
</template>
<script>
export default {
  props: {
    auth: null,
  },
  data() {
    return {
      active_url: this.$inertia.page.url,
      items: null,
    };
  },
  methods: {
    initialize_items() {
      var items = [
        {
          title: "PCR",
          href: "/pms/pcr",
          description: "",
          icon: "bi bi-input-cursor-text",
        },
        {
          title: "iMatrix",
          href: "/pms/irsm",
          description: "",
          icon: "bi bi-person-lines-fill",
        },
        {
          title: "Review",
          href: "/pms/rpc",
          description: "",
          icon: "bi bi-list-check",
        },
        {
          title: "PMT",
          href: "/pms/pmt",
          description: "",
          icon: "bi bi-braces-asterisk",
        },
      ];

      if (this.$page.props.auth.user.roles) {
        if (this.$page.props.auth.user.roles.includes("rsm")) {
          items.push({
            title: "Matrix",
            href: "/pms/rsm",
            description: "",
            icon: "bi bi-book",
          });
        }
      }

      if (this.$page.props.auth.user.roles) {
        if (this.$page.props.auth.user.roles.includes("prating")) {
          items.push({
            title: "Peer Rating 2022",
            href: "/pms/peer-rating-2022",
            description: "",
            icon: "bi bi-person-bounding-box",
          });
        }
      }

      this.items = items;
    },

    is_active_url(url) {
      const navlink = this.active_url.split("/")[2];
      if (navlink === url.split("/")[2]) {
        return true;
      }
      return false;
    },
  },
  created() {
    this.initialize_items();
  },
};
</script>
