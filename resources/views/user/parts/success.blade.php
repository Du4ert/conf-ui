@if (session('success'))
    <div class="alert alert-success" role="alert">
        <i class="fas fa-circle-check fa-lg me-2"></i>
        {{ session('success') }}
    </div>
@endif