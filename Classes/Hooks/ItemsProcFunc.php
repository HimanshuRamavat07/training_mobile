<?php 

namespace NITSAN\NsMobile\Hooks;

use TYPO3\CMS\Core\Utility\GeneralUtility;


class ItemsProcFunc
{
     /**
     * Modifies the select box of orderBy-options.
     *
     * @param array &$config configuration array
     */
     public function user_orderBy(array &$config)
     {
        // simple and stupid example
        // change this to dynamically populate the list!
        $ids = $config['row']['uid'];
        $config['items'] = [
            // label, value
            ['Timestamp', 'timestamp'],
            ['Title', 'title'],
            ['id', $ids]
        ];

    }

    // ...
}