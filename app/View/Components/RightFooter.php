<?php

namespace App\View\Components;

use A17\Twill\Facades\TwillAppSettings;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Traits\LogTrait;
use App\Models\PersonalLink;

class RightFooter extends Component
{
    use LogTrait;

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
        $links_text = 'Follow Me';
        if (TwillAppSettings::get('footer-right.footer-right.follow') != '') {
            $links_text = TwillAppSettings::get('footer-right.footer-right.follow');
        }

        $link_data = [];

        if (TwillAppSettings::get('footer-right.footer-right.personalLink')->isNotEmpty()) {
            $links = TwillAppSettings::get('footer-right.footer-right.personalLink');

            /**
             * @var PersonalLink $personalLink
             */
            foreach ($links as $personalLink) {
                $link_data[] = [
                    'url' => $personalLink->url,
                    'icon' => $personalLink->icon_class,
                    'title' => $personalLink->title,
                ];
            }
        }

        return view('components.right-footer', ['links_text' => $links_text, 'link_data' => $link_data]);
    }
}
