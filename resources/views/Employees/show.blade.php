@include('header')

<div class="container">
    <div class="raw">
        <div class="col-md-3 alignment"></div>
        <div class="col-md-6 alignment">
            <h3>{{$employee->first_name}}'s Profile  <a style="color:white;text-decoration:none;text-align:right;"href="/employees/{{$employee->id}}/edit"> <button  class="btn btn-primary">
          Edit
        </button>
      </a></h3>
      <div class="mb-3 row" style="text-align:center">
    <label for="inputPassword" class="col-sm-4 col-form-label">Employee Name:</label>
    <div class="col-sm-8">
     {{$employee->first_name}} {{$employee->last_name}}
    </div>
  </div>
  <div class="mb-3 row" style="text-align:center">
    <label for="inputPassword" class="col-sm-4 col-form-label">Date Of Birth:</label>
    <div class="col-sm-8">
    @php echo Carbon\Carbon::parse($employee->birth_date)->format('d-m-Y'); @endphp
    </div>
  </div>
  <div class="mb-3 row" style="text-align:center">
    <label for="inputPassword" class="col-sm-4 col-form-label">Gender:</label>
    <div class="col-sm-8">
    {{$employee->gender}}
    </div>
  </div>
  <div class="mb-3 row" style="text-align:center">
    <label for="inputPassword" class="col-sm-4 col-form-label">Hire Date:</label>
    <div class="col-sm-8">
    @php echo Carbon\Carbon::parse($employee->hire_date)->format('d-m-Y'); @endphp
    </div>
  </div>
  <h4 style="text-align:left;">Salary Details</h4>
        <table class="table align-middle mb-0 bg-white">
  <thead class="table-dark">
    <tr>
      <th>Amount</th>
    
      <th>From Date</th>
      <th>To Date</th>
    </tr>
  </thead>
 <tbody>
    <tr>
        <td>{{$employee->salary->salary}}</td>
        <td>{{$employee->salary->from_date}}</td>
        <td>{{$employee->salary->to_date}}</td>

</tr>

</tbody>
</table>
<br>
<h4 style="text-align:left;">Designation Details</h4>
        <table class="table align-middle mb-0 bg-white">
  <thead class="table-dark">
    <tr>
      <th>Title</th>
    
      <th>From Date</th>
      <th>To Date</th>
    </tr>
  </thead>
 <tbody>
    <tr>
        <td>{{$employee->title->title}}</td>
        <td>{{$employee->title->from_date}}</td>
        <td>{{$employee->title->to_date}}</td>

</tr>

</tbody>
</table>
        </div>
        <div class="col-md-3 alignment"></div>
    </div>
</div>