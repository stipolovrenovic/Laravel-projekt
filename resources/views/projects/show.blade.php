@extends ('layout')
@section ('content')

<a class="btn btn-secondary" href="{{ route('projects.index') }}">Povratak na listu</a>
<br>
<br>
<h1>{{ $project->name }}</h1>
<br>
<p><h5>Naziv projekta: </h5>{{ $project->name }}</p>
<p><h5>Vlasnik projetka: </h5><a href="{{ route('clients.show', $project->client) }}">{{ $project->client->name }}</a></p>
<h5>Opis: </h5>
{{ $project->description }}
<p><h5>Cijena: </h5>{{ $project->price }} kn</p>
<p><h5>Datum: </h5>@if($project->deployed_at){{ $project->deployed_at }}@else Nema datuma. @endif</p>

@endsection