<?
namespace App\Model\Table;
use Cake\ORM\Table;

class NoticiasTable extends Table{
	public function noticiasIndex(){
		$query =$this->find('all', ['fields'=>['id', 'titulos', 'img'], 'conditions'=>['estado'=>1], 'order'=>['id asc'], 'limit'=>4]);
		$query->enableHydration(false);
		$data = $query->toArray();
		return $data;
	}
	public function noticiasGeneral($lang=null){
		if(isset($lang)){
			$idioma=$lang;
		}else{
			$idioma='es';
		}
		$idioma='contenido_'.$idioma;
		$query =$this->find('all', ['fields'=>['id', $idioma, 'img', 'titulos'], 'order'=>['id desc']]);
		$query->enableHydration(false);
		$data = $query->toArray();
		return $data;
	}
	public function noticiasGeneral2($lang=null){
		$query =$this->find('all');
		$query->enableHydration(false);
		$data = $query->toArray();
		return $data;
	}
	public function obtieneNoticia($lang=null, $id=null){
		if(isset($id)){
			if(isset($lang)){
				$idioma=$lang;
			}else{
				$idioma='es';
			}
			$idioma='contenido_'.$idioma;
			$query =$this->find('all', ['conditions'=>['id'=>$id], 'fields'=>['id', 'img', $idioma, 'titulos']]);
			$query->enableHydration(false);
			$data = $query->toArray();
			return $data;
		}else{
			return false;
		}
	}
	public function obtieneNoticia2($id){
		$query =$this->find('all', ['conditions'=>['id'=>$id]]);
		$query->enableHydration(false);
		$data = $query->toArray();
		return $data;
	}
}