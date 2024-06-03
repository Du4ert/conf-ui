@extends('layouts.pdf')
@php
$affiliations = [];
$affiliations[] = $user->organization_title;

foreach ($authors as $author) {
    $organization = $author->organization_title ? $author->organization_title : $affiliations[0];
    if (!in_array($organization, $affiliations)) {
       $affiliations[] = $organization;
    }
}
@endphp

@section('content')

<h1 class="title">{{ $thesis->thesis_title}}</h1>

<h4 class="authors">
@if (count($affiliations) <= 1)
{{ $user->fullName() }}
@foreach ($authors as $author)
 {{ ', ' . $author->fullName() }}
@endforeach
</h4>

<h4>{{ $affiliations[0] }}</h4>
@else

{{ $user->fullName() }} <sup>1</sup>
@foreach ($authors as $author)
@php
 $organization = $author->organization_title ? $author->organization_title : $affiliations[0];
 $index = array_search($organization, $affiliations) + 1;
@endphp
{{ ', ' . $author->fullName() }}  <sup>{{ $index }}</sup>
@endforeach
</h4>

<h4 class="affiliations">
@foreach ($affiliations as $key => $organization)
<sup>{{ $key + 1 }}</sup> {{ $organization }}<br/>
@endforeach
</h4>

<h4 class="email">{{ $user->email }}</h4>

@endif
<div class="content">
{!! $thesis->text !!}
</div>
@endsection