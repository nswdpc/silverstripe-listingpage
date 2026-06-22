<?php

namespace Symbiote\ListingPage;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextareaField;

/**
 * Description of ListingTemplate
 *
 * @author  marcus@silverstripe.com.au
 * @license BSD License http://silverstripe.org/bsd-license/
 * @property string $Title
 * @property ?string $ItemTemplate
 */
class ListingTemplate extends DataObject
{
    private static string $table_name = 'ListingTemplate';

    private static array $db = [
        'Title'             => 'Varchar(127)',
        'ItemTemplate'      => 'Text',
    ];

    private static array $defaults = [
        'ItemTemplate'      => "<% loop \$Items %>\n\t<p>\$Title</p>\n<% end_loop %>",
    ];

    #[\Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->replaceField('ItemTemplate', $ta = TextareaField::create('ItemTemplate', _t('ListingTemplate.ITEM_TEMPLATE', 'Item Template (use the Items variable to iterate over)')));

        $ta->setRows(20);
        $ta->setColumns(120);
        return $fields;
    }
}
