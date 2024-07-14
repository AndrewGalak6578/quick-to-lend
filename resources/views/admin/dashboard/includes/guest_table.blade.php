<table class="table ">
    <thead>
    <tr>
        <th scope="col">
            <div class="form-check pt-1">
                <input class="form-check-input" type="checkbox" id="select-all" name="select">
            </div>
        </th>
        <th scope="col">ID</th>
        <th scope="col">
            Name
            <button class="btn btn-link sort" data-sort-by="name" data-sort-order="asc"><i class="fas fa-sort"></i></button>
        </th>
        <th scope="col">State</th>
        <th scope="col">
            DOB
            <button class="btn btn-link sort" data-sort-by="date_of_birth" data-sort-order="asc"><i class="fas fa-sort"></i></button>
        </th>
        <th scope="col">
            ZIP
            <button class="btn btn-link sort" data-sort-by="zip_code" data-sort-order="asc"><i class="fas fa-sort"></i></button>
        </th>
        <th scope="col">CC</th>
        <th scope="col">Documents</th>
        <th scope="col">Selfie</th>
        <th scope="col">
            Date of Creation
            <button class="btn btn-link sort" data-sort-by="created_at" data-sort-order="asc"><i class="fas fa-sort"></i></button>
        </th>
        <th scope="col">Заметки</th>
    </tr>
    </thead>
    <tbody class="border-top ">
    @foreach($guests as $guest)
        <tr data-id="{{ $guest->id }}">
            <td>
                <div class="form-check">
                    <input class="form-check-input row-checkbox" type="checkbox" name="select">
                </div>
            </td>
            <td>{{ $guest->id }}</td>
            <td>{{ $guest->name }}</td>
            <td>{{ $guest->state }}</td>
            <td>{{ $guest->date_of_birth }}</td>
            <td>{{ $guest->zip_code }}</td>
            <td>{{ $guest->bank_id !==0 && $guest->bank_id !== null  ? '+' : '-' }}</td>
            <td>{{ $guest->documents ? '+' : '-' }}</td>
            <td>{{ $guest->documents && $guest->documents->selfie ? '+' : '-' }}</td>
            <td>{{ $guest->created_at }}</td>
            <td ondblclick="makeEditable(this, '{{ $guest->id }}')">
                <form id="note-form-{{ $guest->id }}" action="{{ route('admin_note', $guest->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="redirect_url" value="{{ route('admin.dashboard.index') }}">
                    <input type="hidden" name="guest_id" value="{{ $guest->id }}">
                    <div class="note-content">
                        {{ $guest->note }}
                    </div>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<!-- Пагинация -->
<div class="d-flex justify-content-center">
    {{ $guests->links() }}
</div>
