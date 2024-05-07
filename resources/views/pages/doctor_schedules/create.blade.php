@extends('layouts.app')

@section('title', $title)

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                @include('pages.doctor_schedules.breadcrumb')
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="{{ route('doctor-schedules.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>{{ $title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Doctor</label>
                                        <select class="form-control select2 @error('doctor_id') is-invalid @enderror"
                                            name="doctor_id">
                                            <option value="">Select Doctor</option>
                                            @foreach ($doctors as $doctor)
                                                <option value="{{ $doctor->id }}">{{ $doctor->doctor_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jadwal Senin</label>
                                        <input type="text" class="form-control " name="senin">

                                    </div>
                                    <div class="form-group">
                                        <label>Jadwal Selasa</label>
                                        <input type="text" class="form-control " name="selasa">

                                    </div>
                                    <div class="form-group">
                                        <label>Jadwal Rabu</label>
                                        <input type="text" class="form-control " name="rabu">

                                    </div>
                                    <div class="form-group">
                                        <label>Jadwal Kamis</label>
                                        <input type="text" class="form-control " name="kamis">

                                    </div>
                                    <div class="form-group">
                                        <label>Jadwal Jumat</label>
                                        <input type="text" class="form-control " name="jumat">

                                    </div>
                                    <div class="form-group">
                                        <label>Jadwal Sabtu</label>
                                        <input type="text" class="form-control " name="sabtu">

                                    </div>
                                    <div class="form-group">
                                        <label>Jadwal Minggu</label>
                                        <input type="text" class="form-control " name="minggu">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-lg btn-primary"><i class="fas fa-save"></i> SIMPAN</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
