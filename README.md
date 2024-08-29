<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://speedforce.agency/wp-content/themes/wordpress_dev/build/images/logo.png" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Developer Assessment Task

## Overview

> Welcome to the Laravel Developer Assessment Task provided by SpeedForce Digital. This task is designed to evaluate your proficiency with Laravel and related packages. You will build a small Laravel application incorporating user authentication, role management, rate limiting, and a spin wheel feature.

## Requirements

### 1. Project Setup

- **Task:** Create a new Laravel 11 project.
- **Details:** Configure the environment and set up the database connection.

### 2. Authentication with Laravel Sanctum

- **Task:** Implement API authentication using Laravel Sanctum.
- **Details:** Ensure users can register, log in, and log out via API endpoints. Secure API routes to require authentication.

### 3. Rate Limiting by IP

- **Task:** Implement rate limiting to restrict users to a maximum of 5 API requests per minute from the same IP address.
- **Details:** Use Laravel’s rate limiting features to enforce this rule.

### 4. Role Management with Laravel Spatie

- **Task:** Set up role management using Laravel Spatie's Role and Permission package.
- **Details:** Define and manage three roles: `Admin`, `Wholesaler`, and `Retailer`. Ensure only users with the `Retailer` role can access the spin wheel functionalities.

### 5. User Seeder

- **Task:** Create a seeder to populate the database with users.
- **Details:** Seed the database with:
    - 17 users with the `Wholesaler` role
    - 33 users with the `Retailer` role
    - 5 users with the `Admin` role

### 6. Spin Wheel Application

- **Task:** Develop a spin wheel feature API's with specific business rules.
- **Ue Spin API:** Retailer use free spin and win -> 100. then add to wallet and generate transaction.
- **Buy Spin API:** Retailer after using free spin and then buy spin -> 200. then deduct to wallet and generate transaction.
- **Spin Histroy API for self:** 
- **Spin Histroy API for admin:** 
- **Details:**
    - **Free Spins:** Allow each retailer to have 3 free spins per day.
    - **Purchased Spins:** After using the free spins, retailers can buy additional spins. Each purchased spin grants one more chance with 200.
    - **Transaction Handling:** When a retailer spins the wheel:
        - Add balance to the retailer's wallet.
        - Generate a wallet transaction with the following fields:
            - `transaction_id` (format: `speedforce-year-12SD2U3HHH`)
            - `user_id`
            - `amount`
            - `source`
            - `type` (either `addition` or `deduction`)

---
> Submission
- **Please submit your completed task**  by pushing the code to a GitHub repository and sharing the repository link with us. Ensure that your code is well-organized, follows best practices, and includes clear documentation.
---

Thank you for participating in the assessment task. We look forward to reviewing your submission. If you have any questions, please feel free to reach out.


