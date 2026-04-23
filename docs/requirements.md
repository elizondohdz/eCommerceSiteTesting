# 📋 Requirements — eCommerce SDET Project

## Overview

This project is a simplified eCommerce application focused on demonstrating:

- Generation of API's
- Testing strategies 
- Automation practices.

---

## Features (MVP Scope)

- User Authentication (JWT)
- Product Catalog
- Shopping Cart
- Checkout (simulated)

---

## User Stories

### Authentication

**User Story**  
As a user, I want to log in so I can access my account.

**Acceptance Criteria**
- Valid credentials → login successful
- Invalid credentials → error message
- JWT token is returned on success
- Protected endpoints require valid token

---

### Product Catalog

**User Story**  
As a user, I want to view available products.

**Acceptance Criteria**
- User can see a list of products
- User can view product details
- API returns correct product data

---

### Shopping Cart

**User Story**  
As a user, I want to add products to a cart.

**Acceptance Criteria**
- User can add a product to cart
- User can remove a product
- Cart persists per user session

---

### Checkout (Simulated)

**User Story**  
As a user, I want to complete a purchase.

**Acceptance Criteria**
- User can checkout with items in cart
- Checkout fails if cart is empty
- Order is created successfully