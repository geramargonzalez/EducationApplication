<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InformePedagogicoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InformePedagogicoTable Test Case
 */
class InformePedagogicoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InformePedagogicoTable
     */
    public $InformePedagogico;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.InformePedagogico'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('InformePedagogico') ? [] : ['className' => InformePedagogicoTable::class];
        $this->InformePedagogico = TableRegistry::getTableLocator()->get('InformePedagogico', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InformePedagogico);

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
