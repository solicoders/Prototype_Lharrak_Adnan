@forelse ($questions as $question)
    <tr>
        <td>{{ $question->Titre }}</td>
        <td>{{ Str::limit($question->Description, 30) }}</td>
        <td>{{ $question->Option1 }}</td>
        <td>{{ $question->Option2 }}</td>

        <td class="">
            <a href="{{ route('questions.show', ['question' => $question->id]) }}" class="btn btn-sm btn-default mx-2">
                <i class="fa-regular fa-eye"></i>
            </a>
            <a href="{{ route('questions.edit', ['question' => $question->id]) }}" class="btn btn-sm btn-default mx-2">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <button type="submit" class="btn btn-sm btn-danger" onclick="deletequestion({{ $question->id }})" data-toggle="modal"
                    data-target="#deletequestion">
                <i class="fa-solid fa-trash"></i>
            </button>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="3" class="text-center">Aucune question trouvée.</td>
    </tr>
@endforelse

<tr>
    <td></td>
    <td></td>
    <td>
        <div class="pagination m-0 float-right">
            {{ $questions->links() }}
        </div>
    </td>
</tr>
