@extends('test.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование посетителя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
{{--                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>--}}
{{--                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Посты</a></li>--}}
{{--                            <li class="breadcrumb-item"><a href="{{ route('admin.post.show', $post->id) }}">{{ $post->name }}</a></li>--}}
                            <li class="breadcrumb-item active">Редактирование посетителя</li>
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
                    <form action="{{ route('guest.update', $guest->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-3">
                                <div class="mb-2">
                                    <h3>Пользовательская информация</h3>
                                </div>
                                <!-- Guest form fields-->
                                @include('test.guest.forms.guest-edit')
                            </div>
                            <div class="col-3">
                                <div class="mb-2">
                                    <h3>Банковская информация</h3>
                                </div>
                                <!-- Bank form  fields-->
                                @include('test.guest.forms.bank-edit')

                            </div>
                            <div class="col-3">
                                <div class="mb-2">
                                    <h3>Рабочая <br/>информация</h3>
                                </div>
                                <!-- Bank form  fields-->
                                @include('test.guest.forms.job-edit')

                            </div>
                            <div class="col-3">
                                <div class="mb-2">
                                    <h3>Документская информация</h3>
                                </div>
                                <!-- Bank form  fields-->
                                @include('test.guest.forms.document-edit')

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Добавить">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
