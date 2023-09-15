<?php

declare(strict_types=1);

namespace NITSAN\NsMobile\Controller;

use TYPO3\CMS\Core\Pagination\ArrayPaginator;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Pagination\SimplePagination;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Core\Utility;

/**
 * This file is part of the "Mobile Planet" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Himanshu <himanshu.nitsan@gmail.com>, nitsan
 */

/**
 * BackendController
 */
class BackendController extends \NITSAN\NsMobile\Controller\DataController
{

    /**
     * mobileRepository
     *
     * @var \NITSAN\NsMobile\Domain\Repository\MobileRepository
     */
    protected $mobileRepository = null;

    /**
     * action index
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function indexAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $pidList = $this->configurationManager->getConfiguration(
            \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK
        )['persistence']['storagePid'];

/*         \TYPO3\CMS\Core\Utility\DebugUtility::debugInPopUpWindow($pidList,$header = 'Debug',$group = 'Backend' );
 */

        $currentPage = $this->request->hasArgument('currentPage') ? (int) $this->request->getArgument('currentPage') : 1;
        $name = GeneralUtility::_POST();
        if (empty($name['modelName']) && empty($name['technologyName']) && empty($name['brandName'])) {
            $itemsToBePaginated = $this->mobileRepository->findAll()->toArray();
        } else {
            if ($name['modelName'] != '' && $name['technologyName'] == '' && $name['brandName'] == '') {
                $itemsToBePaginated = $this->mobileRepository->findAnyData($name)->toArray();
            } elseif ($name['modelName'] == '' && $name['technologyName'] != '' && $name['brandName'] == '') {
                $itemsToBePaginated = $this->mobileRepository->findAnyData($name)->toArray();
            } elseif ($name['modelName'] == '' && $name['technologyName'] == '' && $name['brandName'] != '') {
                $itemsToBePaginated = $this->mobileRepository->findAnyData($name)->toArray();
            } else {
                if ($name['modelName'] != '' && $name['technologyName'] != '' && $name['brandName'] == '') {
                    $itemsToBePaginated = $this->mobileRepository->findAnyData($name)->toArray();
                } elseif ($name['modelName'] == '' && $name['technologyName'] != '' && $name['brandName'] != '') {
                    $itemsToBePaginated = $this->mobileRepository->findAnyData($name)->toArray();
                } elseif ($name['modelName'] != '' && $name['technologyName'] == '' && $name['brandName'] != '') {
                    $itemsToBePaginated = $this->mobileRepository->findAnyData($name)->toArray();
                } else {
                    if ($name['modelName'] != '' && $name['technologyName'] != '' && $name['brandName'] != '') {
                        $data = $name;
                        $itemsToBePaginated = $this->mobileRepository->findData($data)->toArray();
                    } else {
                        $itemsToBePaginated = $this->mobileRepository->findAll()->toArray();
                    }
                }
            }
        }
        $itemsPerPage = 2;
        $maximumNumberOfLinks = 11;
        $paginator = new ArrayPaginator($itemsToBePaginated, $currentPage, (int)$itemsPerPage);
        $paginationClass = SimplePagination::class;
        $pagination = GeneralUtility::makeInstance($paginationClass, $paginator);
        $pagination = new SimplePagination($paginator);
        $allpage = $pagination->getAllPageNumbers();
        $prevPage = $pagination->getPreviousPageNumber();
        $nextPage = $pagination->getNextPageNumber();
        $modelName = "";
        $technologyName = "";
        $brandName = "";
        if ($name) {
            if (!empty($name['modelName']) && empty($name['technologyName']) && empty($name['brandName'])) {
                $modelName = $name['modelName'];
            } elseif ($name && !empty($name['technologyName']) && empty($name['modelName']) && empty($name['brandName'])) {
                $technologyName = $name['technologyName'];
            } elseif ($name && !empty($name['brandName']) && empty($name['technologyNameName']) && empty($name['modelName'])) {
                $brandName = $name['brandName'];
            } elseif (!empty($name['technologyName']) && !empty($name['modelName']) && empty($name['brandName'])) {
                $technologyName = $name['technologyName'];
                $modelName = $name['modelName'];
            } elseif (!empty($name['technologyName']) && !empty($name['brandName']) && empty($name['modelName'])) {
                $technologyName = $name['technologyName'];
                $brandName = $name['brandName'];
            } elseif (!empty($name['brandName']) && !empty($name['modelName']) && empty($name['technologyName'])) {
                $brandName = $name['brandName'];
                $modelName = $name['modelName'];
            } elseif (!empty($name['modelName']) && !empty($name['technologyName']) && !empty($name['brandName'])) {
                $modelName = $name['modelName'];
                $technologyName = $name['technologyName'];
                $brandName = $name['brandName'];
            }
        } else {
            $modelName = "";
            $technologyName = "";
            $brandName = "";
        }
        //pagination in typo3


