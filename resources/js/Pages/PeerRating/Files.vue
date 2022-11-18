<style scoped>
.verticalTableHeader {
  writing-mode: vertical-lr;
  transform: rotate(180deg);
}
</style>
<template>
  <auth-layout>
    <PmsToolbar/>
    <Card class="w-full">
      <template #title>
        <Button
          class="p-button-text p-button-sm mr-5"
          icon="pi pi-arrow-left"
          label="Back"
          @click="history_back()"
        ></Button>
        <span class="uppercase"
          >Peer Rating <i style="color: grey">(Jan-June 2022)</i>:: {{ department }}</span
        >
      </template>
      <template #content>
        <div class="grid">
          <div class="col-12 md:col-6 lg:col-3" v-for="(filetype, i) in filetypes" :key="i">
            <Card >
              <!-- <template #header>
                <img alt="user header" src="demo/images/usercard.png" />
              </template> -->
              <template #title>
                <div style="height: 65px">
                  <span class="uppercase text-primary">{{ filetype.name }}</span>
                </div>
              </template>
              <template #content>
                <div style="height: 100px">{{ filetype.description }}</div>
                <Button
                  class="p-button-text p-button-raised"
                  icon="pi pi-folder"
                  label="Open"
                  @click="$inertia.get(filetype.link)"
                />
              </template>
              <template #footer> </template>
            </Card>
          </div>
        </div>

        <Card class="mt-2">
          <template #title>
            <span class="text-primary uppercase">Reports:</span>
          </template>
          <template #content>
            <!-- {{ reports }} -->
            <div v-for="(report, i) in reports" :key="i">
              <DataTable
                class="p-datatable-sm mt-3"
                :value="report.peers"
                showGridlines
                responsiveLayout="scroll"
                autoLayout
              >
                <template #header>
                  <div class="w-full text-center">
                    <span class="text-lg font-bold">{{ report.office }}</span>
                  </div>
                </template>

                <Column class="uppercase" header="#">
                  <template #body="slotProps">
                    {{ slotProps.index + 1 }}
                  </template></Column
                >
                <Column class="uppercase" sortable field="name" header="Name"></Column>
                <Column
                  class="uppercase"
                  field="peer_rating"
                  header="Peer Rating (%)"
                  sortable
                ></Column>
                <Column
                  class="uppercase"
                  field="section_head_rating"
                  header="Section Head (%)"
                  sortable
                ></Column>
                <Column
                  headerStyle="width: 16em"
                  class="uppercase"
                  field="section_head_to_section_head_rating"
                  header="Section Head to Section Head Rating (%)"
                  sortable
                ></Column>
                <Column
                  class="uppercase"
                  field="total_rating"
                  header="Total Average Rating (%)"
                  sortable
                ></Column>
                <!-- <template #footer> Footer </template> -->
              </DataTable>
            </div>
          </template>
        </Card>
      </template>
    </Card>
  </auth-layout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated";
import { Inertia } from "@inertiajs/inertia";
import PmsToolbar from "@/Layouts/PmsToolbar";

export default {
  props: {
    reports: Array,
    department_id: "",
    department: String,
    offices: Array,
  },
  components: {
    AuthLayout,
    PmsToolbar
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
          link: "/pms/peer-rating-2022/" + this.department_id + "/peer-ratings",
        },
        {
          name: "Section Head Rating",
          description:
            "Forms exclusive for supervisors, rating their subordinate's performance rating from the same office",
          link:
            "/pms/peer-rating-2022/" + this.department_id + "/section-head-ratings",
        },
        {
          name: "Section Head to Section Head Rating",
          description:
            "Forms exclusive only for supervisors, rating their co supervisor's performance rating from the same office. Only available if the department has sections.",
          link: "/pms/peer-rating-2022/" + this.department_id + "/sh2sh-rating",
        },
      ],
    };
  },
  methods: {
    history_back() {
      history.back();
    },
    create() {
      this.form.post("/pms/peer-rating-2022/" + this.department_id + "/offices", {
        onSuccess: () => this.form.reset("name"),
      });
    },
  },
  mounted() {
    Inertia.reload({ only: ["reports"] });
  },
};
</script>
