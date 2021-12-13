<?php
namespace Slub\SlubFindFlexibleviews\Tests\Unit\Slots;

use Solarium\QueryType\Select\Query\Query;
use Slub\SlubFindFlexibleviews\Slots\AdvancedQuery;
use Slub\SlubFindFlexibleviews\Domain\Repository\FlexibleviewsRepository;
use Slub\SlubFindFlexibleviews\Domain\Model\Flexibleviews;

class AdvancedQueryTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase {

    /**
     * @var AdvancedQuery
     */
    protected $advancedQuery = null;

    /**
     * @var FlexibleviewsRepository
     */
    protected $flexibleviewsRepository = null;

    protected function setUp()
    {
        parent::setUp();
        // Mock is necessary for being able to inject mocked version of flexibleviewsRepository
        $this->advancedQuery = $this->getMockBuilder(AdvancedQuery::class)
            ->setMethodsExcept(['build', 'injectFlexibleviewsRepository'])
            ->disableOriginalConstructor()
            ->getMock();

        $this->flexibleviewsRepository = $this->getMockBuilder(FlexibleviewsRepository::class)
            ->setMethods(['findByUid'])
            ->disableOriginalConstructor()
            ->getMock();

        $flexibleviews = new Flexibleviews();
        $this->flexibleviewsRepository
             ->method('findByUid')
             ->will($this->returnValueMap([[1, $flexibleviews]]));

        $this->inject($this->advancedQuery, 'flexibleviewsRepository', $this->flexibleviewsRepository);
    }

    /**
     * @test
     */
    public function nullArgumentsDontChangeQuery() {
        $preparedQuery = new Query();
        $preparedQueryString = $preparedQuery->getQuery();

        $this->advancedQuery->build($preparedQuery, null);

        $this->assertEquals($preparedQuery->getQuery(), $preparedQueryString);
        $this->assertEquals(count($preparedQuery->getFilterQueries()), 0);
    }

    /**
     * @test
     */
    public function emptyArgumentsDontChangeQuery() {
        $preparedQuery = new Query();
        $preparedQueryString = $preparedQuery->getQuery();

        $this->advancedQuery->build($preparedQuery, []);

        $this->assertEquals(count($preparedQuery->getFilterQueries()), 0);
        $this->assertEquals($preparedQuery->getQuery(), $preparedQueryString);
    }

    /**
     * @test
     */
    public function argumentIsAppendedToQuery() {
        $preparedQuery = new Query();
        $arguments = array(
            'flexibleviews' => '1' 
        );
        $countFilterQueries = count($preparedQuery->getFilterQueries());

        $this->advancedQuery->build($preparedQuery, $arguments);

        $this->assertEquals(count($preparedQuery->getFilterQueries()), $countFilterQueries + 1);
    }

    /**
     * @test
     */
    public function invalidArgumentIsNotAppendedToQuery() {
        $preparedQuery = new Query();
        $arguments = array(
            'flexibleviews' => '2' 
        );

        $this->advancedQuery->build($preparedQuery, $arguments);

        $this->assertEquals(count($preparedQuery->getFilterQueries()), 0);
    }

}
