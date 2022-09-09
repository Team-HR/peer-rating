<template>
  <breeze-validation-errors class="mb-4" />

  <!-- <form @submit.prevent="submit">
    <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" class="form-control shadow-sm" v-model="form.username" required autocomplete="username">
        </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input
        type="password"
        id="password"
        class="form-control shadow-sm"
        v-model="form.password"
        required
        autocomplete="new-password"
      />
    </div>

    <div class="mb-3">
      <label for="password_confirmation" class="form-label"
        >Confirm Password</label
      >
      <input
        type="password"
        id="password_confirmation"
        class="form-control shadow-sm"
        v-model="form.password_confirmation"
        required
        autocomplete="new-password"
      />
    </div>

    <div class="float-end">
      <inertia-link :href="route('login')" class="text-dark"
        >Already registered?</inertia-link
      >
      <button
        type="submit"
        class="btn btn-dark ms-3"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Register
      </button>
    </div>
  </form> -->
<br>
  <form @submit.prevent="submit">
    <Card class="w-max mx-auto mr-8 bg-blue-100 mt-8">
      <template #title> REGISTER </template>
      <template #content>
        <div class="field w-full">
          <label for="username">Username</label>
          <InputText
            class="w-full"
            id="username"
            v-model="form.username"
            autocomplete="username"
            required
            placeholder="Enter a new username..."
          />
        </div>
        <div class="field w-full">
          <label for="password">Password</label>
          <InputText
            class="w-full"
            id="password"
            type="password"
            v-model="form.password"
            autocomplete="new-password"
            placeholder="Enter a new password..."
            required
          />
        </div>
        <div class="field w-full">
          <label for="password_confirmation">Confirm Password</label>
          <InputText
            class="w-full"
            id="password_confirmation"
            type="password"
            v-model="form.password_confirmation"
            autocomplete="new-password"
            placeholder="Confirm the new password..."
            required
          />
        </div>
      </template>
      <template #footer>
        <div class="field">
          <Button
            type="button"
            class="p-button-text mr-2"
            label="Already have an account?"
            @click="$inertia.get('/login')"
          >
          </Button>
          <Button
            type="submit"
            class="p-button-primary"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
            label="Register"
          >
          </Button>
        </div>
      </template>
    </Card>
  </form>
</template>

<script>
import BreezeGuestLayout from "@/Layouts/Guest";
import BreezeValidationErrors from "@/Components/ValidationErrors";

export default {
  layout: BreezeGuestLayout,

  components: {
    BreezeValidationErrors,
  },

  data() {
    return {
      form: this.$inertia.form({
        // name: '',
        username: "",
        password: "",
        password_confirmation: "",
        terms: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("register"), {
        onFinish: () => this.form.reset("password", "password_confirmation"),
      });
    },
  },
};
</script>