        $mobiles = $this->mobileRepository->findAll();
        $this->view->assignMultiple(
            [
                'id' => $pidList,
                'pagination' => [
                    'currentPage' => $currentPage,
                    'paginator' => $paginator,
                    'pagination' => $pagination,
                    'allpage' => $allpage,
                    'mobile' => $itemsToBePaginated,
                    'mobiles' => $mobiles
                ],
                'prevPage' => $prevPage,
                'nextPage' => $nextPage,
                'modelName' => $modelName,
                'technologyName' => $technologyName,
                'brandName' => $brandName
            ]
        );

        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \NITSAN\NsMobile\Domain\Model\Mobile $mobile
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\NITSAN\NsMobile\Domain\Model\Mobile $mobile): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('mobile', $mobile);
        return $this->htmlResponse();
    }

    /**
     * action new
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function newAction(): \Psr\Http\Message\ResponseInterface
    {
        $brand = $this->brandRepository->findAll();
        $model = $this->modelRepository->findAll();
        $this->view->assignMultiple(['brands' => $brand, 'model' => $model]);
        return $this->htmlResponse();
    }

    /**
     * action create
     *
     * @param \NITSAN\NsMobile\Domain\Model\Mobile $newMobile
     */
    public function createAction(\NITSAN\NsMobile\Domain\Model\Mobile $newMobile)
    {
        $this->addFlashMessage('The object was created.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->mobileRepository->add($newMobile);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \NITSAN\NsMobile\Domain\Model\Mobile $mobile
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("mobile")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\NITSAN\NsMobile\Domain\Model\Mobile $mobile): \Psr\Http\Message\ResponseInterface
    {
        $brand = $this->brandRepository->findAll();
        $technology = $this->technologyRepository->findAll();
        $accessories = $this->accessoriesRepository->findAll();
        $model = $this->modelRepository->findAll();
        $this->view->assignMultiple(['mobile' => $mobile, 'brands' => $brand, 'technologys' => $technology, 'accessories' => $accessories, 'model' => $model]);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \NITSAN\NsMobile\Domain\Model\Mobile $mobile
     */
    public function updateAction(\NITSAN\NsMobile\Domain\Model\Mobile $mobile)
    {
        $this->addFlashMessage('Mobile Information Update', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::INFO);
        $this->mobileRepository->update($mobile);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \NITSAN\NsMobile\Domain\Model\Mobile $mobile
     */
    public function deleteAction(\NITSAN\NsMobile\Domain\Model\Mobile $mobile)
    {
        $this->addFlashMessage('The object was deleted', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->mobileRepository->remove($mobile);
        $this->redirect('list');
    }

    /**
     * @param \NITSAN\NsMobile\Domain\Repository\MobileRepository $mobileRepository
     */
    public function injectMobileRepository(\NITSAN\NsMobile\Domain\Repository\MobileRepository $mobileRepository)
    {
        $this->mobileRepository = $mobileRepository;
    }

    /**
     * action filter
     */
    public function filterAction()
    {
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($_POST, __FILE__ . '' . __LINE__);
        $data = $_POST;
        $mobile = $this->mobileRepository->findData($data);

        // debug($mobile);  exit;
        $this->view->assign('mobile', $mobile);
        return $this->htmlResponse();
    }
}
