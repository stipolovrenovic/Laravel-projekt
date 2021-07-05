@extends ('layout')
@section ('content')
<a class="btn btn-secondary" href="{{ route('clients.index') }}">Povratak na listu</a>
<form action="{{ route('clients.update', $client) }}" method="POST">
 @csrf
 @method('PUT')

 <div class="form-group">
  <label for="inputName">Ime i prezime</label>
  <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" value="{{ $client->name }}" aria-describedby="inputNameFeedback">
  
  @error('name')
  <div id="inputNameFeedback" class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

</div>
<div class="form-group">
  <label for="inputAddress">Adresa</label>
  <input type="text" class="form-control @error('address') is-invalid @enderror" id="inputAddress" name="address" value="{{ $client->address }}" aria-describedby="inputAddressFeedback">
  
  @error('address')
  <div id="inputAddressFeedback" class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

</div>
<div class="form-group">
  <label for="inputPostcode">Poštanski broj</label>
  <input type="number" class="form-control @error('postcode') is-invalid @enderror" id="inputPostcode" name="postcode" value="{{ $client->postcode }}" aria-describedby="inputPostcodeFeedback">
  
  @error('postcode')
  <div id="inputPostcodeFeedback" class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

</div>
<div class="form-group">
  <label for="inputCity">Grad</label>
  <input type="text" class="form-control @error('city') is-invalid @enderror" id="inputCity" name="city" value="{{ $client->city }}" aria-describedby="inputCityFeedback">
  
  @error('city')
  <div id="inputCityFeedback" class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

</div>
<div class="form-group">
  <label for="inputCountry">Država</label>
  <input type="text" class="form-control @error('country') is-invalid @enderror" id="inputCountry" name="country" value="{{ $client->country }}" aria-describedby="inputCountryFeedback">
  
  @error('country'))
  <div id="inputCountryFeedback" class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

</div>
<div class="form-group">
  <label for="inputOIB">OIB</label>
  <input type="number" class="form-control @error('oib') is-invalid @enderror" id="inputOIB" name="oib" value="{{ $client->oib }}">

  @error('oib')
  <div id="inputOIBFeedback" class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

</div>
<button type="submit" class="btn btn-primary">Spremi</button>
</form>
@endsection