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

class ContenidosNuevosController extends AppController{
    public function beforeFilter(\Cake\Event\EventInterface $event){
        parent::beforeFilter($event);
        $destino=$this->request->params['action'];
        if(!$this->request->getSession()->check('edad')){  
            $this->request->getSession()->write('destino', $destino);
            return $this->redirect(['controller'=>'Edad', 'action' => 'edad']);
        }
        //$this->Auth->allow(['cambiaIdioma']);
        $this->Security->setConfig('unlockedActions', ['cambiaIdioma', 'solicitaMapa']);
    }
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
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
    public function index(){
        $idioma=$this->idioma();
        $this->loadModel('Noticias');
        $this->loadModel('Sliders');
        $slider=$this->Sliders->obtieneImagenes();
        $noticias=$this->Noticias->noticiasIndex($idioma);
        
        foreach ($noticias as $key => $value) {
            $noticias[$key]['titulos']=json_decode($value['titulos'], true);
        }
        $this->set([
            'noticias'=>$noticias,
            'idioma'=>$idioma,
            'slider'=>$slider
        ]);
    }
    public function turismo(){
        
    }
    public function obtieneContenido($idioma=nul, $id=null){
        if(isset($id)){
            if(isset($idioma)){
                $idioma=$idioma;
            }else{
                $idioma='es';
            }
            $data=$this->ContenidosNuevos->obtieneContenido($id);
            $titulos=json_decode($data[0]['titulos'], true);
            $respuesta['titulo']=(isset($titulos[$idioma]))?$titulos[$idioma]:$titulos['es'];
            $respuesta['contenido']=(isset($data[0]['contenido_'.$idioma]))?$data[0]['contenido_'.$idioma]:$data[0]['contenido_es'];
            return $respuesta;
        }else{
            return $this->redirect(['action' => 'index']);
        }
    }
    public function losPioneros(){
        $idioma=$this->idioma();
        $data=$this->obtieneContenido($idioma, 1);
        $this->set(['data' => $data]);        
    }
    public function avvsa(){
        $idioma=$this->idioma();
        $data=$this->obtieneContenido($idioma, 2);
        $this->set(['data' => $data]);    
    }
    public function organizacion(){
        $idioma=$this->idioma();
        $data=$this->Contenidos->obtieneContenido($idioma, 2);
        if($data){
            $contenidos=json_decode($data[0]['contenido_'.$idioma], true);
            $titulo=$contenidos['titulo'];
            $texto=$contenidos['contenido'];
            $extencion=$data[0]['img_principal'];
            $this->set([
                'titulo' => $titulo,
                'texto'=>$texto,
                'extencion'=>$extencion
            ]);     
        }else{
            return $this->redirect(['controller'=>'Edad', 'action' => 'index']);
        }  
    }
    public function vinas(){
        $idioma=$this->idioma();
        $this->loadModel('Vinas');
        $info=$this->Vinas->obtieneVinas($idioma);
        if($idioma=='es'){
            $titulo='Viñas asociadas';
        }elseif ($idioma=='en') {
            $titulo='Associated Vineyards';
        }elseif ($idioma=='br') {
            $titulo='Videiras associadas';
        }else{
            $titulo='Viñas asociadas';
        }
        $this->set([
            'vinas' => $info,
            'titulo'=>$titulo,
            'idioma'=>$idioma
        ]);      
    }

