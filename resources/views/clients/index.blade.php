@extends ('layout')

@section ('content')
<form action="{{ route('clients.index') }}" method="GET">
 @csrf

 <div class="form-group">
  <label for="inputSearch">Pretraga klijenata</label>
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
<a class="btn btn-success" href="{{ route('clients.create') }}">Novi klijent</a>
<br>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Ime i prezime</th>
      <th scope="col">Uredi klijenta</th>
      <th scope="col">Obriši klijenta</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($clients as $client)
    <tr>
      <td>{{ $client->id }}</td>
      <td>{{ $client->name }}</td>
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
</script>
@endsection