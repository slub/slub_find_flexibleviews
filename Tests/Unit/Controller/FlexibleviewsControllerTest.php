<?php
namespace Slub\SlubFindFlexibleviews\Tests\Unit\Controller;

/**
 * Test case.
 */
class FlexibleviewsControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Slub\SlubFindFlexibleviews\Controller\FlexibleviewsController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Slub\SlubFindFlexibleviews\Controller\FlexibleviewsController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllFlexibleviewssFromRepositoryAndAssignsThemToView()
    {

        $allFlexibleviewss = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $flexibleviewsRepository = $this->getMockBuilder(\Slub\SlubFindFlexibleviews\Domain\Repository\FlexibleviewsRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $flexibleviewsRepository->expects(self::once())->method('findAll')->will(self::returnValue($allFlexibleviewss));
        $this->inject($this->subject, 'flexibleviewsRepository', $flexibleviewsRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('flexibleviewss', $allFlexibleviewss);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenFlexibleviewsToView()
    {
        $flexibleviews = new \Slub\SlubFindFlexibleviews\Domain\Model\Flexibleviews();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('flexibleviews', $flexibleviews);

        $this->subject->showAction($flexibleviews);
    }
}
