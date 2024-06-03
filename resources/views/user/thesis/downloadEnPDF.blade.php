@extends('layouts.pdf')
@php
$affiliations = [];
$affiliations[] = $user->organization_title_en;

foreach ($authors as $author) {
    $organization = $author->organization_title_en ? $author->organization_title_en : $affiliations[0];
    if (!in_array($organization, $affiliations)) {
       $affiliations[] = $organization;
    }
}
@endphp

@section('content')

<h1 class="title">{{ $thesis->thesis_title_en}}</h1>

<h3 class="authors">
@if (count($affiliations) <= 1)
{{ $user->fullNameEn() }}
@foreach ($authors as $author)
 {{ ', ' . $author->fullNameEn() }}
@endforeach
</h3>

<h3>{{ $affiliations[0] }}</h3>
@else

{{ $user->fullNameEn() }} <sup>1</sup>
@foreach ($authors as $author)
@php
 $organization = $author->organization_title_en ? $author->organization_title_en : $affiliations[0];
 $index = in_array($organization, $affiliations) + 1;
@endphp
{{ ', ' . $author->fullNameEn() }}  <sup>{{ $index }}</sup>
@endforeach
</h3>

@foreach ($affiliations as $key => $organization)
<h3 class="affiliations"><sup>{{ $key + 1 }}</sup> {{ $organization }}</h3>
@endforeach

<h4 class="email">{{ $user->email }}</h4>

@endif
<div class="content">
{!! $thesis->text_en !!}
</div>
@endsection