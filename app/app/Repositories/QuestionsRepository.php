<?php

namespace App\Repositories;

use App\Models\Question;
use App\Repositories\BaseRepository;

class QuestionsRepository extends BaseRepository
{

    public function __construct(Question $question)
    {
        $this->model = $question;
    }

    protected $fieldQuestion = [
        'Titre',
        'Option1',
        'Option2',
        'Id_examen',
    ];
    public function getFieldData(): array
    {
        return $this->fieldQuestion;
    }

    public function model(): string
    {
        return Question::class;
    }

    public function  getQuestionbyIdexamen($Id_examen)
    {
        return $this->model->where('Id_examen', $Id_examen)->paginate(4);
    }

    public function searchQuestions($searchQuestion)
    {
        $get_data =  $this->model->where(function ($query) use ($searchQuestion) {
            $query->where('Titre', 'like', '%' . $searchQuestion . '%');
        });
        return $get_data->paginate(4);
    }
}
