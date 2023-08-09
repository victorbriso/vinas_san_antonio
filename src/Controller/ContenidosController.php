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

class ContenidosController extends AppController{
    public function beforeFilter(\Cake\Event\EventInterface $event){
        parent::beforeFilter($event);
        $destino=$this->request->params['action'];
        if(!$this->request->getSession()->check('edad')){  
            $this->request->getSession()->write('destino', $destino);
            return $this->redirect(['controller'=>'Edad', 'action' => 'edad']);
        }
        //$this->Auth->allow(['cambiaIdioma']);
        $this->Security->setConfig('unlockedActions', ['cambiaIdioma']);
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
            $noticias[$key]['contenido_'.$idioma]=json_decode($value['contenido_'.$idioma], true);
        }
        $this->set([
            'noticias'=>$noticias,
            'idioma'=>$idioma,
            'slider'=>$slider
        ]);
    }
    public function turismo(){
        
    }
    public function losPioneros(){
        $idioma=$this->idioma();
        $data=$this->Contenidos->obtieneContenido($idioma, 3);
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
    public function avvsa(){
        $idioma=$this->idioma();
        $this->loadModel('Requisitos');
        $data=$this->Contenidos->obtieneContenido($idioma, 1);
        $data2=$this->Contenidos->obtieneContenido($idioma, 2);
        $requisitos=$this->Requisitos->obtieneRequisitos($idioma);
        if($idioma=='es'){
            $titulo3='Asociarse a Avvsa';
        }elseif ($idioma=='en') {
            $titulo3='Join Avvsas';
        }elseif ($idioma=='br') {
            $titulo3='Associe-se à Avvsa';
        }else{
            $titulo3='Las Viñas';
        }
        if($data){
            $contenidos=json_decode($data[0]['contenido_'.$idioma], true);
            $titulo=$contenidos['titulo'];
            $texto=$contenidos['contenido'];
            $extencion=$data[0]['img_principal'];
            $contenidos2=json_decode($data2[0]['contenido_'.$idioma], true);
            $titulo2=$contenidos2['titulo'];
            $texto2=$contenidos2['contenido'];
            $extencion2=$data2[0]['img_principal'];
            $this->set([
                'titulo' => $titulo,
                'texto'=>$texto,
                'extencion'=>$extencion,
                'titulo2' => $titulo2,
                'texto2'=>$texto2,
                'extencion2'=>$extencion2,
                'titulo3'=>$titulo3,
                'requisitos'=>$requisitos,
                'lang'=>$idioma
            ]);     
        }else{
            return $this->redirect(['controller'=>'Edad', 'action' => 'index']);
        }  
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
        $data=$this->Contenidos->obtieneContenido($idioma, 5);
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
    public function cepas(){
        $idioma=$this->idioma();
        $data=$this->Contenidos->obtieneContenido($idioma, 4);
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
    public function codigoEtica(){
        $idioma=$this->idioma();
        $data=$this->Contenidos->obtieneContenido($idioma, 6);
        if($data){
            $contenidos=json_decode($data[0]['contenido_'.$idioma], true);
            //prx($contenidos);
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
    public function valleEnCifras(){
        
    }
    public function enologosViticultores(){
        
    }
    public function mapaFisico(){
        
    }
    public function mapaTuristico(){
        
    }
    public function rutaDelVino(){
        
    }
    public function noticias(){
        $idioma=$this->idioma();
        $this->loadModel('Noticias');
        $noticias=$this->Noticias->noticiasGeneral($idioma);
        foreach ($noticias as $key => $value) {
            $noticias[$key]['contenido_'.$idioma]=json_decode($value['contenido_'.$idioma], true);
        }
        $this->set([
            'noticias'=>$noticias,
            'idioma'=>$idioma
        ]);
    }
    public function noticia($id=null){
        if(isset($id)){
            $idioma=$this->idioma();
            $this->loadModel('Noticias');
            $noticias=$this->Noticias->obtieneNoticia($idioma, $id);
            $noticias[0]['contenido_'.$idioma]=json_decode($noticias[0]['contenido_'.$idioma], true);
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
        $data=$this->Contenidos->obtieneContenido($idioma, 7);
        if($data){
            $contenidos=json_decode($data[0]['contenido_'.$idioma], true);
            //prx($contenidos);
            $titulo=$contenidos['titulo'];
            $texto=$contenidos['contenido'];
            $imagenes=$contenidos['imagenes'];
            $this->set([
                'titulo' => $titulo,
                'texto'=>$texto,
                'imagenes'=>$imagenes
            ]);     
        }else{
            return $this->redirect(['controller'=>'Edad', 'action' => 'index']);
        }  
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
    public function pruebas(){
        echo __FILE__;
        $imagenOriginal=file_get_contents($this->webroot.'/img/protegidas/mapa/original/original.jpg');
        prx($imagenOriginal);
    }
}







 










