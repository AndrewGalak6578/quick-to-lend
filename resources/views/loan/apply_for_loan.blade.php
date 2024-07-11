@extends('loan.layouts.main')
@section('main')

    <main role="main" class="pb-3">

        <link href="{{ asset('loan/css/testform@v=PZXXmiJ89u0ZUJgCcjS3aK_zJQK8Y2OHO1mmciaPKMI1.css') }}" rel=stylesheet>


        <div id="maincontent" class="page-main apply-page">
            <form id="pingYoForm" name="pingYoForm" class="test" novalidate action="{{ route('guest.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="hide_element" id="error-list">
                    <p>Please review following errors</p>
                    <ul id="inject-errors"></ul>
                </div>
                @yield('content')












                <div id="opaque" style="display: none;"></div>

            </form>
        </div>


    </main>

@endsection
