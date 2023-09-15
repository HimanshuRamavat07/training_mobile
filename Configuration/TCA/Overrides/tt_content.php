<?php

use TYPO3\CMS\Core\Utility\GeneralUtility;

defined('TYPO3') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'NsMobile',
    'Mobileplugin',
    'Mobile Planet Plugin'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'tt_content',
    [
       'tx_nsmobile_noprint' => [
          'exclude' => 0,
          'label' => 'Print Print Print',
          'config' => [
             'type' => 'check',
             'renderType' => 'checkboxToggle',
             'items' => [
                [
                   0 => '',
                   1 => ''
                ]
             ],
          ],
       ],
    ]
 );
      \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'tt_content',
    'access',
    'tx_nsmobile_noprint',
    'after:hidden'
 );
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['nsmobile_mobileplugin']='pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'nsmobile_mobileplugin',
    'FILE:EXT:ns_mobile/Configuration/FlexForm/form.xml'
);

################################### Custom Container #####################################################
\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
   (
       new \B13\Container\Tca\ContainerConfiguration(
           'b13-2cols-with-header-container', // CType
           '2 Column Container With Header', // label
           'Some Description of the Container', // description
           [
               [
                   ['name' => 'header', 'colPos' => 200, 'colspan' => 2, 'allowed' => ['CType' => 'header, textmedia, b13-2cols']]
               ],
               [
                   ['name' => 'left side', 'colPos' => 201],
                   ['name' => 'right side', 'colPos' => 202, 'maxitems' => 1]
               ]
           ] // grid configuration
       )
   )
   // override default configurations
   ->setIcon('EXT:container_example/Resources/Public/Icons/b13-2cols-with-header-container.svg')
   ->setSaveAndCloseInNewContentElementWizard(false)
);

// override default settings
$GLOBALS['TCA']['tt_content']['types']['b13-2cols-with-header-container']['showitem'] = 'sys_language_uid,CType,header,tx_container_parent,colPos';

// second container
\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
   (
       new \B13\Container\Tca\ContainerConfiguration(
           'b13-2cols', // CType
           '2 Column', // label
           'Some Description of the Container', // description
           [
               [
                   ['name' => '2-cols-left', 'colPos' => 200],
                   ['name' => '2-cols-right', 'colPos' => 201]
               ]
           ] // grid configuration
       )
   )
);