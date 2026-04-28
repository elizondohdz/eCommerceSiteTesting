<template>
  <div>
    <h1>Products</h1>

    <div v-if="loading">
      Loading products...
    </div>

    <div v-else>
      <ProductCard
        v-for="product in products"
        :key="product.id"
        :product="product"
      />
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import ProductCard from '../components/ProductCard.vue';
import { getProducts } from '../services/productService';

const products = ref([]);
const loading = ref(true);

const fetchProducts = async () => {
  try {
    products.value = await getProducts();
  } finally {
    loading.value = false;
  }
};

onMounted(fetchProducts);
</script>