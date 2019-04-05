<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TurnoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TurnoTable Test Case
 */
class TurnoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TurnoTable
     */
    public $Turno;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Turno'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Turno') ? [] : ['className' => TurnoTable::class];
        $this->Turno = TableRegistry::getTableLocator()->get('Turno', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Turno);

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
