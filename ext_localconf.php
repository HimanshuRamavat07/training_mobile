<?php
defined('TYPO3') || die();

(static function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'NsMobile',
        'Mobileplugin',
        [
            \NITSAN\NsMobile\Controller\MobileController::class => ' list, show, new, create, edit, update, delete, inquiry',
        ],
        // non-cacheable actions
        [
            \NITSAN\NsMobile\Controller\MobileController::class => 'create, update, delete',
        ]
    );
})();
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
// Let's add default PageTSConfig for Backend layout, TCE form, Components etc.,
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:ns_mobile/Configuration/PageTSconfig/setup.tsconfig">');

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['fluid_styled_slider'] = \NITSAN\NsMobile\Hooks\MyPreviewRenderer::class;

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['nsMobile_updateWizard']
   = \NITSAN\NsMobile\Updates\UpdateWizard::class;

//$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][]
//= \NITSAN\NsMobile\Hooks\DataHandlerHook::class;
//$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass'][]
//   = \NITSAN\NsMobile\Hooks\DataHandlerHook::class;


