<template>
  <div
    class="product-card"
    data-cy="product-card"
    @click="goToProduct"
  >
    <h3>{{ product.name }}</h3>
    <p>{{ product.description }}</p>
    <span>${{ product.price }}</span>
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router';

const props = defineProps({
  product: Object
});

const router = useRouter();

const goToProduct = () => {
  router.push(`/products/${props.product.id}`);
};
</script>