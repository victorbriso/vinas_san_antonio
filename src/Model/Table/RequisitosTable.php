<?
namespace App\Model\Table;
use Cake\ORM\Table;

class RequisitosTable extends Table{
	public function obtieneRequisitos($lang=null){
		if(isset($lang)){
			$idioma=$lang;
		}else{
			$idioma='es';
		}
		$idioma='requisito_'.$idioma;
		$query =$this->find('all', ['fields'=>[$idioma]]);
		$data = $query->toArray();
		return $data;
	}
}