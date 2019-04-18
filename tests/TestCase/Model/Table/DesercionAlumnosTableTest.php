<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DesercionAlumnosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DesercionAlumnosTable Test Case
 */
class DesercionAlumnosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DesercionAlumnosTable
     */
    public $DesercionAlumnos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DesercionAlumnos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DesercionAlumnos') ? [] : ['className' => DesercionAlumnosTable::class];
        $this->DesercionAlumnos = TableRegistry::getTableLocator()->get('DesercionAlumnos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DesercionAlumnos);

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
