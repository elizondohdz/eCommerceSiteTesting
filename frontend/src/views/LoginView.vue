<template>
  <div class="login-container">
    <h1>Login</h1>

    <form @submit.prevent="handleLogin">
      <input
        v-model="email"
        type="email"
        name="email"
        placeholder="Email"
      />

      <input
        v-model="password"
        type="password"
        name="password"
        placeholder="Password"
      />

      <button type="submit">Login</button>
    </form>

    <p v-if="error">{{ error }}</p>
  </div>
</template>

<script>
import { login } from '../services/authService';

export default {
  data() {
    return {
      email: '',
      password: '',
      error: null
    };
  },
  methods: {
    async handleLogin() {
      try {
        const response = await login(this.email, this.password);

        localStorage.setItem('token', response.token);

        this.$router.push('/dashboard');
      } catch (err) {
        this.error = 'Invalid credentials';
      }
    }
  }
};
</script>