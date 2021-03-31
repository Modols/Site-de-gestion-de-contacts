@extends('layouts.contact')

@section('title')
    Index
@endsection

@section('link-navbar')
<a class="nav-item nav-link active" href="{{ route("contacts.index") }}">Home<span class="sr-only">(current)</span></a>
<a class="nav-item nav-link" href="{{ route("contacts.create") }}">Creation</a>
@endsection

@section('content')
@if($search)
<h2>Résultat pour la recherche {{ $search }} : </h2>
    
@endif
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone number</th>
            <th scope="col">Comment</th>
            <th scope="col">Edit</th>
            <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody>
        @for ($i = 0; $i < sizeof($contacts); $i++)
            <tr>
                <th scope="row">{{ $i }}</th>
                <td>{{ $contacts[$i]["firstname"] }}</td>
                <td>{{ $contacts[$i]["lastname"] }}</td>
                <td>{{ $contacts[$i]["email"] }}</td>
                <td>{{ $contacts[$i]["tel"] }}</td>
                <td>{{ $contacts[$i]["comment"] }}</td>
            <td><a href="{{ route("contacts.show", ["contact" => $contacts[$i]]) }}" id="{{ $contacts[$i]["id"] }}"><i class="fas fa-edit"></i></a></td>
            <td>
                <form method="POST" action="{{route('contacts.destroy', ['contact' => $contacts[$i]] )}}">
                    @method("DELETE")
                    @csrf
                    <button type="submit">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endfor
    </tbody>
</table>
@endsection