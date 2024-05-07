<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="{{ route('patients.index') }}">Patients</a></div>
    @if (Request::is('*create'))
        <div class="breadcrumb-item">New Patient</div>
    @elseif (Request::is('*edit'))
        <div class="breadcrumb-item">Edit Patient</div>
    @else
        <div class="breadcrumb-item d-none"></div>
    @endif
</div>
