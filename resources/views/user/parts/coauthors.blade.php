{{-- Операции со связанными соавторами --}}
<ul class="coauthors-list list-unstyled">
    @foreach ($coauthors as $author)
        @include('user.coauthor.show', ['author' => $author])
    @endforeach
    </ul>
    @include('user.coauthor.add')