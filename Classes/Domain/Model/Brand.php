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
 * Brand
 */
class Brand extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * brandName
     *
     * @var string
     */
    protected $brandName = '';

    /**
     * Returns the brandName
     *
     * @return string
     */
    public function getBrandName()
    {
        return $this->brandName;
    }

    /**
     * Sets the brandName
     *
     * @param string $brandName
     * @return void
     */
    public function setBrandName(string $brandName)
    {
        $this->brandName = $brandName;
    }
}
