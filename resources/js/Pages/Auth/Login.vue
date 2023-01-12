<template>
  <breeze-validation-errors class="mb-4" />

  <div v-if="status" class="alert alert-success mb-4">
    {{ status }}
  </div>
  <br>
  <form  @submit.prevent="submit">
    <div class=" px-4 py-8 md:px-6 lg:px-8 flex align-items-center justify-content-center">
    <div class="surface-card p-4 shadow-2 border-round w-full lg:w-6">
      <div class="text-center mb-5">
        <!-- img src="/favicon.ico" alt="Icon" class="mr-2" width="50" /> -->
        <img src="/favicon.ico" alt="Image" height="50" class="mb-3">
        <div class="text-900 text-3xl font-medium mb-3">Welcome Back</div>
      </div>
      <div>
        <label for="username" class="block text-900 font-medium mb-2">Username</label>
        <InputText id="username" type="text" class="w-full mb-3" v-model="form.username" autocomplete="username" required />

        <label for="password" class="block text-900 font-medium mb-2">Password</label>
        <InputText id="password" type="password" class="w-full mb-3" v-model="form.password" autocomplete="current-password" required />

        <div class="flex align-items-center justify-content-between mb-6">
          <div class="flex align-items-center">
            <Checkbox id="rememberme1" :binary="true" v-model="checked" class="mr-2"></Checkbox>
            <label for="rememberme1">Remember me</label>
          </div>
          <a class="font-medium no-underline ml-2 text-blue-500 text-right cursor-pointer">Forgot password?</a>
        </div>  
        <Button type="submit" label="Sign In" icon="pi pi-user" class="w-full" :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"></Button>
      </div>
    </div>
  </div>
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
