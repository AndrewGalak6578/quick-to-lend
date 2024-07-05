@extends('test.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пользователи</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('guest.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Пользователи</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Filter and Search -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <form action="{{ route('guest.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Поиск по имени" value="{{ request()->get('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('guest.create') }}" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                </div>

                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>{!! \Kyslik\ColumnSortable\SortableLink::render(['id', 'ID']) !!}</th>
                                        <th>{!! \Kyslik\ColumnSortable\SortableLink::render(['name', 'Имя']) !!}</th>
                                        <th>{!! \Kyslik\ColumnSortable\SortableLink::render(['state', 'Штат']) !!}</th>
                                        <th>{!! \Kyslik\ColumnSortable\SortableLink::render(['date_of_birth', 'DOB']) !!}</th>
                                        <th>{!! \Kyslik\ColumnSortable\SortableLink::render(['zip_code', 'ZIP']) !!}</th>
                                        <th>CC</th>
                                        <th>Document</th>
                                        <th>Selfie</th>
                                        <th class="text-center">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($guests as $guest)
                                        <tr>
                                            <td>{{ $guest->id }}</td>
                                            <td>{{ $guest->name }}</td>
                                            <td>{{ $guest->state }}</td>
                                            <td>{{ $guest->date_of_birth }}</td>
                                            <td>{{ $guest->zip_code }}</td>
                                            <td>{{ $guest->bank_id !==0 && $guest->bank_id !== null  ? '+' : '-' }}</td>
                                            <td>{{ $guest->documents ? '+' : '-' }}</td>
                                            <td>{{ $guest->documents && $guest->documents->selfie ? '+' : '-' }}</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-info btn-sm view-guest-details" data-id="{{ $guest->id }}"><i class="far fa-eye"></i></a>
                                                <a href="{{ route('guest.update', $guest->id) }}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="{{ route('guest.delete', $guest->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $guests->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="viewGuestModal" tabindex="-1" aria-labelledby="viewGuestModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewGuestModalLabel">Информация о пользователе</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Здесь будет динамически загруженное содержимое -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.view-guest-details').on('click', function() {
                var guestId = $(this).data('id');
                $.ajax({
                    url: '/guests/' + guestId,
                    type: 'GET',
                    success: function(response) {
                        $('#viewGuestModal .modal-body').html(response.html);
                        $('#viewGuestModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        alert('Failed to fetch guest details. Error: ' + error);
                    }
                });
            });
        });
    </script>
@endpush
