@extends ('layout')
@section ('content')

<form action="{{ route('logout') }}"  method="POST">
  @csrf
  <button type="submit" class="btn btn-warning">Odjavi se</button>
</form>
<form action="{{ route('projects.index') }}" method="GET">
 <div class="form-group">
  <label for="inputSearch">Pretraga projekata</label>
  <input type="text" class="form-control @error('keyword') is-invalid @enderror" id="inputSearch" name="keyword" value="{{ old('keyword') }}" aria-describedby="inputSearchFeedback">
  
  @error('keyword')
  <div id="inputSearchFeedback" class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror

</div>
<button type="submit" class="btn btn-primary">Traži</button>
</form>
<br>
<a class="btn btn-success" href="{{ route('projects.create') }}">Novi projekt</a>
<br>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Naziv projekta</th>
      <th scope="col">Ime klijenta</th>
      <th scope="col">Detaljno...</th>
      <th scope="col">Uredi projekt</th>
      <th scope="col">Obriši projekt</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($projects as $project)
    <tr>
      <td>{{ $project->id }}</td>
      <td>{{ $project->name }}</td>
      <td>{{ $project->client->name }}</td>
      <td><a class="btn btn-info" href="{{ route('projects.show', $project) }}">Otvori</a></td>
      <td><a class="btn btn-primary" href="{{ route('projects.edit', $project) }}">Uredi</a></td>
      <td>
       <form method="POST" action="{{ route('projects.destroy', $project) }}">
         @csrf
         @method('DELETE')

         <div class="form-group">
           <input type="submit" class="deleteButton btn btn-danger" value="Obriši">
         </div>
       </form>  
     </td>
   </tr>
   @endforeach
 </tbody>
</table>
<script>
  var deleteButtons = document.querySelectorAll('.deleteButton');

  deleteButtons.forEach(function(element) {
   element.addEventListener("click", function(event)
   {
    event.preventDefault();
    if (confirm('Jeste li sigurni o brisanju projekta?'))
    {
      element.closest('form').submit();
    }
  });
 })
</script>
@endsection