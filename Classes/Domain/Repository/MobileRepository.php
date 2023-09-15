<?php

declare(strict_types=1);

namespace NITSAN\NsMobile\Domain\Repository;

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
/**
 * This file is part of the "Mobile Planet" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Himanshu <himanshu.nitsan@gmail.com>, nitsan
 */

/**
 * The repository for Mobiles
 */
class MobileRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @param $value
     * if all value present
     */
    public function findData($value)
    {
        
        $query = $this->createQuery();
        $query->matching(
        $query->logicalAnd(
        $query->equals('model.modelName', $value['modelName']),
        $query->equals('model.technology.technologyName', $value['technologyName']),
        $query->equals('brand.brandName', $value['brandName'])
        )
        );
        return $query->execute();
        
        
    }

    /**
     * @param $value
     * if any one value present
     */
    public function findAnyData($value)
    {
        $query = $this->createQuery();
        $query->matching(
        $query->logicalOr(
        $query->equals('model.modelName', $value['modelName']),
        $query->equals('model.technology.technologyName', $value['technologyName']),
        $query->equals('brand.brandName', $value['brandName'])
        )
        );
        return $query->execute();
    }

}
