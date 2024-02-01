<?php

use Illuminate\Support\Facades\Route;
use App\Repositories\QuestionsRepository;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/questions', function () {
    $questionsRepository = new QuestionsRepository(new \App\Models\Question());

    // Test index method
    $questions = $questionsRepository->index();
    foreach ($questions as $question) {
        echo "Question Title: " . $question->Titre . "<br>";
    }

    return "Index route";
});

Route::get('/questions/create', function () {
    $questionsRepository = new QuestionsRepository(new \App\Models\Question());

    // Test create method
    $validatedData = [
        'Titre' => 'test browser pour laravel',
        'Option1' => 'selenium',
        'Option2' => 'dusk',
        'Id_examen' => '2',
        // Add other fields as needed
    ];
    $createdQuestion = $questionsRepository->create($validatedData);

    return "Created Question with ID: " . $createdQuestion->id;
});

Route::get('/questions/{id}', function ($id) {
    $questionsRepository = new QuestionsRepository(new \App\Models\Question());

    // Test find method
    $question = $questionsRepository->find($id);

    return "Question Title: " . $question->Titre;
});

Route::get('/questions/{id}/edit', function ($id) {
    $questionsRepository = new QuestionsRepository(new \App\Models\Question());

    // Test edit method
    $question = $questionsRepository->find($id);

    return "Edit Question Title: " . $question->Titre;
});

Route::put('/questions/{id}', function ($id) {
    $questionsRepository = new QuestionsRepository(new \App\Models\Question());

    // Test update method
    $validatedData = [
        'Titre' => 'test browser pour laravel 10 ',
        'Option1' => 'selenium v2',
        'Option2' => 'dusk web driver',
        'Id_examen' => '2',
        // Add other fields as needed
    ];
    $updatedQuestion = $questionsRepository->update($validatedData, $id);

    return "Updated Question Title: " . $updatedQuestion->Titre;
});

Route::delete('/questions/{id}', function ($id) {
    $questionsRepository = new QuestionsRepository(new \App\Models\Question());

    // Test destroy method
    $questionsRepository->delete($id);

    return "Deleted Question with ID: " . $id;
});
