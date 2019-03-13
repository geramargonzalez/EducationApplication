<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TallerAlumnosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TallerAlumnosTable Test Case
 */
class TallerAlumnosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TallerAlumnosTable
     */
    public $TallerAlumnos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TallerAlumnos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TallerAlumnos') ? [] : ['className' => TallerAlumnosTable::class];
        $this->TallerAlumnos = TableRegistry::getTableLocator()->get('TallerAlumnos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TallerAlumnos);

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
