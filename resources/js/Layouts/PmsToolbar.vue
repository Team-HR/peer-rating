<template>
  <Toolbar class="mb-3 bg-orange-100">
    <template #start>
      <h3 class="mr-3 uppercase">
        <i class="bi bi-graph-up-arrow mr-2"></i> Performance Management System
      </h3>

      <Button
        v-for="(item, i) in items"
        :key="i"
        class="mr-2"
        :class="is_active_url(item.href) ? 'p-button-raised' : 'p-button-text '"
        :icon="item.icon"
        :label="item.title"
        @click="$inertia.get(item.href)"
      >
        <!-- <i class="pi pi-check mr-2"></i>
          <span>{{ tool.title }}</span> -->
      </Button>
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
  data() {
    return {
      active_url: this.$inertia.page.url,
      items: [
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
        {
          title: "Matrix",
          href: "/pms/rsm",
          description: "",
          icon: "bi bi-book",
        },
      ],
    };
  },
  methods: {
    is_active_url(url) {
      const navlink = this.active_url.split("/")[2];
      if (navlink === url.split("/")[2]) {
        return true;
      }
      return false;
    },
  },
};
</script>