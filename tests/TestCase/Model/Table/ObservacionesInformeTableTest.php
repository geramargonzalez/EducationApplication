<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ObservacionesInformeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ObservacionesInformeTable Test Case
 */
class ObservacionesInformeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ObservacionesInformeTable
     */
    public $ObservacionesInforme;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ObservacionesInforme'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ObservacionesInforme') ? [] : ['className' => ObservacionesInformeTable::class];
        $this->ObservacionesInforme = TableRegistry::getTableLocator()->get('ObservacionesInforme', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ObservacionesInforme);

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
