import { createRouter, createWebHistory } from 'vue-router';
import LoginView from '../views/LoginView.vue';
import ProductListView from '../views/ProductListView.vue';
import ProductDetailView from '../views/ProductDetailView.vue';
import CartView from '../views/CartView.vue';
import CheckoutView from '../views/CheckoutView.vue';

const routes = [
  {
    path: '/login',
    component: LoginView
  },
  {
    path: '/dashboard',
    component: {
      template: '<h1>Dashboard</h1>'
    }
  },
  {
    path: '/products',
    name: 'products',
    component: ProductListView
  },
  {
    path: '/products/:id',
    name: 'product-detail',
    component: ProductDetailView
  },
  {
    path: '/cart',
    name: 'cart',
    component: CartView
  },
  {
    path: '/checkout',
    name: 'checkout',
    component: CheckoutView
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;