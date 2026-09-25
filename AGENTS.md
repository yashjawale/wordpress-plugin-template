# Contributor Instructions

## WordPress coding standards

- Follow the WordPress Coding Standards (WPCS) and the conventions already used in the surrounding code. Run `composer lint:php` for PHP and the relevant `npm run lint:*` checks for assets before submitting changes.
- Do not suppress or disable a linter rule unless necessary. Every suppression or ignore comment must state a clear, specific reason; keep its scope as narrow as possible.
- Add a docblock to every function, method, and class. Describe its purpose and document parameters, return values, and exceptions where applicable. Keep annotations accurate and consistent with the implementation.
- Prefer native WordPress APIs and functions over custom implementations when they meet the need. Follow WordPress APIs for hooks, data access, sanitization, validation, escaping, internationalization, and capability checks.
- Escape output for its context and sanitize/validate input at the appropriate boundary. Use nonces and capability checks for state-changing operations.

## Tests and verification

- Add or update tests for behavior changes wherever practical. For UI changes, cover meaningful behavior and states when the existing test setup allows it.
- Run the relevant checks before submitting work. The repository provides `composer phpstan`, `composer lint:php`, `npm run test:unit`, `npm run build`, `npm run lint:js`, and `npm run lint:css`.
- If a change cannot reasonably be tested, explain what was not tested and why in the summary.

## WordPress user interfaces

- Build WordPress admin and editor interfaces with components from `@wordpress/components` and other appropriate WordPress packages. This applies to React interfaces, including custom admin pages.
- Prefer established WordPress design patterns and shared components over custom controls or styling. Keep interfaces accessible, keyboard-friendly, and consistent with the WordPress editor.
- Use the existing block-editor APIs and components for block editing rather than recreating editor controls.

## General implementation guidance

- Keep changes focused and follow the project’s existing structure, naming, and asset conventions.
- Preserve backward compatibility with the project’s stated minimum versions: PHP 8.4 and WordPress 6.8, unless the task explicitly changes those requirements.
- Avoid adding dependencies or custom abstractions when existing WordPress or project tooling is sufficient.
- Update documentation when setup, behavior, requirements, or developer workflows change.
