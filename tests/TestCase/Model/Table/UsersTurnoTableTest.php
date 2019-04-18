<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTurnoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTurnoTable Test Case
 */
class UsersTurnoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTurnoTable
     */
    public $UsersTurno;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UsersTurno'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UsersTurno') ? [] : ['className' => UsersTurnoTable::class];
        $this->UsersTurno = TableRegistry::getTableLocator()->get('UsersTurno', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersTurno);

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
