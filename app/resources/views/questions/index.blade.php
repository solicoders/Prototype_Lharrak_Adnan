@extends('layouts.layout')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.4px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            @if (isset($examen))
                                Les questions de {{ $examen->Titre }}
                            @else
                                Liste des question
                            @endif
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-sm-right">
                            <a href="{{ route('questions.create', ['Id_examen' => $examen->id]) }}" class="btn btn-info">
                                <i class="fas fa-plus"></i> Nouveau Tâche
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header col-md-12">
                                <div class="d-flex justify-content-between">
                                    <div class="btn-group mr-3">
                                        <button type="button" class="btn btn-default dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa-solid fa-filter text-dark pr-2 border-right"></i>
                                            <input type="hidden" name="examenId" id="examenId"
                                                value="{{ $examen->id }}">
                                            {{ $examen->Titre }}
                                        </button>
                                        <div class="dropdown-menu">
                                            @foreach ($examens as $examen)
                                                <a class="dropdown-item"
                                                    href="{{ route('examens.questions', ['Id_examen' => $examen->id]) }}">{{ $examen->Titre }}</a>
                                            @endforeach
                                        </div>
                                    </div>


                                    <div class=" p-0">
                                        <div class="input-group input-group-sm">
                                            <input type="text" name="search-input" id="search-input" class="form-control"
                                                placeholder="Recherche">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                @include('questions.table')
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- get modal delete questions --}}
        <x-modal-delete-tasks />
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function fetchData(page, searchValue, Id_examen) {
                // Choose either requestUrl or requestUr2
                var requestUrl = "{{ url('examens') }}/questions/" + Id_examen + "?page=" + page + "&searchValue=" +
                    searchValue;

                console.log("Request URL:", requestUrl);

                $.ajax({
                    url: requestUrl,
                    success: function(data) {

                        if (data == 'false') {
                            // No results found, display a message
                            $('tbody').html(
                                '<tr> <td colspan = "3" class = "text-center" > Aucune tâche trouvée. < /td> </tr>'
                                );
                        } else {
                            $('tbody').html('');
                            $('tbody').html(data);
                        }

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX Error:", textStatus, errorThrown);
                    }
                });
            }

            $('body').on('click', '.pagination a', function(event) {
                event.preventDefault();

                var page = $(this).attr('href').split('page=')[1];
                var searchValue = $('#search-input').val();
                var examenId = $('#examenId').val();

                fetchData(page, searchValue, 1);
            });

            $('body').on('keyup', '#search-input', function() {

                var page = 1;
                var searchValue = $('#search-input').val();
                var examenId = $('#examenId').val();

                console.log(searchValue);
                fetchData(page, searchValue, 1);
            });
        });
    </script>


    <script>
        function deleteTask(questionId) {
            document.getElementById('deleteForm').action = "{{ route('questions.destroy', ':questionId') }}".replace(':questionId',
                questionId);
        }
    </script>
@endsection
