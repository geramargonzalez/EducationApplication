<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CentroTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CentroTable Test Case
 */
class CentroTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CentroTable
     */
    public $Centro;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Centro'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Centro') ? [] : ['className' => CentroTable::class];
        $this->Centro = TableRegistry::getTableLocator()->get('Centro', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Centro);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
