<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Useful cell
 */
class UsefulCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadModel('Alumnos');
        
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        //$alumno = $this->Alumnos->get($id);
        //$nombre = $alumno->name . " " . $alumno->surname;
        //$this->set('nombre', $nombre);
        
    }

    public function name($id = null)
    {
        $alumno = $this->Alumnos->get($id);
        $nombre = $alumno->name . " " . $alumno->surname;
        $this->set('nombre', $nombre);
    }

}
