@php
function formatFullName($lastName, $firstName, $middleName = '') {
    $fullName = $lastName . ' ';
    $fullName .= mb_substr($firstName, 0, 1) . '.';
    
    if ($middleName) {
        $fullName .= ' ' . mb_substr($middleName, 0, 1) . '.';
    }
    
    return $fullName;
}
@endphp
<ul class="coauthors-list list-unstyled">

@foreach ($authors as $author)
@include('user.coauthor.show')
@endforeach



</ul>
@include('user.coauthor.add')
