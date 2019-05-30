<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DerivacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DerivacionesTable Test Case
 */
class DerivacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DerivacionesTable
     */
    public $Derivaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Derivaciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Derivaciones') ? [] : ['className' => DerivacionesTable::class];
        $this->Derivaciones = TableRegistry::getTableLocator()->get('Derivaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Derivaciones);

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
