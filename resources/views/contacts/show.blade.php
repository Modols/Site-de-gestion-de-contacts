@extends('layouts.contact')

@section('title')
    Show
@endsection

@section('link-navbar')
<a class="nav-item nav-link" href="{{ route("contacts.index") }}">Home<span class="sr-only">(current)</span></a>
<a class="nav-item nav-link" href="{{ route("contacts.create") }}">Creation</a>
<a class="nav-item nav-link active" href="{{ route("contacts.show", ["contact" => $contact]) }}">Show this Contact</a>
<a class="nav-item nav-link" href="{{ route("contacts.edit", ["contact" => $contact]) }}">Edit this Contact</a>
@endsection

@section('content')
<p>{{ $contact["firstname"] }}</p>
<p>{{ $contact["lastname"] }}</p>
<p>{{ $contact["email"] }}</p>
<p>{{ $contact["tel"] }}</p>
<p>{{ $contact["comment"] }}</p>
@endsection