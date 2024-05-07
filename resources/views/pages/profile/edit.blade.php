@extends('layouts.app')

@section('title', ucwords(auth()->user()->name))

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="card">
                    <form action="{{ route('profil-bisnis.update', $profilBisnis) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>Nama Desa</label>
                                        <input type="text"
                                            class="form-control @error('nama_client') is-invalid @enderror"
                                            name="nama_client" value="{{ old('nama_client', $profilBisnis->nama_client) }}"
                                            autocomplete="off">
                                        @error('nama_client')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control @error('desc_app') is-invalid @enderror" data-height="90" name="desc_app">{{ old('desc_app', $profilBisnis->desc_app) }}</textarea>
                                        @error('desc_app')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Alamat</label>
                                        <textarea class="form-control @error('alamat_client') is-invalid @enderror" data-height="90" name="alamat_client">{{ old('alamat_client', $profilBisnis->alamat_client) }}</textarea>
                                        @error('alamat_client')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group mb-2">
                                                <label>Email</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email', $profilBisnis->email) }}" autocomplete="off">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group mb-2">
                                                <label>Phone</label>
                                                <input type="text"
                                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                    value="{{ old('phone', $profilBisnis->phone) }}" autocomplete="off">
                                                @error('phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Kepala Desa</label>
                                        <input type="text" class="form-control @error('signature') is-invalid @enderror"
                                            name="signature" value="{{ old('signature', $profilBisnis->signature) }}"
                                            autocomplete="off">
                                        @error('signature')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group mb-2">
                                        <label>Rekening Bank</label>
                                        <textarea class="form-control @error('bank') is-invalid @enderror" data-height="60" name="bank">{{ old('bank', $profilBisnis->bank) }}</textarea>
                                        @error('bank')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div> --}}
                                    <div class="form-group mb-2">
                                        <label>Catatan kaki</label>
                                        <textarea class="form-control @error('footnot') is-invalid @enderror" data-height="90" name="footnot">{{ old('footnot', $profilBisnis->footnot) }}</textarea>
                                        @error('footnot')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>Facebook</label>
                                        <input type="text"
                                            class="form-control @error('facebook') is-invalid @enderror" name="facebook"
                                            value="{{ old('facebook', $profilBisnis->facebook) }}" autocomplete="off" placeholder="https://facebook.com/">
                                        @error('facebook')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Youtube</label>
                                        <input type="text"
                                            class="form-control @error('youtube') is-invalid @enderror" name="youtube"
                                            value="{{ old('youtube', $profilBisnis->youtube) }}" autocomplete="off" placeholder="https://youtube.com/">
                                        @error('youtube')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Twitter</label>
                                        <input type="text"
                                            class="form-control @error('twitter') is-invalid @enderror" name="twitter"
                                            value="{{ old('twitter', $profilBisnis->twitter) }}" autocomplete="off" placeholder="https://twitter.com/">
                                        @error('twitter')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Instagram</label>
                                        <input type="text"
                                            class="form-control @error('instagram') is-invalid @enderror" name="instagram"
                                            value="{{ old('instagram', $profilBisnis->instagram) }}" autocomplete="off" placeholder="https://instagram.com/">
                                        @error('instagram')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group mb-2">
                                        <label>Logo</label>
                                        <div id="image-preview"
                                            class="image-preview @if (session('error')) is-invalid @endif">
                                            <label id="image-label">Choose File</label>
                                            <input type="file" name="logo" id="image-upload" />
                                            <img src="{{ Storage::url($profilBisnis->logo) }}"
                                                class="img-fluid image-tampil" alt="">
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
                            <button type="submit" class="btn btn-lg btn-primary"><i class="fas fa-save"></i>
                                SIMPAN</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>
    <script src="{{ asset('js/page/features-post-create.js') }}"></script>
    <script src="{{ asset('library/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush
