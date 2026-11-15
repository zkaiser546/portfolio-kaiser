# Portfolio Kaiser — Vue 3 + Laravel

A portfolio with a file-explorer sidebar, stacked folder tabs and a white theme.
Content lives in `config/portfolio.php`; Laravel serves it as JSON and Vue draws it.

Built on a clean Laravel 13 + Vite + Vue 3 structure.

## Requirements

- PHP ^8.3, Composer
- Node ^20

## Setup

```bash
composer install
php artisan key:generate   # only if .env is missing
php artisan migrate
npm install
npm run build
```

## Run

Two terminals:

```bash
php artisan serve     # http://localhost:8000
npm run dev           # Vite dev server with HMR
```

Or just serve the built assets:

```bash
npm run build
php artisan serve
```

## Tests

```bash
php artisan test
```

## Change your content

Edit `config/portfolio.php`:

- `owner` — your name, role and availability line
- `tree`  — what shows in the sidebar (folders and files)
- `files` — what each file shows (home, case studies, about, resume, contact)

To add a project: add `'p6' => [...]` under `files`, then add `['id' => 'p6']` in the tree.

Put your real resume at `public/resume.pdf`.

## Project structure

```
app/Http/Controllers/PortfolioController.php   # JSON endpoint for the SPA
config/portfolio.php                           # all portfolio content
routes/web.php                                 # / and /api/portfolio
resources/views/app.blade.php                  # single Blade shell
resources/css/portfolio.css                    # theme
resources/js/
├── app.js                                     # Vue entry point
├── App.vue                                    # root component (sidebar, tabs, view)
├── utils.js                                   # tree helpers
└── components/
    ├── TreeNode.vue                           # recursive sidebar node
    └── FileView.vue                           # per-file renderer
vite.config.js                                 # Vite + Laravel + Vue plugins
```
