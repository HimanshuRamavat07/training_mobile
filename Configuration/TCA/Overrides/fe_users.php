<?php
defined('TYPO3') or die();

// Add some fields to fe_users table to show TCA fields definitions
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_nsmobile_domain_model_mobile',
   [
      'tx_nsmobile_options' => [
         'exclude' => 0,
         'label' => 'New field',
         'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
               ['',0,],
               ['New field.I.0',1,],
               ['New field.I.1',2,],
               ['New field.I.2','--div--',],
               ['New field.I.3',3,],
            ],
            'size' => 1,
            'maxitems' => 1,
         ],
      ],
      'tx_nsmobile_special' => [
         'exclude' => 0,
         'label' => 'Special field',
         'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
               ['',0,],
               ['New field.I.0',1,],
               ['New field.I.1',2,],
               ['New field.I.2','--div--',],
               ['New field.I.3',3,],
            ],
            'size' => 1,
            'maxitems' => 1,
         ],
      ],
   ]
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
   'tx_nsmobile_domain_model_mobile',
   'tx_nsmobile_options, tx_nsmobile_special',
   '',
   'after:sys_language_uid'
);