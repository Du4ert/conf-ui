<ul class="coauthors-list">
    @isset($authors)
          @foreach ($authors as $author)
         @include('user.coauthor.show')
         @endforeach
    @endisset
    
@include('user.coauthor.add')

</ul>