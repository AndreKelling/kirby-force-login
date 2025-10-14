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
            // Skip if a user is logged in
            if (kirby()->user()) {
                return;
            }

            $panelUrl = Panel::url();
            $path = Url::current();
            $isPanelUrl = Str::startsWith($path, $panelUrl);

            if ($isPanelUrl) {
                return;
            }

            go($panelUrl.'/login');
        }
    ]
]);
