<ul class="coauthors-list list-unstyled">

@foreach ($authors as $author)
@include('user.coauthor.show')
@endforeach



</ul>
@include('user.coauthor.add')
