<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ObservacionesGrupoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ObservacionesGrupoTable Test Case
 */
class ObservacionesGrupoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ObservacionesGrupoTable
     */
    public $ObservacionesGrupo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ObservacionesGrupo'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ObservacionesGrupo') ? [] : ['className' => ObservacionesGrupoTable::class];
        $this->ObservacionesGrupo = TableRegistry::getTableLocator()->get('ObservacionesGrupo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ObservacionesGrupo);

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
