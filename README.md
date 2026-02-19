
# content-domain

Shared CMS domain models for PHP SSR apps. Provides pure, framework-agnostic entities (Page, PageSection, Review, SeoMeta, Navigation, etc.) with attribute-based validation via [phpolar/model]. Designed for Clean Architecture: no infrastructure, no PDO—just content-focused domain objects.

---

## Table of Contents

- [Goals](#goals)
- [What’s Included](#whats-included)
- [What’s *Not* Included](#whats-not-included)
- [Install](#install)
- [Usage](#usage)
  - [Entities](#entities)
  - [Validation with phpolar/model](#validation-with-phpolarmodel)
  - [Immutability / Value semantics](#immutability--value-semantics)
- [Directory & Namespaces](#directory--namespaces)
- [Versioning](#versioning)
- [Contributing](#contributing)
- [License](#license)

## Goals

- **Pure domain** for CMS/content concerns
- **Reusable** across `storefront` (read-only) and `storefront-admin` (read-write)
- **Stable contracts** with small, composable objects
- **Validation via attributes** using `phpolar/model`
- **Zero infrastructure**: no PDO, no frameworks, no I/O side effects

## What’s Included

- Core CMS entities and value objects:
  - `Page`, `PageSection`, `Block`, `SeoMeta`, `Slug`, `Navigation`, `MenuItem`, `Review` (example set)
- Attribute-based rules for validation/normalization
- Minimal helpers for content-domain business rules (publishability, visibility windows, etc.) that **do not** perform I/O

## What’s *Not* Included

- No repositories, PDO, or persistence code
- No controllers or framework glue
- No caching, logging, HTTP, or config loading

> Keep infrastructure in the application layer (e.g., `storefront`, `storefront-admin`). This package should remain framework- and storage-agnostic.

## Install

```bash
composer require your-vendor/content-domain
```

> Requires PHP 8.2+ and [`phpolar/model`](https://github.com/phpolar/model).

## Usage

### Entities

```php
<?php
use ContentDomain\Content\Page;
use ContentDomain\Content\SeoMeta;
use ContentDomain\Content\PageSection;

$seo = new SeoMeta(title: 'Apartments in Midtown', description: 'Spacious, modern units', keywords: ['apartments','midtown']);
$page = new Page(
    id: null,
    slug: 'midtown-apartments',
    title: 'Midtown Apartments',
    sections: [ new PageSection('hero', ['headline' => 'Live in Midtown']) ],
    seo: $seo,
    publishedAt: new \DateTimeImmutable('2025-01-01T00:00:00Z'),
);
```

### Validation with phpolar/model

Use PHP attributes from `phpolar/model` on properties to enforce constraints.

```php
<?php
use Phpolar\Model\Attributes as Assert;

final class Slug
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Pattern('/^[a-z0-9-]+$/')]
        public readonly string $value,
    ) {}
}
```

### Immutability / Value semantics

Favor immutable value objects (e.g., `Slug`, `SeoMeta`) and explicit methods to derive new instances rather than in-place mutation. Entities may carry identifiers; value objects should not.

## Directory & Namespaces

```shell
src/
  Content/
    Page.php
    PageSection.php
    SeoMeta.php
    Slug.php
    Review.php
    Navigation.php
    MenuItem.php
  Validation/
    (attribute helpers, if any)
```

- Root namespace: `ContentDomain\\...`
- Public API is limited to types under `ContentDomain\Content` and documented helpers.

## Versioning

- Semantic Versioning (SemVer): MAJOR.MINOR.PATCH
- Breaking changes only in MAJOR releases

## Contributing

1. Fork and create a feature branch
2. Add tests and docs
3. Ensure CI passes (coding standards, static analysis, unit tests)
4. Open a PR with a clear description and rationale

## License

MIT License. See `LICENSE` for details.
