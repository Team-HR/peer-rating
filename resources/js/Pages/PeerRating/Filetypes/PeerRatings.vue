<style scoped>
</style>


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
        <span class="uppercase">Peer Rating | Offices in {{ department.name }}</span>
      </template>
      <template #content>
        <form class="mb-5" action="post" @submit.prevent="add_new_office()">
          <!-- <input type="text" v-model="form.name" /> -->
          <InputText
            type="text"
            v-model="form.name"
            placeholder="Add an office"
          />
          <Button :disabled="!form.name" class="ml-2" type="submit">Add</Button>
        </form>

        <template v-for="(office, i) in offices" :key="office.id">
          <Button
            class="p-button-text p-button-raised uppercase m-2"
            icon="pi pi-folder"
            @click="
              $inertia.get(
                `/peer-rating-2022/${department.id}/peer-rating/${office.id}/peers`
              )
            "
            :label="`${i + 1}. ${office.name}`"
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
    department: Object,
    offices: Array,
  },
  components: {
    AuthLayout,
  },
  data() {
    return {
      form: this.$inertia.form({
        department: this.department,
        name: "",
      }),
    };
  },
  methods: {
    history_back() {
      history.back();
    },
    add_new_office() {
      // http://127.0.0.1:8000/peer-rating-2022/2/peer-ratings
      const url = document.location.pathname;
      // console.log(url);
      this.form.post(url, {
        onSuccess: () => this.form.reset(),
      });
    },
  },
  mounted() {
    // console.log(this.offices);
  },
};
</script>
