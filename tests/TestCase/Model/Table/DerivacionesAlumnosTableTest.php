<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DerivacionesAlumnosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DerivacionesAlumnosTable Test Case
 */
class DerivacionesAlumnosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DerivacionesAlumnosTable
     */
    public $DerivacionesAlumnos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DerivacionesAlumnos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DerivacionesAlumnos') ? [] : ['className' => DerivacionesAlumnosTable::class];
        $this->DerivacionesAlumnos = TableRegistry::getTableLocator()->get('DerivacionesAlumnos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DerivacionesAlumnos);

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
