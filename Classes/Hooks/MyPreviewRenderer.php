<?php

namespace NITSAN\NsMobile\Hooks;

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;
use TYPO3\CMS\Core\Utility\DebuggerUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;

/**
 * Hook to display verbose information about the felogin plugin
 *
 */
class MyPreviewRenderer implements PageLayoutViewDrawItemHookInterface
{

    /**
     * Preprocesses the preview rendering of a content element.
     *
     * @param \TYPO3\CMS\Backend\View\PageLayoutView $parentObject Calling parent object
     * @param bool $drawItem Whether to draw the item using the default functionalities
     * @param string $headerContent Header content
     * @param string $itemContent Item content
     * @param array $row Record row of tt_content
     * @return  void
     */
    public function preProcess(
        \TYPO3\CMS\Backend\View\PageLayoutView &$parentObject,
        &$drawItem,
        &$headerContent,
        &$itemContent,
        array &$row
    ) {
        // debug($row);
        
     /*    if ($row['CType'] === 'list') {
            $itemContent .= '<div class="container " style="width:500px;font-size: 0.85rem;">
            <h3>Plugin Details</h3>
            <table class="table table-hover table-striped">
                <tr>
                    <th>Id  :</th>
                    <td>'.$row["uid"].'</td>
                </tr>
                <tr>
                    <th>CType :</th>
                    <td>'.$row["CType"].'</td>
                </tr>
                <tr>
                    <th>No of items per page :</th>
                    <td>'.$row["pi_flexform_transformed"]["settings"]["number"].'</td>
                </tr>
                <tr>
                    <th>Record Storage Page :</th>
                    <td>'.$row["pages"].'</td>
                </tr>
            </table>
        </div>';
            if ($row['assets']) {
                $itemContent .= $parentObject->thumbCode($row, 'tt_content', 'assets') . '<br />';
            }
            $drawItem = false;
        } */
    
    }


}


class DataHandlerHook
{
    public function processDatamap_afterDatabaseOperations(
        $status,
        $table,
        $uid,
        array &$fieldArray,
        \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj
    ) {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tt_content');
        $result = $queryBuilder
            ->select('slug')
            ->from('tx_nsmobile_domain_model_model')
            ->where(
                $queryBuilder->expr()->eq('uid',$queryBuilder->createNamedParameter($uid))
            )
            ->executeQuery();

            while($row = $result->fetchAssociative()) {
                $slug = $row['slug'];
            }

            if(isset($slug)) {
                GeneralUtility::makeInstance(ConnectionPool::class)
                    ->getConnectionForTable('tx_nsmobile_domain_model_mobile')
                    ->update(
                        'tx_nsmobile_domain_model_mobile',
                        ['slug' => $slug],
                        ['model' => $uid]
                    );
            }else{
                
            }
            
    }
}
