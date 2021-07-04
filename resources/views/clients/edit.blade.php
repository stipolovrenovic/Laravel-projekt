@extends ('layout')
@section ('content')
<a class="btn btn-secondary" href="{{ route('clients.index') }}">Povratak na listu</a>
<form action="{{ route('clients.update', $client) }}" method="POST">
 @csrf
 @method('PUT')

  <div class="form-group">
    <label for="inputName">Ime i prezime</label>
    <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" id="inputName" name="name" value="{{ $client->name }}" aria-describedby="inputNameFeedback">
     
    @if($errors->has('name'))
    <div id="inputNameFeedback" class="invalid-feedback">
      {{ $errors->first('name') }}
    </div>
    @endif

  </div>
  <div class="form-group">
    <label for="inputAddress">Adresa</label>
    <input type="text" class="form-control @if($errors->has('address')) is-invalid @endif" id="inputAddress" name="address" value="{{ $client->address }}" aria-describedby="inputAddressFeedback">
     
    @if($errors->has('address'))
    <div id="inputAddressFeedback" class="invalid-feedback">
      {{ $errors->first('address') }}
    </div>
    @endif

  </div>
  <div class="form-group">
    <label for="inputPostcode">Poštanski broj</label>
    <input type="number" class="form-control @if($errors->has('postcode')) is-invalid @endif" id="inputPostcode" name="postcode" value="{{ $client->postcode }}" aria-describedby="inputPostcodeFeedback">
    
    @if($errors->has('postcode'))
    <div id="inputPostcodeFeedback" class="invalid-feedback">
      {{ $errors->first('postcode') }}
    </div>
    @endif

  </div>
  <div class="form-group">
    <label for="inputCity">Grad</label>
    <input type="text" class="form-control @if($errors->has('city')) is-invalid @endif" id="inputCity" name="city" value="{{ $client->city }}" aria-describedby="inputCityFeedback">
    
    @if($errors->has('city'))
    <div id="inputCityFeedback" class="invalid-feedback">
      {{ $errors->first('city') }}
    </div>
    @endif

  </div>
  <div class="form-group">
    <label for="inputCountry">Država</label>
    <input type="text" class="form-control @if($errors->has('country')) is-invalid @endif" id="inputCountry" name="country" value="{{ $client->country }}" aria-describedby="inputCountryFeedback">
    
    @if($errors->has('country'))
    <div id="inputCountryFeedback" class="invalid-feedback">
      {{ $errors->first('country') }}
    </div>
    @endif

  </div>
  <div class="form-group">
    <label for="inputOIB">OIB</label>
    <input type="number" class="form-control @if($errors->has('oib')) is-invalid @endif" id="inputOIB" name="oib" value="{{ $client->oib }}">

    @if($errors->has('oib'))
    <div id="inputOIBFeedback" class="invalid-feedback">
      {{ $errors->first('oib') }}
    </div>
    @endif

  </div>
  <button type="submit" class="btn btn-primary">Spremi</button>
</form>
@endsection