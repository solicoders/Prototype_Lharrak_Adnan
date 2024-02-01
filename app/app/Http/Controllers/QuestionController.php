<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateRequest;
use App\Repositories\ExamensRepository;
use Illuminate\Http\Request;
use App\Repositories\QuestionsRepository;

class QuestionController extends Controller
{
    //
    
    protected $QuestionsRepository;
    protected $ExamensRepository;
    public function __construct(QuestionsRepository $QuestionsRepository, ExamensRepository $ExamensRepository ){
        $this->QuestionsRepository = $QuestionsRepository;
        $this->ExamensRepository = $ExamensRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $searchQuery = $request->get('searchValue');
            $searchQuery = str_replace(' ', '%', $searchQuery);

            $Questions = $this->QuestionsRepository->searchQuestions($searchQuery);
            if (!$Questions -> count()) {
                return 'false' ; 
            }
            return view('questions.search', compact('Questions'))->render();
        } 
        $examens = $this->ExamensRepository->index();
    
       
        $Id_examen= $request ->Id_examen ;

        if($Id_examen) {
            $examen = $this->ExamensRepository->find($Id_examen);
            $Questions = $this->QuestionsRepository->getQuestionbyIdexamen($Id_examen);
            return view("Questions.index",Compact('Questions','examens', 'examen'));
            // dd($Questions);
        }
        $Questions = $this->QuestionsRepository->index();
        $question = $Questions->first();
        $examen = $this->ExamensRepository->find($question->Id_examen);
        return view("Questions.index",Compact('Questions','examens', 'examen'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $examens = $this->ExamensRepository->index(); 
        return view('Questions.create',Compact('examens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidateRequest $request)
    {
        $validatedData = $request->validated();
    
        $this->QuestionsRepository->create($validatedData);
    
        return redirect()->route('examens.questions', ['Id_examen' => $request->Id_examen])->with('success', "Question a été créer avec succées");
    }


    /**
     * Display the specified resource.
     */
    public function show($question)
    {
        $question = $this->QuestionsRepository->find($question);
        $examen = $this->ExamensRepository->find($question->Id_examen);

        return view('questions.show', compact('question', 'examen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $examens = $this->ExamensRepository->index(); 
        $question = $this->QuestionsRepository->find($id);
      return view('questions.edit',compact('question','examens'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidateRequest $request, string $id)
    {
        $validatedata = $request->validated();
        $this->QuestionsRepository->update($validatedata,$id);
        return redirect()->route('examens.questions',['Id_examen'=> $request->Id_examen])->with('success',"La question a été modifier");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->QuestionsRepository->delete($id);
        return redirect()->back()->with('success', "la question est supprimée");
    }

}
