<?php

namespace {

    use SilverStripe\Forms\CheckboxField;
    use SilverStripe\Forms\FieldGroup;
    use SilverStripe\Forms\HiddenField;
    use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
    use SilverStripe\Forms\TextField;
    use SilverStripe\ORM\DataObject;

    class EventYear extends DataObject
    {
        private static $default_sort  = 'Sort';

        private static $singular_name = "Event Year";
        private static $plural_name = "Event Years";

        private static $db = [
            'Name'     => 'Text',
            'ShowInFinalistsPage' => 'Boolean',
            'FinalistsPageExtraContent' => 'HTMLText',
            'ShowInWinnersPage' => 'Boolean',
            'WinnersPageExtraContent' => 'HTMLText',
            'ShowInGalleryPage' => 'Boolean',
            'GalleryPageExtraContent' => 'HTMLText',
            'Archived' => 'Boolean',
            'Sort'     => 'Int',
        ];

        private static $summary_fields = [
            'Name',
            'Status'
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields(); // TODO: Change the autogenerated stub
            $fields->addFieldToTab('Root.Main', TextField::create('Name'));
            $fields->addFieldToTab('Root.FinalistsPage', CheckboxField::create('ShowInFinalistsPage'));
            $fields->addFieldToTab('Root.FinalistsPage', HTMLEditorField::create('FinalistsPageExtraContent')
                ->setRightTitle('This content will show on finalists page year accordion'));
            $fields->addFieldToTab('Root.WinnersPage', CheckboxField::create('ShowInWinnersPage'));
            $fields->addFieldToTab('Root.WinnersPage', HTMLEditorField::create('WinnersPageExtraContent')
                ->setRightTitle('This content will show on winners page year accordion'));
            $fields->addFieldToTab('Root.GalleryPage', CheckboxField::create('ShowInGalleryPage'));
            $fields->addFieldToTab('Root.GalleryPage', HTMLEditorField::create('GalleryPageExtraContent')
                ->setRightTitle('This content will show on gallery page year accordion'));
            $fields->addFieldToTab('Root.Main', CheckboxField::create('Archived'));
            $fields->addFieldToTab('Root.Main', HiddenField::create('Sort'));

            return $fields;
        }

        public function getStatus()
        {
            if($this->Archived == 1) return _t('GridField.Archived', 'Archived');
            return _t('GridField.Live', 'Live');
        }
    }
}
