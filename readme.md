# E2E-Tested eCommerce Site

## Overview

This project is a simplified eCommerce application designed to integrate Laravel Backend, Vue.js frontend, Cypress testing Suite, Github Actions and Docker

The focus is not only on building features, but implementing a robust systems that integrate a testing strategy across multiple layers following the testing pyramid:

- Unit Testing
- Integration / API Testing
- End-to-End Testing

---

## Objectives

- Create a robust and secure API (Laravel)
- Create a scalable frontend with reusable components (Vue)
- Demonstrate a complete testing pyramid implementation
- Validate real-world user flows (authentication, cart, checkout)
- Showcase CI/CD integration and test automation
- Integrate test reporting
- Provide a scalable and maintainable test architecture

---

## Tech Stack

### Backend
- Laravel (REST API)
- JWT Authentication

### Frontend
- Vue.js

### Testing
- Unit & Feature Tests (Laravel)
- Component Testing (Cypress)
- E2E Testing (Cypress)

### DevOps
- Docker
- GitHub Actions
- Mochawesome Reports

---

## Testing Strategy

This project follows a testing pyramid approach:

### Unit Tests
- Scope: Business logic (models, services)
- Location:
  - backend/tests/Unit
  - frontend/tests/unit

### Integration / API Tests
- Scope: API endpoints and contracts
- Tool: Postman (Newman)
- Location: /tests/integration

### End-to-End Tests
- Scope: Critical user flows
- Tool: Cypress
- Location: /tests/e2e

### Covered Flows
- User login (JWT)
- Product browsing
- Add to cart
- Checkout (simulated)

---

## Test Data Management

- Fixtures: /tests/fixtures
- Seeders: backend/database/seeders
- Utilities: /tests/utils

## Getting Started

### Clone repository

git clone 
cd project-root

### Run with Docker

docker-compose up –build

---

## Running Tests

### Backend (Unit & Feature)

cd backend
php artisan test

### Frontend (Component Tests)

cd frontend
npm run test

### API Tests

npm run test:api

### E2E Tests

npx cypress run

### Run All Tests

npm run test:all

---

## Test Reporting

- HTML reports with Mochawesome
- Includes screenshots on failure and logs

---

## CI/CD Pipeline

GitHub Actions pipeline runs:

- Lint
- Unit tests
- API tests
- E2E tests

On every pull request.

---

## Documentation

/docs contains:

- requirements.md
- test-strategy.md
- architecture.md

---

## Key Design Decisions

- Separation of test layers (unit, integration, e2e)
- Centralized test execution
- Focus on testing quality over business complexity

---

