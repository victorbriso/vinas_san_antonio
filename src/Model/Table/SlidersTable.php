<?
namespace App\Model\Table;
use Cake\ORM\Table;

class SlidersTable extends Table{
	public function obtieneImagenes(){
		$query =$this->find('all');
		$query->enableHydration(false);
		$data = $query->toArray();
		return $data;
	}
}