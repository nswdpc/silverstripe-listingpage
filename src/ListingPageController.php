<?php

namespace Symbiote\ListingPage;

use SilverStripe\Control\HTTPRequest;

/**
 * @extends \PageController<\Page>
 */
class ListingPageController extends \PageController
{
    private static array $url_handlers = [
        '$Action' => 'index'
    ];

    public function index(HTTPRequest $request)
    {
        // This is required so the listing page doesn't eat AJAX requests against the page controller.
        $action = $request->latestParam('Action');
        if ($action &&
            $this->hasMethod($action) &&
            in_array($action, $this->config()->get('allowed_actions'))) {
            return $this->$action();
        }

        $listingPage = $this->data();
        if($listingPage instanceof ListingPage && ($listingPage->ContentType || $listingPage->CustomContentType)) {
            // k, not doing it in the theme...
            $contentType = $listingPage->ContentType ?: $listingPage->CustomContentType;
            $this->response->addHeader('Content-type', $contentType);
            return $listingPage->Content();
        }

        return [];
    }
}
