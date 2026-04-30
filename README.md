# Team Task Manager (Laravel)

A team-based task management system built with Laravel to simulate real-world collaboration workflows.

This project focuses on backend architecture, relationships, and scalable design rather than UI complexity.

---

## Features

- Team management (create & manage teams)
- Role-based membership (owner, member)
- Invitation system (join teams via invite)
- Projects within teams
- Tasks within projects
- Task assignment (many-to-many)
- Comments on tasks
- File attachments
- Notifications (task updates, assignments)

---

## Tech Stack

- Laravel
- Laravel Breeze (authentication)
- Blade + Tailwind CSS
- MySQL
- fruitcake/laravel-debugbar

---

## System Design

The application follows a hierarchical structure:

User → Team → Project → Task

### Core Relationships

- Users belong to many Teams (team_user)
- Teams have many Projects
- Projects have many Tasks
- Tasks belong to many Users (task_user)
- Tasks have Comments and Attachments

---

## Key Concepts Implemented

- Eloquent Relationships (one-to-many, many-to-many)
- Authorization (Policies)
- RESTful API design (planned)
- Service classes / clean architecture (planned)
- Queues & notifications (planned)
- Caching (planned)
- Basic testing (planned)

---

## Installation

```bash
git clone https://github.com/pads-only/team-task-manager.git
cd your-repo

composer install
cp .env.example .env
php artisan key:generate

# configure your database in .env

php artisan migrate
npm install
npm run dev

php artisan serve