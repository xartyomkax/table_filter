<template>
  <form class="card auth-card" @submit.prevent="loginHandler">
    <div class="card-content">
      <span class="card-title">Products</span>
      <div class="input-field">
        <input
          id="email"
          type="text"
        >
        <label for="email">Email</label>
        <small class="helper-text invalid">Email</small>
      </div>
      <div class="input-field">
        <input
          id="password"
          type="password"
          class="validate"
        >
        <label for="password">Password</label>
        <small class="helper-text invalid">Password</small>
      </div>
    </div>
    <div class="card-action">
      <div>
        <button
          class="btn waves-effect waves-light auth-submit"
          type="submit"
        >
          Войти
          <i class="material-icons right">send</i>
        </button>
      </div>

      <p class="center">
        Нет аккаунта?
        <router-link to="/register" >Зарегистрироваться</router-link>
      </p>
    </div>
  </form>
</template>

<script>
// import { extend } from 'vee-validate';
// import { required, email, length } from 'vee-validate/dist/rules';

export default {
  name: 'login',
  data: () => ({
    // email: { email, required },
    // password: { required, minLength: minLength(6) },
  }),
  validations: {

  },
  methods: {
    loginHandler() {
      // if (this.$v.$invalid()) {
      //   this.$v.$touch();
      //   return;
      // }
      this.$router.push('/');
    },
  },
};
</script>
