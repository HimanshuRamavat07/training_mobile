<?php

declare(strict_types=1);

namespace NITSAN\NsMobile\Domain\Model;

use NITSAN\NsMobile\Domain\Validator;
use TYPO3\CMS\Extbase\Annotation as Extbase;



/**
 * This file is part of the "Mobile Planet" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Himanshu <himanshu.nitsan@gmail.com>, nitsan
 */

/**
 * Mobile
 */
class Mobile extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

    /**
     * price
     *
     * @var int $price
     */ 
    protected $price = null;

    /**
     * feature
     *
     * @var string
     * 
     * @Extbase\Validate("NITSAN\NsMobile\Domain\Validator\FeatureValidator")
     */
    protected $feature = '';

    /**
     * model
     *
     * @var \NITSAN\NsMobile\Domain\Model\Model
     */
    protected $model = null;

    /**
     * brand
     *
     * @var \NITSAN\NsMobile\Domain\Model\Brand
     */
    protected $brand = null;

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the price
     *
     * @param int $price
     * @return void
     */
    public function setPrice(int $price)
    {
        $this->price = $price;
    }

    /**
     * Returns the feature
     *
     * @return string
     */
    public function getFeature()
    {
        return $this->feature;
    }

    /**
     * Sets the feature
     *
     * @param string $feature
     * @return void
     */
    public function setFeature(string $feature)
    {
        $this->feature = $feature;
    }

    /**
     * Returns the model
     *
     * @return \NITSAN\NsMobile\Domain\Model\Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Sets the model
     *
     * @param \NITSAN\NsMobile\Domain\Model\Model $model
     * @return void
     */
    public function setModel(\NITSAN\NsMobile\Domain\Model\Model $model)
    {
        $this->model = $model;
    }

    /**
     * Returns the brand
     *
     * @return \NITSAN\NsMobile\Domain\Model\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Sets the brand
     *
     * @param \NITSAN\NsMobile\Domain\Model\Brand $brand
     * @return void
     */
    public function setBrand(\NITSAN\NsMobile\Domain\Model\Brand $brand)
    {
        $this->brand = $brand;
    }
}
