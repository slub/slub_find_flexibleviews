<?php
namespace Slub\SlubFindFlexibleviews\Tests\Unit\Slots;

use Solarium\QueryType\Select\Query\Query;
use Slub\SlubFindFlexibleviews\Slots\AdvancedQuery;

class AdvancedQueryTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase {

    /**
     * @var AdvancedQuery
     */
    protected $advancedQuery = null;

    protected function setUp()
    {
        parent::setUp();
        $this->advancedQuery = new AdvancedQuery();
    }

    /**
     * @test
     */
    public function nullArgumentsDontChangeQuery() {
        $preparedQuery = new Query();
        $preparedQueryString = $preparedQuery->getQuery();

        $this->advancedQuery->build($preparedQuery, null);

        $this->assertEquals($preparedQuery->getQuery(), $preparedQueryString);
    }

    /**
     * @test
     */
    public function emptyArgumentsDontChangeQuery() {
        $preparedQuery = new Query();
        $preparedQueryString = $preparedQuery->getQuery();

        $this->advancedQuery->build($preparedQuery, []);

        $this->assertEquals($preparedQuery->getQuery(), $preparedQueryString);
    }

}
