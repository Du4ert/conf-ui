{{-- 
$organization_title;
$thesis_title;
$text;
$fullName;
--}}
@extends('layouts.pdf')
@php
    $all_affiliations = [];
    $all_affiliations = array_map('trim', explode(';', $user->$organization_title));
    $user_affiliations = $all_affiliations;

    foreach ($authors as $author) {
        if (!$author->$organization_title) {
            continue;
        }

            $author_affiliations = array_map('trim', explode(';', $author->$organization_title));

            foreach ($author_affiliations as $affiliation) {

                if (!in_array($affiliation, $all_affiliations)) {
                $all_affiliations[] = $affiliation;
            }
        }
    }
@endphp

@section('content')

    <h1 class="title">{{ $thesis->$thesis_title }}</h1>

    
    @if (count($all_affiliations) <= 1)
        <h4 class="authors">
            {{ $user->$fullName() }}
            @foreach ($authors as $author)
                {{ ', ' . $author->$fullName() }}
            @endforeach
        </h4>
        <h4 class="affiliations">{{ $all_affiliations[0] }}</h4>
    @else
        <h4 class="authors">
            {{ $user->$fullName() }}
            @foreach ($user_affiliations as $key => $affiliation)
                <sup>@if($key != 0),@endif {{ $key + 1 }} </sup>
            @endforeach
            
            @foreach ($authors as $author)
                @php
                $author_affiliations = [];
                $index = '';
                if (!$author->$organization_title) {
                    $author_affiliations = $user_affiliations;
                }
                else {
                    $author_affiliations = array_map('trim', explode(';', $author->$organization_title));
                }
                foreach ($author_affiliations as $key => $affiliation) {
                    if (!!$index) {
                        $index .= ', ';
                    }
                    $index .= array_search($affiliation, $all_affiliations) + 1;
                }
                @endphp
                {{ ', ' . $author->$fullName() }} <sup>{{ $index }}</sup>
            @endforeach
        </h4>

        <h4 class="affiliations">
            @foreach ($all_affiliations as $key => $affiliation)
                <sup>{{ $key + 1 }}</sup> {{ $affiliation }}<br />
            @endforeach
        </h4>
        @endif
        <h4 class="email">{{ $user->email }}</h4>
    
    <div class="content">
        {!! $thesis->$text !!}
    </div>
@endsection
