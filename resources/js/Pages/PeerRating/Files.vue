<template>
  <auth-layout>
    <Card class="w-full h-30rem">
      <template #title>
        <Button
          class="p-button-text p-button-sm mr-5"
          icon="pi pi-arrow-left"
          label="Back"
          @click="history_back()"
        ></Button>
        <span class="uppercase"
          >Peer Rating <i style="color: grey">(Jan-June 2022)</i>::
          {{ department }}</span
        >
      </template>
      <template #content>
        <div class="grid">
          <div class="col" v-for="(filetype, i) in filetypes" :key="i">
            <Card style="min-height: 201px">
              <!-- <template #header>
                <img alt="user header" src="demo/images/usercard.png" />
              </template> -->
              <template #title>
                <span class="uppercase">{{ filetype.name }}</span>
              </template>
              <template #content>
                <div style="min-height: 74px">{{ filetype.description }}</div>
              </template>
              <template #footer>
                <Button
                  class="p-button-text p-button-raised"
                  icon="pi pi-folder"
                  label="Open"
                  @click="$inertia.get(filetype.link)"
                />
              </template>
            </Card>
          </div>
        </div>
      </template>
    </Card>
  </auth-layout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated";

export default {
  props: {
    department_id: "",
    department: String,
    offices: Array,
  },
  components: {
    AuthLayout,
  },
  data() {
    return {
      form: this.$inertia.form({
        department_id: this.department_id,
        name: "",
      }),
      filetypes: [
        {
          name: "Peer Rating",
          description:
            "Forms for rating performance of every co-worker in an office.",
          link: "/peer-rating-2022/" + this.department_id + "/peer-ratings",
        },
        {
          name: "Section Head Rating",
          description:
            "Forms exclusive for supervisors, rating their subordinate's performance rating from the same office",
          link:
            "/peer-rating-2022/" + this.department_id + "/section-head-ratings",
        },
        {
          name: "Section Head to Section Head Rating",
          description:
            "Forms exclusive only for supervisors, rating their co supervisor's performance rating from the same office. Only available if the department has sections.",
          link: "/peer-rating-2022/" + this.department_id + "/sh2sh-rating",
        },
      ],
    };
  },
  methods: {
    history_back() {
      history.back();
    },
    create() {
      this.form.post("/peer-rating-2022/" + this.department_id + "/offices", {
        onSuccess: () => this.form.reset("name"),
      });
    },
  },
  mounted() {},
};
</script>
