@extends('layouts.contact')

@section('title')
    Edite
@endsection

@section('link-navbar')
<a class="nav-item nav-link" href="{{ route("contacts.index") }}">Home</a>
<a class="nav-item nav-link" href="{{ route("contacts.create") }}">Creation <span class="sr-only">(current)</span></a>
<a class="nav-item nav-link" href="{{ route("contacts.show", ["contact"=> $contact]) }}">Show this Contact</a>
<a class="nav-item nav-link active" href="{{ route("contacts.edit", ["contact"=> $contact]) }}">Edit this Contact</a>
@endsection

@section('content')
<form method="POST" action="{{ route("contacts.update", ["contact"=> $contact])}}" > 
    @method("PUT")
    @csrf
    <div class="form-group">
      <label for="firstName">firstName</label>
    <input type="text" class="form-control" name="firstName" id="firstName" value="{{ $contact["firstname"]}}"  placeholder="Enter firstName" required>
    </div>
    <div class="form-group">
      <label for="lastName">lastName</label>
      <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $contact["lastname"]}}"  placeholder="Enter lastName" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="email" name="email" value="{{ $contact["email"]}}" aria-describedby="emailHelp" placeholder="Enter email" required>
    </div>
    <div class="form-group">
      <label for="tel">phoneNumber</label>
      <input type="tel" class="form-control" id="tel" name="tel" value="{{ $contact["tel"]}}" placeholder="Enter a phoneNumber" required>
    </div>
    <div class="form-group">
        <label for="comment">comment</label>
        <input type="comment" class="form-control" id="comment" name="comment" value="{{ $contact["comment"]}}" placeholder="Enter a comment" required>
      </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
  </form>    
@endsection