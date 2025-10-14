<?php
/**
 * force login to kirby
 */

use Kirby\Cms\Url;
use Kirby\Panel\Panel;
use Kirby\Toolkit\Str;

Kirby::plugin('ajk/force-login', [
    'hooks' => [
        'route:before' => function () {
            if (kirby()->user()) {
                return;
            }

            $panelUrl = Panel::url();
            $currentUrl = Url::current();
            $isPanelUrl = Str::startsWith($currentUrl, $panelUrl);

            $isApiUrl = Str::startsWith(Url::path(), 'api', true );

            if ($isPanelUrl || $isApiUrl) {
                return;
            }

            go($panelUrl.'/login');
        }
    ]
]);
