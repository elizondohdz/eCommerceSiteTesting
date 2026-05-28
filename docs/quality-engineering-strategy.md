# Quality Engineering Strategy

## Objective

This project was designed as a portfolio implementation of a modern SDET workflow.

The goal is to demonstrate automated quality practices across backend, frontend, infrastructure, and CI/CD pipelines.

---

# Testing Pyramid

The project follows a layered testing strategy.

## Unit Tests

Focused on isolated backend business logic validation.

### Tools

- PHPUnit
- Laravel Testing Framework

---

## Feature Tests

Focused on API endpoint behavior and application integration.

### Coverage

- Authentication
- Product flows
- Cart operations
- Checkout behavior

---

## End-to-End Tests

Focused on validating critical user journeys from the UI perspective.

### Tools

- Cypress
- Mochawesome

### Covered flows

- Login
- Cart management
- Checkout process

---

## API Contract Testing

Focused on validating request/response consistency.

### Tools

- Postman
- Newman

### Validations

- Schema validation
- Status codes
- Authentication contracts

---

# Quality Gates

The pipeline integrates multiple quality gates.

## Coverage

Coverage reports are generated during backend execution.

## Static Analysis

SonarQube Cloud validates:

- Maintainability
- Security
- Reliability
- Code duplication

---

# CI/CD Integration

All validations are executed automatically through GitHub Actions.

This guarantees that:

- tests run on every push
- pull requests are validated automatically
- quality regressions are detected early

---

# Engineering Principles

The project emphasizes:

- Shift-left testing
- Continuous validation
- Test automation
- Reproducibility
- Quality observability
- Scalable automation practices

This architecture reflects real-world SDET and Quality Engineering workflows.