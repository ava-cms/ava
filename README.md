<p align="center">
<picture>
  <source media="(prefers-color-scheme: dark)" srcset="https://ava.addy.zone/media/dark.png">
  <source media="(prefers-color-scheme: light)" srcset="https://ava.addy.zone/media/light.png">
  <img alt="Ava CMS" src="https://ava.addy.zone/media/light.png">
</picture>
</p>

<p align="center">
  <strong>A fast, flexible, file-based CMS built with modern PHP.</strong><br>
</p>

---

# Ava CMS

[![Release](https://img.shields.io/github/v/release/AvaCMS/ava)](https://github.com/AvaCMS/ava/releases)
[![Issues](https://img.shields.io/github/issues/AvaCMS/ava)](https://github.com/AvaCMS/ava/issues)
[![Stars](https://img.shields.io/github/stars/AvaCMS/ava)](https://github.com/AvaCMS/ava/stargazers)
[![Code size](https://img.shields.io/github/languages/code-size/AvaCMS/ava)](https://github.com/AvaCMS/ava)
[![License](https://img.shields.io/github/license/AvaCMS/ava)](https://github.com/AvaCMS/ava/blob/main/LICENSE)
[![Discord](https://img.shields.io/discord/1028357262189801563)](https://discord.gg/fZwW4jBVh5)

**Start here:** [Docs](https://ava.addy.zone/docs) · [Themes](https://ava.addy.zone/themes) · [Plugins](https://ava.addy.zone/plugins) · [Showcase](https://ava.addy.zone/showcase)

Build content in Markdown/HTML. Render with plain PHP. **No database required.**

Ava is a modern flat‑file CMS for developers and content creators who want a site they can understand, move between hosts, and keep for the long haul. Your source of truth is a folder on disk:

- content in `content/`
- templates in `themes/`
- configuration in `app/config/`

No proprietary formats. No hidden layers. Just files in, website out.

![Ava CMS screenshots](https://ava.addy.zone/media/screenshots.png)

## Why Ava?

- 📝 **Markdown & HTML** — Write fast in Markdown, drop into HTML when you want total control.
- ⚡ **Instant feedback** — No manual build step or deploy queue. Edit a file, refresh, done.
- 🎨 **Design freedom** — Standard HTML/CSS templates, with Ava's helpers and PHP only where you need dynamic data.
- 🧩 **Model anything** — Define portfolios, events, docs, catalogs, blogs—whatever fits—via content types, fields and taxonomies.
- 🚀 **Dynamic features** — Search, sorting, and filtering work out of the box, backed by caching.
- 🛠️ **Dev-friendly** — CLI, plugins, and hooks keep power features clean and optional.
- 📈 **Scale seamlessly** — Start with flat files; switch to a powerful backend like SQLite if your site gets massive with 1 line of config.
- 🤖 **LLM-friendly** — The predictable structure + solid docs + straightforward CLI make it great to pair with AI assistants when building themes and extensions.

## What’s included

- **Content types** and **taxonomies** for modeling your site your way
- **Smart routing** based on your content structure
- **Shortcodes** and **snippets** for reusable dynamic bits inside Markdown
- **Search** across your content with configurable weights
- **Plugins + hooks** (plus bundled plugins like sitemap, redirects, and feeds)
- **CLI tool** for everyday tasks (cache, users, diagnostics, and more)
- **Optional admin dashboard** for quick edits and site monitoring
- **Caching** (including optional full page caching for static-speed delivery)

## How it works

1. **Write** — Create Markdown files in `content/`.
2. **Index** — Ava automatically scans your files and builds a fast index.
3. **Render** — Your theme turns that content into HTML.

You pick your workflow: edit on your server (SFTP/SSH), work locally and upload, use Git, or mix and match.

## 🏁 Quick Start

### Requirements

- **PHP 8.3+**
- **Composer**

That’s it — Ava is designed to run happily on shared hosting, a VPS, or locally.

### 1) Install

**Option A: Download a release**

- Download the latest release: https://github.com/AvaCMS/ava/releases
- Extract it into a folder on your machine or server

**Option B: Clone from GitHub**

```bash
git clone https://github.com/AvaCMS/ava.git my-site
cd my-site
composer install
```

If you downloaded a release zip, run this from the extracted folder:

```bash
composer install
```

### 2) Configure

Edit your site settings in:

- `app/config/ava.php`

### 3) Run locally

Start the built-in PHP development server:

```bash
./ava start
# or
php -S localhost:8000 -t public
```

Visit `http://localhost:8000`.

### 4) Create content

Add a new page by creating a Markdown file in `content/pages/`.

**File:** `content/pages/hello.md`

```markdown
---
title: Hello World
slug: hello-world
status: published
---

# Welcome to Ava!

This is my first page. It's just a text file.
```

Visit `http://localhost:8000/hello-world` to see it live.

## 📚 Documentation

Documentation lives at **https://ava.addy.zone/**.

- [Getting Started](https://ava.addy.zone/docs)
- [Configuration](https://ava.addy.zone/docs/configuration)
- [Theming](https://ava.addy.zone/docs/theming)
- [CLI](https://ava.addy.zone/docs/cli)
- [Plugin Development](https://ava.addy.zone/docs/creating-plugins)
- [Showcase](https://ava.addy.zone/showcase)

## 🔌 Plugins & Themes

Ava includes a simple hook-based plugin system, and theming is just PHP templates. A few plugins are bundled in this repo (like sitemap, redirects, and a feed plugin) so you can see the pattern and ship common features quickly.

- Community plugins: https://ava.addy.zone/plugins
- Community themes: https://ava.addy.zone/themes

## 🗂️ Your Site, On Disk

Here’s the shape of a typical Ava site:

```text
my-site/
├── app/
│   └── config/          # Site configuration (ava.php, content types, etc.)
├── content/
│   ├── pages/           # Your Markdown content
│   └── ...
├── themes/              # PHP themes
├── plugins/             # Site plugins
├── public/              # Web root (assets, index.php)
├── storage/             # Cache and logs
├── vendor/              # Composer dependencies
└── ava                  # CLI tool
```

## ⚡ Performance

Ava is designed to be fast by default, whether you have 100 pages or 100,000:

- **No manual build step**: publish instantly (indexing is automatic).
- **Tiered caching**: avoid repeating expensive work on every request.
- **Page caching** (optional): serve cached HTML to bypass PHP for most visitors.

See https://ava.addy.zone/docs/performance

## 🤝 Contributing & Community

Feedback is the most helpful thing right now (especially as we head towards 1.0).

- Bugs, questions, and ideas: https://github.com/AvaCMS/ava/issues
- Chat & support: https://discord.gg/fZwW4jBVh5
- Community themes: https://ava.addy.zone/themes
- Community plugins: https://ava.addy.zone/plugins
- Sites built with Ava: https://ava.addy.zone/showcase

If you’d like to contribute core code, open an issue first so we can agree on approach and scope.

## 📄 License

Ava is open-source software licensed under the [MIT license](LICENSE).
