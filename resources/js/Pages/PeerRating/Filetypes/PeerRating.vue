<style scoped>
td {
  padding: 5px;
}

th {
  padding: 5px;
}

.verticalTableHeader {
  writing-mode: vertical-lr;
  transform: rotate(180deg);
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
        <span>Peer Rating:</span>
      </template>
      <template #content>
        <table border="1" style="border-collapse: collapse">
          <tr>
            <th>#</th>
            <th style="border-right: 2px solid black">Name</th>
            <th
              style="border-right: 2px solid black"
              colspan="5"
              v-for="(num, i) in 4"
              :key="i"
            >
              {{ `Criteria ${i}` }}
            </th>
          </tr>
          <tr>
            <th></th>
            <th style="border-right: 2px solid black"></th>
            <template v-for="(num, i) in 4" :key="i">
              <td
                class="verticalTableHeader"
                v-for="(measure, s) in measures"
                :key="s"
                :style="s == 4 ? 'border-right: 2px solid black' : ''"
              >
                {{ measure }}
              </td>
            </template>
          </tr>
          <tr v-for="employee in employees" :key="employee.id">
            <td>{{ employee.id }}</td>
            <td style="border-right: 2px solid black">{{ employee.name }}</td>
            <template v-for="(num, i) in 4" :key="i">
              <td
                v-for="(value, s) in radio_values"
                :key="s"
                :style="s == 4 ? 'border-right: 2px solid black' : ''"
              >
                <RadioButton
                  :name="`check_${employee.id}_${i}_${value}`"
                  :value="25 - s * 5"
                  v-model="employee.scores[i]"
                />
                <!-- :value="{ criteria: i, score: value }" -->
              </td>
            </template>
          </tr>
        </table>

        <Button class="m-2" @click="submit()">Submit</Button>
      </template>
    </Card>
  </auth-layout>
</template>


<script>
import AuthLayout from "@/Layouts/Authenticated";

export default {
  props: {},
  components: {
    AuthLayout,
  },
  data() {
    return {
      form: this.$inertia.form({
        department: "",
      }),
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
      employee_id_ratee: {
        id: 123,
        name: "Franz Joshua A. Valencia",
      },
      employees: [
        {
          id: 123,
          name: "Franz Joshua A. Valencia",
          scores: [],
        },
        {
          id: 163,
          name: "Juan dela Cruz",
          scores: [],
        },
        {
          id: 987,
          name: "Jane Doe",
          scores: [],
        },
      ],
    };
  },
  methods: {
    submit() {
      console.log(JSON.stringify(this.employees));
    },

    history_back() {
      history.back();
    },
  },
  mounted() {},
};
</script>
