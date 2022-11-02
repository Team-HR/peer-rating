<style scoped>
table,
th,
td {
  font-size: 14px;
  padding: 5px;
  border: 0.5px solid rgb(185, 185, 185);
  border-collapse: collapse;
}
</style>

<template>
  <auth-layout>
    <PmsToolbar />
    <Card class="w-full">
      <template #title>
        <Button
          label="Back"
          class="p-button-sm p-button-raised p-button-text mb-3"
          icon="bi bi-arrow-left"
          @click="go_back()"
        ></Button>
        <br />
        <span class="uppercase"
          ><i class="bi bi-book mr-2"></i> Performance Commitment Review | Support
          Functions</span
        ></template
      >
      <template #subtitle>
        <span class="text-xl"
          >{{ $page.props.auth.user.sys_department_name }} ( {{ period.period }},
          {{ period.year }})</span
        >
        <br />
        Accomplish Support Functions</template
      >
      <template #content>
        <div class="mx-5"></div>
        <!-- Dialogs and Toast start-->
        <ConfirmDialog></ConfirmDialog>
        <Toast />
        <!-- Dialogs and Toast end-->
        <table class="w-full">
          <thead>
            <tr>
              <th class="text-xl">Support Function</th>
              <th class="text-xl">Success Indicator</th>
              <th class="text-xl">Actual Accomplishment</th>
              <th class="text-xl">Q</th>
              <th class="text-xl">E</th>
              <th class="text-xl">T</th>
              <th class="text-xl">A</th>
              <th class="text-xl">Options</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(row, i) in rows" :key="i">
              <td colspan="8">{{row}}</td>
              <!-- <td class="text-lg">{{ row.support_function }}</td>
              <td class="text-lg">{{ row.success_indicator }}</td>
              <template v-if="row.support_func_data_id">
                <td class="text-lg">{{ row.accomplishment }}</td>
                <td class="text-center">{{ row.quality }}</td>
                <td class="text-center">{{ row.efficiency }}</td>
                <td class="text-center">{{ row.timeliness }}</td>
                <td class="text-center">{{ row.average }}</td>
                <td class="text-center">Edit ___ Reset</td>
              </template>
              <template v-else>
                <td colspan="6" class="text-center">
                  <Button
                    label="Add Accomplishment"
                    class="p-button-danger"
                    icon="bi bi-check2-circle"
                    @click="openAddEditModal(row)"
                  />
                </td>
              </template> -->
            </tr>
          </tbody>
        </table>
      </template>
    </Card>

    <Dialog
      header="Add/Edit Accomplishment"
      v-model:visible="addEditModal"
      :modal="true"
      style="width: 1000px"
    >
      <div class="m-2">
        <form @submit.prevent="">
          <h3 class="text-xl">Support Function:</h3>
          <p class="text-xl ml-5">{{ editAccomplishment.support_function }}</p>
          <h3 class="text-xl">Success Indicator:</h3>
          <p class="text-xl ml-5">{{ editAccomplishment.success_indicator }}</p>
          <h3 class="text-xl">Acctual Accomplishment:</h3>
          <Textarea
            v-model="editAccomplishment.accomplishment"
            rows="5"
            style="width: 100%"
            placeholder="Enter actual accomplishment here..."
          />

          <!-- <div class="field" v-if="core_function.quality.length > 0">
            <div class="font-bold">Quality:</div>
            <template v-for="(quality, i) in core_function.quality" :key="i">
              <div v-if="quality">
                <input
                  type="radio"
                  name="quality"
                  :value="5 - i"
                  :id="`quality${i}`"
                  v-model="accomplishment.quality"
                  required
                />
                <label :for="`quality${i}`">{{ `${5 - i} - ${quality}` }}</label>
              </div>
            </template>
          </div> -->
        </form>
      </div>

      <template #footer>
        <Button
          label="No"
          icon="pi pi-times"
          @click="addEditModal = false"
          class="p-button-text"
        />
        <Button
          label="Yes"
          icon="pi pi-check"
          @click="addEditModal = false"
          class="p-button-text"
          autofocus
        />
      </template>
    </Dialog>
  </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";
import PmsToolbar from "@/Layouts/PmsToolbar";

export default {
  props: {
    period: null,
    rows: null,
  },
  components: {
    AuthLayout,
    PmsToolbar,
  },
  data() {
    return {
      current_url: document.location.pathname,
      error: {},
      accomplishment_modal: false,
      not_applicable_modal: false,
      editAccomplishment: this.$inertia.form({
        support_func_data_id: null,
        support_function: null,
        success_indicator: null,
        accomplishment: null,
      }),
      addEditModal: false,
    };
  },
  methods: {
    go_back() {
      // window.history.back();
      var pathname = document.location.pathname;
      pathname = pathname.split("/");
      pathname = `/${pathname[1]}/${pathname[2]}/${pathname[3]}`;
      // console.log(pathname);
      this.$inertia.get(
        pathname,
        {},
        {
          replace: true,
          onSuccess: () => {
            // if (toast) {
            //   this.$toast.add(toast);
            // }
          },
        }
      );
    },

    openAddEditModal(row) {
      this.editAccomplishment.support_func_data_id = row.support_func_data_id;
      this.editAccomplishment.support_function = row.support_function;
      this.editAccomplishment.success_indicator = row.success_indicator;
      this.editAccomplishment.accomplishment = row.accomplishment;

      this.addEditModal = true;
    },
  },
  created() {
    this.$inertia.reload({ only: ["rows"] });
  },
  mounted() {},
};
</script>
