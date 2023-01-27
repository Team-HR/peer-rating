<style scoped>
table,
th,
td {
  font-size: 14px;
  padding: 20px;
  border: 0.5px solid rgb(185, 185, 185);
  border-collapse: collapse;
}
</style>

<template>
  <auth-layout>
    <Card class="w-full">
      <template #title>
        <Button label="Back" class="p-button-sm p-button-raised p-button-text mb-3" icon="bi bi-arrow-left"
                @click="go_back()"></Button>
        <br />
        <div class="uppercase">
          <i class="bi bi-book mr-2"></i>Individual Rating Scale Matrix
        </div>
      </template>
      <template #subtitle>Individual Rating Scale Matrix</template>
      <template #content>
        <!-- table start -->
        <table class="w-full">
          <thead>
            <tr>
              <th>MFO/PAP</th>
              <th>Success <br />Indicator</th>
              <th>
                Performance <br />
                Measure
              </th>
              <th>Quality</th>
              <th>Efficiency</th>
              <th>Timeliness</th>
            </tr>
          </thead>
          <template v-for="(row, r) in rows" :key="r">
            <!-- if  -->
            <tr v-if="row.rowspan == 0 && row.si_only == false" :class="row.mfo_only ? 'bg-primary-50' : ''">
              <td :colspan="row.mfo_only ? 6 : 1">
                <div :style="indent(row.level)">
                  <span>
                    <strong class="mr-2">{{ row.code }}</strong>
                    {{ row.title }}
                  </span>
                </div>
              </td>
              <template v-if="!row.mfo_only">
                <td>{{ row.success_indicator }}</td>
                <td v-html="performance_measures(row.performance_measures)"></td>
                <td v-html="performance_measure_criteria(row.quality)"></td>
                <td v-html="performance_measure_criteria(row.efficiency)"></td>
                <td v-html="performance_measure_criteria(row.timeliness)"></td>
              </template>
            </tr>
            <tr v-else-if="row.rowspan > 0 && row.si_only == false">
              <td :rowspan="row.rowspan">
                <div :style="indent(row.level)">
                  <span>
                    <strong class="mr-2">{{ row.code }}</strong>
                    {{ row.title }}
                  </span>
                </div>
              </td>
              <td>{{ row.success_indicator }}</td>
              <td v-html="performance_measures(row.performance_measures)"></td>
              <td v-html="performance_measure_criteria(row.quality)"></td>
              <td v-html="performance_measure_criteria(row.efficiency)"></td>
              <td v-html="performance_measure_criteria(row.timeliness)"></td>
            </tr>
            <tr v-else>
              <td>{{ row.success_indicator }}</td>
              <td v-html="performance_measures(row.performance_measures)"></td>
              <td v-html="performance_measure_criteria(row.quality)"></td>
              <td v-html="performance_measure_criteria(row.efficiency)"></td>
              <td v-html="performance_measure_criteria(row.timeliness)"></td>
            </tr>
          </template>
          <tr v-if="rows.length < 1">
            <td class="p-5 bg-gray-300" colspan="8" style="text-align: center">
              No records found!
            </td>
          </tr>
        </table>
        <!-- table end -->
      </template>
    </Card>
  </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";
export default {
  props: {
    auth: null,
    period: null,
    rows: null,
  },
  components: {
    AuthLayout,
  },
  data() {
    return {};
  },
  methods: {
    go_back() {
      // console.log("test");
      window.history.back();
    },
    performance_measures(arr) {
      var html = "";
      if (!arr) return html;
      for (let index = 0; index < arr.length; index++) {
        html += arr[index] + "<br/>";
      }
      return html;
    },
    performance_measure_criteria(arr) {
      var html = "";
      if (!arr) return html;
      for (let index = 0; index < arr.length; index++) {
        if (arr[index]) {
          html += `${5 - index} - ${arr[index]}` + "<br/>";
        }
      }
      return html;
    },
    indent(level) {
      var margin = "";
      if (level > 0) {
        margin = "margin-left:" + level * 20 + "px;";
      }
      return margin;
    },
  },
  mounted() { },
};
</script>


