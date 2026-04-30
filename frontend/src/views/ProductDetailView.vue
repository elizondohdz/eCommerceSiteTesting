<template>
  <div v-if="loading">
    Loading product...
  </div>

  <div v-else-if="product">
    <h1 data-cy="product-name">{{ product.name }}</h1>
    <p data-cy="product-description">
      {{ product.description }}
    </p>
    <span data-cy="product-price">
      ${{ product.price }}
    </span>
    <button
      data-cy="add-to-cart-button"
      @click="handleAddToCart"
    >
      Add to Cart
    </button>
  </div>

  <div v-else>
    Product not found
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import { getProductById } from '../services/productService';
import { addToCart} from '../services/cartService';

const route = useRoute();

const product = ref(null);
const loading = ref(true);

const fetchProduct = async () => {
  try {
    product.value = await getProductById(route.params.id);
  } catch {
    product.value = null;
  } finally {
    loading.value = false;
  }
};

const handleAddToCart = async () => {
  await addToCart(product.value.id);
}

onMounted(fetchProduct);
</script>