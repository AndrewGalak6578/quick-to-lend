@extends('admin.dashboard.layouts.main')
@section('content')

    <div class="main">
        <main class="content px-3 py-4">
            <div class="container-fluid">
                <div class="mb-3">
                    <h1 class="fw-bold fs-1 mb-3">Настройка</h1>
                    <div>
                        <div>
                            <div class="row">
                                <div class="col">
                                    <div class="border border-2 rounded-4 ps-4 bg-transparent">
                                        <h1 class="fw-bold fs-4 mb-3 pt-3">Отоброжать страницы</h1>
                                        <div class="wrapper mb-3">
                                            <div class="d-flex flex-column fw-semibold">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="mycheck" name="data">
                                                    <p>Данные</p>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="mycheck" name="documents">
                                                    <p>Документы и селфи</p>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="mycheck" name="statement">
                                                    <p>Стейтменты</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex pb-4 pe-2">
                                            <button class="btn bg-orange-300 me-1 ms-auto text-black fw-semibold d-inline-flex align-items-center">
                                                <i class="lni lni-save me-2"></i>
                                                Сохранить
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
                                                                            <input type="password" placeholder="" class="password" id="password">
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
                                                                            <input type="password" placeholder="" id="password" class="password">
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
                                                                            <input type="password" placeholder="" id="password" class="password">
                                                                            <i class="lni lni-eye eye" id="eye"></i>
                                                                        </div>
                                                                        <div id="emailHelp" class="form-text hidden">Пароль не совпадает</div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex pb-4 pe-2">
                                                    <button class="btn bg-orange-300 me-1 ms-auto text-black fw-semibold d-inline-flex align-items-center">
                                                        <i class="lni lni-save me-2"></i>
                                                        Сохранить
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
                                                            <div class="border border-2 mb-2 rounded-2 py-1 d-inline-flex align-items-center ps-2">-4201723515
                                                                <i class="lni lni-link ms-3 pe-2"></i>
                                                            </div>
                                                            <div class="border border-2 rounded-2 py-1 d-inline-flex align-items-center ps-2">6251119104:AGAEz7R_AfcDWwlBasf42tfwwgCAfGafeETE15q8
                                                                <i class="lni lni-link ms-3 pe-2"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex pb-4 pe-2">
                                        <button class="btn bg-green me-1 ms-auto text-black fw-semibold d-inline-flex align-items-center">
                                            <i class="lni lni-checkmark me-2"></i>
                                            Сохранено
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
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
    </script>
    <script>
        function toggleContent(contentId, iconId) {
            const content = document.getElementById(contentId);
            const icon = document.getElementById(iconId);
            if (content.style.display === 'none' || content.style.display === '') {
                content.style.display = 'block';
                icon.classList.remove('lni-plus');
                icon.classList.add('lni-minus');
            } else {
                content.style.display = 'none';
                icon.classList.remove('lni-minus');
                icon.classList.add('lni-plus');
            }
        }
    </script>
@endsection
