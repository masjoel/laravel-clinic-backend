@extends('layouts.app')

@section('title', $title)

@push('style')
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('library/codemirror/theme/duotone-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                @include('pages.patients.breadcrumb')
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>{{ $title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-2">
                                        <label>Name</label>
                                        <input type="text"
                                            class="form-control @error('doctor_name') is-invalid @enderror"
                                            name="doctor_name" value="{{ old('doctor_name') }}">
                                        @error('doctor_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                            name="nik" value="{{ old('nik') }}">
                                        @error('nik')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Specialist</label>
                                        <input type="text"
                                            class="form-control @error('doctor_specialist') is-invalid @enderror"
                                            name="doctor_specialist" value="{{ old('doctor_specialist') }}">
                                        @error('doctor_specialist')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Phone</label>
                                                <input type="text"
                                                    class="form-control @error('doctor_phone') is-invalid @enderror"
                                                    name="doctor_phone" value="{{ old('doctor_phone') }}"
                                                    autocomplete="off">
                                                @error('doctor_phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Email</label>
                                                <input type="email"
                                                    class="form-control @error('doctor_email') is-invalid @enderror"
                                                    name="doctor_email" value="{{ old('doctor_email') }}"
                                                    autocomplete="off">
                                                @error('doctor_email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SIP</label>
                                                <input type="text"class="form-control @error('sip') is-invalid @enderror"
                                                    name="sip" value="{{ old('sip') }}">
                                                @error('sip')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>ID IHS</label>
                                                <input type="text"
                                                    class="form-control @error('id_ihs') is-invalid @enderror"
                                                    name="id_ihs" value="{{ old('id_ihs') }}">
                                                @error('id_ihs')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea data-height="70" class="form-control @error('address') is-invalid @enderror" name="address">{{ old('address') }}</textarea>
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>




                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-form-label mr-2">Photo</label>
                                        <div id="image-preview"
                                            class="image-preview @if (session('error')) is-invalid @endif">
                                            <label id="image-label">Choose File</label>
                                            <input type="file" name="photo" id="image-upload" />
                                            <img src="" class="img-fluid image-tampil" alt="">
                                        </div>
                                        @if (session('error'))
                                            <div class="invalid-feedback">
                                                {{ session('error') }}
                                            </div>
                                        @endif
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
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('library/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>
    <script src="{{ asset('js/page/features-post-create.js') }}"></script>
@endpush
