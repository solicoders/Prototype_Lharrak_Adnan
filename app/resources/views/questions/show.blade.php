@extends('layouts.layout')
@section('content')
<div class="content" style="min-height: 1302.4px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Détails du question</h1>
                </div>
                <div class="col-sm-6">
                    {{-- Add your edit button or other actions --}}
                    <a href="{{ route('questions.edit', ["question" => $question->id])}}" class="btn btn-default float-right">
                        <i class="far fa-edit"></i> Modifier
                    </a>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- Check if task is not null --}}
                            @if ($question)
                                <div class="col-sm-12">
                                    <label for="nom">Titre:</label>
                                    <p>{{ $question->Titre }}</p>
                                </div>

                                <!-- Projects Title -->
                                <div class="col-sm-12">
                                    <label for="description">Titre de examen:</label>
                                        <p>{{ $examen->Titre}}</p>
                                </div>

                                <!-- Description Field -->
                                <div class="col-sm-12">
                                    <label for="description">Description:</label>
                                    <p>{{ $question->Description }}</p>
                                </div>
                            @else
                                <p>question not found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection