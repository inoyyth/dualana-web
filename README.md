# Dualana Web

This project is a Laravel application structured around a layered architecture so each part of the system has a clear responsibility.

## Application Architecture

The application is organized into four layers:

1. Presentation Layer
    - Responsible for the user interface and request handling.
    - In this project, this includes controllers and Blade views.
    - Example: the controller receives the HTTP request and prepares the data for rendering.

2. Application Layer
    - Acts as the bridge between the presentation layer and the business logic.
    - Contains use cases that describe what the application is supposed to do.
    - Example: a use case can fetch a dashboard summary or prepare an architecture overview.

3. Business Layer
    - Contains the core rules and business logic of the application.
    - This layer should stay independent from HTTP, views, and database details.
    - Example: validation of business rules, transformations, and orchestration of domain services.

4. Data Layer
    - Handles persistence and storage access.
    - Uses repositories and models to communicate with the database.
    - Example: retrieving records from the database or writing new data.

## Why this architecture is useful

- Keeps the codebase easier to maintain.
- Makes each layer testable independently.
- Reduces coupling between UI, business logic, and data access.
- Makes future changes safer because responsibilities are clearly separated.

## Project Structure

```text
app/
  Http/Controllers/         # Presentation layer
  Application/UseCases/     # Application layer
  Domain/Services/          # Business layer
  Repositories/             # Data layer (Unified Contracts & Implementations)
  Models/                   # Eloquent models
resources/views/           # Blade templates
routes/web.php             # Route definitions
bootstrap/providers.php    # Service provider registration
```

## Request Flow Example

A typical request follows this path:

1. The browser calls a route.
2. The route invokes a controller.
3. The controller calls an application use case.
4. The use case calls a domain service.
5. The service uses a repository to retrieve or save data.
6. The result is passed back to the view.

This is the flow used by the architecture demo page.

## Step-by-Step Example: Adding a New Feature

Below is a practical example of how to use this architecture when adding a new feature.

### Step 1: Define a route

Add a new route in the routes file:

```php
Route::get('/architecture-demo', [ArchitectureDemoController::class, 'index'])->name('architecture-demo');
```

### Step 2: Create a controller

Create a controller in the presentation layer to receive the request and return a view.

- File: app/Http/Controllers/ArchitectureDemoController.php

The controller should stay thin and delegate the work to the application layer.

### Step 3: Create an application use case

Create a class in the application layer that represents the feature action.

- File: app/Application/UseCases/GetArchitectureOverview.php

This class should orchestrate the request and call the business service.

### Step 4: Create a business service

Create a service in the business layer to contain the domain logic.

- File: app/Domain/Services/ArchitectureOverviewService.php

This class should contain the rules or logic that define how the feature behaves.

### Step 5: Create a repository interface and implementation

Create a repository contract in the data layer and implement it.

- File: app/Repositories/Contracts/ArchitectureOverviewRepositoryInterface.php
- File: app/Repositories/ArrayArchitectureOverviewRepository.php

The repository is responsible for supplying data. In a real application, this would usually talk to the database.

### Step 6: Register the dependency

Bind the repository implementation in a service provider.

- File: app/Providers/ArchitectureServiceProvider.php

This enables Laravel's dependency injection container to provide the correct implementation automatically.

### Step 7: Return a view

Create a Blade view to present the data.

- File: resources/views/architecture-demo.blade.php

The view should focus only on presentation and avoid business logic.

### Step 8: Test the feature

Add a feature test to verify the endpoint works.

- File: tests/Feature/ArchitectureDemoTest.php

Example expectations:

```php
$response->assertStatus(200);
$response->assertSee('Layered Architecture');
```

## Current Example in This Project

The current demo page is available at:

```text
/architecture-demo
```

It demonstrates the four layers of this architecture in a simple and visible way.

## Recommended Development Pattern

When building new features, follow this pattern:

```text
Route -> Controller -> Use Case -> Service -> Repository -> Model/Database -> View
```

This keeps the flow predictable and makes the project easier to scale.

## Getting Started

Install dependencies and start the application:

```bash
composer install
npm install
php artisan serve
```

To run tests:

```bash
php artisan test
```

## License

This project uses the Laravel framework and follows the standard MIT licensing model.
