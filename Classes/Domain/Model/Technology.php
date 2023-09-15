<?php

declare(strict_types=1);

namespace NITSAN\NsMobile\Domain\Model;


/**
 * This file is part of the "Mobile Planet" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Himanshu <himanshu.nitsan@gmail.com>, nitsan
 */

/**
 * Technology
 */
class Technology extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * technologyName
     *
     * @var string
     */
    protected $technologyName = '';

    /**
     * Returns the technologyName
     *
     * @return string
     */
    public function getTechnologyName()
    {
        return $this->technologyName;
    }

    /**
     * Sets the technologyName
     *
     * @param string $technologyName
     * @return void
     */
    public function setTechnologyName(string $technologyName)
    {
        $this->technologyName = $technologyName;
    }
}
