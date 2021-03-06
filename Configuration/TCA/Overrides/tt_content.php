<?php

// column
$GLOBALS['TCA']['tt_content']['columns']['tx_html5videoplayer_videos'] = [
    'exclude' => 0,
    'label'   => 'LLL:EXT:html5videoplayer/Resources/Private/Language/locallang.xml:videos',
    'config'  => [
        'type'             => 'inline',
        'foreign_table'    => 'tx_html5videoplayer_video_content',
        'foreign_field'    => 'content_uid',
        'foreign_label'    => 'video_uid',
        'foreign_sortby'   => 'sorting',
        'foreign_selector' => 'video_uid',
        'foreign_unique'   => 'video_uid',
        'maxitems'         => '100',
        'appearance'       => [
            'collapseAll'     => false, // working RTE in TYPO3 > 7.4?!?!
            'expandSingle'    => true,
            'useCombination'  => 1,
            'useSortable'     => true,
            'enabledControls' => [
                'info' => TRUE,
                'new' => TRUE,
                'dragdrop' => TRUE,
                'sort' => TRUE,
                'hide' => TRUE,
                'delete' => TRUE,
                'localize' => TRUE,
            ],
        ],
    ],
];

$storageId = \HVP\Html5videoplayer\Div::getGeneralStorageFolder();
if ($storageId) {
    unset($GLOBALS['TCA']['tt_content']['columns']['tx_html5videoplayer_videos']['config']['foreign_selector']);
    unset($GLOBALS['TCA']['tt_content']['columns']['tx_html5videoplayer_videos']['config']['foreign_unique']);
}

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['html5videoplayer_pivideoplayer'] = 'layout,select_key,pages,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['html5videoplayer_pivideoplayer'] = 'pi_flexform,tx_html5videoplayer_videos';
