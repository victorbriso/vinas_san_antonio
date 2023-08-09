<?
namespace App\Model\Table;
use Cake\ORM\Table;

class ContenidosTable extends Table{
	public function obtieneContenido($lang=null, $id=null){
		if(isset($id)){
			if(isset($lang)){
				$idioma=$lang;
			}else{
				$idioma='es';
			}
			$idioma='contenido_'.$idioma;
			$query =$this->find('all', ['conditions'=>['id'=>$id], 'fields'=>['img_principal', $idioma]]);
			$query->enableHydration(false);
			$data = $query->toArray();
			return $data;
		}else{
			return false;
		}
	}
	public function obtieneContenidoAdmin($id=null){
		if(isset($id)){
			$query =$this->find('all', ['conditions'=>['id'=>$id]]);
			$query->enableHydration(false);
			$data = $query->toArray();
			return $data;
		}else{
			return false;
		}
	}
}