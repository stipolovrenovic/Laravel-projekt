@extends ('layout')
@section ('content')
<form action="{{ route('clients.update', $client) }}" method="POST">
 @csrf
 @method('PUT')

  <div class="form-group">
    <label for="inputName">Ime i prezime</label>
    <input type="text" class="form-control" id="inputName" name="name" value="{{ $client->name }}">
  </div>
  <div class="form-group">
    <label for="inputAddress">Adresa</label>
    <input type="text" class="form-control" id="inputAddress" name="address" value="{{ $client->address }}">
  </div>
  <div class="form-group">
    <label for="inputPostcode">Poštanski broj</label>
    <input type="text" class="form-control" id="inputPostcode" name="postcode" value="{{ $client->postcode }}">
  </div>
  <div class="form-group">
    <label for="inputCity">Grad</label>
    <input type="text" class="form-control" id="inputCity" name="city" value="{{ $client->city }}">
  </div>
  <div class="form-group">
    <label for="inputCountry">Država</label>
    <input type="text" class="form-control" id="inputCountry" name="country" value="{{ $client->country }}">
  </div>
  <div class="form-group">
    <label for="inputOIB">OIB</label>
    <input type="text" class="form-control" id="inputOIB" name="oib" value="{{ $client->oib }}">
  </div>
  <button type="submit" class="btn btn-primary">Spremi</button>
</form>
@endsection