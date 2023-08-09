<?
namespace App\Model\Table;
use Cake\ORM\Table;

class VinasTable extends Table{
	public function obtieneVinas($lang=null){
		if(isset($lang)){
			$idioma=$lang;
		}else{
			$idioma='es';
		}
		$idioma='desc_'.$idioma;
		$query =$this->find('all', ['fields'=>['id', 'nombre', 'img', 'web', $idioma]]);
		$data = $query->toArray();
		return $data;
	}
	public function listaVinas(){
		$query =$this->find('all', ['fields'=>['id', 'nombre', 'img']]);
		$query->enableHydration(false);
		$data = $query->toArray();
		return $data;
	}
	public function infoVinas($id){
		$query =$this->find('all', ['conditions'=>['id'=>$id]]);
		$query->enableHydration(false);
		$data = $query->toArray();
		return $data;
	}
}