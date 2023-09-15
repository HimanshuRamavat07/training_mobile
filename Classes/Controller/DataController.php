<?php

declare(strict_types=1);

namespace NITSAN\NsMobile\Controller;

class DataController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * mobileRepository
     *
     * @var \NITSAN\NsMobile\Domain\Repository\MobileRepository
     */
    protected $mobileRepository = null;

    /**
     * @param \NITSAN\NsMobile\Domain\Repository\MobileRepository $mobileRepository
     */
    public function injectMobileRepository(\NITSAN\NsMobile\Domain\Repository\MobileRepository $mobileRepository)
    {
        $this->mobileRepository = $mobileRepository;
    }

    /**
     * accessoriesRepository
     *
     * @var \NITSAN\NsMobile\Domain\Repository\AccessoriesRepository
     */
    protected $accessoriesRepository = null;

    /**
     * @param \NITSAN\NsMobile\Domain\Repository\AccessoriesRepository $accessoriesRepository
     */
    public function injectAccessoriesRepository(\NITSAN\NsMobile\Domain\Repository\AccessoriesRepository $accessoriesRepository)
    {
        $this->accessoriesRepository = $accessoriesRepository;
    }

    /**
     * brandRepository
     *
     * @var \NITSAN\NsMobile\Domain\Repository\BrandRepository
     */
    protected $brandRepository = null;

    /**
     * @param \NITSAN\NsMobile\Domain\Repository\BrandRepository $brandRepository
     */
    public function injectBrandRepository(\NITSAN\NsMobile\Domain\Repository\BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    /**
     * modelRepository
     *
     * @var \NITSAN\NsMobile\Domain\Repository\ModelRepository
     */
    protected $modelRepository = null;

    /**
     * @param \NITSAN\NsMobile\Domain\Repository\ModelRepository $modelRepository
     */
    public function injectModelRepository(\NITSAN\NsMobile\Domain\Repository\ModelRepository $modelRepository)
    {
        $this->modelRepository = $modelRepository;
    }

    /**
     * technologyRepository
     *
     * @var \NITSAN\NsMobile\Domain\Repository\TechnologyRepository
     */
    protected $technologyRepository = null;

    /**
     * @param \NITSAN\NsMobile\Domain\Repository\TechnologyRepository $technologyRepository
     */
    public function injectTechnologyRepository(\NITSAN\NsMobile\Domain\Repository\TechnologyRepository $technologyRepository)
    {
        $this->technologyRepository = $technologyRepository;
    }

    /**
     * ramRepository
     *
     * @var \NITSAN\NsMobile\Domain\Repository\RamRepository
     */
    protected $ramRepository = null;

    /**
     * @param \NITSAN\NsMobile\Domain\Repository\ModelRepository $ramRepository
     */
    public function injectRamRepository(\NITSAN\NsMobile\Domain\Repository\ModelRepository $ramRepository)
    {
        $this->ramRepository = $ramRepository;
    }

}