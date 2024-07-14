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
                        <div class="col-12" id="guest-table">
                            @include('admin.dashboard.includes.guest_table')
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-body-secondary">
                    <div class="d-flex justify-content-center">
                        {{ $guests->links() }}
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.sort').forEach(function (button) {
                button.addEventListener('click', function () {
                    var sortBy = this.getAttribute('data-sort-by');
                    var sortOrder = this.getAttribute('data-sort-order');
                    fetchSortedData(sortBy, sortOrder);

                    // Toggle sort order for next click
                    if (sortOrder === 'asc') {
                        this.setAttribute('data-sort-order', 'desc');
                    } else {
                        this.setAttribute('data-sort-order', 'asc');
                    }
                });
            });

            function fetchSortedData(sortBy, sortOrder) {
                fetch(`/dashboard/sort?sort_by=${sortBy}&sort_order=${sortOrder}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('guest-table').innerHTML = data;
                        attachSortHandlers();
                    });
            }

            function attachSortHandlers() {
                document.querySelectorAll('.sort').forEach(function (button) {
                    button.addEventListener('click', function () {
                        var sortBy = this.getAttribute('data-sort-by');
                        var sortOrder = this.getAttribute('data-sort-order');
                        fetchSortedData(sortBy, sortOrder);

                        // Toggle sort order for next click
                        if (sortOrder === 'asc') {
                            this.setAttribute('data-sort-order', 'desc');
                        } else {
                            this.setAttribute('data-sort-order', 'asc');
                        }
                    });
                });
            }

            attachSortHandlers();
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
