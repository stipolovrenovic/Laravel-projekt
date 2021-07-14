@extends ('layout')

@section ('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Ime klijenta</th>
      <th scope="col">Naziv projekta</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($projects as $project)
    <tr>
      <td>{{ $project->id }}</td>
      <td>{{ $project->client->name }}</td>
      <td>{{ $project->name }}</td>
   </tr>
   @endforeach
 </tbody>
</table>
@endsection