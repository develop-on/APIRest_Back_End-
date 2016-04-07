<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

	
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $components = array(
        'DebugKit.Toolbar',
		'RequestHandler',
        'Session',
        'Auth' => array(
        	'loginAction' => array('controller'=>'users','action'=>'login', 'admin'=>false),
            'loginRedirect' => array(  
                'controller' => 'users',
                'action' => 'dashboard',
            	'admin' => true
            ),
            'logoutRedirect' => array(  
                'controller' => 'users',
                'action' => 'login',
            	'admin'=> false  // add this so that admin actions get ignored
            ),
        	'authError' => 'Access Denied',
        	'authenticate' => array(
        		'Form' => array(
        				'passwordHasher' => 'Blowfish'
        		)
        	),
        	'authorize' => array('Controller')
        )
    ); 
	
	public function beforeFilter() {
		if(in_array($this->params['controller'],array('rest_posts'))){
           // For RESTful web service requests, we check the name of our contoller
           $this->Auth->allow();
           // this line should always be there to ensure that all rest calls are secure
           //$this->Security->requireSecure();
           //$this->Security->unlockedActions = array('edit','delete','add','view');
        }else{
		// Auth will block all entries with admin prefix unless the user is authenticated
		if(isset($this->request->prefix) && ($this->request->prefix == 'admin')){
			if($this->Auth->loggedIn()){
				$this->Auth->allow();
				$this->layout = 'admin';
			}else{
				$this->Auth->deny();
				$this->layout = 'front';
			}
		}else{
			$this->Auth->allow();
			$this->layout = 'front';
		 }
	   }
	}
	
	public function isAuthorized($user = null) {
		// Everyone is authorized to see that front pages. However, some admin pages require you to be an admin to have access
		if(isset($this->request->prefix) && ($this->request->prefix == 'admin')){
			if($this->Auth->loggedIn()){
				if($this->Auth->user('role') == 'admin'){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
		
		return true;
    }

}
