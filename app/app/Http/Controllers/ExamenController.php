<?php

namespace App\Http\Controllers;

use App\Repositories\ExamensRepository;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    protected $examenRepository;
    
    public function __construct(ExamensRepository $examenRepository){
        $this->examenRepository = $examenRepository;
    }
   
    public function index(Request $request){
       $examens = $this->examenRepository->index();

       if ($request->ajax()) {
           $searchQuery = $request->get('searchValue');
           $searchQuery = str_replace(' ', '%', $searchQuery);
           $examens = $this->examenRepository->searchexamens($searchQuery);
         
           return view('examens.examenSearch', compact('examens'));
       }

       return view('examens.index' , compact('examens'));
   }


   
  
   public function show($examen)
   {
       $examen = $this->examenRepository->find($examen);

       return view('examens.show', compact('project'));
   }
}
