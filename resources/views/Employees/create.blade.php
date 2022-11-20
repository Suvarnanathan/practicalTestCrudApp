@include('header')

<div class="container">
    <div class="raw">
        <div class="col-md-2 alignment"></div>
        <div class="col-md-8 alignment">
            <h3 >Employee Profile</h3>
            @if($emp==null)
  <form action="{{route('employees.store')}}" method="POST" id="formiD">
    @else
    <form action="{{route('employees.update',$emp->id)}}" method="post" id="formiD">
    {{ method_field('PUT') }}

    @endif
  <input name="_token" type="hidden" value="{{ csrf_token() }}" />

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">First Name *</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword" name="fname" value="{{$emp?$emp->first_name:old('fname') }}">
      @if ($errors->has('fname'))
                    <span class="validation">{{ $errors->first('fname') }}.</span>
                @endif
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Last Name *</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword" name="lname"  value="{{$emp?$emp->last_name: old('lname')}}">
      @if ($errors->has('lname'))
                    <span class="validation">{{ $errors->first('lname') }}.</span>
                @endif
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Date of Birth *</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputPassword" name="dob" max={{ $today }} value=" {{$emp?$emp->birth_date:old('dob') }}">
      @if ($errors->has('dob'))
                    <span class="validation">{{ $errors->first('dob') }}.</span>
                @endif
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Hire Date *</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputPassword" name="hireDate"   value="{{$emp?$emp->hire_date:old('hireDate')}}" >
      @if ($errors->has('hireDate'))
                    <span class="validation">{{ $errors->first('hireDate') }}.</span>
                @endif
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Gender *</label>
    <div class="col-sm-10">
    <select class="form-select" name="gender" aria-label="Default select example">
  <option selected>Select Gender</option>
          @if($emp)
          
  <option value="Male" @if($emp->gender=='Male') selected @endif>Male</option>
  <option value="Female" @if($emp->gender=='Female') selected @endif>Female</option>
          @else                                 
  <option value="Male" @if(old('gender')=='Male') selected @endif>Male</option>
  <option value="Female" @if(old('gender')=='Female') selected @endif>Female</option>
  @endif
</select>

    </div>
  </div>
  <h3>Salary Details</h3>
                                                
                                              
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Amount *</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword" name="amount" value="{{$emp?$emp->salary->salary:old('amount') }}">
      @if ($errors->has('amount'))
                    <span class="validation">{{ $errors->first('amount') }}.</span>
                @endif
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">From Date *</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputPassword" name="fromdate"  value="{{$emp?$emp->salary->from_date:old('fromDate')}}">
      @if ($errors->has('fromdate'))
                    <span class="validation">{{ $errors->first('fromdate') }}.</span>
                @endif
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">To Date *</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputPassword" name="toDate" value="{{$emp?$emp->salary->to_date:old('toDate')}}">
      @if ($errors->has('toDate'))
                    <span class="validation">{{ $errors->first('toDate') }}.</span>
                @endif
    </div>
  </div>
  <div class="venue-details"></div>

  <h3>Designation Details</h3>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Title *</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword" name="title" value="{{$emp?$emp->title->title:('title') }}">
      @if ($errors->has('title'))
                    <span class="validation">{{ $errors->first('title') }}.</span>
                @endif
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">From Date *</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputPassword" name="titlefromdate"  value="{{$emp?$emp->title->from_date:('titlefromdate')}}">
      @if ($errors->has('titlefromdate'))
                    <span class="validation">{{ $errors->first('titlefromdate') }}.</span>
                @endif
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">To Date *</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputPassword" name="titletoDate" value="{{$emp?$emp->title->to_date:old('titletoDate')}}">
      @if ($errors->has('titletoDate'))
                    <span class="validation">{{ $errors->first('titletoDate') }}.</span>
                @endif
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-10">
      <input type="submit" class="btn btn-success" value="Add">
    </div>
  </div>
</form>
        </div>
        <div class="col-md-2 alignment"></div>
    </div>
</div>
   
    