<div class="card-body table-responsive p-0" style="overflow-x: auto;">
    <table class="table table-striped text-nowrap table-tasks">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Option 1</th>
                <th>Option 2</th>
            </tr>
        </thead>
        <tbody>
            @include('questions.search')
        </tbody>
        <input type="hidden" id='page' value="1">
    </table>
</div>
