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
                                            <button class="btn bg-orange-300 me-1 ms-auto"><img
                                                    src="{{asset('loan/Content/images/save.png')}}" class="me-2">Сохранить
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="border border-2 rounded-4 ps-4 bg-transparent">
                                        <h1 class="fw-bold fs-4 mb-4 pt-3">Изменить пароль</h1>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <form>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label fw-semibold">Текущий пароль</label>
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control bg-transparent" aria-label="Username" aria-describedby="basic-addon1">
                                                                <span class="input-group-text bg-transparent" id="basic-addon1">
                                                                    <button class="btn">
                                                                        <img src="{{asset('loan/Content/images/eye.png')}}">
                                                                    </button>
                                                                </span>
                                                                <div id="emailHelp" class="form-text hidden">Неверный пароль</div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col">
                                                    <form>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label fw-semibold">Придумайте пароль</label>
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control bg-transparent" aria-label="Username" aria-describedby="basic-addon1">
                                                                <span class="input-group-text bg-transparent" id="basic-addon1">
                                                                    <button class="btn">
                                                                        <img src="{{asset('loan/Content/images/eye.png')}}">
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <form>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label fw-semibold">Повторите новый пароль</label>
                                                            <div class="input-group mb-3">
                                                                <input type="text"  class="form-control bg-transparent" aria-label="Username" aria-describedby="basic-addon1">
                                                                <span class="input-group-text bg-transparent" id="basic-addon1">
                                                                    <button class="btn">
                                                                        <img src="{{asset('loan/Content/images/eye.png')}}">
                                                                    </button>
                                                                </span>
                                                                <div id="emailHelp" class="form-text hidden">Пароль не совпадает</div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex pb-4 pe-2">
                                            <button class="btn btn-secondary me-1 ms-auto bg-orange-300"><img
                                                    src="{{asset('loan/Content/images/save.png')}}" class="me-2">Сохранить
                                            </button>
                                        </div>
                                    </div>
                                    <div class="border border-2 rounded-4 ps-4 mt-4 bg-transparent">
                                        <h1 class="fw-bold fs-4 mb-4 pt-3">Получать уведомления в Telegram</h1>
                                        <div class="container mb-3">
                                            <div class="row">
                                                <div class="col-4 pt-2 ">
                                                    <p>Chat ID</p>
                                                    <p>Bot ID</p>
                                                </div>
                                                <div class="col-8">
                                                    <div class="border border-2 mb-2 rounded-2 py-1">-4201723515</div>
                                                    <div class="border border-2 rounded-2 py-1">6251119104:AGAEz7R_AfcDWwlBasf42tfwwgCAfGafeETE15q8</div>
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
@endsection
