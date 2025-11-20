# Laravel Livewire Dataview

[![Latest Version on Packagist](https://img.shields.io/packagist/v/aristonis/laravel-livewire-dataview.svg?style=flat-square)](https://packagist.org/packages/aristonis/laravel-livewire-dataview)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/aristonis/laravel-livewire-dataview/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/aristonis/laravel-livewire-dataview/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/aristonis/laravel-livewire-dataview/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/aristonis/laravel-livewire-dataview/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/aristonis/laravel-livewire-dataview.svg?style=flat-square)](https://packagist.org/packages/aristonis/laravel-livewire-dataview)

Laravel Livewire Dataview is a developer-focused toolkit for building SOLID-friendly data listing experiences in Livewire 3. It standardises how you configure queries, pagination and row rendering while keeping your components expressive and testable.

## Features

- Opinionated abstract component (`DataViewComponent`) that centralises pagination, queries and rendering.
- Strongly validated traits for query definitions, pagination configuration and per-item views.
- Default Blade view that wires your per-item Livewire components and pagination links.
- `dataview:make` artisan command to scaffold a DataView component plus optional item component and Blade view.
- Config publishing for project-wide defaults (`config/dataview.php`) and reusable stubs for custom scaffolding.

## Requirements

- PHP 8.2+
- Laravel 10.x or 11.x with Livewire 3.6+
- Composer and Node tooling if you plan to style the bundled Blade view

## Installation

```bash
composer require aristonis/laravel-livewire-dataview
```

Optionally publish the package assets:

```bash
php artisan vendor:publish --tag=dataview-config   # copies config/dataview.php
php artisan vendor:publish --tag=dataview-stubs    # copies stub templates
```

## Quick start

1. Scaffold a dataview plus item component:

   ```bash
   php artisan dataview:make Users/UserTable --with-item
   ```

2. Edit the generated component so it extends `Aristonis\LaravelLivewireDataview\DataViewComponent` and configure the query, pagination and item view:

   ```php
   <?php

   namespace App\Livewire\Users;

   use App\Models\User;
   use Aristonis\LaravelLivewireDataview\DataViewComponent;

   class UserTable extends DataViewComponent
   {
       protected function configure(): void
       {
           $this->setItemView('livewire.users.user-table-item');
           $this->setPerPage(20);
       }

       protected function query()
       {
           return User::query()->with('roles')->orderByDesc('created_at');
       }
   }
   ```

3. The generated Blade view (`resources/views/livewire/users/user-table-item.blade.php`) receives each item through the `item` prop. You can customise the markup as you see fit.

4. Render the dataview in any Blade template:

   ```blade
   <livewire:users.user-table />
   ```

The default package view (`aristonis-dataview::livewire.dataview`) loops through your collection and renders the configured item component with stable Livewire keys, then shows pagination links when the query returns a paginator.

## Configuration

`config/dataview.php` controls the base behaviour:

- `pagination.per_page`: global default for `$this->getPerPage()`.
- `pagination.enable`: you can toggle pagination at runtime with `enablePagination()` / `disablePagination()`.
- `item.keyName`: used when generating Livewire keys; override via `$this->setKeyName('uuid')`.

Every component can override these defaults inside `configure()` to keep component logic predictable and SOLID.

## Testing

```bash
composer test
```

The test suite relies on Orchestra Testbench. Please ensure new functionality is accompanied by unit or feature coverage.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details on our workflow and coding standards.

## License

The MIT License (MIT). Please see [LICENSE](LICENSE) for more information.
