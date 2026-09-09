<?php

declare(strict_types=1);

namespace Symbiote\ListingPage;

use SilverStripe\Admin\ModelAdmin;

/**
 * Description of ListingAdmin
 *
 * @author  marcus@silverstripe.com.au
 * @license BSD License http://silverstripe.org/bsd-license/
 */
class ListingAdmin extends ModelAdmin
{
    private static string $menu_title = 'Listings';

    private static string $url_segment = 'listing';

    private static array $managed_models = [
        ListingTemplate::class
    ];

    private static string $menu_icon_class = 'font-icon-p-list';
}
