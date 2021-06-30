@extends ('layout')

@section ('content')
<a class="btn btn-primary" href="{{ route('clients.create') }}">Novi klijent</a>
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
    		<td></td>
    	</tr>
    @endforeach
  </tbody>
</table>
@endsection