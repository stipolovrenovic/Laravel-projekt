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
<div class="form-group">
  <label for="selectType">Vrsta osobe</label>
  <select class="custom-select @error('type') is-invalid @enderror" id="selectType" name="type" aria-describedby="selectTypeFeedback">
    @if(old('type') == 1)
    <option disabled value="">Odaberite vrstu...</option>
    <option selected value="1">Fizička osoba</option>
    <option value="2">Pravna osoba</option>
    @elseif(old('type') == 2)
    <option disabled value="">Odaberite vrstu...</option>
    <option value="1">Fizička osoba</option>
    <option selected value="2">Pravna osoba</option>
    @else
    <option selected disabled value="">Odaberite vrstu...</option>
    <option value="1">Fizička osoba</option>
    <option value="2">Pravna osoba</option>
    @endif
  </select>

  @error('type')
  <div id="selectTypeFeedback" class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

</div>
<div class="form-group">
  <div class="form-check">
    @if(old('international') == 1)
    <input class="form-check-input" type="radio" name="international" id="radioHome" value="1" checked>
    @else
    <input class="form-check-input" type="radio" name="international" id="radioHome" value="1">
    @endif
    <label class="form-check-label" for="radioHome">
      Domaći klijent
    </label>
  </div>
  <div class="form-check">
    @if(old('international') == 2)
    <input class="form-check-input" type="radio" name="international" id="radioAway" value="2" checked>
    @else
    <input class="form-check-input" type="radio" name="international" id="radioAway" value="2">
    @endif
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
    @if(old('services') && in_array('Domena', old('services')))
    <option value="Domena" selected>Domena</option>
    @else
    <option value="Domena">Domena</option>
    @endif
    @if(old('services') && in_array('Hosting', old('services')))
    <option value="Hosting" selected>Hosting</option>
    @else
    <option value="Hosting">Hosting</option>
    @endif
    @if(old('services') && in_array('Održavanje', old('services')))
    <option value="Održavanje" selected>Održavanje</option>
    @else
    <option value="Održavanje">Održavanje</option>
    @endif
    @if(old('services') && in_array('SEO_Optimizacija', old('services')))
    <option value="SEO_Optimizacija" selected>SEO optimizacija</option>
    @else
    <option value="SEO_Optimizacija">SEO optimizacija</option>
    @endif
    @if(old('services') && in_array('Google_Oglašavanje', old('services')))
    <option value="Google_Oglašavanje" selected>Google oglašavanje</option>
    @else
    <option value="Google_Oglašavanje">Google oglašavanje</option>
    @endif
    @if(old('services') && in_array('Facebook_Oglašavanje', old('services')))
    <option value="Facebook_Oglašavanje" selected>Facebook oglašavanje</option>
    @else
    <option value="Facebook_Oglašavanje">Facebook oglašavanje</option>
    @endif
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
    @if(old('active') == 1)
    <input class="form-check-input" type="checkbox" name="active" value="1" id="checkActive" checked>
    @else
    <input class="form-check-input" type="checkbox" name="active" value="1" id="checkActive">
    @endif
    <label class="form-check-label" for="checkActive">
      Aktivan?
    </label>
  </div>
</div>
<button type="submit" class="btn btn-primary">Spremi</button>
</form>
@endsection