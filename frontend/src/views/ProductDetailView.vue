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
  </div>

  <div v-else>
    Product not found
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import { getProductById } from '../services/productService';

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

onMounted(fetchProduct);
</script>