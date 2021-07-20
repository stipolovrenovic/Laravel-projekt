@extends ('layout')
@section ('content')

<form action="{{ route('logout') }}"  method="POST">
  @csrf
  <button type="submit" class="btn btn-warning">Odjavi se</button>
</form>
<a class="btn btn-secondary" href="{{ route('projects.index') }}">Povratak na listu</a>
<br>
<br>
<form action="{{ route('projects.update', $project) }}" method="POST">
 @csrf
 @method('PUT')

 <div class="form-group">
  <label for="selectClient">Vlasnik projekta</label>
  <select class="custom-select @error('client_id') is-invalid @enderror" id="selectClient" name="client_id" aria-describedby="selectClientFeedback">
    @foreach($clients as $client)
    <option value="{{ $client->id }}" @if($project->client_id == $client->id) selected @endif>{{ $client->name }}</option>
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
  <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" value="{{ $project->name }}" aria-describedby="inputNameFeedback">
  
  @error('name')
  <div id="inputNameFeedback" class="invalid-feedback">
    {{ $message }}
  </div>  
  @enderror

</div>
<div class="form-group">
  <label for="inputDescription">Opis</label>
  <textarea class="form-control @error('description') is-invalid @enderror" id="inputDescription" name="description" aria-describedby="inputDescriptionFeedback">{{ $project->description }}</textarea>

  @error('description')
  <div id="inputDescriptionFeedback" class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

</div>
<div class="form-group">
  <label for="inputPrice">Cijena</label>
  <input type="number" class="form-control @error('price') is-invalid @enderror" id="inputPrice" name="price" value="{{ $project->price }}"  step=".01" aria-describedby="inputPriceFeedback">

  @error('price')
  <div id="inputPriceFeedback" class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

</div>
<div class="form-group">
  <label for="inputDate">Datum</label>
  <input class="datepicker form-control @error('deployed_at') is-invalid @enderror" id="inputDate" name="deployed_at" value="{{ $project->deployed_at }}"  onkeydown="return false" aria-describedby="inputDateFeedback">

  @error('deployed_at')
  <div id="inputDateFeedback" class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

</div>
<button type="submit" class="btn btn-primary">Spremi</button>
</form>
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