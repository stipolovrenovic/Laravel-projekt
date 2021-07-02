@extends ('layout')
@section ('content')
<a class="btn btn-secondary" href="{{ route('clients.index') }}">Povratak na listu</a>
<form action="{{ route('clients.store') }}" method="POST">
 @csrf

   <div class="form-group">
    <label for="inputName">Ime i prezime</label>
    <input type="text" class="form-control" id="inputName" name="name" required="required" aria-describedby="inputNameFeedback">
    <div id="inputNameFeedback" class="invalid-feedback">
      Niste unijeli ime.
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Adresa</label>
    <input type="text" class="form-control" id="inputAddress" name="address" required="required" aria-describedby="inputAddressFeedback">
    <div id="inputAddressFeedback" class="invalid-feedback">
      Niste unijeli adresu.
    </div>
  </div>
  <div class="form-group">
    <label for="inputPostcode">Poštanski broj</label>
    <input type="number" class="form-control" id="inputPostcode" name="postcode" required="required" aria-describedby="inputPostcodeFeedback">
    <div id="inputPostcodeFeedback" class="invalid-feedback">
      Niste unijeli poštanski broj.
    </div>
  </div>
  <div class="form-group">
    <label for="inputCity">Grad</label>
    <input type="text" class="form-control" id="inputCity" name="city" aria-describedby="inputCityFeedback">
    <div id="inputCityFeedback" class="invalid-feedback">
      Niste unijeli grad.
    </div>
  </div>
  <div class="form-group">
    <label for="inputCountry">Država</label>
    <input type="text" class="form-control" id="inputCountry" name="country" required="required" aria-describedby="inputCountryFeedback">
    <div id="inputCountryFeedback" class="invalid-feedback">
      Niste unijeli državu.
    </div>
  </div>
  <div class="form-group">
    <label for="inputOIB">OIB</label>
    <input type="number" class="form-control" id="inputOIB" name="oib">
  </div>
  <button type="submit" class="btn btn-primary">Spremi</button>
</form>
@endsection