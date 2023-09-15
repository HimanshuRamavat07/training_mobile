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
 * Model
 */
class Model extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * modelName
     *
     * @var string
     */
    protected $modelName = '';

    /**
     * @var string
     */
    protected $ram = "";

    /**
     * @var string
     */
    protected $rom = "";

    /**
     * @var string
     */
    protected $slug = "";

    /**
     * accessories
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NITSAN\NsMobile\Domain\Model\Accessories>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $accessories = null;

    /**
     * technology
     *
     * @var \NITSAN\NsMobile\Domain\Model\Technology
     */
    protected $technology = null;

    /**
     * Returns the modelName
     *
     * @return string
     */
    public function getModelName()
    {
        return $this->modelName;
    }
   

    /**
     * Sets the modelName
     *
     * @param string $modelName
     * @return void
     */
    public function setModelName(string $modelName)
    {
        $this->modelName = $modelName;
    }
    /**
     * Returns the slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
    
    /**
     * Sets the slug
     *
     * @param string $slug
     * @return void
     */
    public function setSlug(string $slug)
    {
        $this->slug = $slug;
    }
    /**
     * Returns the ram
     *
     * @return string
     */
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * Sets the ram
     *
     * @param string $ram
     * @return void
     */
    public function setRam(string $ram)
    {
        $this->ram = $ram;
    }

    /**
     * Returns the ram
     *
     * @return string
     */
    public function getRom()
    {
        return $this->rom;
    }

    /**
     * Sets the Rom
     *
     * @param string $rom
     * @return void
     */
    public function setRom(string $rom)
    {
        $this->rom = $rom;
    }

    /**
     * Returns the technology
     *
     * @return \NITSAN\NsMobile\Domain\Model\Technology
     */
    public function getTechnology()
    {
        return $this->technology;
    }

    /**
     * Sets the technology
     *
     * @param \NITSAN\NsMobile\Domain\Model\Technology $technology
     * @return void
     */
    public function setTechnology(\NITSAN\NsMobile\Domain\Model\Technology $technology)
    {
        $this->technology = $technology;
    }

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->accessories = $this->accessories ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Accessories
     *
     * @param \NITSAN\NsMobile\Domain\Model\Accessories $accessory
     * @return void
     */
    public function addAccessory(\NITSAN\NsMobile\Domain\Model\Accessories $accessory)
    {
        $this->accessories->attach($accessory);
    }

    /**
     * Removes a Accessories
     *
     * @param \NITSAN\NsMobile\Domain\Model\Accessories $accessoryToRemove The Accessories to be removed
     * @return void
     */
    public function removeAccessory(\NITSAN\NsMobile\Domain\Model\Accessories $accessoryToRemove)
    {
        $this->accessories->detach($accessoryToRemove);
    }

    /**
     * Returns the accessories
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NITSAN\NsMobile\Domain\Model\Accessories>
     */
    public function getAccessories()
    {
        return $this->accessories;
    }

    /**
     * Sets the accessories
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NITSAN\NsMobile\Domain\Model\Accessories> $accessories
     * @return void
     */
    public function setAccessories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $accessories)
    {
        $this->accessories = $accessories;
    }
}
