<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TallerUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TallerUsersTable Test Case
 */
class TallerUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TallerUsersTable
     */
    public $TallerUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TallerUsers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TallerUsers') ? [] : ['className' => TallerUsersTable::class];
        $this->TallerUsers = TableRegistry::getTableLocator()->get('TallerUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TallerUsers);

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
