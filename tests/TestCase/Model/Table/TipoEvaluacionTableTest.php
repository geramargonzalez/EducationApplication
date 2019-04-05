<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoEvaluacionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoEvaluacionTable Test Case
 */
class TipoEvaluacionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoEvaluacionTable
     */
    public $TipoEvaluacion;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TipoEvaluacion'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TipoEvaluacion') ? [] : ['className' => TipoEvaluacionTable::class];
        $this->TipoEvaluacion = TableRegistry::getTableLocator()->get('TipoEvaluacion', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TipoEvaluacion);

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
