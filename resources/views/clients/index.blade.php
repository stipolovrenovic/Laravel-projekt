@extends ('layout')
@section ('content')

<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Klijenti</h1>
  </div>

  <form
  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{ route('clients.index') }}" method="GET">
  <div class="input-group">
   <input type="text" class="form-control bg-white border-0 small" name="keyword" placeholder="Unesite ime klijenta..."
   aria-label="Search" aria-describedby="basic-addon2">
   <div class="input-group-append">
    <button class="btn btn-primary" type="submit">
      <i class="fas fa-search fa-sm"></i>
    </button>
  </div>
</div>
</form>
<a class="btn btn-success" href="{{ route('clients.create') }}">Novi klijent</a>
<br>
<br>
<form method="POST" action="{{ route('clients.destroyChecked') }}">
      @csrf
      @method('DELETE')

      <div class="form-group">
        <input type="submit" id="deleteChecked" class="btn btn-danger" value="Obriši označene klijente" @error('clientsForDeleting') is-invalid @enderror aria-describedby="deleteCheckedClientsFeedback"> 

        @error('clientsForDeleting')
        <div id="deleteCheckedClientsFeedback" class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
</form>  
<table class="table bg-white">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">ID</th>
      <th scope="col">Ime i prezime</th>
      <th scope="col">Detaljno...</th>
      <th scope="col">Uredi klijenta</th>
      <th scope="col">Obriši klijenta</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($clients as $client)
    <tr>
      <td><input type="checkbox" name="clientsForDeleting[]" value="{{ $client }}" id="checkClientforDeletion"/></td>
      <td>{{ $client->id }}</td>
      <td>{{ $client->name }}</td>
      <td><a class="btn btn-info" href="{{ route('clients.show', $client) }}">Otvori</a></td>
      <td><a class="btn btn-primary" href="{{ route('clients.edit', $client) }}">Uredi</a></td>
      <td>
       <form method="POST" action="{{ route('clients.destroy', $client) }}">
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
{{ $clients->links() }}
</div>
<script>
var deleteButtons = document.querySelectorAll('.deleteButton');

deleteButtons.forEach(function(element) {
  element.addEventListener("click", function(event)
  {
    event.preventDefault();
    if (confirm('Jeste li sigurni o brisanju klijenta?'))
    {
      element.closest('form').submit();
    }
  });
})

var deleteCheckedButton = document.getElementById('deleteChecked');

deleteCheckedButton.addEventListener("click", function(event)
{
  event.preventDefault();
  if (confirm('Jeste li sigurni o brisanju označenih klijenata?'))
  {
    deleteCheckedButton.closest('form').submit();
  }
});

</script>
@endsection