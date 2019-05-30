<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EvidenciasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EvidenciasTable Test Case
 */
class EvidenciasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EvidenciasTable
     */
    public $Evidencias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Evidencias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Evidencias') ? [] : ['className' => EvidenciasTable::class];
        $this->Evidencias = TableRegistry::getTableLocator()->get('Evidencias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Evidencias);

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
