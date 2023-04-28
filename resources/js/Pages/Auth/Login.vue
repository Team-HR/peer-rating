<template>
  <breeze-validation-errors class="mb-4" />
  <!-- <div v-if="status" class="alert alert-success mb-4">
    {{ status }}
  </div> -->
  <br>
  <!-- <form >
    <div class=" px-4 py-8 md:px-6 lg:px-8 flex align-items-center justify-content-center">
      <div class="surface-card p-4 shadow-2 border-round w-full lg:w-6">
        <div class="text-center mb-5">
   
          <img src="/favicon.ico" alt="Image" height="50" class="mb-3">
          <div class="text-900 text-3xl font-medium mb-3">Welcome Back</div>
        </div>
        <div>
          <label for="username" class="block text-900 font-medium mb-2">Username</label>
          <InputText id="username" type="text" class="w-full mb-3" v-model="form.username" autocomplete="username"
            required />
          <label for="password" class="block text-900 font-medium mb-2">Password</label>
          <InputText id="password" type="password" class="w-full mb-3" v-model="form.password"
            autocomplete="current-password" required />

          <div class="flex align-items-center justify-content-between mb-6">
            <div class="flex align-items-center">
              <Checkbox id="rememberme1" v-model="form.rememberMe" :binary="true" class="mr-2">
              </Checkbox>
              <label for="rememberme1">Remember me</label>
            </div>
            <a class="font-medium no-underline ml-2 text-blue-500 text-right cursor-pointer">Forgot password?</a>
          </div>
          <Button type="submit" label="Sign In" icon="pi pi-user" class="w-full"
            :class="{ 'opacity-25': form.processing }" :disabled="form.processing"></Button>
        </div>
      </div>
    </div>
  </form> -->

  <div class="wrapper">
    <div class="container">
      <h1>Welcome</h1>
      <form class="form" @submit.prevent="submit">
        <input type="text" placeholder="Username" id="username" v-model="form.username" autocomplete="username">
        <input type="password" placeholder="Password" id="password" v-model="form.password"
          autocomplete="current-password" required>
        <button type="submit" id="login-button">Login</button>
      </form>
    </div>
    <ul class="bg-bubbles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
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
        checked: false,
        rememberMe: false,
      }),
    };
  },
  mounted() {
    const rememberMe = localStorage.getItem('rememberMe');
    if (rememberMe !== null) {
      this.form.rememberMe = rememberMe === 'true';
    }

    const savedUsername = localStorage.getItem('username');
    if (savedUsername !== null) {
      this.form.username = savedUsername;
    }

  },

  watch: {
    'form.rememberMe'(newValue) {
      localStorage.setItem('rememberMe', newValue);
    },

    'form.username'(newValue) {
      if (this.rememberMe) {
        localStorage.setItem('username', newValue);
      } else {
        localStorage.removeItem('username');
      }
    }
  },
  methods: {
    submit() {
      this.form.post("login", {
        onFinish: () => this.form.reset("password"),
      });
    },
  },
};
</script>
<style>
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300);

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-weight: 300;
}

body {
  font-family: 'Source Sans Pro', sans-serif;
  color: white;
  font-weight: 300;
}

body ::-webkit-input-placeholder {
  /* WebKit browsers */
  font-family: 'Source Sans Pro', sans-serif;
  color: white;
  font-weight: 300;
}

body :-moz-placeholder {
  /* Mozilla Firefox 4 to 18 */
  font-family: 'Source Sans Pro', sans-serif;
  color: white;
  opacity: 1;
  font-weight: 300;
}

body ::-moz-placeholder {
  /* Mozilla Firefox 19+ */
  font-family: 'Source Sans Pro', sans-serif;
  color: white;
  opacity: 1;
  font-weight: 300;
}

body :-ms-input-placeholder {
  /* Internet Explorer 10+ */
  font-family: 'Source Sans Pro', sans-serif;
  color: white;
  font-weight: 300;
}

.wrapper {
  background: #50a3a2;
  background: linear-gradient(top left, #50a3a2 0%, #53e3a6 100%);
  background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);
  position: absolute;
  top: 50%;
  left: 0;
  width: 100%;
  height: 100%;
  margin-top: -300px;
  overflow: hidden;
}

.wrapper.form-success .container h1 {
  transform: translateY(85px);
}

.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 80px 0;
  height: 400px;
  text-align: center;
}

.container h1 {
  font-size: 40px;
  transition-duration: 1s;
  transition-timing-function: ease-in- put;
  font-weight: 200;
}

form {
  padding: 20px 0;
  position: relative;
  z-index: 2;
}

form input {
  appearance: none;
  outline: 0;
  border: 1px solid rgba(255, 255, 255, 0.4);
  background-color: rgba(255, 255, 255, 0.2);
  width: 250px;
  border-radius: 3px;
  padding: 10px 15px;
  margin: 0 auto 10px auto;
  display: block;
  text-align: center;
  font-size: 18px;
  color: white;
  -webkit-transition-duration: 0.25s;
  transition-duration: 0.25s;
  font-weight: 300;
}

form input:hover {
  background-color: rgba(255, 255, 255, 0.4);
}

form input:focus {
  background-color: white;
  width: 300px;
  color: #53e3a6;
}

form button {
  appearance: none;
  outline: 0;
  background-color: white;
  border: 0;
  padding: 10px 15px;
  color: #53e3a6;
  border-radius: 3px;
  width: 250px;
  cursor: pointer;
  font-size: 18px;
  transition-duration: 0.25s;

}

form button:hover {
  background-color: #f5f7f9;
}

.bg-bubbles {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}

.bg-bubbles li {
  position: absolute;
  list-style: none;
  display: block;
  width: 40px;
  height: 40px;
  background-color: rgba(255, 255, 255, 0.15);
  bottom: -160px;
  animation: square 25s infinite;
  transition-timing-function: linear;
}

.bg-bubbles li:nth-child(1) {
  left: 10%;
}

.bg-bubbles li:nth-child(2) {
  left: 20%;
  width: 80px;
  height: 80px;
  animation-delay: s;
  animation-duration: 17s;
}

.bg-bubbles li:nth-child(3) {
  left: 25%;
  animation-delay: 4s;

}

.bg-bubbles li:nth-child(4) {
  left: 40%;
  width: 60px;
  height: 60px;
  animation-duration: 22s;
  background-color: rgba(255, 255, 255, 0.25);
}

.bg-bubbles li:nth-child(5) {
  left: 70%;
}

.bg-bubbles li:nth-child(6) {
  left: 80%;
  width: 120px;
  height: 120px;
  animation-delay: 1s;
  background-color: rgba(255, 255, 255, 0.2);
}

.bg-bubbles li:nth-child(7) {
  left: 32%;
  width: 160px;
  height: 160px;
  animation-delay: 7s;
}

.bg-bubbles li:nth-child(8) {
  left: 55%;
  width: 20px;
  height: 20px;
  animation-delay: 15s;
  animation-duration: 40s;
}

.bg-bubbles li:nth-child(9) {
  left: 25%;
  width: 10px;
  height: 10px;
  animation-delay: 2s;
  animation-duration: 40s;
  background-color: rgba(255, 255, 255, 0.3);
}

.bg-bubbles li:nth-child(10) {
  left: 90%;
  width: 160px;
  height: 160px;
  animation-delay: 11s;
}

@keyframes square {
  0% {
    transform: translateY(0);
  }

  100% {
    transform: translateY(-700px) rotate(600deg);
  }
}

@keyframes square {
  0% {
    transform: translateY(0);
  }

  100% {
    transform: translateY(-700px) rotate(600deg);
  }
}
</style>
