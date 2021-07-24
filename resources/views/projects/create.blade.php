@extends ('layout')
@section ('content')

<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Novi projekt</h1>
  </div>

  <form action="{{ route('projects.store') }}" method="POST">
   @csrf

   <div class="form-group">
    <label for="selectClient">Vlasnik projekta</label>
    <select class="custom-select @error('client_id') is-invalid @enderror" id="selectClient" name="client_id" aria-describedby="selectClientFeedback">
      <option disabled value=""@if(!old('client_id')) selected @endif>Odaberite klijenta...</option>
      @foreach($clients as $client)
      <option value="{{ $client->id }}" @if(old('client_id') == $client->id) selected @endif>{{ $client->name }}</option>
      @endforeach
    </select>

    @error('client_id')
    <div id="selectClientFeedback" class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror

  </div>
  <div class="form-group">
    <label for="inputName">Naziv projekta</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" value="{{ old('name') }}" aria-describedby="inputNameFeedback">

    @error('name')
    <div id="inputNameFeedback" class="invalid-feedback">
      {{ $message }}
    </div>  
    @enderror

  </div>
  <div class="form-group">
    <label for="inputDescription">Opis</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="inputDescription" name="description" aria-describedby="inputDescriptionFeedback">{{ old('description') }}</textarea>

    @error('description')
    <div id="inputDescriptionFeedback" class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror

  </div>
  <div class="form-group">
    <label for="inputPrice">Cijena</label>
    <input type="number" class="form-control @error('price') is-invalid @enderror" id="inputPrice" name="price" value="{{ old('price') }}"  step=".01" aria-describedby="inputPriceFeedback">

    @error('price')
    <div id="inputPriceFeedback" class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror

  </div>
  <div class="form-group">
    <label for="inputDate">Datum</label>
    <input class="datepicker form-control @error('deployed_at') is-invalid @enderror" id="inputDate" name="deployed_at" value="{{ old('deployed_at') }}"  onkeydown="return false" aria-describedby="inputDateFeedback">

    @error('deployed_at')
    <div id="inputDateFeedback" class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror

  </div>
  <button type="submit" class="btn btn-primary">Spremi</button>
</form>
</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="{{url('/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script>
  tinymce.init({
    menubar:false,
    statusbar:false,
    selector: '#inputDescription'
  });

  $('#inputDate').datepicker({
    format: 'yyyy-mm-dd',
    language: 'hr'
  });
</script>

@endsection