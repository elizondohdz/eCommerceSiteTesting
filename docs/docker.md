# Docker Environment

## Overview

The project uses Docker to provide a consistent local development and testing environment.

Containerization ensures reproducible execution across machines and CI pipelines.

---

# Services

## Backend Container

Laravel API running on PHP-FPM.

### Responsibilities

- Execute Laravel application
- Run migrations
- Serve API endpoints
- Execute automated tests

### Stack

- PHP 8.3
- Composer
- Laravel 13

---

## Frontend Container

Vue.js frontend application powered by Vite.

### Responsibilities

- Serve frontend application
- Enable frontend testing
- Execute Cypress integration flows

### Stack

- Node.js
- Vue.js
- Vite

---

# Benefits for SDET workflows

Docker provides:

- Environment consistency
- Easier onboarding
- Stable CI execution
- Dependency isolation
- Reproducible test environments

This approach reflects modern DevOps and SDET engineering practices.