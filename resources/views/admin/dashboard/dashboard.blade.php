@extends('admin.dashboard.layouts.main')
@section('content')

    <div class="main">
        <main class="content px-3 py-4">
            <div class="container-fluid">
                <div class="mb-3">
                    <h1 class="fw-bold fs-1 mb-3">Заявки</h1>
                    <!-- Form for filter and search -->
                    <form action="{{ route('admin.dashboard.index') }}" method="GET" id="filter-form">
                        <div class="flex-row d-flex align-items-center">
                            <div class="dropdown me-2">
                                <button
                                    class="btn bg-gray-200 dropdown-toggle me-1 fw-semibold d-inline-flex align-items-center rounded-3"
                                    type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img class="mb-1" src="{{ asset('loan/Content/images/date.png') }}" alt="">
                                    Сегодня
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Вчера</a></li>
                                    <li><a class="dropdown-item" href="#">За прошлую неделю</a></li>
                                    <li><a class="dropdown-item" href="#">За прошлый месяц</a></li>
                                    <li><a class="dropdown-item" href="#">
                                            <button type="button" class="btn btn-white px-0" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                Выберите дату
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="btn-group me-2" role="group">
                                <input type="checkbox" class="btn-check" id="cc" name="filter[]" value="cc"
                                       autocomplete="off">
                                <label class="btn bg-gray-200 me-1 fw-semibold rounded-4" for="cc">CC</label>

                                <input type="checkbox" class="btn-check" id="dl" name="filter[]" value="dl"
                                       autocomplete="off">
                                <label class="btn bg-gray-200 me-1 fw-semibold rounded-4" for="dl">DL</label>

                                <input type="checkbox" class="btn-check" id="passport" name="filter[]" value="passport"
                                       autocomplete="off">
                                <label class="btn bg-gray-200 me-1 fw-semibold rounded-4"
                                       for="passport">Passport</label>

                                <input type="checkbox" class="btn-check" id="selfie" name="filter[]" value="selfie"
                                       autocomplete="off">
                                <label class="btn bg-gray-200 me-1 fw-semibold rounded-4" for="selfie">Selfie</label>
                            </div>
                            <input class="form-control me-2" type="search" name="search" placeholder="Texas"
                                   value="{{ $search ?? '' }}" aria-label="Search">
                            <button type="submit" class="btn btn-primary me-2">Применить</button>
                        </div>
                    </form>
                    <!-- Form for download -->
                    <form action="{{ route('admin.dashboard.download') }}" method="GET" id="download-form">
                        <button type="button" class="btn bg-orange-300 mt-3" onclick="submitDownloadForm()">Скачать
                        </button>
                    </form>
                    <div class="row mt-4">
                        <div class="col-12" id="guest-table">
                            @include('admin.dashboard.includes.guest_table')
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Выберите дату</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <input type="datetime-local" class="form-control">
                                    </form>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                                    </button>
                                    <button type="button" class="btn btn-primary">Применить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal modal-xl fade" id="staticBackdrop" data-bs-backdrop="static"
                         data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body d-flex justify-content-center">
                                    <div class="container">
                                        <div class="row">
                                            <div
                                                class="col border-2 border-start-0 border-top-0 border-bottom-0 border-end">
                                                <table class="table table-borderless fw-semibold">
                                                    <tr>
                                                        <th>Name</th>
                                                        <td id="modal-name">N/A</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Birth Date</th>
                                                        <td id="modal-birthdate">N/A</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td id="modal-email">N/A</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Cell Phone</th>
                                                        <td id="modal-cellphone">N/A</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Work Phone</th>
                                                        <td id="modal-workphone">N/A</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Social number</th>
                                                        <td id="modal-socialnumber">N/A</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Driver License Number</th>
                                                        <td id="modal-dlnumber">N/A</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Military service</th>
                                                        <td id="modal-military">N/A</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Home Zip Code</th>
                                                        <td id="modal-zip">N/A</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Street</th>
                                                        <td id="modal-street">N/A</td>
                                                    </tr>
                                                    <tr>
                                                        <th>City</th>
                                                        <td id="modal-city">N/A</td>
                                                    </tr>
                                                    <tr>
                                                        <th>State</th>
                                                        <td id="modal-state">N/A</td>
                                                    </tr>
                                                    <tr>
                                                        <th>County</th>
                                                        <td id="modal-county">N/A</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Years At Address</th>
                                                        <td id="modal-years">N/A</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Residential status</th>
                                                        <td id="modal-residential">N/A</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Zip Code</th>
                                                        <td id="modal-zipcode">N/A</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col d-flex flex-column justify-content-between">
                                                <div>
                                                    <table class="table table-borderless fw-semibold">
                                                        <tr>
                                                            <th>Bank Name</th>
                                                            <td id="modal-bankname">N/A</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Routing Number</th>
                                                            <td id="modal-routing">N/A</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Account Number</th>
                                                            <td id="modal-account">N/A</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Bank Years</th>
                                                            <td id="modal-bankyears">N/A</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Employment status</th>
                                                            <td id="modal-employment">N/A</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Job Title</th>
                                                            <td id="modal-jobtitle">N/A</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Employer name</th>
                                                            <td id="modal-employer">N/A</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Employment status length</th>
                                                            <td id="modal-employmentlength">N/A</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Payment type</th>
                                                            <td id="modal-paymenttype">N/A</td>
                                                        </tr>
                                                        <tr>
                                                            <th>How Often Get Paid</th>
                                                            <td id="modal-payfrequency">N/A</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Salary</th>
                                                            <td id="modal-salary">N/A</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="d-inline-block mt-3">
                                                    <img id="modal-avatar1" src="{{asset('dist/img/avatar5.png')}}"
                                                         class="bg-gray-200 rounded-3 me-2 mb-2"
                                                         style="width: 100px; height: 100px;">
                                                    <img id="modal-avatar2" src="{{asset('dist/img/avatar5.png')}}"
                                                         class="bg-gray-200 rounded-3 me-2 mb-2"
                                                         style="width: 100px; height: 100px;">
                                                    <img id="modal-avatar3" src="{{asset('dist/img/avatar5.png')}}"
                                                         class="bg-gray-200 rounded-3 me-2 mb-2"
                                                         style="width: 100px; height: 100px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-top-0 d-flex justify-content-center">
                                    <form id="modal-delete-form"
                                          action="{{ route('admin.dashboard.delete', ['guest' => 'GUEST_ID']) }}"
                                          method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button
                                        class="btn border border-1 border-black me-1 fw-semibold d-inline-flex align-items-center rounded-3"
                                        onclick="submitDeleteForm()">
                                        <i class="lni lni-trash-can me-1"></i>Удалить
                                    </button>
                                    <button
                                        class="btn bg-orange-300 text-black fw-semibold d-inline-flex align-items-center rounded-3"
                                        onclick="submitDownloadForm()">
                                        <i class="lni lni-download me-1"></i>Скачать
                                    </button>
                                </div>
                            </div>
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
            const selectAllCheckbox = document.getElementById('select-all');
            const form = document.getElementById('download-form');
            const hiddenInput = document.createElement('input');

            if (selectAllCheckbox.checked) {
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'select_all');
                hiddenInput.setAttribute('value', 'true');
            } else {
                document.querySelectorAll('tbody .row-checkbox:checked').forEach(function (checkbox) {
                    selectedGuests.push(checkbox.closest('tr').getAttribute('data-id'));
                });
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'selected_guests');
                hiddenInput.setAttribute('value', selectedGuests.join(','));
            }

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

            input.onblur = function () {
                if (!input.value) {
                    noteContent.innerText = originalText;
                }
            };

            input.onkeydown = function (event) {
                if (event.key === 'Enter') {
                    form.submit();
                } else if (event.key === 'Escape') {
                    noteContent.innerText = originalText;
                }
            };
        }

        document.addEventListener('DOMContentLoaded', function () {
            var guestNames = document.querySelectorAll('.guest-name');

            guestNames.forEach(function (guestName) {
                guestName.addEventListener('click', function () {
                    // Modal will automatically be triggered by Bootstrap's data-bs-toggle attribute
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.guest-name').forEach(function (guestName) {
                guestName.addEventListener('click', function () {
                    var tr = this.closest('tr');
                    var guest = JSON.parse(tr.getAttribute('data-guest'));
                    var documents = JSON.parse(tr.getAttribute('data-documents'));
                    var bank = JSON.parse(tr.getAttribute('data-bank'));
                    var job = JSON.parse(tr.getAttribute('data-job'));

                    // Заполняем данные в модальном окне
                    document.getElementById('modal-name').textContent = guest.name || 'N/A';
                    document.getElementById('modal-birthdate').textContent = guest.date_of_birth || 'N/A';
                    document.getElementById('modal-email').textContent = guest.email || 'N/A';
                    document.getElementById('modal-cellphone').textContent = guest.cell_phone || 'N/A';
                    document.getElementById('modal-workphone').textContent = guest.work_phone || 'N/A';
                    document.getElementById('modal-socialnumber').textContent = guest.social_number || 'N/A';
                    document.getElementById('modal-dlnumber').textContent = documents ? documents.driving_number : 'N/A';
                    document.getElementById('modal-military').textContent = guest.military_service || 'N/A';
                    document.getElementById('modal-zip').textContent = guest.zip_code || 'N/A';
                    document.getElementById('modal-street').textContent = guest.address || 'N/A';
                    document.getElementById('modal-city').textContent = guest.city || 'N/A';
                    document.getElementById('modal-state').textContent = guest.state || 'N/A';
                    document.getElementById('modal-county').textContent = guest.county || 'N/A';
                    document.getElementById('modal-years').textContent = guest.address_years || 'N/A';
                    document.getElementById('modal-residential').textContent = guest.residential_status || 'N/A';
                    document.getElementById('modal-zipcode').textContent = guest.zip_code || 'N/A';
                    document.getElementById('modal-bankname').textContent = bank ? bank.bank_name : 'N/A';
                    document.getElementById('modal-routing').textContent = bank ? bank.routing_number : 'N/A';
                    document.getElementById('modal-account').textContent = bank ? bank.account_number : 'N/A';
                    document.getElementById('modal-bankyears').textContent = bank ? bank.bank_year : 'N/A';
                    document.getElementById('modal-employment').textContent = job ? job.employment_status : 'N/A';
                    document.getElementById('modal-jobtitle').textContent = job ? job.job_title : 'N/A';
                    document.getElementById('modal-employer').textContent = job ? job.employer_name : 'N/A';
                    document.getElementById('modal-employmentlength').textContent = job ? job.employment_length : 'N/A';
                    document.getElementById('modal-paymenttype').textContent = job ? job.payment_type : 'N/A';
                    document.getElementById('modal-payfrequency').textContent = job ? job.pay_frequency : 'N/A';
                    document.getElementById('modal-salary').textContent = job ? job.salary : 'N/A';

                    // Обновляем аватары
                    var avatarBasePath = '{{ asset('storage/') }}';
                    var avatars = [
                        documents ? documents.driving_front : null,
                        documents ? documents.driving_back : null,
                        documents ? documents.selfie : null
                    ];

                    // Добавляем дополнительные документы, если требуется
                    var additionalDocs = [
                        documents ? documents.id_front : null,
                        documents ? documents.id_back : null,
                        documents ? documents.passport : null,
                        documents ? documents.additional_document : null
                    ].filter(Boolean);

                    avatars = avatars.filter(Boolean); // Оставляем только существующие
                    avatars = avatars.concat(additionalDocs).slice(0, 3); // Добавляем дополнительные документы до 3х изображений

                    avatars.forEach(function (avatar, index) {
                        if (avatar) {
                            document.getElementById('modal-avatar' + (index + 1)).src = avatarBasePath + '/' + avatar;
                            document.getElementById('modal-avatar' + (index + 1)).style.display = 'inline-block';
                        }
                    });

                    // Скрываем оставшиеся аватары, если их меньше 3
                    for (var i = avatars.length; i < 3; i++) {
                        document.getElementById('modal-avatar' + (i + 1)).style.display = 'none';
                    }

                    // Обновляем action у формы удаления
                    var deleteForm = document.getElementById('modal-delete-form');
                    deleteForm.action = deleteForm.action.replace('GUEST_ID', guest.id);
                });
            });

            function submitDeleteForm() {
                var form = document.getElementById('modal-delete-form');
                form.submit();
            }
        });
    </script>
@endsection
