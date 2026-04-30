<template>
  <div>
    <h1>Your Cart</h1>

    <div v-if="loading">
      Loading cart...
    </div>

    <div v-else>
      <div
        v-for="item in cart.items"
        :key="item.id"
        data-cy="cart-item"
      >
        <h3>{{ item.product.name }}</h3>
        <p>Quantity: {{ item.quantity }}</p>

        <button
          data-cy="remove-item-button"
          @click="handleRemove(item.id)"
        >
          Remove
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { getCart, removeFromCart } from '../services/cartService';

const cart = ref({
  items: []
});

const loading = ref(true);

const fetchCart = async () => {
  try {
    cart.value = await getCart();
  } finally {
    loading.value = false;
  }
};

const handleRemove = async (itemId) => {
  await removeFromCart(itemId);
  await fetchCart();
};

onMounted(fetchCart);
</script>