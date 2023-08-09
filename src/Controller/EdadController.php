<?php
declare(strict_types=1);
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;
use Cake\ORM\Table;

class EdadController extends AppController{
    public function edad(){
        $this->viewBuilder()->setLayout('edad');
    }
    public function validacionEdad($lang=null){
        if(isset($lang)){
            $idioma=$lang;
        }else{
            $idioma='es';
        }
        $this->request->getSession()->write('idioma', $idioma);
        $this->request->getSession()->write('edad', true);
        if($this->request->getSession()->check('destino')){  
            $destino=$this->request->getSession()->read('destino');
            return $this->redirect(['controller'=>'ContenidosNuevos', 'action' => $destino]);
        }else{
            return $this->redirect(['controller'=>'ContenidosNuevos', 'action' => 'index']);
        }
    }
    public function vinas(){
        $articles = TableRegistry::getTableLocator()->get('Vinas');
        $info=$this->$articles->obtieneVinas();
        prx($info);
        $this->set([
            'template' => $template
        ]);
        pr($template);        
    }
    public function vinas2(){
        $this->loadModel('Vinas');
        $info=$this->Vinas->obtieneVinas();
        prx($info);
        $this->set([
            'template' => $template
        ]);
        pr($template);        
    }
}