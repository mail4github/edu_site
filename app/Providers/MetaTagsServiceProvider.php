<?php

namespace App\Providers;

use Butschster\Head\Contracts\Packages\PackageInterface;
use Butschster\Head\Contracts\MetaTags\MetaInterface;
use Butschster\Head\Contracts\Packages\ManagerInterface;
use Butschster\Head\Facades\PackageManager;
use Butschster\Head\MetaTags\Entities\ConditionalComment;
use Butschster\Head\MetaTags\Entities\Favicon;
use Butschster\Head\MetaTags\Meta;
use Butschster\Head\Providers\MetaTagsApplicationServiceProvider as ServiceProvider;
use Butschster\Head\Packages\Package;


class MetaTagsServiceProvider extends ServiceProvider
{
    protected function packages()
    {
        // Create global common tags package
        PackageManager::create('global_common_tags', function($package) {
            $package
                ->addMeta('viewport', [
                    'content' => 'width=device-width, initial-scale=1',
                ])
                ->addMeta('twitter:card', [
                    'content' => 'summary_large_image',
                ])
                ->setContentType('IE = edge')
                ->addMeta('og:url', [
                    'content' => 'https://wiki.merionet.ru/',
                ])
                ->addMeta('og:type', [
                    'content' => 'article',
                ])
                ->addMeta('og:site_name', [
                    'content' => 'Merion Academy | IT база знаний',
                ])
                ->addMeta('og:locale', [
                    'content' => 'ru_RU',
                ])
                ->addMeta('article:author', [
                    'content' => 'Merion Academy',
                ])
                ->addMeta('og:image', [
                    'content' => '/render.jpeg?random=true&text=Merion%20Academy%20|%20IT%20база%20знаний&tags[]=Merion%20Academy',
                ])
                ->addMeta('og:image:secure_url', [
                    'content' => '/render.jpeg?random=true&text=Merion%20Academy%20|%20IT%20база%20знаний&tags[]=Merion%20Academy',
                ])
                ->addMeta('og:image:alt', [
                    'content' => 'Merion Academy | IT база знаний',
                ])
                ->addMeta('og:image:width', [
                    'content' => '1080',
                ])
                ->addMeta('og:image:height', [
                    'content' => '570',
                ])
                ->setCanonical('https://wiki.merionet.ru/')

            ;
        });

        // Create global icon package
        PackageManager::create('global_favicons', function(Package $package) {
            $package->addTag(
                'favicon',
                new Favicon('/static/images/general/icons/favicon.svg', [
                    'type' => 'image/x-icon',
                    'rel' => 'shortcut icon'
                ])
            );
            $package->addTag('favicon.ie', new ConditionalComment(
                new Favicon('/static/images/general/icons/favicon.png'), 'IE gt 6'
            ));
        });
        
        // Create global CSS package
        PackageManager::create('global_css', function($package) {
            $package
                ->addStyle('swiper-bundle', '/static/css/swiper-bundle.min.css')
                ->addStyle('styles-min', '/static/css/styles.min.css?v13')
            ;
        });
        
    }

    // if you don't want to change anything in this method just remove it
    protected function registerMeta(): void
    {
        $this->app->singleton(MetaInterface::class, function () {
            $meta = new Meta(
                $this->app[ManagerInterface::class],
                $this->app['config']
            );

            // It just an imagination, you can automatically
            // add favicon if it exists
            // if (file_exists(public_path('favicon.ico'))) {
            //    $meta->setFavicon('/favicon.ico');
            // }

            // This method gets default values from config and creates tags, includes default packages, e.t.c
            // If you don't want to use default values just remove it.
            $meta->initialize();

            return $meta;
        });
    }
}