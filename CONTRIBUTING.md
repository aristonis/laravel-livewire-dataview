## Contributing

Thanks for investing time in Laravel Livewire Dataview. Contributions are guided by the principles of SOLID design, explicit architecture and high-quality developer experience. This document outlines the workflow and quality expectations so we can iterate quickly and safely.

### 1. Before you start

- Search existing issues and pull requests to avoid duplicating work.
- Open a GitHub issue to discuss major features or API changes before you write code.
- Small fixes (typos, docs, low-risk bug fixes) can go straight to a pull request.

### 2. Local environment

1. Fork the repository and clone your fork.
2. Install dependencies:

   ```bash
   composer install
   ```

3. Run the test suite to ensure the baseline is green:

   ```bash
   composer test
   ```

4. Optionally link the package into a demo Laravel app via `path` repositories if you need to test UI flows manually.

### 3. Coding guidelines

- Follow SOLID principles and prefer small, composable methods over large procedural blocks.
- Stick to established Laravel and Livewire conventions (service providers, config publishing, artisan commands).
- Keep public APIs backwards-compatible unless the change is explicitly tagged as breaking.
- Apply PSR-12/Spatie style conventions (run Pint or your preferred PSR-12 formatter before committing).
- Cover new behaviour with tests. Use PHPUnit + Orchestra Testbench for integration scenarios.
- Update the documentation (`README`, stubs, PHPDoc) when APIs change.

### 4. Branching & commits

- Create topic branches from `main` using descriptive names, e.g. `feature/dataview-sorting`.
- Write meaningful commits that describe the “why” not just the “what”.
- Squash commits when they only make sense together, otherwise keep the history readable.

### 5. Pull request checklist

- [ ] Tests pass locally via `composer test`.
- [ ] Static analysis / linters pass (if applicable).
- [ ] Added or updated tests for all changes.
- [ ] Updated docs and `CHANGELOG.md` (under an “Unreleased” section) where relevant.
- [ ] Ensured new code is SOLID, type-hinted, and covered with descriptive exceptions.
- [ ] Referenced the relevant issue number in the PR description.

### 6. Release process

Maintainers will:

- Merge PRs once approvals and checks are complete.
- Update the changelog with release notes.
- Tag a new release on GitHub/Packagist when appropriate.

Thank you for helping us keep Laravel Livewire Dataview reliable and maintainable!
