<template>
  <div>
    <h1>Checkout</h1>

    <div v-if="loading">
      Processing order...
    </div>

    <div v-else-if="success">
      <h2 data-cy="checkout-success">
        Order placed successfully
      </h2>
    </div>

    <div v-else>
      <div
        v-for="item in cart.items"
        :key="item.id"
        data-cy="checkout-item"
      >
        <h3>{{ item.product.name }}</h3>
        <p>Quantity: {{ item.quantity }}</p>
      </div>

      <p data-cy="checkout-total">
        Total: ${{ total }}
      </p>

      <button
        data-cy="place-order-button"
        @click="placeOrder"
      >
        Place Order
      </button>
    </div>

    <div
      v-if="error"
      data-cy="checkout-error"
    >
      {{ error }}
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { getCart } from '../services/cartService';
import { checkout } from '../services/checkoutService';

const cart = ref({
  items: []
});

const total = ref(0);
const loading = ref(false);
const success = ref(false);
const error = ref('');

const fetchCart = async () => {
  const data = await getCart();

  cart.value = data;

  total.value = cart.value.items.reduce((sum, item) => {
    return sum + (item.quantity * item.product.price);
  }, 0);
};

const placeOrder = async () => {
  try {
    loading.value = true;

    await checkout();

    success.value = true;
    cart.value.items = [];
  } catch (err) {
    error.value = err.response?.data?.message || 'Checkout failed';
  } finally {
    loading.value = false;
  }
};

onMounted(fetchCart);
</script>