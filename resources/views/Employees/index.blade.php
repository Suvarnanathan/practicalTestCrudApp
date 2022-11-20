@include('header')

<div class="container">
    <div class="raw">
        <div class="col-md-2 alignment"></div>
        <div class="col-md-8 alignment">
            <button class="btn btn-primary addnew"><a href="/employees/create">Add New Employee</a></button>
        <table class="table align-middle mb-0 bg-white">
  <thead class="table-dark">
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Gender</th>
      <th>Birth Date</th>
      <th>Hire Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  @if($employees!=null)
  <tbody>
    
    @foreach($employees as $employee)
    <tr>
      <td>
 {{$employee->first_name}}
      </td>
      <td>
       {{$employee->last_name}}
      </td>
      <td>
        {{$employee->gender}}
      </td>
      <td>
        {{$employee->birth_date}}
      </td>
      <td>
        {{$employee->hire_date}}
      </td>
      <td>
      <a style="color:white;text-decoration:none"href="/employees/{{$employee->id}}"> <button  class="btn btn-success">
          View
        </button>
      </a>
      </td>
    </tr>
    @endforeach
   

  </tbody>
  @else
  <tbody>
    <tr>
        <td>No Data Found</td>
</tr>
</tbody>
  @endif
</table>
        </div>
        <div class="col-md-2 alignment"></div>
    </div>
</div>