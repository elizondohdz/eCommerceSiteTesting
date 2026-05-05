# Test Strategy — eCommerce Site Testing Project

## Objective

Define the testing approach used to validate the application across multiple layers.

---

## Testing Pyramid

This project follows a multi-layer testing approach:

- Unit Tests
- Integration / API Tests
- End-to-End Tests

---

## Unit Testing

**Scope**
- Business logic
- Models and services

**Location**
- backend/tests/Unit
- frontend/tests/unit

**Tools**
- Laravel testing framework
- Vitest / Jest (frontend)

---

## Integration / API Testing

**Scope**
- API endpoints
- Authentication flows
- Request/response validation

**Approach**
- Tests executed as an external client via HTTP

**Location**
- /tests/integration

**Validations**
- Status codes
- Response body
- Headers (JWT, content-type)

---

## End-to-End Testing

**Scope**
- Critical user flows

**Flows Covered**
- Login
- Browse products
- Add to cart
- Checkout

**Tool**
- Cypress

**Location**
- /tests/e2e

---


## Test Data Management

- Static fixtures stored in /tests/fixtures
- Database seeders used for consistent test data
- Reusable helpers in /tests/utils

---

## Execution Strategy

Tests can be executed independently:

- Unit tests
- API tests
- E2E tests

All tests are integrated into CI/CD pipelines.

---

## Goals

- Ensure reliability of core flows
- Detect regressions early
- Maintain test scalability and clarity