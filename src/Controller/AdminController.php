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

class AdminController extends AppController{
    public function beforeFilter(\Cake\Event\EventInterface $event){
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout('admin');
        $this->Security->setConfig('unlockedActions', ['gestorContenidos', 'subeImagen', 'editNoticias', 'editVinas']);

    }
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Security');
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
    public function gestorContenidos($id=null){
        if($this->request->is('post')){
            $data=$this->request->getData();
            $id=$data['id'];
            $contenidos = TableRegistry::getTableLocator()->get('ContenidosNuevos');
            $dataUpdate = $contenidos->get($id);
            $titulos['es']=$data['tituloEs'];
            $titulos['en']=$data['tituloEn'];
            $titulos['br']=$data['tituloBr'];
            $dataUpdate->titulos=json_encode($titulos);
            $dataUpdate->contenido_es=$data['contenido_es'];
            $dataUpdate->contenido_en=$data['contenido_en'];
            $dataUpdate->contenido_br=$data['contenido_br'];
            $contenidos->save($dataUpdate);
            return $this->redirect(['controller'=>'Admin', 'action' => 'gestorContenidos', $id]);
        }
        
        if(isset($id)){
            $this->loadModel('ContenidosNuevos');
            $data=$this->ContenidosNuevos->obtieneContenidoAdmin($id);
            $data[0]['titulos']=json_decode($data[0]['titulos'], true);
            $path = $_SERVER['DOCUMENT_ROOT'] . '/webroot/img/galeria/';
            $imagenes=scanDir($path);
            unset($imagenes[0]);
            unset($imagenes[1]);
            $imagenesFinal=array();
            foreach ($imagenes as $key => $value) {
                $var['title']=$value;
                $var['value']='/img/galeria/'.$value;
                array_push($imagenesFinal, $var);
            }
            $imagenesFinal=json_encode($imagenesFinal);
            if($data){
                $this->set(['data'=>$data, 'imagenes'=>$imagenesFinal]);
            }else{
                return $this->redirect(['controller'=>'Admin', 'action' => 'index']);
            }
        }else{
            return $this->redirect(['controller'=>'Admin', 'action' => 'index']);
        }
        
    }
    public function addNoticia(){
        $contenidos = TableRegistry::getTableLocator()->get('Noticias');
        $dataUpdate = $contenidos->newEmptyEntity();
        $titulos['es']='';
        $titulos['en']='';
        $titulos['br']='';
        $dataUpdate->titulos=json_encode($titulos);
        $dataUpdate->contenido_es='';
        $dataUpdate->contenido_en='';
        $dataUpdate->contenido_br='';
        $dataUpdate->img='';
        $dataUpdate->estado=0;        
        if($contenidos->save($dataUpdate)){
            $id=$dataUpdate->id;
            return $this->redirect(['controller'=>'Admin', 'action' => 'editNoticias', $id]);
        }else{
            return $this->redirect(['controller'=>'Admin', 'action' => 'gestorNoticias']);
        }
    }
    public function subeImagen(){
        if($this->request->is('post')){
            $data=$this->request->getData();
            prx($data);
            $directorio=$_SERVER['DOCUMENT_ROOT'] . '/webroot/img/galeria/';
            $cargar = $directorio.basename($data['image']['name']);
            move_uploaded_file($data['image']['tmp_name'], $cargar);
            return $this->redirect(
                array('action' => 'subeImagen')
            );
        }
        $path = $_SERVER['DOCUMENT_ROOT'] . '/webroot/img/galeria/';
        $imagenes=scanDir($path);
        unset($imagenes[0]);
        unset($imagenes[1]);
        $this->set([
            'imagenes'=>$imagenes
        ]);
    }
    public function eliminaImagen($name=null){
        if(isset($name)){
            unlink($_SERVER['DOCUMENT_ROOT'] . '/webroot/img/galeria/'.$name);
            return $this->redirect(['action' => 'subeImagen']);
        }
        return $this->redirect(['action' => 'subeImagen']);
    }
    public function index(){
        $idioma=$this->idioma();
        $this->loadModel('Noticias');
        $this->loadModel('Contenidos');
        $noticias=$this->Noticias->noticiasIndex($idioma);
        foreach ($noticias as $key => $value) {
            $noticias[$key]['contenido_'.$idioma]=json_decode($value['contenido_'.$idioma], true);
        }
        $this->set([
            'noticias'=>$noticias,
            'idioma'=>$idioma
        ]);
    }

