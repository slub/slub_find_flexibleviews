<?php
namespace Slub\SlubFindFlexibleviews\Controller;


/***
 *
 * This file is part of the "SLUB" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2021 
 *
 ***/
/**
 * FlexibleviewsController
 */
class FlexibleviewsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * flexibleviewsRepository
     * 
     * @var \Slub\SlubFindFlexibleviews\Domain\Repository\FlexibleviewsRepository
     */
    protected $flexibleviewsRepository = null;

    /**
     * @param \Slub\SlubFindFlexibleviews\Domain\Repository\FlexibleviewsRepository $flexibleviewsRepository
     */
    public function injectFlexibleviewsRepository(\Slub\SlubFindFlexibleviews\Domain\Repository\FlexibleviewsRepository $flexibleviewsRepository)
    {
        $this->flexibleviewsRepository = $flexibleviewsRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $flexibleviews = $this->flexibleviewsRepository->findAll();
        $this->view->assign('flexibleviews', $flexibleviews);
    }

    /**
     * action show
     * 
     * @param \Slub\SlubFindFlexibleviews\Domain\Model\Flexibleviews $flexibleviews
     * @return void
     */
    public function showAction(\Slub\SlubFindFlexibleviews\Domain\Model\Flexibleviews $flexibleviews)
    {
        $this->view->assign('flexibleviews', $flexibleviews);
    }
}
