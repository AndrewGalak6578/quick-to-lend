@extends('admin.dashboard.layouts.main')
@section('content')

    <div class="main">
        <main class="content px-3 py-4">
            <div class="container-fluid">
                <div class="mb-3">
                    <h1 class="fw-bold fs-1 mb-3">Заявки</h1>
                    <form action="{{ route('admin.dashboard.download') }}" method="GET" id="download-form">
                        <div class="flex-row d-flex align-items-center">
                            <div class="dropdown me-2">
                                <button class="btn bg-gray-200 dropdown-toggle me-1 fw-semibold d-inline-flex align-items-center rounded-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="mb-1" src="{{ asset('loan/Content/images/date.png') }}" alt="">
                                    Сегодня
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Вчера</a></li>
                                    <li><a class="dropdown-item" href="#">За прошлую неделю</a></li>
                                    <li><a class="dropdown-item" href="#">За прошлый месяц</a></li>
                                    <li><a class="dropdown-item" href="#">
                                            <button type="button" class="btn btn-white px-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Выберите дату
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="btn-group me-2" role="group">
                                <input type="checkbox" class="btn-check" id="cc" name="filter[]" value="cc" autocomplete="off">
                                <label class="btn bg-gray-200 me-1 fw-semibold rounded-4" for="cc">CC</label>

                                <input type="checkbox" class="btn-check" id="dl" name="filter[]" value="dl" autocomplete="off">
                                <label class="btn bg-gray-200 me-1 fw-semibold rounded-4" for="dl">DL</label>

                                <input type="checkbox" class="btn-check" id="passport" name="filter[]" value="passport" autocomplete="off">
                                <label class="btn bg-gray-200 me-1 fw-semibold rounded-4" for="passport">Passport</label>

                                <input type="checkbox" class="btn-check" id="selfie" name="filter[]" value="selfie" autocomplete="off">
                                <label class="btn bg-gray-200 me-1 fw-semibold rounded-4" for="selfie">Selfie</label>
                            </div>
                            <input class="form-control me-2" type="search" name="search" placeholder="Texas" value="{{ $search ?? '' }}" aria-label="Search">
                            <button type="submit" class="btn btn-primary me-2">Применить</button>
                            <button type="button" class="btn bg-orange-300" onclick="submitDownloadForm()">Скачать</button>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12" id="guest-table">
                                @include('admin.dashboard.includes.guest_table')
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Выберите дату</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <input type="datetime-local" class="form-control">
                                        </form>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                        <button type="button" class="btn btn-primary">Применить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                fetch(`/admin/dashboard/sort?sort_by=${sortBy}&sort_order=${sortOrder}`, {
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

            document.getElementById('select-all').addEventListener('change', function () {
                var checkboxes = document.querySelectorAll('tbody .row-checkbox');
                checkboxes.forEach(function (checkbox) {
                    checkbox.checked = this.checked;
                    var row = checkbox.closest('tr');
                    if (checkbox.checked) {
                        row.classList.add('highlight');
                    } else {
                        row.classList.remove('highlight');
                    }
                }.bind(this));
            });

            document.querySelectorAll('tbody .row-checkbox').forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    var row = checkbox.closest('tr');
                    if (checkbox.checked) {
                        row.classList.add('highlight');
                    } else {
                        row.classList.remove('highlight');
                    }
                });
            });

            attachSortHandlers();
        });

        function submitDownloadForm() {
            const selectedGuests = [];
            document.querySelectorAll('tbody .row-checkbox:checked').forEach(function (checkbox) {
                selectedGuests.push(checkbox.closest('tr').getAttribute('data-id'));
            });

            const form = document.getElementById('download-form');
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'selected_guests');
            hiddenInput.setAttribute('value', selectedGuests.join(','));

            form.appendChild(hiddenInput);
            form.submit();
        }

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
