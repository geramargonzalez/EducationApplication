<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;
use App\Enums\RolesEnum;
use Cake\I18n\Time;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    //public $helpers = ['GoogleCharts.GoogleCharts'];
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'authorize' => Configure::read('Authorize.default'),
            'loginRedirect' => [
                'controller' => 'Alumnos',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authError' => false,
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ]
        ]);

       // $this->loadHelper('GoogleCharts.GoogleCharts');
    }
      public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        //request->getParam()
       // $params = $this->request->getParam('controller');
        $user_session = $this->Auth->user();
        /*if (!$userSession && ($params['controller'] == 'Users' && $params['action'] == 'add')) {
            $this->Auth->allow(['login']);
       }*/

        $this->set(compact('user_session'));
    }

       public function beforeRender(Event $event)
    {
      
             $this->viewBuilder()->layout('template_defualt');
               //this->viewBuilder()->setlayout('template_defualt');  
        
    }

    public function isAuthorized($user)
    {
      return $this->Auth->user() ? true : false;
    }
}
