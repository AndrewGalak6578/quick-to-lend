@extends('admin.dashboard.layouts.main')
@section('content')

    <div class="main">
        <main class="content px-3 py-4">
            <div class="container-fluid">
                <div class="mb-3">
                    <h1 class="fw-bold fs-1 mb-3">Статистика</h1>
                    <div>
                        <div>
                            <div class="row ">
                                <div class="col-4">
                                    <div class="border border-2 rounded-4 ps-4 bg-transparent">
                                        <h1 class="fw-bold fs-4 mb-4 pt-3">Количество заявок</h1>
                                        <div class="wrapper mb-4 fw-semibold">
                                            <div class="d-flex mt-4 flex-row">
                                                <div class="bar me-3">
                                                    <div class="bar-value">{{ $todayApplications }}</div>
                                                </div>
                                                <div class="bar">
                                                    <div class="bar-value">{{ $todayApplications }}</div>
                                                </div>
                                            </div>
                                            <div class="flex-column align-items-center ms-4 pt-5 w-50">
                                                <div class="d-flex mb-2 align-items-center">
                                                    <span class="dot"></span>
                                                    <span>Сегодня {{ $todayApplications }} шт</span>
                                                </div>
                                                <div class="d-flex mb-2 align-items-center">
                                                    <span class="dot"></span>
                                                    <span>Вчера {{ $yesterdayApplications }} шт</span>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="dot"></span>
                                                    <span>Всего {{ $totalApplications }} шт</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border border-3 rounded-4 ps-4 mt-4 bg-transparent">
                                        <h1 class="fw-bold fs-4 mb-4 pt-3">Документы в заявках</h1>
                                        <div class="wrapper mb-4 fw-semibold">
                                            <div class="d-flex mt-4 flex-row justify-content-between">
                                                <div class="bar me-3">
                                                    <div class="bar-value">{{ $documents['DL'] }}</div>
                                                    <div class="text-center mt-2">DL</div>
                                                </div>
                                                <div class="bar me-3">
                                                    <div class="bar-value">{{ $documents['ID'] }}</div>
                                                    <div class="text-center mt-2">ID</div>
                                                </div>
                                                <div class="bar me-3">
                                                    <div class="bar-value">{{ $documents['Selfie'] }}</div>
                                                    <div class="text-center mt-2">Selfie</div>
                                                </div>
                                                <div class="bar">
                                                    <div class="bar-value">{{ $documents['CC'] }}</div>
                                                    <div class="text-center mt-2">CC</div>
                                                </div>
                                            </div>
                                            <div class="flex-column align-items-center ms-4 pt-5 w-50">
                                                <div class="d-flex mb-2 align-items-center">
                                                    <span class="dot"></span>
                                                    <span>DL {{ $documents['DL'] }} шт</span>
                                                </div>
                                                <div class="d-flex mb-2 align-items-center">
                                                    <span class="dot"></span>
                                                    <span>ID {{ $documents['ID'] }} шт</span>
                                                </div>
                                                <div class="d-flex mb-2 align-items-center">
                                                    <span class="dot"></span>
                                                    <span>Selfie {{ $documents['Selfie'] }} шт</span>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="dot"></span>
                                                    <span>CC {{ $documents['CC'] }} шт</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="border border-3 rounded-4 ps-4 bg-transparent">
                                        <h1 class="fw-bold fs-4 mb-4 pt-3">Количество заявок по штатам</h1>
                                        <form class="d-flex w-25">
                                            <input class="form-control me-2" type="search" placeholder="Texas" aria-label="Search">
                                        </form>
                                        <div class="container">
                                            <div class="row mt-4">
                                                @foreach ($states as $abbr => $state)
                                                    <div class="col-2 fw-semibold mb-2">
                                                        <div class="d-flex align-items-center">
                                                            <span class="dot"></span>
                                                            <span>{{ $abbr }}</span>
                                                            <span class="ms-2">{{ $stateApplications[$abbr] ?? 0 }} шт</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div id="us-map" style="height: 600px; width: 100%;"></div>
                                        </div>
                                    </div>
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

    <link rel="stylesheet" href="{{ asset('css/jsvectormap.css') }}">
    <script src="{{ asset('js/jsvectormap.js') }}"></script>
    <script src="{{ asset('maps/us-merc-en.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const states = @json($stateApplications);

            const map = new jsVectorMap({
                selector: "#us-map",
                map: "us_merc_en",
                onRegionTooltipShow: function(e, el, code){
                    const upperCode = code.toUpperCase();
                    const count = states[upperCode] || 0;
                    el.html(upperCode + ' (Applications: ' + count + ')');
                },
                regionStyle: {
                    initial: {
                        fill: '#128da7'
                    },
                    hover: {
                        fill: "#A0D1DC"
                    }
                }
            });
        });
    </script>
@endsection
