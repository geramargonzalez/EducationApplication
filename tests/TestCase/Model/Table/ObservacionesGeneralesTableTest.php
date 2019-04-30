<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ObservacionesGeneralesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ObservacionesGeneralesTable Test Case
 */
class ObservacionesGeneralesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ObservacionesGeneralesTable
     */
    public $ObservacionesGenerales;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ObservacionesGenerales'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ObservacionesGenerales') ? [] : ['className' => ObservacionesGeneralesTable::class];
        $this->ObservacionesGenerales = TableRegistry::getTableLocator()->get('ObservacionesGenerales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ObservacionesGenerales);

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
