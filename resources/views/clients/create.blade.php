@extends ('layout')
@section ('content')
<a class="btn btn-secondary" href="{{ route('clients.index') }}">Povratak na listu</a>
<form action="{{ route('clients.store') }}" method="POST">
 @csrf

 <div class="form-group">
  <label for="inputName">Ime i prezime</label>
  <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" value="{{ old('name') }}" aria-describedby="inputNameFeedback">
  
  @error('name')
  <div id="inputNameFeedback" class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

</div>
<div class="form-group">
  <label for="inputAddress">Adresa</label>
  <input type="text" class="form-control @error('address') is-invalid @enderror" id="inputAddress" name="address" value="{{ old('address') }}" aria-describedby="inputAddressFeedback">
  
  @error('address')
  <div id="inputAddressFeedback" class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

</div>
<div class="form-group">
  <label for="inputPostcode">Poštanski broj</label>
  <input type="number" class="form-control @error('postcode') is-invalid @enderror" id="inputPostcode" name="postcode" value="{{ old('postcode') }}"  aria-describedby="inputPostcodeFeedback">
  
  @error('postcode')
  <div id="inputPostcodeFeedback" class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

</div>
<div class="form-group">
  <label for="inputCity">Grad</label>
  <input type="text" class="form-control @error('city') is-invalid @enderror" id="inputCity" name="city" value="{{ old('city') }}" aria-describedby="inputCityFeedback">

  @error('city')
  <div id="inputCityFeedback" class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

</div>
<div class="form-group">
  <label for="inputCountry">Država</label>
  <input type="text" class="form-control @error('country') is-invalid @enderror" id="inputCountry" name="country" value="{{ old('country') }}" aria-describedby="inputCountryFeedback">

  @error('country')
  <div id="inputCountryFeedback" class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

</div>
<div class="form-group">
  <label for="inputOIB">OIB</label>
  <input type="number" class="form-control @error('oib') is-invalid @enderror" id="inputOIB" name="oib" value="{{ old('oib') }}"  aria-describedby="inputOIBFeedback">

  @error('oib')
  <div id="inputOIBFeedback" class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

</div>
<button type="submit" class="btn btn-primary">Spremi</button>
</form>
@endsection