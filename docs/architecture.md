# Architecture — eCommerce Site Testing Project

## Overview

This project follows a simple client-server architecture designed to support testing at multiple levels.

---

## System Components

### Frontend
- Built with Vue.js
- Handles user interface and interactions
- Communicates with backend via HTTP requests

---

### Backend
- Built with Laravel (REST API)
- Handles business logic
- Manages authentication (JWT)
- Interacts with database

---

### Database
- Stores users, products, carts, and orders

---

## System Flow

1. User interacts with frontend (Vue)
2. Frontend sends HTTP request to backend API
3. Backend processes request and interacts with database
4. Backend returns response (JSON)
5. Frontend updates UI

---

## Authentication Flow

- User logs in with credentials
- Backend validates credentials
- Backend returns JWT token
- Frontend stores token
- Token is sent in Authorization header for protected requests

---

## Testing Architecture

### Unit Tests
- Located within backend and frontend
- Validate internal logic

### Integration Tests
- Located in /tests/integration
- Execute real HTTP requests against API

### E2E Tests
- Located in /tests/e2e
- Simulate real user interactions via browser automation

---

## Deployment (Conceptual)

- Application runs via Docker containers:
  - Backend
  - Frontend
  - Database

- CI/CD pipeline executes tests on every push