@extends ('layout')

@section ('content')
<a class="btn btn-success" href="{{ route('clients.create') }}">Novi klijent</a>
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
			            <input type="submit" class="btn btn-danger" id="obrisiKlijenta" value="Obriši">
			        </div>
			    </form>
    			
    		</td>
    	</tr>
    @endforeach
  </tbody>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$('#obrisiKlijenta').click(function(e){
        e.preventDefault() 
        if (confirm('Jeste li sigurni o brisanju klijenta?'))
        {
            $(e.target).closest('form').submit();
        }
    });
</script>
@endsection