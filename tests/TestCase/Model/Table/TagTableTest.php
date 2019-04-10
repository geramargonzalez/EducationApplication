<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TagTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TagTable Test Case
 */
class TagTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TagTable
     */
    public $Tag;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Tag'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Tag') ? [] : ['className' => TagTable::class];
        $this->Tag = TableRegistry::getTableLocator()->get('Tag', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tag);

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
