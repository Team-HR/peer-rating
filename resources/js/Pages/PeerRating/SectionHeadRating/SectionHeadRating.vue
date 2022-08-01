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
          >Section Head Rating: {{ office.name }} - {{ section.name }}</span
        >
      </template>
      <template #content>
        <form action="post" @submit.prevent="add_new_peer()">
          <Dropdown
            v-model="form.employee"
            :options="employees"
            optionLabel="full_name"
            placeholder="Add a personnel"
            :filter="true"
            filterPlaceholder="Search name"
          />
          <Button :disabled="!form.employee" class="ml-2" type="submit"
            >Add</Button
          >
        </form>
        <!-- #####################################    TABLE START   ############################################ -->
        <table class="mt-5">
          <tr>
            <th rowspan="2">#</th>
            <td rowspan="2"></td>
            <th class="table-divider" rowspan="2">Name</th>
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
            <!-- <th></th> -->
            <!-- <th></th> -->
            <!-- <th class="table-divider"></th> -->
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
          <tr v-if="ratees.length == 0">
            <td colspan="23" class="text-center">
              Add the subordinates same as listed from the form.
            </td>
          </tr>
          <tr v-for="(ratee, index) in ratees" :key="ratee.id">
            <td>{{ index + 1 }}</td>
            <td>
              <a href="#" @click.prevent="remove_peer(ratee.id)">delete</a>
            </td>
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
                  v-if="is_updating || !is_complete"
                  @click="checked_box(index, i, 25 - s * 5)"
                  class="w-full"
                  :class="is_updating || !is_complete ? 'check' : ''"
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
        <!-- #####################################    TABLE END   ############################################ -->
        <Button
          v-if="!is_updating && is_complete"
          class="m-2 p-button p-button-warning"
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
          v-if="(!is_complete && ratees.length > 0) || is_updating"
          class="m-2"
          @click="submit()"
          icon="pi pi-save"
          label="Save"
        ></Button>

        <Button
          v-if="!is_updating"
          class="m-2 p-button-text"
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
import { Inertia } from "@inertiajs/inertia";
export default {
  props: {
    is_complete: Boolean,
    employees: Array,
    department: Object,
    office: Object,
    section: Object,
    ratees: Array,
  },
  components: {
    AuthLayout,
  },
  data() {
    return {
      is_updating: false,
      current_url: document.location.pathname,
      form: this.$inertia.form({
        employee: {},
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
    };
  },
  methods: {
    add_new_peer() {
      this.form.post(this.current_url, {
        onSuccess: () => this.form.reset(),
      });
    },
    remove_peer(id) {
      // console.log(`${this.current_url}/${id}`);
      this.$inertia.delete(`${this.current_url}/${id}`, {
        onBefore: () => confirm("Are you sure you want to delete this user?"),
      });
    },
    history_back() {
      history.back();
    },
    submit() {
      this.$inertia.patch(this.current_url, this.ratees);
      this.is_updating = false;
    },
    checked_box(index, i, val) {
      if (this.ratees[index][`criteria_${i}`]) {
        this.ratees[index][`criteria_${i}`] = 0;
      } else this.ratees[index][`criteria_${i}`] = val;
    },
  },
  mounted() {
    Inertia.reload({ only: ["ratees"] });
  },
};
</script>
