<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Question;
use App\Repositories\QuestionsRepository;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class QuestionsTest extends TestCase
{
    use DatabaseTransactions;

    protected $questionsRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->questionsRepository = app(QuestionsRepository::class);
    }

    public function testIndex(): void
    {
        $questions = $this->questionsRepository->index();

        // Assert that $questions is not empty
        $this->assertNotEmpty($questions);
    }

    public function testStoreQuestion(): void
    {
        $validatedData = [
            'Titre' => 'test browser for laravel',
            'Option1' => 'Selenium',
            'Option2' => 'dusk',
            'Id_examen' => '2',
        ];

        $this->questionsRepository->create($validatedData);

        $this->assertDatabaseHas('questions', [
            'Titre' => 'test browser for laravel',
        ]);
    }

    public function testEditQuestion(): void
    {
        $question = Question::first();

        $response = $this->questionsRepository->find($question->id);

        // Assert that the response is not null
        $this->assertNotNull($response);

        // Assert that the response contains the question instance
        $this->assertInstanceOf(Question::class, $response);
    }

    public function testUpdateQuestion(): void
    {
        $question = Question::first();
    
        $validatedData = [
            'Titre' => 'test browser for laravel',
            'Option1' => 'selenium bew driver',
            'Option2' => 'dusk web driver',
            'Id_examen' => '2',
            // Add other fields as needed
        ];
    
        $updateResult = $this->questionsRepository->update($validatedData, $question->id);
    
        $this->assertTrue($updateResult, 'Update operation should be successful.');
    
        // Fetch the updated question separately
        $updatedQuestion = $this->questionsRepository->find($question->id);
    
        $this->assertInstanceOf(Question::class, $updatedQuestion);
    
        $this->assertDatabaseHas('questions', [
            'id' => $question->id,
            'Titre' => 'test browser for laravel',
            'Option1' => 'selenium bew driver',
            'Option2' => 'dusk web driver',
            'Id_examen' => '2',
            // Add other fields as needed
        ]);
    }
    
    
    public function testDestroyQuestion(): void
    {
        $question = Question::first();

        // Call the destroy method
        $this->questionsRepository->delete($question->id);

        // Assert that the question no longer exists in the database
        $this->assertDatabaseMissing('questions', [
            'id' => $question->id,
        ]);
    }
}