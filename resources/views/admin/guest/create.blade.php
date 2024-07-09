@extends('test.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление гостя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item"><a href="#">Посты</a></li>
                            <li class="breadcrumb-item active">Добавление гостя</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('guest.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-2">
                                        <h3>Пользовательская информация</h3>
                                    </div>
                                    <!-- Guest form fields-->
                                    @include('test.guest.forms.guest-create')
                                </div>
                                <div class="col-3">
                                    <div class="mb-2">
                                        <h3>Банковская информация</h3>
                                    </div>
                                    <!-- Bank form  fields-->
                                    @include('test.guest.forms.bank-create')


                                </div>
                                <div class="col-3">
                                    <div class="mb-2">
                                        <h3>Рабочая <br/>Информация</h3>
                                    </div>
                                    <!-- Bank form  fields-->
                                    @include('test.guest.forms.job-create')


                                </div>
                                <div class="col-3">
                                    <div class="mb-2">
                                        <h3>Документская информация</h3>
                                    </div>
                                    <!-- Bank form  fields-->
                                    @include('test.guest.forms.document-create')
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Добавить">
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
