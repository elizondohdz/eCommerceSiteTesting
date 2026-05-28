# CI/CD Workflow

## Overview

This project implements a complete CI/CD quality pipeline focused on modern SDET practices.

The pipeline validates backend, frontend, API contracts, code coverage, and static analysis before code integration.

The workflow is executed using GitHub Actions.

---

# Pipeline Stages

## 1. Backend Validation

The backend pipeline validates the Laravel API layer.

### Steps

- Install PHP dependencies
- Configure Laravel environment
- Create SQLite testing database
- Execute migrations and seeders
- Run Unit Tests
- Run Feature Tests
- Generate code coverage report

### Technologies

- Laravel 13
- PHPUnit
- SQLite
- PHP Coverage

---

## 2. Frontend E2E Validation

The frontend pipeline validates critical user flows using Cypress.

### Steps

- Install frontend dependencies
- Start Laravel API server
- Start Vite frontend server
- Execute Cypress E2E tests
- Generate Mochawesome reports
- Upload screenshots on failure

### Covered flows

- Authentication
- Product listing
- Cart interactions
- Checkout process

### Technologies

- Vue.js
- Cypress
- Mochawesome

---

## 3. API Contract Testing

API contracts are validated using Postman collections executed through Newman.

### Validations

- HTTP status codes
- Response schemas
- Authentication tokens
- JSON structure validation

### Technologies

- Postman
- Newman
- JSON Schema validation

---

## 4. Static Analysis and Quality Gates

Static analysis is executed using SonarQube Cloud.

### Validations

- Code smells
- Bugs
- Vulnerabilities
- Coverage integration
- Code duplication
- Maintainability metrics

### Technologies

- SonarQube Cloud
- GitHub Actions

---

# Pipeline Artifacts

The pipeline uploads quality evidence as artifacts.

## Generated Artifacts

- Mochawesome HTML reports
- Cypress screenshots
- Newman reports
- Coverage reports

Artifacts provide traceability and execution evidence for the testing process.

---

# SDET Practices Demonstrated

This project demonstrates:

- Automated quality validation
- End-to-end testing
- API contract validation
- Continuous Integration
- Coverage analysis
- Static code analysis
- Dockerized environments
- Reporting and observability

The project is designed to simulate real-world SDET and Quality Engineering workflows used in enterprise environments.