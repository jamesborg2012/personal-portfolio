<?php

namespace App\Providers;

use A17\Twill\Facades\TwillAppSettings;
use A17\Twill\Facades\TwillNavigation;
use A17\Twill\Services\Assets\Twill;
use A17\Twill\Services\Settings\SettingsGroup;
use A17\Twill\View\Components\Navigation\NavigationLink;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /** Registering the CMS pages */
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('pages')
        );

        TwillNavigation::addLink(
            NavigationLink::make()->forModule('skills')->title('Skills')
        );

        TwillNavigation::addLink(
            NavigationLink::make()->forModule('menuLinks')->title('Menu')
        );

        TwillAppSettings::registerSettingsGroup(
            SettingsGroup::make()->name('homepage')->label('Homepage')
        );
    }
}
