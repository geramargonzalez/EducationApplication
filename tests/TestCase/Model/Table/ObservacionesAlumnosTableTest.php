<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ObservacionesAlumnosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ObservacionesAlumnosTable Test Case
 */
class ObservacionesAlumnosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ObservacionesAlumnosTable
     */
    public $ObservacionesAlumnos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ObservacionesAlumnos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ObservacionesAlumnos') ? [] : ['className' => ObservacionesAlumnosTable::class];
        $this->ObservacionesAlumnos = TableRegistry::getTableLocator()->get('ObservacionesAlumnos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ObservacionesAlumnos);

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
