<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AlumnosTallerTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AlumnosTallerTable Test Case
 */
class AlumnosTallerTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AlumnosTallerTable
     */
    public $AlumnosTaller;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.AlumnosTaller'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AlumnosTaller') ? [] : ['className' => AlumnosTallerTable::class];
        $this->AlumnosTaller = TableRegistry::getTableLocator()->get('AlumnosTaller', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AlumnosTaller);

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
