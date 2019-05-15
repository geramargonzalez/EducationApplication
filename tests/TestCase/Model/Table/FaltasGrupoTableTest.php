<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FaltasGrupoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FaltasGrupoTable Test Case
 */
class FaltasGrupoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FaltasGrupoTable
     */
    public $FaltasGrupo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FaltasGrupo'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FaltasGrupo') ? [] : ['className' => FaltasGrupoTable::class];
        $this->FaltasGrupo = TableRegistry::getTableLocator()->get('FaltasGrupo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FaltasGrupo);

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
