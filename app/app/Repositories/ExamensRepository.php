<?php 
namespace App\Repositories ;
use App\Models\Examen;
use App\Repositories\BaseRepository;

class ExamensRepository extends BaseRepository
{
    
    public function __construct(Examen $examen){
        $this->model = $examen;
    }

    protected $fieldExamen = [
        'Titre' ,
        'Description' ,
        'Date_debut' ,
        'Date_fin' 
    ];
    public function getFieldData():array {
        return $this->fieldExamen;
    }
    public function model():string {
        return Examen::class;
    }
  

    public function searchExamens($searchValue, $perPage = 4)
    {
      return $this->model
      ->where('nom', 'LIKE', '%' . $searchValue . '%')->paginate($perPage);

    }
    
}