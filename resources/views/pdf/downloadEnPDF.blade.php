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

    <h1 class="title">{{ $thesis->thesis_title_en }}</h1>

    <h4 class="authors">
        @if (count($affiliations) <= 1)
            {{ $user->fullNameEn() }}
            @foreach ($authors as $author)
                {{ ', ' . $author->fullNameEn() }}
            @endforeach
        @else

            {{ $user->fullNameEn() }} <sup>1</sup>
            @foreach ($authors as $author)
                @php
                    $organization = $author->organization_title_en ? $author->organization_title_en : $affiliations[0];
                    $index = array_search($organization, $affiliations) + 1;
                @endphp
                {{ ', ' . $author->fullNameEn() }}  <sup>{{ $index }}</sup>
            @endforeach
        @endif
    </h4>

    <h4 class="affiliations">
        @foreach ($affiliations as $key => $organization)
            <sup>{{ $key + 1 }}</sup> {{ $organization }}<br/>
        @endforeach
    </h4>

    <h4 class="email">{{ $user->email }}</h4>

    <div class="content">
        {!! $thesis->text_en !!}
    </div>

@endsection