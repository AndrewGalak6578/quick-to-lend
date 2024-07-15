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
                                    <div class="border border-2 rounded-4 ps-4 bg-transparent">
                                        <div class="d-flex align-items-center">
                                            <h1 class="fw-bold fs-4 mb-4 pt-3">Изменить пароль</h1>
                                            <div class="ms-auto">
                                                <div class="add_on align-items-center me-2">
                                                    <i class="lni lni-minus"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <form>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label fw-semibold">Текущий пароль</label>
                                                            <div class="mb-3">
                                                                <div class="input-box">
                                                                    <input type="password" placeholder="">
                                                                    <i class="lni lni-eye"></i>
                                                                </div>
                                                                <div id="emailHelp" class="form-text hidden">Неверный пароль</div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col">
                                                    <form>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label fw-semibold">Придумайте пароль</label>
                                                            <div class="mb-3">
                                                                <div class="input-box">
                                                                    <input type="password" placeholder="">
                                                                    <i class="lni lni-eye"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <form>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label fw-semibold">Повторите новый пароль</label>
                                                            <div class="mb-3">
                                                                <div class="input-box">
                                                                    <input type="password" placeholder="">
                                                                    <i class="lni lni-eye"></i>
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
                                    <div class="border border-2 rounded-4 ps-4 mt-4 bg-transparent">
                                        <div class="d-flex align-items-center">
                                            <h1 class="fw-bold fs-4 mb-4 pt-3">Получать уведомления в Telegram</h1>
                                            <div class="ms-auto">
                                                <div class="add_on align-items-center me-2">
                                                    <i class="lni lni-minus"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container mb-3 fw-semibold">
                                            <div class="d-inline-flex">
                                                <div class="col-auto pt-2 pe-4 ">
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
                                    <div class="border border-2 rounded-4 ps-4 mt-4 bg-transparent">
                                        <div class="d-flex align-items-center">
                                            <h1 class="fw-bold fs-4 mb-4 pt-3">Получать уведомления в Telegram</h1>
                                            <div class="ms-auto">
                                                <div class="add_on align-items-center me-2">
                                                    <i class="lni lni-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border border-2 rounded-4 ps-4 mt-4 bg-transparent">
                                        <div class="d-flex align-items-center">
                                            <h1 class="fw-bold fs-4 mb-4 pt-3">Изменить пароль</h1>
                                            <div class="ms-auto">
                                                <div class="add_on align-items-center me-2">
                                                    <i class="lni lni-plus"></i>
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
@endsection
