<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EvidenciasResultadoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EvidenciasResultadoTable Test Case
 */
class EvidenciasResultadoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EvidenciasResultadoTable
     */
    public $EvidenciasResultado;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.EvidenciasResultado'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EvidenciasResultado') ? [] : ['className' => EvidenciasResultadoTable::class];
        $this->EvidenciasResultado = TableRegistry::getTableLocator()->get('EvidenciasResultado', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EvidenciasResultado);

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
