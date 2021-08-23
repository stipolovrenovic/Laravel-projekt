@extends ('layout')
@section ('content')

<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Vaš profil</h1>
  </div>

  @if(session('message'))
  <div class="alert alert-success" role="alert">
    {{ session('message') }}
  </div>
  @endif

  <form method="POST" action="{{ route('users.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="exampleName">Ime</label>
      <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control @error('name') is-invalid @enderror" id="exampleName"
      placeholder="Ime">

      @error('name')
      <div id="selectNameFeedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="exampleInputEmail">E-Mail Adresa</label>
      <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail"
      placeholder="E-Mail Adresa">

      @error('email')
      <div id="selectEmailFeedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    @if(auth()->user()->image)
    <div class="form-group">
      <img id="previewImage" src="{{ asset(auth()->user()->image) }}" style="width: 200px;"> 
    </div>
    <a href="{{ route('users.deleteImage') }}">Obriši sliku</a>
    @endif
    <div class="form-group">
      <label for="exampleInputImage">Profilna slika</label>
      <input type="file" class="form-control @error('image') is-invalid @enderror" id="exampleInputImage" name="image">

      @error('image')
      <div id="selectImageFeedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">
      Spremi promjene
    </button>
  </form>
</div>
<script>
  function changeImage(image)
  {
    var previewImage = document.getElementById('previewImage');
    previewImage.src = image.value;

      /*
        Trebalo bi raditi u teoriji ali Chrome ne dopušta prikaz lokalnih datoteka.
        Za provjeru u input za sliku dodajte onchange="changeImage(this)"
      */
  }
</script>
  @endsection