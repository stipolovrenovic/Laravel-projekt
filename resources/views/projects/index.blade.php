@extends ('layout')
@section ('content')

<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Projekti</h1>
  </div>

  <form
  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{ route('projects.index') }}" method="GET">
  <div class="input-group">
    <input type="text" class="form-control bg-white border-0 small" name="keyword" placeholder="Unesite naziv projekta..."
    aria-label="Search" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-primary" type="submit">
        <i class="fas fa-search fa-sm"></i>
      </button>
    </div>
  </div>
</form>
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
</div>
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