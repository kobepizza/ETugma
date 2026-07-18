# ETugma

> A cloud-based Tutor Management and Matching Platform for educational businesses.

## Overview

ETugma is a Software-as-a-Service (SaaS) platform designed to help tutoring centers, review centers, educational institutions, and independent tutoring businesses manage their operations in one centralized system.

The platform intelligently matches students with tutors based on predefined preferences while providing businesses with tools to manage users, schedules, tutor profiles, and learning services through a secure cloud-based application.

Originally developed as a university capstone project, ETugma is currently being redesigned into a scalable multi-tenant platform that can support multiple organizations under a single system.

---

## Vision

To become a modern cloud-based education management platform that enables tutoring businesses to digitize their services without developing their own software.

---

## Objectives

- Automate tutor and student matching
- Reduce administrative workload
- Support multiple businesses within one application
- Provide secure cloud-based access
- Offer scalable architecture for future growth

---

## Features

### Student Portal

- Student registration
- Preference selection
- Tutor recommendations
- Session booking
- Learning history
- Profile management

### Tutor Portal

- Tutor registration
- Tutor profile
- Subject specialization
- Availability management
- Session management
- Student assignments

### Business Administration

- Dashboard
- User Management
- Tutor Management
- Student Management
- Reports
- Analytics
- Business Configuration

---

## Planned SaaS Features

- Multi-Tenant Architecture
- Organization Workspaces
- Subscription Plans
- Role-Based Access Control
- Custom Branding
- Cloud Storage
- Email Notifications
- Audit Logs
- REST API
- Payment Integration
- Analytics Dashboard

---

## Technology Stack

### Current

Backend
- Laravel
- PHP

Frontend
- Blade
- Bootstrap
- JavaScript

Database
- MySQL

Authentication
- Laravel Authentication

---

### Planned Upgrade

Backend
- Laravel API

Frontend
- React
- Next.js

Database
- PostgreSQL / MySQL

Cloud

- Docker
- Nginx
- DigitalOcean / AWS
- Redis
- Queue Workers

---

## System Architecture

```
                Browser
                    │
                    ▼
            React / Next.js
                    │
                    ▼
             Laravel REST API
                    │
      ┌─────────────┴─────────────┐
      ▼                           ▼
 Authentication             Business Logic
      │                           │
      └─────────────┬─────────────┘
                    ▼
                 Database
                    │
                    ▼
           Multi-Tenant Data
```

---

## Roadmap

### Phase 1

- Existing Tutor Matching System
- Student Portal
- Tutor Portal
- Admin Portal

### Phase 2

- Laravel API
- React Frontend
- Authentication API

### Phase 3

- Multi-Tenant SaaS
- Business Registration
- Subscription Billing
- Cloud Deployment

### Phase 4

- AI Tutor Recommendation
- Analytics
- Mobile Application
- Public API

---

## Future Integrations

- Stripe
- PayMongo
- Google Calendar
- Zoom
- Microsoft Teams
- Google Meet
- Firebase Notifications

---

## Installation

```bash
git clone https://github.com/kobepizza/ETugma.git

cd ETugma

composer install

npm install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan serve
```

---

## License

This project is currently under active development.

Commercial licensing will be introduced once the SaaS platform is released.

---

## Developer

**Bryan Peteza**

Bachelor of Science in Information Technology

Currently redesigning ETugma into a cloud-based SaaS platform for educational businesses.
