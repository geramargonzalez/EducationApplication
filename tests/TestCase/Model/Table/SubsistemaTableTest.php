<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubsistemaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubsistemaTable Test Case
 */
class SubsistemaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SubsistemaTable
     */
    public $Subsistema;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Subsistema'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Subsistema') ? [] : ['className' => SubsistemaTable::class];
        $this->Subsistema = TableRegistry::getTableLocator()->get('Subsistema', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Subsistema);

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
