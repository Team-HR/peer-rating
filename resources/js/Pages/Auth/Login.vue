<template>
  <breeze-validation-errors class="mb-4" />

  <div v-if="status" class="alert alert-success mb-4">
    {{ status }}
  </div>
<br>
  <form @submit.prevent="submit">
    <Card class=" w-max  mx-auto mt-8 bg-blue-100">
      <template #title> LOGIN </template>
      <template #content>
        <div class="field w-full">
          <label for="username">Username</label>
          <InputText
            class="w-full"
            id="username"
            v-model="form.username"
            autocomplete="username"
            required
          />
        </div>
        <div class="field w-full">
          <label for="password">Password</label>
          <InputText
            class="w-full"
            id="password"
            type="password"
            v-model="form.password"
            autocomplete="current-password"
            required
          />
        </div>

        <div class="field-checkbox">
          <Checkbox id="remember" v-model="form.remember" :binary="true" />
          <label for="remember">Remember me</label>
        </div>
      </template>
      <template #footer>
        <div class="field">
          <Button
            type="submit"
            class="p-button-primary"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
            label="Login"
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

import IButton from "@/Components/Button";
import ILabel from "@/Components/Label";
import IInput from "@/Components/Input";

export default {
  layout: BreezeGuestLayout,

  components: {
    BreezeValidationErrors,
    IButton,
    ILabel,
    IInput,
  },

  props: {
    canResetPassword: Boolean,
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        username: "",
        password: "",
        remember: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("login"), {
        onFinish: () => this.form.reset("password"),
      });
    },
  },
};
</script>
