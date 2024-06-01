@if ($errors->any())
<div class="alert alert-danger">
    <ul clas="list-unstyled">
        @foreach ($errors->all() as $error)
        
            <li><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif