@extends ('layout')
@section ('content')

<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Projekti</h1>
  </div>

  <form
  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{ route('projects.index') }}" method="GET">
  <div class="input-group">
    <input id="searchInput" type="text" class="form-control bg-white border-0 small" name="keyword" placeholder="Unesite naziv projekta..."
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
<form id="deleteCheckedForm" method="POST" action="{{ route('projects.destroyChecked') }}">
      @csrf
      @method('DELETE')

      <input type="hidden" name="projectsForDeleting" value="">
      <div class="form-group">
        <input type="submit" id="deleteCheckedBtn" class="btn btn-danger" value="Obriši označene projekte"  @error('projectsForDeleting') is-invalid @enderror aria-describedby="deleteCheckedProjectsFeedback">

        @error('projectsForDeleting')
        <div id="deleteCheckedProjectsFeedback" class="invalid-feedback">
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
      <th scope="col">Naziv projekta</th>
      <th scope="col">Ime klijenta</th>
      <th scope="col">Detaljno...</th>
      <th scope="col">Uredi projekt</th>
      <th scope="col">Obriši projekt</th>
    </tr>
  </thead>
  <tbody id="tableBody">
    @foreach ($projects as $project)
    <tr>
      <td><input class="checkForDeletion" type="checkbox" value="{{ $project->id }}" id="checkProjectforDeletion"/></td>
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
{{ $projects->links() }}
</div>
<script>
var searchInput = document.getElementById('searchInput');

searchInput.addEventListener("input", function(event)
{
  fetch('http://example-app.test/projects?keyword=' + searchInput.value, 
  {
    headers: 
    {
      'Accept': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
  })
    .then(response => response.json())
    .then(data =>
    {
      var tableBodyContent = "";

      data.data.forEach(function(row)
      {
        var tableRow = "";
        tableRow = '<tr>'+ 
        '<td><input class="checkForDeletion" type="checkbox" value="'+ row.id +'" id="checkProjectforDeletion"/></td>' +
        '<td>'+ row.id +'</td>' +
        '<td>'+ row.name +'</td>'+
        '<td>'+ row.client.name + '</td>'+ 
        '<td><a class="btn btn-info" href="http://example-app.test/projects/'+ row.id +'">Otvori</a></td>' +
        '<td><a class="btn btn-primary" href="http://example-app.test/projects/'+ row.id +'/edit">Uredi</a></td>' +
        '<td>' +
           '<form method="POST" action="http://example-app.test/clients/'+ row.id +'">' +
            '@csrf' +
            '@method("DELETE")' +
             '<div class="form-group">' +
               '<input type="submit" class="deleteButton btn btn-danger" value="Obriši">' +
             '</div>' +
           '</form>' +
         '</td>'
        + '</tr>';

        tableBodyContent += tableRow;
      })

      var tableBody = document.getElementById('tableBody');
      tableBody.innerHTML = tableBodyContent;

    });
});

document.addEventListener('click',function(e){
  if(e.target && e.target.classList.contains('deleteButton')){
    e.preventDefault();
    if (confirm('Jeste li sigurni o brisanju projekta?'))
    {
       e.target.closest('form').submit();
    }
  }
});


/*var deleteButtons = document.querySelectorAll('.deleteButton');

deleteButtons.forEach(function(element) {
  element.addEventListener("click", function(event)
  {
    event.preventDefault();
    if (confirm('Jeste li sigurni o brisanju projekta?'))
    {
      element.closest('form').submit();
    }
  });
})*/

var deleteCheckedButton = document.getElementById('deleteCheckedBtn');

deleteCheckedButton.addEventListener("click", function(event)
{
  event.preventDefault();
  if (confirm('Jeste li sigurni o brisanju označenih projekata?'))
  {
    var ids = [];
    var checkedArray = document.querySelector('#deleteCheckedForm input[name= "projectsForDeleting"]');
    console.log(checkedArray);
    var checkBoxes = document.querySelectorAll('.checkForDeletion');

    checkBoxes.forEach(function(element)
    {
      if(element.checked)
      {
        ids.push(element.value);
      }
    });

   checkedArray.value = ids;

   deleteCheckedButton.closest('form').submit();
  }
});
</script>
@endsection