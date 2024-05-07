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
                @include('pages.service_medicines.breadcrumb')
            </div>
            <div class="section-body">
                <div class="card">
                    <form action="{{ route('service-medicines.update', $service_medicines) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>{{ $title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Item Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $service_medicines->name }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control selectric @error('category') is-invalid @enderror"
                                    name="category">
                                    <option value="">Select category</option>
                                    <option value="medicine"
                                        {{ $service_medicines->category == 'medicine' ? 'selected' : '' }}>Medicine</option>
                                    <option value="treatment"
                                        {{ $service_medicines->category == 'treatment' ? 'selected' : '' }}>Treatment
                                    </option>
                                    <option value="consultation"
                                        {{ $service_medicines->category == 'consultation' ? 'selected' : '' }}>Consultation
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    name="price" value="{{ $service_medicines->price }}">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                    name="quantity" value="{{ $service_medicines->quantity }}">
                                @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
