<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProfesorTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProfesorTable Test Case
 */
class ProfesorTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProfesorTable
     */
    public $Profesor;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Profesor'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Profesor') ? [] : ['className' => ProfesorTable::class];
        $this->Profesor = TableRegistry::getTableLocator()->get('Profesor', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Profesor);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
