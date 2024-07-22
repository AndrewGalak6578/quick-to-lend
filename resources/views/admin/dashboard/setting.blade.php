@extends('admin.dashboard.layouts.main')
@section('content')

    <style>
        .bg-red {
            background: #E34234;
        }

        .bg-green_1 {
            background: #98FF98;
        }
    </style>

    <div class="main">
        <main class="content px-3 py-4">
            <div class="container-fluid">
                <div class="mb-3">
                    <h1 class="fw-bold fs-1 mb-3">Настройка</h1>
                    <div>
                        <div>
                            <div class="row">
                                <div class="col">
                                    <div class="border border-2 rounded-4 px-4 bg-transparent">
                                        <h1 class="fw-bold fs-4 mb-3 pt-3">Отоброжать страницы</h1>
                                        <div class="mb-3">
                                            <div class="d-flex flex-column fw-semibold">
                                                <button id="toggleSelfie" class="mt-2 d-flex rounded-4 fw-bold {{ $settings->selfie_upload ? 'bg-green_1' : 'bg-red' }}">
                                                    <p class="mt-3 ps-4">Отключить селфи</p>
                                                    <p class="mt-3 ms-auto pe-2">{{ $settings->selfie_upload ? 'ON' : 'OFF' }}</p>
                                                </button>
                                                <button id="toggleStatements" class="mt-3 d-flex rounded-4 fw-bold {{ $settings->extra_doc ? 'bg-green_1' : 'bg-red' }}">
                                                    <p class="mt-3 ps-4">Отключить стейтменты</p>
                                                    <p class="mt-3 ms-auto pe-2">{{ $settings->extra_doc ? 'ON' : 'OFF' }}</p>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="d-flex pb-4">
                                            <button id="toggleButton1" class="btn bg-orange-300 me-1 ms-auto text-black fw-semibold d-inline-flex align-items-center">
                                                <i class="lni lni-save me-2"></i>
                                                <span>Сохранить</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="container mb-4">
                                        <div class="border border-2 rounded-4 ps-4 bg-transparent" id="password-section">
                                            <div class="d-flex align-items-center">
                                                <h1 class="fw-bold fs-4 mb-4 pt-3">Изменить пароль</h1>
                                                <div class="ms-auto">
                                                    <div class="add_on align-items-center me-2">
                                                        <i class="lni lni-plus" id="toggle-password-icon" onclick="toggleContent('password-content', 'toggle-password-icon')"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="collapsible-content" id="password-content">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col">
                                                            <form>
                                                                <div class="mb-3">
                                                                    <label for="current-password" class="form-label fw-semibold">Текущий пароль</label>
                                                                    <div class="mb-3">
                                                                        <div class="input-box">
                                                                            <input type="password" placeholder="" class="password" id="current-password">
                                                                            <i class="lni lni-eye eye" id="eye"></i>
                                                                        </div>
                                                                        <div id="emailHelp" class="form-text hidden">Неверный пароль</div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col">
                                                            <form>
                                                                <div class="mb-3">
                                                                    <label for="new-password" class="form-label fw-semibold">Придумайте пароль</label>
                                                                    <div class="mb-3">
                                                                        <div class="input-box">
                                                                            <input type="password" placeholder="" id="new-password" class="password">
                                                                            <i class="lni lni-eye eye" id="eye"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <form>
                                                                <div class="mb-3">
                                                                    <label for="repeat-password" class="form-label fw-semibold">Повторите новый пароль</label>
                                                                    <div class="mb-3">
                                                                        <div class="input-box">
                                                                            <input type="password" placeholder="" id="repeat-password" class="password">
                                                                            <i class="lni lni-eye eye" id="eye"></i>
                                                                        </div>
                                                                        <div id="emailHelp" class="form-text hidden">Пароль не совпадает</div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex pb-4 pe-4">
                                                    <button id="toggleButton2" class="btn bg-orange-300 me-1 ms-auto text-black fw-semibold d-inline-flex align-items-center">
                                                        <i class="lni lni-save me-2"></i>
                                                        <span>Сохранить</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="border border-2 rounded-4 ps-4 mt-4 bg-transparent" id="telegram-section">
                                            <div class="d-flex align-items-center">
                                                <h1 class="fw-bold fs-4 mb-4 pt-3">Получать уведомления в Telegram</h1>
                                                <div class="ms-auto">
                                                    <div class="add_on align-items-center me-2">
                                                        <i class="lni lni-plus" id="toggle-telegram-icon" onclick="toggleContent('telegram-content', 'toggle-telegram-icon')"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="collapsible-content" id="telegram-content">
                                                <div class="container mb-3 fw-semibold">
                                                    <div class="d-inline-flex">
                                                        <div class="col-auto pt-2 pe-4">
                                                            <p>Chat ID</p>
                                                            <p>Bot ID</p>
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="border border-2 mb-2 rounded-2 py-1 d-inline-flex align-items-center ps-2">{{ $settings->chat_id_1 }}
                                                                <i class="lni lni-link ms-3 pe-2"></i>
                                                            </div>
                                                            <div class="border border-2 rounded-2 py-1 d-inline-flex align-items-center ps-2">{{ $settings->telegram_bot_token }}
                                                                <i class="lni lni-link ms-3 pe-2"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
    </div>

    <script>
        // Get all elements with class "eye"
        let eyes = document.querySelectorAll(".eye");
        // Iterate over each eye element
        eyes.forEach(function(eye) {
            // Add click event listener to each eye element
            eye.addEventListener("click", function() {
                // Get the sibling input element with class "password"
                let password = this.previousElementSibling;
                // Toggle the type attribute between "password" and "text"
                if (password.type === "password") {
                    password.type = "text";
                } else {
                    password.type = "password";
                }
            });
        });

        function toggleContent(contentId, iconId) {
            const content = document.getElementById(contentId);
            const icon = document.getElementById(iconId);
            if (content.style.height === '0px' || content.style.height === '') {
                const contentHeight = content.scrollHeight + 'px';
                content.style.height = contentHeight;
                icon.classList.remove('lni-plus');
                icon.classList.add('lni-minus');
            } else {
                content.style.height = '0';
                icon.classList.remove('lni-minus');
                icon.classList.add('lni-plus');
            }
        }

        function toggleButtonState(button) {
            const icon = button.querySelector('i');
            const text = button.querySelector('span');

            if (button.classList.contains('bg-orange-300')) {
                button.classList.remove('bg-orange-300');
                button.classList.add('bg-green');
                icon.classList.remove('lni-save');
                icon.classList.add('lni-checkmark');
                text.textContent = 'Сохранено';
                button.dataset.state = 'saved';
            }
        }

        function resetSaveButtons() {
            const saveButtons = document.querySelectorAll('[data-state="saved"]');
            saveButtons.forEach(button => {
                const icon = button.querySelector('i');
                const text = button.querySelector('span');

                button.classList.remove('bg-green');
                button.classList.add('bg-orange-300');
                icon.classList.remove('lni-checkmark');
                icon.classList.add('lni-save');
                text.textContent = 'Сохранить';
                button.dataset.state = '';
            });
        }

        function toggleBackgroundColorAndText(button) {
            if (button.classList.contains('bg-green_1')) {
                button.classList.remove('bg-green_1');
                button.classList.add('bg-red');
                button.querySelector('p:last-child').textContent = 'OFF';
            } else {
                button.classList.remove('bg-red');
                button.classList.add('bg-green_1');
                button.querySelector('p:last-child').textContent = 'ON';
            }
            resetSaveButtons();
        }

        document.getElementById('toggleSelfie').addEventListener('click', function() {
            toggleBackgroundColorAndText(this);
        });

        document.getElementById('toggleStatements').addEventListener('click', function() {
            toggleBackgroundColorAndText(this);
        });

        document.getElementById('toggleButton1').addEventListener('click', function() {
            toggleButtonState(this);

            const selfieUpload = document.getElementById('toggleSelfie').classList.contains('bg-green_1') ? 1 : 0;
            const selfieSecond = selfieUpload; // Sync selfie_upload and selfie_second
            const extraDoc = document.getElementById('toggleStatements').classList.contains('bg-green_1') ? 1 : 0;

            const csrfToken = '{{ csrf_token() }}';
            const url = '{{ route('admin.dashboard.setting.update') }}';

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    selfie_upload: selfieUpload,
                    selfie_second: selfieSecond, // Include selfie_second
                    extra_doc: extraDoc
                }),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Settings updated successfully');
                    } else {
                        alert('An error occurred while updating settings');
                    }
                });
        });

        document.getElementById('toggleButton2').addEventListener('click', function() {
            toggleButtonState(this);
        });

        const passwordFields = document.querySelectorAll('input[type="password"]');
        passwordFields.forEach(function(field) {
            field.addEventListener('input', function() {
                resetSaveButtons();
            });
        });
    </script>

@endsection
