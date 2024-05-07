@extends('layouts.app')

@section('title', 'All ' . $title . 's')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>All {{ $title }}</h1>

                @include('pages.doctor_schedules.breadcrumb')
            </div>
            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="section-header-button">
                                    <a href="{{ route('doctor-schedules.create') }}" class="btn btn-primary"><i
                                            class="fas fa-plus"></i>
                                        New {{ $title }}</a>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('doctor-schedules.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table" id="main-table">
                                        <tr>
                                            <th>Name</th>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($doctorSchedules as $schedule)
                                            <tr>
                                                <td>{{ $schedule->doctor->doctor_name }}</td>
                                                <td>{{ $schedule->day }}</td>
                                                <td>{{ $schedule->time }}</td>
                                                <td>{{ $schedule->note }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('doctor-schedules.edit', $schedule->id) }}'
                                                            class="btn btn-sm btn-info btn-icon"> <i
                                                                class="fas fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        <button class="ml-2 btn btn-sm btn-danger btn-icon confirm-delete"
                                                            id="delete" data-id="{{ $schedule->id }}" title="Hapus"
                                                            data-toggle="tooltip">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $doctorSchedules->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
    <script>
        $(document).on("click", "button#delete", function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            showDeletePopup(BASE_URL + '/doctor-schedules/' + id, '{{ csrf_token() }}', '', '',
                BASE_URL + '/doctor-schedules');
        });
    </script>
@endpush
