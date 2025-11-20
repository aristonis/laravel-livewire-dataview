# Changelog

All notable changes to this project will be documented here. The format follows [Keep a Changelog](https://keepachangelog.com/en/1.1.0/) and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

- Documentation overhaul (`README`, `CONTRIBUTING`) describing setup, workflows and quick-start examples.
- Expanded changelog with Keep a Changelog structure for future releases.

## [0.1.0] - 2025-11-20

### Added

- `DataViewComponent` abstract base with pagination, query validation and default rendering pipeline.
- Trait suite (`HasQuery`, `PaginationConfigTrait`, `HasItemView`, `ConfigrationTrait`, `HasAllTraits`) to enforce SOLID-friendly responsibilities.
- Artisan `dataview:make` command with optional item component scaffolding and Blade stubs.
- Config publishing (`dataview-config`) plus stub publishing (`dataview-stubs`).
- Default Blade view that renders item components and paginator links.
- Initial test suite covering exceptions and trait behaviours.

## [0.1.0-alpha] - 2025-10-01

### Added

- First public preview of the package with core component abstraction and publishing hooks.
