@extends ('layout')
@section ('content')

<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Novi klijent</h1>
  </div>

  <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
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
  <div class="form-group">
    <label for="selectType">Vrsta osobe</label>
    <select class="custom-select @error('type') is-invalid @enderror" id="selectType" name="type" aria-describedby="selectTypeFeedback">
      <option disabled value=""@if(!old('type')) selected @endif>Odaberite vrstu...</option>
      <option value="1" @if(old('type') == 1) selected @endif>Fizička osoba</option>
      <option value="2" @if(old('type') == 2) selected @endif>Pravna osoba</option>
    </select>

    @error('type')
    <div id="selectTypeFeedback" class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror

  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="radio" name="international" id="radioHome" value="1" @if(old('international') == 1) checked @endif>
      <label class="form-check-label" for="radioHome">
        Domaći klijent
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="international" id="radioAway" value="2" @if(old('international') == 2) checked @endif>
      <label class="form-check-label" for="radioAway">
        Strani klijent
      </label>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail">E-Mail adresa</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputOIB" name="email" value="{{ old('email') }}"  aria-describedby="inputEmailFeedback">

    @error('email')
    <div id="inputEmailFeedback" class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror

  </div>
  <div class="form-group">
    <label for="selectServices">Usluge</label>
    <select class="custom-select @error('services') is-invalid @enderror" id="selectServices" name="services[]" aria-describedby="selectServicesFeedback" multiple>
      @foreach($services as $service)
      <option value="{{ $service->id }}" @if(old('services') && in_array($service, old('services'))) selected @endif>{{ $service->name }}</option>
      @endforeach
    </select>

    @error('services')
    <div id="selectServices" class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror

  </div>
  <div class="form-group">
    <div class="form-check">
      <input type="hidden" name="active" value="0">
      <input class="form-check-input" type="checkbox" name="active" value="1" id="checkActive" @if(old('active') == 1) checked @endif>
      <label class="form-check-label" for="checkActive">
        Aktivan?
      </label>
    </div>
  </div>
  <div class="form-group">
      <label for="exampleInputImage">Slike</label>
      <input type="file" class="form-control @error('images') is-invalid @enderror" id="exampleInputImage" name="images[]" multiple>

      @error('images')
      <div id="selectImageFeedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
  </div>
  <button type="submit" class="btn btn-primary">Spremi</button>
</form>
</div>
@endsection