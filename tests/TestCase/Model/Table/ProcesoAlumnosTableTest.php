<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProcesoAlumnosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProcesoAlumnosTable Test Case
 */
class ProcesoAlumnosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProcesoAlumnosTable
     */
    public $ProcesoAlumnos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProcesoAlumnos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProcesoAlumnos') ? [] : ['className' => ProcesoAlumnosTable::class];
        $this->ProcesoAlumnos = TableRegistry::getTableLocator()->get('ProcesoAlumnos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProcesoAlumnos);

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
