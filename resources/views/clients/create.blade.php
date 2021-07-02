@extends ('layout')
@section ('content')
<a class="btn btn-secondary" href="{{ route('clients.index') }}">Povratak na listu</a>
<form action="{{ route('clients.store') }}" method="POST">
 @csrf
  <div class="form-group">
    <label for="inputName">Ime i prezime</label>
    <input type="text" class="form-control" id="inputName" name="name" placeholder = "Unesite ime i prezime klijenta..." required="required">
  </div>
  <div class="form-group">
    <label for="inputAddress">Adresa</label>
    <input type="text" class="form-control" id="inputAddress" name="address" placeholder = "Unesite adresu prebivališta klijenta..." required="required">
  </div>
  <div class="form-group">
    <label for="inputPostcode">Poštanski broj</label>
    <input type="number" class="form-control" id="inputPostcode" name="postcode" placeholder = "Unesite poštanski broj klijenta..." required="required" maxlength="5">
  </div>
  <div class="form-group">
    <label for="inputCity">Grad</label>
    <input type="text" class="form-control" id="inputCity" name="city" placeholder = "Unesite grad..." required="required">
  </div>
  <div class="form-group">
    <label for="inputCountry">Država</label>
    <input type="text" class="form-control" id="inputCountry" name="country" placeholder = "Unesite državu..." required="required">
  </div>
  <div class="form-group">
    <label for="inputOIB">OIB</label>
    <input type="number" class="form-control" id="inputOIB" name="oib" placeholder = "Unesite OIB klijenta..." maxlength="11">
  </div>
  <button type="submit" class="btn btn-primary">Spremi</button>
</form>
@endsection