<?php
declare(strict_types=1);
namespace App\Controller;
use Cake\Controller\Controller;
class AppController extends Controller{
	public function beforeFilter(\Cake\Event\EventInterface $event){
		$token = $this->request->getAttribute('csrfToken');
        $this->set([
            'token' => $token,
            'idiomaMenu'=>$this->idioma()
        ]); 
    }
    public function initialize(): void {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Security');
    }
    public function idioma(){
	    if($this->request->getSession()->check('idioma')){  
	        $idioma=$this->request->getSession()->read('idioma');
	    }else{
	        $idioma='es';
	    }
	    return $idioma;
	}
}
