# **Sitemap Package for Laravel**

*forked from [Laravelium/laravel-sitemap](https://github.com/Laravelium/laravel-sitemap)*

## Installation

You can install the package via composer:

```bash
composer require wish-cloud/laravel-sitemap
```

Then, publish needed assets (styles, views, config files):

```bash
php artisan vendor:publish --provider="WishCloud\LaravelSitemap\SitemapServiceProvider"
```
**Note:** *Composer won't update them after `composer update`, you'll need to do it manually!*

## Usage

Creating a new sitemap response is easy:

```php
$sitemap = App::make('sitemap');
$sitemap->add('https://example.com/link1', Carbon::now(), '1.0', 'daily');
$sitemap->add('https://example.com/link2', '2022-02-17 13:26:37', '0.8', 'weekly');
return $sitemap->render('xml');

```
Create index files for large sitemaps:

```php
$sitemap = App::make('sitemap');
$sitemap->addSitemap('https://example.com/sitemap-category.xml');
$sitemap->addSitemap('https://example.com/sitemap-product.xml');
$sitemap->addSitemap('https://example.com/sitemap-article.xml');
return $sitemap->render('sitemapindex');
```

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
