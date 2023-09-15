<?php

namespace NITSAN\NsMobile\Hook;

use TYPO3\CMS\Core\DataHandling\DataHandler;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\DebuggerUtility;


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
                // DebuggerUtility::var_dump($row, __FILE__ . ' - Line no: ' . __LINE__);
                $slug = $row['slug'];
            }
            if($slug) {
                GeneralUtility::makeInstance(ConnectionPool::class)
                    ->getConnectionForTable('tx_nsmobile_domain_model_mobile')
                    ->update(
                        'tx_nsmobiles_domain_model_mobile',
                        ['slug'=>$slug],
                        ['model'=>$uid]
                    );
            }
    }
}



