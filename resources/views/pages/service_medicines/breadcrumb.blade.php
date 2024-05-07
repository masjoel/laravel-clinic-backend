<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="{{ route('service-medicines.index') }}">Service and Medicines</a></div>
    @if (Request::is('*create'))
        <div class="breadcrumb-item">New Service and Medicines</div>
    @elseif (Request::is('*edit'))
        <div class="breadcrumb-item">Edit Service and Medicines</div>
    @else
        <div class="breadcrumb-item d-none"></div>
    @endif
</div>
