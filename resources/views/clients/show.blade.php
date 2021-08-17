@extends ('layout')
@section ('content')

<?php
$serviceArray = $client->services
?>

<div class="container-fluid">
  <h1>{{ $client->name }}</h1>
  <br>
  <p><h5>Ime klijenta: </h5>{{ $client->name }}</p>
  <p><h5>Adresa: </h5>{{ $client->address }}</p>
  <p><h5>Poštanski broj: </h5>{{ $client->postcode }}</p>
  <p><h5>Grad: </h5>{{ $client->city }}</p>
  <p><h5>Država: </h5>{{ $client->country }}</p>
  <p><h5>OIB: </h5>{{ $client->oib }}</p>
  <p><h5>Vrsta klijenta: </h5>@if($client->type == 1) Fizička osoba @else Pravna osoba @endif</p>
  <p><h5>E-Mail Adresa: </h5>{{ $client->email }}</p>
  <p><h5>Usluge: </h5>@foreach($client->services as $service){{ str_replace('_', ' ', $service) }}@if(end($serviceArray) != $service), @endif @endforeach.</p>
  <p><h5>Aktivan? </h5>@if($client->active == 1) Da @else Ne @endif</p>
  <h5>Projekti:</h5>
  @if(count($client->projects) >= 1)
  <table class="table bg-white">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Naziv projekta</th>
        <th scope="col">Detaljno...</th>
        <th scope="col">Uredi projekt</th>
        <th scope="col">Obriši projekt</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($client->projects as $project)
      <tr>
        <td>{{ $project->id }}</td>
        <td>{{ $project->name }}</td>
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
 @else
 <p>Nema projekata.</p>
 @endif
 <h5>Slike:</h5>
 @if(count($client->images) >= 1)
 @foreach($client->images as $image)
 <img src="{{ $image }}" style="width: 200px;">
 @endforeach
 @else
 <p>Nema slika.</p>
 @endif
</div>
@endsection
