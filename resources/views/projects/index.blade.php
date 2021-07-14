@extends ('layout')

@section ('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Ime klijenta</th>
      <th scope="col">Naziv projekta</th>
      <th scope="col">Obriši projekt</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($projects as $project)
    <tr>
      <td>{{ $project->id }}</td>
      <td>{{ $project->client->name }}</td>
      <td>{{ $project->name }}</td>
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