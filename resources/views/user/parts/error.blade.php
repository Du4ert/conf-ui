@if ($errors->any())
<div class="alert alert-danger">
    <ul clas="list-unstyled">
        @foreach ($errors->all() as $error)
        
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif