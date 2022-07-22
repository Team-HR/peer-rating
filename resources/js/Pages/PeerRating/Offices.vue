<template>
  <auth-layout>
    <Card class="w-full h-30rem">
      <template #title>
        <span>Peer Rating <i style="color: grey">(Jan-June 2022)</i>:: {{ department }}</span>
      </template>
      <template #content>
        <div class="grid">
          <div class="col" v-for="(filetype, i) in filetypes" :key="i">
            <Card>
              <!-- <template #header>
                <img alt="user header" src="demo/images/usercard.png" />
              </template> -->
              <template #title>{{ filetype.name }}</template>
              <template #content>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Inventore sed consequuntur error repudiandae numquam deserunt
                quisquam repellat libero asperiores earum nam nobis, culpa
                ratione quam perferendis esse, cupiditate neque quas!
              </template>
              <template #footer>
                <Button icon="pi pi-folder" label="Open" />
              </template>
            </Card>
          </div>
        </div>
        <!-- Offices:
        <form method="post" @submit.prevent="create()">
          <input type="text" v-model="form.name" />
          <button type="submit">Add</button>
        </form>
        <br />
        <ol>
          <li v-for="office in offices" :key="office.id">
            <a
              href="#"
              @click="
                $inertia.get(
                  '/peer-rating-2022/' +
                    department_id +
                    '/office/' +
                    office.id +
                    '/files'
                )
              "
            >
              open</a
            >
            {{ office.name }}
          </li>
        </ol> -->
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
          link: "/peer-rating-2022/"+this.department_id
        },
        {
          name: "Section Head Rating",
          link: "/peer-rating-2022/"+this.department_id
        },
        {
          name: "Section Head to Section Head Rating",
          link: "/peer-rating-2022/"+this.department_id
        },
      ],
    };
  },
  methods: {
    create() {
      this.form.post("/peer-rating-2022/" + this.department_id + "/offices", {
        onSuccess: () => this.form.reset("name"),
      });
    },
  },
  mounted() {},
};
</script>
