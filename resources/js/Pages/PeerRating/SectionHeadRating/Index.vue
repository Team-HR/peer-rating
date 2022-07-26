<template>
  <auth-layout>
    <Card class="w-full">
      <template #title>
        <Button
          class="mr-5 p-button-text p-button-sm"
          icon="pi pi-arrow-left"
          @click="history_back()"
          label="Back"
        ></Button>
        <span class="uppercase"
          >SECTION HEAD RATING | OFFICE SECTIONS IN {{ department.name }}</span
        >
      </template>
      <template #content>
        <form class="mb-5" action="post" @submit.prevent="create()">
          <InputText
            type="text"
            v-model="form.name"
            placeholder="Add an office section"
            class="mr-2"
          />

          <Dropdown
            showClear
            v-model="form.supervisor"
            :options="employees"
            optionLabel="full_name"
            placeholder="Add the supervisor"
            :filter="true"
            filterPlaceholder="Search name"
            class="mr-2"
          />

          <Dropdown
            showClear
            v-model="form.office"
            :options="offices"
            optionLabel="name"
            placeholder="Link to Office (required)"
            :filter="true"
            filterPlaceholder="Search office"
          /> 

          <Button :disabled="!form.name || !form.office" class="ml-2" type="submit">Add</Button>
        </form>

        <template v-for="(section, i) in sections" :key="section.id">
          <Button
            class="p-button-text p-button-raised uppercase m-2"
            icon="pi pi-folder"
            @click="
              $inertia.get(
                `/peer-rating-2022/${department.id}/section-head-rating/${section.id}`
              )
            "
            :label="`${i + 1}. ${section.name}`"
          >
          </Button>
        </template>
      </template>
    </Card>
  </auth-layout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated";

export default {
  props: {
    employees: Array,
    department: Object,
    sections: Array,
    offices: Array,
  },
  components: {
    AuthLayout,
  },
  data() {
    return {
      current_url: document.location.pathname,
      form: this.$inertia.form({
        name: "",
        supervisor: null,
        office: null,
      }),
    };
  },
  methods: {
    create() {
      this.form.post(this.current_url, {
        onSuccess: () => this.form.reset(),
      });
    },

    history_back() {
      history.back();
    },
  },
  mounted() {},
};
</script>
