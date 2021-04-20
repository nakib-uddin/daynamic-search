@extends('master')
@section('content')

<h1>Create Student Form</h1>

<form class="form-horizontal" action="{{route('store')}}" method="post">
{{csrf_field()}}
<div class="form-group col-md-8">
<form action="/action_page.php" class="was-validated">
  <div class="form-group">
    <label for="uname">Name:</label>
    <input type="text" class="form-control" id="name"  name="name">
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div>
    <label for="uname">Registration:</label>
    <input type="text" class="form-control" id="Registration_id"  name="Registration_id">
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
                    <div class="form-group" >
                            <label>Department</label>
                <select name="Department" id="Department"  class="form-control" >
                                  <option> select option </option>
                                  
                                  @foreach($select as $key)
                                  
                              <option value="{{ $key->Department }}">{{ $key->Department }}</option>
                              
                                  @endforeach
                                  
                             </select>
                       </div>
                       
  <div>
  <label for="uname">Info:</label>
   <textarea class="form-control" id="uregistration_id"  name="Info" rows="7" required> </textarea>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <button type="register" class="btn btn-primary mt-2">Register Student</button>
</form>

</div>

</form>
@endsection
