<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InformeAlumnoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InformeAlumnoTable Test Case
 */
class InformeAlumnoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InformeAlumnoTable
     */
    public $InformeAlumno;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.InformeAlumno'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('InformeAlumno') ? [] : ['className' => InformeAlumnoTable::class];
        $this->InformeAlumno = TableRegistry::getTableLocator()->get('InformeAlumno', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InformeAlumno);

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
