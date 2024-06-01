@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <i class="fas fa-exclamation-circle"></i>
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif