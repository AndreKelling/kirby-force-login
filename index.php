<?php
/**
 * force login to kirby
 * and redirect to the origin path location
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

            go($panelUrl.'/login?redirectAfterLogin=' . urlencode(kirby()->request()->path()));
        },
        'route:after' => function () {
            if (!kirby()->user()) {
                return;
            }
            $query = kirby()->request()->query()->data();
            if (array_key_exists('redirectAfterLogin', $query)) {
                go($query['redirectAfterLogin']);
            }
        }
    ]
]);
