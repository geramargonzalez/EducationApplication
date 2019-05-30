<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EvidenciaResultadoAlumnoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EvidenciaResultadoAlumnoTable Test Case
 */
class EvidenciaResultadoAlumnoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EvidenciaResultadoAlumnoTable
     */
    public $EvidenciaResultadoAlumno;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.EvidenciaResultadoAlumno'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EvidenciaResultadoAlumno') ? [] : ['className' => EvidenciaResultadoAlumnoTable::class];
        $this->EvidenciaResultadoAlumno = TableRegistry::getTableLocator()->get('EvidenciaResultadoAlumno', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EvidenciaResultadoAlumno);

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
