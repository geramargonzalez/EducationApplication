<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersCentroTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersCentroTable Test Case
 */
class UsersCentroTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersCentroTable
     */
    public $UsersCentro;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UsersCentro'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UsersCentro') ? [] : ['className' => UsersCentroTable::class];
        $this->UsersCentro = TableRegistry::getTableLocator()->get('UsersCentro', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersCentro);

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
