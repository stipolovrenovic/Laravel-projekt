@extends ('layout')
@section ('content')
<form action="{{ route('clients.store') }}" method="POST">
 @csrf
  <div class="form-group">
    <label for="inputName">Ime i prezime</label>
    <input type="text" class="form-control" id="inputName" name="name" placeholder = "Unesit ime i prezime klijenta...">
  </div>
  <div class="form-group">
    <label for="inputAddress">Adresa</label>
    <input type="text" class="form-control" id="inputAddress" name="address" placeholder = "Unesit adresu prebivališta klijenta...">
  </div>
  <div class="form-group">
    <label for="inputPostcode">Poštanski broj</label>
    <input type="text" class="form-control" id="inputPostcode" name="postcode" placeholder = "Unesit poštanski broj klijenta...">
  </div>
  <div class="form-group">
    <label for="inputCity">Grad</label>
    <input type="text" class="form-control" id="inputCity" name="city" placeholder = "Unesit grad...">
  </div>
  <div class="form-group">
    <label for="inputCountry">Država</label>
    <input type="text" class="form-control" id="inputCountry" name="country" placeholder = "Unesit državu...">
  </div>
  <div class="form-group">
    <label for="inputOIB">OIB</label>
    <input type="text" class="form-control" id="inputOIB" name="oib" placeholder = "Unesit OIB klijenta...">
  </div>
  <button type="submit" class="btn btn-primary">Unesi</button>
</form>
@endsection