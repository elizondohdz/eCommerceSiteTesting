<template>
  <div>
    <h1>Checkout</h1>

    <div v-if="loading">
      Processing order...
    </div>

    <div v-else-if="success" data-cy="checkout-success">
      <h2>Order placed successfully</h2>
    </div>

    <div v-else>
      <p>Total: ${{ total }}</p>

      <button @click="placeOrder" data-cy="place-order-button">
        Place Order
      </button>
    </div>

    <div v-if="error">
      {{ error }}
    </div>
  </div>
</template>


<script setup>
import { ref, onMounted } from 'vue';
import { checkout } from '../services/checkoutService';
import { getCart } from '../services/cartService';

const cart = ref([]);
const total = ref(0);
const loading = ref(false);
const success = ref(false);
const error = ref('');

const token = localStorage.getItem('token');

const fetchCart = async () => {
  const response = await getCart(token);

  cart.value = response.items;

  total.value = cart.value.reduce((sum, item) => {
    return sum + item.quantity * item.product.price;
  }, 0);
};

const placeOrder = async () => {
  try {
    loading.value = true;

    await checkout(token);

    success.value = true;
    cart.value = [];
  } catch (err) {
    error.value = err.response?.data?.message || 'Checkout failed';
  } finally {
    loading.value = false;
  }
};

onMounted(fetchCart);
</script>