<?php
declare(strict_types=1);
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use Cake\Mailer\Mailer;
use Cake\ORM\TableRegistry;

class PagesController extends AppController{
    public function beforeFilter(\Cake\Event\EventInterface $event){
        parent::beforeFilter($event);
        $destino=$this->request->params['action'];
        if(!$this->request->getSession()->check('edad')){  
            $this->request->getSession()->write('destino', $destino);
            return $this->redirect(['controller'=>'Edad', 'action' => 'edad']);
        }
    }
    public function display(...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }

        return $this->render();
    }
    public function demos(){
        $this->viewBuilder()->setLayout('demo');
        $articles = TableRegistry::getTableLocator()->get('Sitios');
        $template=$this->Sitios->obtieneSitios();
        $this->set([
            'template' => $template
        ]);
        pr($template);
        prx($template);
    }

    public function index(){

    }
    public function losPioneros(){
        
    }
    public function avvsa(){
        
    }
    public function organizacion(){
        
    }
    public function vinas(){
        $this->loadModel('Vinas');
        $info=$this->Vinas->obtieneVinas();
        prx($info);
        $this->set([
            'template' => $template
        ]);
        pr($template);
        
    }
    public function asociarseAvvsa(){
        
    }
    public function terroir(){
        
    }
    public function cepas(){
        
    }
    public function valleEnCifras(){
        
    }
    public function enologosViticultores(){
        
    }
    public function mapaFisico(){
        
    }
    public function mapaTuristico(){
        
    }
    public function noticias(){
        
    }
    public function eventos(){
        
    }
    public function sustentabilidad(){
        
    }
    public function contacto(){
        
    }
    public function cambiaIdioma(){
        
    }
    

}