    public function actualizaContenidos(){
        if($this->request->is('post')){
            $this->viewBuilder()->setLayout('ajax');
            $this->autoRender=false;
            $data=$this->request->getData();
            $contenidos = TableRegistry::getTableLocator()->get('Contenidos');
            $dataUpdate = $contenidos->get($data['data']['id']);
            $dataUpdate->contenido_es=json_encode($data['data']['contenido_es']);
            $dataUpdate->contenido_en=json_encode($data['data']['contenido_en']);
            $dataUpdate->contenido_br=json_encode($data['data']['contenido_br']);
            if($contenidos->save($dataUpdate)){
                $respuesta=1;
            }else{
                $respuesta=2;
            }
            echo $respuesta;
            $this->set(compact('respuesta'));    
        }else{
            return $this->redirect(['action' => 'index']);
        }  
        
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
    public function gestorNoticias(){
        $this->loadModel('Noticias');
        $noticias=$this->Noticias->noticiasGeneral2();
        foreach ($noticias as $key => $value) {
            $noticias[$key]['titulos']=json_decode($value['titulos'], true);
        }
        $this->set([
            'noticias'=>$noticias
        ]);
    }
    public function editNoticias($id=null){
        if($this->request->is('post')){
            $data=$this->request->getData();
            //prx($data);
            if(isset($data['id'])){
                $contenidos = TableRegistry::getTableLocator()->get('Noticias');
                $dataUpdate = $contenidos->get($data['id']);
                $titulos['es']=$data['tituloEs'];
                $titulos['en']=$data['tituloEn'];
                $titulos['br']=$data['tituloBr'];
                $dataUpdate->titulos=json_encode($titulos);
                $dataUpdate->contenido_es=$data['contenido_es'];
                $dataUpdate->contenido_en=$data['contenido_en'];
                $dataUpdate->contenido_br=$data['contenido_br'];
                $contenidos->save($dataUpdate);
                return $this->redirect(['controller'=>'Admin', 'action' => 'editNoticias', $data['id']]);
            }else{
                return $this->redirect(['action' => 'gestorNoticias']);
            }
        }
        if(isset($id)){
            $this->loadModel('Noticias');
            $data=$this->Noticias->obtieneNoticia2($id);
            $data[0]['titulos']=json_decode($data[0]['titulos'], true);
            $path = $_SERVER['DOCUMENT_ROOT'] . '/webroot/img/galeria/';
            $imagenes=scanDir($path);
            unset($imagenes[0]);
            unset($imagenes[1]);
            $imagenesFinal=array();
            foreach ($imagenes as $key => $value) {
                $var['title']=$value;
                $var['value']='/img/galeria/'.$value;
                array_push($imagenesFinal, $var);
            }
            $imagenesFinal=json_encode($imagenesFinal);
            $this->set([
                'data'=>$data, 'imagenes'=>$imagenesFinal
            ]);
        }else{
            return $this->redirect(['action' => 'gestorNoticias']);
        }
    }
    public function vinas(){
        $this->loadModel('Vinas');
        $data=$this->Vinas->listaVinas();
        //prx($data);
        $this->set(['data'=>$data]);
    }
    public function editVinas($id=null){
        if($this->request->is('post')){
            $data=$this->request->getData();
            $contenidos = TableRegistry::getTableLocator()->get('Vinas');
            $dataUpdate = $contenidos->get($data['id']);
            $dataUpdate->nombre=$data['nombre'];
            $dataUpdate->web=$data['web'];
            $dataUpdate->desc_es=$data['desc_es'];
            $dataUpdate->desc_en=$data['desc_en'];
            $dataUpdate->desc_br=$data['desc_br'];
            $contenidos->save($dataUpdate);
            return $this->redirect(['controller'=>'Admin', 'action' => 'editVinas', $data['id']]);
        }
        if(isset($id)){
            $this->loadModel('Vinas');
            $data=$this->Vinas->infoVinas($id);
            $this->set([
                'data'=>$data
            ]);
        }else{
            return $this->redirect(['action' => 'vinas']);
        }
    }
    public function imagen(){
    set_time_limit(100); 
    $original_image_data=imagecreatefromjpeg($_SERVER['DOCUMENT_ROOT'] . '/webroot/img/protegidas/mapa/original/original.jpg');
    $size=getimagesize($_SERVER['DOCUMENT_ROOT'] . '/webroot/img/protegidas/mapa/original/original.jpg');
    $fragmentos=2;
    $cuadros=$fragmentos*$fragmentos;
    $original_width=$size[0];
    $original_height=$size[1];
    $new_width=(int)round($original_width/$fragmentos);
    $new_height=(int)round($original_height/$fragmentos);    
    $inicioX=0;
    $inicioY=0;
    for ($i=0; $i < $cuadros ; $i++) {        
        if($i==($fragmentos+1)){
            $inicioY=$inicioY+$new_height;
            $inicioX=0;
        }
        if($i==0){
            $inicioX=$new_width;
            $inicioY=$new_height;
        }
        $finX=$inicioX+$new_width;
        $finY=$inicioY+$new_height;
        $dst_img = ImageCreateTrueColor($new_width, $new_height);
        imagecolortransparent($dst_img, imagecolorallocate($dst_img, 0, 0, 0));
        imagecopyresampled($dst_img, $original_image_data, 0, 0, $inicioX, $inicioY, $new_width, $new_height, $inicioX, $inicioY);
        imagejpeg($dst_img, $_SERVER['DOCUMENT_ROOT'] . '/webroot/img/protegidas/mapa/fragmentos/'.$i.'.jpg', 100);
        imagedestroy($dst_img);
        pr('caso');
        pr($i);
        pr('inicioY');
        pr($inicioY);
        pr('inicioX');
        pr($inicioX);
        pr('finX');
        pr($finX);
        pr('finY');
        pr($finY);
        /*
        $dir=fopen($_SERVER['DOCUMENT_ROOT'] . '/webroot/img/protegidas/mapa/fragmentos/'.$i.'.jpg', 'w+');
        fwrite($dir, imagejpeg($dst_img, NULL, 100));
        fclose($dir);
        */
    }
    
    prx('termino');

    }
    public function cuadricula($caso, $size, $cortes){        
        if($caso==0){
            $data['inicioX']=(int)0;
            $data['inicioY']=(int)0;
            $data['finX']=(int)round($size[0]/$cortes);
            $data['finY']=(int)round($size[1]/$cortes);
            return $data;
        }
        if($caso==$cortes){

        }
        $fragmentos=$cortes*$cortes;
    }

}