@extends('admin.dashboard.layouts.main')
@section('content')

    <div class="main">
        <main class="content px-3 py-4">
            <div class="container-fluid">
                <div class="mb-3">
                    <h1 class="fw-bold fs-1 mb-3">Заявки</h1>
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('admin.dashboard.sort') }}" method="GET" class="d-flex align-items-center">
                                <div class="dropdown me-2">
                                    <button class="btn bg-gray-200 dropdown-toggle me-1 fw-semibold d-inline-flex align-items-center rounded-3" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                        <img class="mb-1" src="{{asset('loan/Content/images/date.png')}}" alt="">
                                        Сегодня
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">Вчера</a></li>
                                        <li><a class="dropdown-item" href="#">За прошлую неделю</a></li>
                                        <li><a class="dropdown-item" href="#">За прошлый месяц</a></li>
                                        <li><a class="dropdown-item" href="#">За прошлый месяц</a></li>
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
                                <input class="form-control me-2" type="search" name="search" placeholder="Texas" value="{{ $search }}" aria-label="Search">
                                <button type="submit" class="btn btn-primary">Применить</button>
                            </form>
                        </div>
                        <div class="col-auto ms-4">
                            <button class="btn border border-1 me-1"><img src="{{asset('loan/Content/images/delete.png')}}" class="me-1">Удалить</button>
                            <form action="{{ route('admin.dashboard.download') }}" method="GET" id="download-form">
                                <input type="hidden" name="selected_guests[]" id="selected-guests">
                                <button type="submit" class="btn bg-orange-300"><img src="{{ asset('loan/Content/images/download.png') }}" class="me-1">Скачать</button>
                            </form>
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
            const selectedRows = new Set(JSON.parse(localStorage.getItem('selectedRows')) || []);

            function updateLocalStorage() {
                localStorage.setItem('selectedRows', JSON.stringify(Array.from(selectedRows)));
            }

            function highlightSelectedRows() {
                document.querySelectorAll('tbody tr').forEach(row => {
                    const checkbox = row.querySelector('.row-checkbox');
                    if (selectedRows.has(row.getAttribute('data-id'))) {
                        checkbox.checked = true;
                        row.classList.add('highlight');
                    } else {
                        checkbox.checked = false;
                        row.classList.remove('highlight');
                    }
                });
            }

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
                        highlightSelectedRows();
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

                document.querySelectorAll('tbody .row-checkbox').forEach(function (checkbox) {
                    checkbox.addEventListener('change', function () {
                        var row = checkbox.closest('tr');
                        if (checkbox.checked) {
                            selectedRows.add(row.getAttribute('data-id'));
                            row.classList.add('highlight');
                        } else {
                            selectedRows.delete(row.getAttribute('data-id'));
                            row.classList.remove('highlight');
                        }
                        updateLocalStorage();
                    });
                });

                document.getElementById('select-all').addEventListener('change', function () {
                    const selectAllChecked = this.checked;
                    document.querySelectorAll('tbody .row-checkbox').forEach(function (checkbox) {
                        checkbox.checked = selectAllChecked;
                        var row = checkbox.closest('tr');
                        if (selectAllChecked) {
                            selectedRows.add(row.getAttribute('data-id'));
                            row.classList.add('highlight');
                        } else {
                            selectedRows.delete(row.getAttribute('data-id'));
                            row.classList.remove('highlight');
                        }
                    });
                    updateLocalStorage();
                });
            }

            attachSortHandlers();
            highlightSelectedRows();

            // Двойной клик для редактирования заметок
            window.makeEditable = function (td, guestId) {
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
        });
        document.getElementById('select-all').addEventListener('change', function () {
            var selectAllCheckbox = this;
            var checkboxes = document.querySelectorAll('tbody .row-checkbox');
            var selectedGuests = [];
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = selectAllCheckbox.checked;
                var row = checkbox.closest('tr');
                if (checkbox.checked) {
                    row.classList.add('highlight');
                    selectedGuests.push(row.getAttribute('data-id'));
                } else {
                    row.classList.remove('highlight');
                }
            });
            document.getElementById('selected-guests').value = JSON.stringify(selectedGuests);
        });

        document.querySelectorAll('tbody .row-checkbox').forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                var row = checkbox.closest('tr');
                var selectedGuests = JSON.parse(document.getElementById('selected-guests').value || '[]');
                if (checkbox.checked) {
                    row.classList.add('highlight');
                    selectedGuests.push(row.getAttribute('data-id'));
                } else {
                    row.classList.remove('highlight');
                    var index = selectedGuests.indexOf(row.getAttribute('data-id'));
                    if (index > -1) {
                        selectedGuests.splice(index, 1);
                    }
                }
                document.getElementById('selected-guests').value = JSON.stringify(selectedGuests);
            });
        });
    </script>
@endsection
