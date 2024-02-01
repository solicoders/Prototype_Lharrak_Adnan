<form method="POST" class="container pt-2" action="{{ isset($question) ? route('questions.update', ['question' => $question->id]) : route('questions.store') }}">
    @csrf
    @if (isset($question))
        @method('PUT')
    @endif

    <div class="card-body">
        <div class="form-group">
            <label for="titre" class="form-label">Examen</label>
            <select name="examenId" id="examenId" class="form-control">
                @foreach ($examens as $examen)
                    <option value="{{ $examen->id }}" {{ request()->route('id') ? 'selected' : '' }}>
                        {{ $examen->Titre }}
                    </option>
                @endforeach
            </select>
            @error('examenId')
                <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>
        

        <div class="form-group mb-3">
            <label for="titre">Titre</label>
            <input name="titre" type="text" class="form-control" id="titre" placeholder="Enter le titre"
                value="{{ old('titre', isset($question) ? $question->Titre : '') }}">
            @error('titre')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="Description">Description</label>
            <textarea name="description" id="inputDescription" class="form-control" oninput="setCustomValidity('')">{{ old('Description', isset($question) ? $question->Description : '') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- <input name="project_id" type="hidden" class="form-control" value="{{ $project->id }}"> --}}
    </div>
    <div class="card-footer">
        <a href="{{ route('tasks.index', $project->id) }}" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn btn-primary mx-2">{{ isset($task) ? 'Update' : 'Add' }}</button>
    </div>
</form>