<style scoped>
table,
th,
td {
  padding: 2px;
  border: 0.5px solid black;
  border-collapse: collapse;
}

.table-divider {
  border-right: 3px solid black;
}

.verticalTableHeader {
  writing-mode: vertical-lr;
  transform: rotate(180deg);
}

.check:hover {
  background-color: rgb(197, 227, 247);
}
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
        <span class="uppercase"
          >SECTION HEAD RATER | {{ `${rater.full_name}` }}
          <i class="text-gray-500">({{ department.name }})</i></span
        >
      </template>
      <template #content>
        <!-- ############################   TABLE START   ############################# -->
        <table>
          <tr>
            <th>#</th>
            <th class="table-divider">Name</th>
            <th
              class="table-divider"
              colspan="5"
              v-for="(num, i) in 4"
              :key="i"
            >
              {{ `Criteria ${i}` }}
            </th>
          </tr>
          <tr>
            <th></th>
            <th class="table-divider"></th>
            <template v-for="(num, i) in 4" :key="i">
              <td
                class="verticalTableHeader"
                v-for="(measure, s) in measures"
                :key="s"
                :class="s == 4 ? 'table-divider' : ''"
              >
                {{ measure }}
              </td>
            </template>
          </tr>
          <!-- ################    ratees    ################### -->
          <tr
            v-for="(ratee, index) in ratees"
            :key="ratee.id"
            :class="rater.id == ratee.id ? 'bg-gray-300' : ''"
          >
            <td>{{ index + 1 }}</td>
            <td class="table-divider">
              {{ ratee.full_name }}
            </td>
            <template v-for="(no, i) in 4" :key="i">
              <td
                v-for="(value, s) in radio_values"
                :key="s"
                :class="s == 4 ? 'table-divider ' : ''"
              >
                <div
                  v-if="rater.id != ratee.id && (is_updating || !is_complete)"
                  @click="checked_box(index, i, 25 - s * 5)"
                  class="w-full"
                  :class="
                    rater.id != ratee.id && (is_updating || !is_complete)
                      ? 'check'
                      : ''
                  "
                  style="height: 20px; text-align: center"
                >
                  <i
                    v-if="25 - s * 5 == ratee[`criteria_${i}`]"
                    class="pi pi-check text-primary-500"
                  ></i>
                </div>
                <div
                  v-else
                  class="w-full"
                  style="height: 20px; text-align: center"
                >
                  <i
                    v-if="25 - s * 5 == ratee[`criteria_${i}`]"
                    class="pi pi-check"
                  ></i>
                </div>
              </td>
            </template>
          </tr>
        </table>
        <!-- ############################   TABLE END   ############################# -->

        <!-- v-if="!is_complete && ratees.length > 1" -->
        <Button
          v-if="!is_updating && is_complete"
          class="m-2"
          @click="is_updating = true"
          icon="pi pi-key"
          label="Unlock"
        ></Button>
        <Button
          v-if="is_updating && is_complete"
          class="p-button-danger m-2"
          @click="is_updating = false"
          icon="pi pi-times"
          label="Cancel"
        ></Button>
        <Button
          v-if="(!is_complete && ratees.length > 1) || is_updating"
          class="m-2"
          @click="submit()"
          icon="pi pi-save"
          label="Save"
        ></Button>

        <Button
          v-if="!is_updating"
          class="m-2"
          @click="history_back()"
          icon="pi pi-arrow-left"
          label="Back"
        ></Button>
      </template>
    </Card>
  </auth-layout>
</template>


<script>
import AuthLayout from "@/Layouts/Authenticated";

export default {
  props: {
    is_complete: Boolean,
    rater: Object,
    ratees: Array,
    department: Object,
  },
  components: {
    AuthLayout,
  },
  data() {
    return {
      is_updating: false,
      current_url: document.location.pathname,
      measures: [
        "Outstanding",
        "Very Satisfactory",
        "Satisfactory",
        "Needs Improvement",
        "Poor",
      ],
      radio_values: [
        "outstanding",
        "very_satisfactory",
        "satisfactory ",
        "needs_improvement",
        "poor",
      ],
    };
  },
  methods: {
    submit() {
      // console.log(this.current_url);
      this.$inertia.post(this.current_url, this.ratees);
      this.is_updating = false;
    },
    checked_box(index, i, val) {
      if (this.ratees[index][`criteria_${i}`]) {
        this.ratees[index][`criteria_${i}`] = 0;
      } else this.ratees[index][`criteria_${i}`] = val;
    },
    history_back() {
      history.back();
    },
  },

};
</script>
