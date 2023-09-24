<?php

namespace App\View\Components;

use A17\Twill\Facades\TwillAppSettings;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LeftFooter extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $current_year = date('Y');
        $copyright_name = env('APP_NAME');
        $show_year = true;

        if (TwillAppSettings::get('footer-left.footer-left.copyright') != '') {
            $copyright_name = TwillAppSettings::get('footer-left.footer-left.copyright');
        }

        if (TwillAppSettings::get('footer-left.footer-left.copyright_year') == '') {
            $show_year = false;
        } else {
            $show_year = TwillAppSettings::get('footer-left.footer-left.copyright_year') == 'true';
        }

        return view('components.left-footer', ['current_year' => $current_year, 'copyright_name' => $copyright_name, 'show_year' => $show_year]);
    }
}
