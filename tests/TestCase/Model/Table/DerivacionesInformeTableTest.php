<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DerivacionesInformeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DerivacionesInformeTable Test Case
 */
class DerivacionesInformeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DerivacionesInformeTable
     */
    public $DerivacionesInforme;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DerivacionesInforme'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DerivacionesInforme') ? [] : ['className' => DerivacionesInformeTable::class];
        $this->DerivacionesInforme = TableRegistry::getTableLocator()->get('DerivacionesInforme', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DerivacionesInforme);

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
