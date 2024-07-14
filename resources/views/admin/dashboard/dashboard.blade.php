@extends('admin.dashboard.layouts.main')
@section('content')

    <div class="main">
        <main class="content px-3 py-4">
            <div class="container-fluid">
                <div class="mb-3">
                    <h1 class="fw-bold fs-1 mb-3">Заявки</h1>
                    <div class="flex-row">
                        <div class="dropdown">
                            <button class="btn bg-gray-200 dropdown-toggle me-1" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="mb-1" src="{{asset('loan/Content/images/date.png')}}" alt="">
                                Сегодня
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                            <button type="button" class="btn bg-gray-200 me-1">СС</button>
                            <button type="button" class="btn bg-gray-200 me-1">DL</button>
                            <button type="button" class="btn bg-gray-200 me-1">Passport</button>
                            <button type="button" class="btn bg-gray-200 me-1">Selfie</button>
                        </div>
                    </div>
                    <div class="flex-row mt-3">
                        <div class="row justify-content-between">
                            <div class="col-auto">
                                <form class="d-flex">
                                    <input class="form-control me-2" type="search" placeholder="Texas"
                                           aria-label="Search">
                                </form>
                            </div>
                            <div class="col-auto ms-4">
                                <button class="btn border border-1 me-1"><img
                                        src="{{asset('loan/Content/images/delete.png')}}" class="me-1">Удалить
                                </button>
                                <button class="btn bg-orange-300"><img src="{{asset('loan/Content/images/download.png')}}"
                                                                       class="me-1">Скачать
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <table class="table ">
                                <thead>
                                <tr class="">
                                    <th scope="col">
                                        <div class="form-check pt-1">
                                            <input class="form-check-input" type="checkbox" id="mycheck" name="select">
                                        </div>
                                    </th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name<img src="{{asset('loan/Content/images/sort.png')}}" class="ms-1"></th>
                                    <th scope="col">State</th>
                                    <th scope="col">DOB<img src="{{asset('loan/Content/images/sort.png')}}" class="ms-1"></th>
                                    <th scope="col">ZIP<img src="{{asset('loan/Content/images/sort.png')}}" class="ms-1"></th>
                                    <th scope="col">CC</th>
                                    <th scope="col">Documents</th>
                                    <th scope="col">Selfie</th>
                                    <th scope="col">Date of Creation<img src="{{asset('loan/Content/images/sort.png')}}" class="ms-1"></th>
                                    <th scope="col">Заметки</th>
                                </tr>
                                </thead>
                                <tbody class="border-top ">
                                @foreach($guests as $guest)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="mycheck" name="select">
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
{{--                            <div class="d-flex justify-content-center">--}}
{{--                                {{ $guests->links() }}--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-body-secondary">
                    <div class="col-6 text-end text-body-secondary d-none d-md-block">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a class="text-body-secondary" href="#">Contact</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-body-secondary" href="#">About Us</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-body-secondary" href="#">Terms & Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var checkboxes = document.querySelectorAll('tbody .form-check-input');
            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    var row = this.closest('tr');
                    if (this.checked) {
                        row.classList.add('highlight');
                    } else {
                        row.classList.remove('highlight');
                    }
                });
            });
        });

        function makeEditable(td, guestId) {
            let form = td.querySelector('form');
            let noteContent = form.querySelector('.note-content');
            let originalText = noteContent.innerText;

            let input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control';
            input.name = 'note';
            input.value = originalText;

            let button = document.createElement('button');
            button.innerText = 'Изменить';
            button.type = 'submit';
            button.className = 'btn btn-primary ms-2 mt-2';

            noteContent.innerText = '';
            noteContent.appendChild(input);
            noteContent.appendChild(button);
            input.focus();

            input.onblur = function() {
                if (!input.value) {
                    noteContent.innerText = originalText;
                }
            };

            input.onkeydown = function(event) {
                if (event.key === 'Enter') {
                    form.submit();
                } else if (event.key === 'Escape') {
                    noteContent.innerText = originalText;
                }
            };
        }
    </script>
@endsection
