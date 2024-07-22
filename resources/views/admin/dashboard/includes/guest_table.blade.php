<table class="table table-borderless">
    <thead>
    <tr>
        <th scope="col" class="align-content-center">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="select-all" name="select">
            </div>
        </th>
        <th scope="col" class="align-content-center">ID</th>
        <th scope="col">
            Name
            <button class="btn btn-link sort" data-sort-by="name" data-sort-order="asc"><i class="fas fa-sort" style="color: #0a0e14"></i></button>
        </th>
        <th scope="col" class="align-content-center">State</th>
        <th scope="col">
            DOB
            <button class="btn btn-link sort" data-sort-by="date_of_birth" data-sort-order="asc"><i class="fas fa-sort" style="color: #0a0e14"></i></button>
        </th>
        <th scope="col">
            ZIP
            <button class="btn btn-link sort" data-sort-by="zip_code" data-sort-order="asc"><i class="fas fa-sort" style="color: #0a0e14"></i></button>
        </th>
        <th scope="col" class="align-content-center">CC</th>
        <th scope="col" class="align-content-center">Documents</th>
        <th scope="col" class="align-content-center">Selfie</th>
        <th scope="col">
            Date of Creation
            <button class="btn btn-link sort" data-sort-by="created_at" data-sort-order="asc"><i class="fas fa-sort" style="color: #0a0e14"></i></button>
        </th>
        <th scope="col" class="align-content-center">Заметки</th>
    </tr>
    </thead>
    <tbody class="border-top fw-semibold">
    @foreach($guests as $guest)
        <tr data-guest="{{ json_encode($guest) }}" data-documents="{{ json_encode($guest->documents) }}" data-bank="{{ json_encode($guest->bank) }}" data-job="{{ json_encode($guest->jobInfo) }}">
            <td>
                <div class="form-check">
                    <input class="form-check-input row-checkbox" type="checkbox" name="select">
                </div>
            </td>
            <td>{{ $guest->id }}</td>
            <td class="guest-name" data-bs-toggle="modal" data-bs-target="#staticBackdrop">{{ $guest->name }}</td>
            <td>{{ $guest->state }}</td>
            <td>{{ $guest->date_of_birth }}</td>
            <td>{{ $guest->zip_code }}</td>
            <td>{{ optional($guest->bank)->card_number ? '+' : '-' }}</td>
            <td>
                {{ optional($guest->documents)->driving_front || optional($guest->documents)->driving_back || optional($guest->documents)->id_front || optional($guest->documents)->id_back || optional($guest->documents)->passport || optional($guest->documents)->additional_document ? '+' : '-' }}
            </td>
            <td>{{ optional($guest->documents)->selfie ? '+' : '-' }}</td>
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
