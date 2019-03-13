<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TallerTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TallerTable Test Case
 */
class TallerTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TallerTable
     */
    public $Taller;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Taller',
        'app.Alumnos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Taller') ? [] : ['className' => TallerTable::class];
        $this->Taller = TableRegistry::getTableLocator()->get('Taller', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Taller);

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