    public function terroir(){
        $idioma=$this->idioma();
        $data=$this->obtieneContenido($idioma, 4);
        $this->set(['data' => $data]);  
    }
    public function cepas(){
        $idioma=$this->idioma();
        $data=$this->obtieneContenido($idioma, 5);
        $this->set(['data' => $data]); 
    }
    public function codigoEtica(){
        $idioma=$this->idioma();
        $data=$this->obtieneContenido($idioma, 3);
        $this->set(['data' => $data]);   
    }
    public function valleEnCifras(){
        
    }
    public function enologosViticultores(){
        
    }
    public function mapaFisico(){
        
    }
    public function mapaTuristico(){
        
    }
    public function rutaDelVino(){
        $idioma=$this->idioma();
        $data=$this->obtieneContenido($idioma, 10);
        $this->set(['data' => $data]); 
    }
    public function noticias(){
        $idioma=$this->idioma();
        $this->loadModel('Noticias');
        $noticias=$this->Noticias->noticiasGeneral($idioma);
        foreach ($noticias as $key => $value) {
            $noticias[$key]['titulos']=json_decode($value['titulos'], true);
        }
        $data['titulo']['es']='Noticias';
        $data['titulo']['en']='News';
        $data['titulo']['br']='Notícia';
        $this->set([
            'noticias'=>$noticias,
            'idioma'=>$idioma,
            'data'=>$data
        ]);
    }
    public function noticia($id=null){
        if(isset($id)){
            $idioma=$this->idioma();
            $this->loadModel('Noticias');
            $noticias=$this->Noticias->obtieneNoticia($idioma, $id);            
            $noticias[0]['titulos']=json_decode($noticias[0]['titulos'], true);
            $this->set([
                'noticias'=>$noticias,
                'idioma'=>$idioma
            ]);
        }else{
             return $this->redirect(['action' => 'noticias']);
        }
    }
    public function eventos(){
        $idioma=$this->idioma();
        $data=$this->Contenidos->obtieneContenido($idioma, 8);
        if($data){
            $this->set([
                'data' => $data
            ]);     
        }else{
            return $this->redirect(['controller'=>'Edad', 'action' => 'index']);
        }  
    }
    public function sustentabilidad(){
        $idioma=$this->idioma();
        $data=$this->obtieneContenido($idioma, 8);
        $this->set(['data' => $data]); 
    }
    public function contacto(){
        $idioma=$this->idioma();
        if($idioma=='es'){
            $titulo='Escribenos, te contactaremos a la brevedad.';
            $nombre='Nombre';
            $asunto='Asunto';
            $fono='Teléfono';
        }elseif ($idioma=='en') {
            $titulo='Write us, we will contact you shortly.';
            $nombre='Name';
            $asunto='Affair';
            $fono='Phone';
        }elseif ($idioma=='br') {
            $titulo='Escreva-nos, entraremos em contato em breve.';
            $nombre='Nome';
            $asunto='Caso';
            $fono='Telefone';
        }else{
            $titulo='Escreva-nos, entraremos em contato em breve.';
            $nombre='Nome';
            $asunto='Caso';
            $fono='Telefone';
        }
        $this->set([
            'titulo' => $titulo,
            'nombre'=>$nombre,
            'asunto'=>$asunto,
            'fono'=>$fono
        ]);   
    }
    public function cambiaIdioma($lang=null){        
        $this->viewBuilder()->setLayout('ajax');
        $this->autoRender=false;
        $data=$this->request->getData();
        if(isset($data['idioma'])){
            $this->request->getSession()->delete('idioma');
            $this->request->getSession()->write('idioma', $data['idioma']);
            $res=2;
        }else{
            $this->request->getSession()->delete('idioma');
            $this->request->getSession()->write('idioma', 'es');
            $res=1;
        }
        $this->set(compact('res'));
        echo json_encode(compact('res'));
    }
    public function vistaMapa($token=null){
        if(isset($token)){            
            if($this->request->getSession()->check('tokenMapa')){  
                $file = $_SERVER['DOCUMENT_ROOT'] . '/webroot/files/mapa.pdf';
                $this->request->getSession()->delete('tokenMapa');
            }else{
                $file = $_SERVER['DOCUMENT_ROOT'] . '/webroot/files/mapa-2.pdf';
            }
        }else{
            $file = $_SERVER['DOCUMENT_ROOT'] . '/webroot/files/mapa-2.pdf';
        }        
        $response = $this->response->withFile($file, ['download' => false, 'name' => 'mapa']);
        $this->response = $this->response->withDisabledCache();
        $this->response = $this->response->withDownload('hola');
        return $response;
    }
    public function solicitaMapa(){
        $this->viewBuilder()->setLayout('ajax');
        $this->autoRender=false;
        if($this->request->is('ajax')){
            $token=rand();   
            $this->request->getSession()->write('tokenMapa', $token);         
            $res=1;
            echo json_encode(compact('res'));
        }else{
            echo json_encode(compact('3'));
        }
    }
    public function pruebas(){
        echo __FILE__;
        $imagenOriginal=file_get_contents($this->webroot.'/img/protegidas/mapa/original/original.jpg');
        prx($imagenOriginal);
    }
}







 










