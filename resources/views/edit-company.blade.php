@extends('layouts.app')
@section('title', 'All Companies | YellowShare')
@section('content')
<div class="page_container">
    @if (session('success'))
    <div class="alert alert-success">
        <center><i class="fa fa-check-circle" aria-hidden="true"></i> {{ session('success') }}</center>
    </div>
@endif
@if (session('failed'))
    <div class="alert alert-danger">
        <center><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{ session('failed') }}
        </center>
    </div>
@endif
    <div class="col-sm-6">

        <form  method="POST" name="contact-form" data-parsley-validate="" novalidate=""
            method="POST" action="{{ route('update-company') }}">
            @csrf
            <input type="hidden" name="id" value="<?=$company->id?>">

            
    
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Company Name"  name="company_name"  value="{{$company->company_name}}" required>    
            </div>
          
         
            <div class="form-group">
              <textarea class="form-control" rows="6" placeholder="Description" name="description" required>{{$company->description}}</textarea>
            </div> 
            <button type="submit" class="btn btn-success">Update</button>
        </form>

      </div>
</div>
@endsection