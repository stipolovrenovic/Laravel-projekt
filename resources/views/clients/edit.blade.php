@extends ('layout')
@section ('content')
<form>
  <div class="form-group">
    <label for="inputName">Ime i prezime</label>
    <input type="text" class="form-control" id="inputName" placeholder = "Unesit ime i prezime klijenta...">
  </div>
  <div class="form-group">
    <label for="inputAddress">Adresa</label>
    <input type="text" class="form-control" id="inputAddress" placeholder = "Unesit adresu prebivališta klijenta...">
  </div>
  <div class="form-group">
    <label for="inputPostcode">Poštanski broj</label>
    <input type="text" class="form-control" id="inputPostcode" placeholder = "Unesit poštanski broj klijenta...">
  </div>
  <div class="form-group">
    <label for="inputCity">Grad</label>
    <input type="text" class="form-control" id="inputCity" placeholder = "Unesit grad...">
  </div>
  <div class="form-group">
    <label for="inputCountry">Država</label>
    <input type="text" class="form-control" id="inputCountry" placeholder = "Unesit državu...">
  </div>
  <div class="form-group">
    <label for="inputOIB">OIB</label>
    <input type="text" class="form-control" id="inputOIB" placeholder = "Unesit OIB klijenta...">
  </div>
  <button type="submit" class="btn btn-primary">Unesi</button>
</form>
@endsection