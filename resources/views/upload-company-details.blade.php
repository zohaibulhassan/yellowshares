@extends('layouts.app')
@section('title', 'Map Companies | YellowShare')
@section('content')

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
   
<div class="page_container">
        <form  method="POST" name="contact-form" data-parsley-validate="" novalidate=""
            method="POST" action="{{ route('import-company-data') }}" enctype="multipart/form-data">
            @csrf
           
            <input type="hidden" name="id" value="<?=$company->id?>">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="file" name="upload-company-file">
                </div>
            </div>
           
    
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Select tag">Select Year-</label>
                    <select name="" id="tag_id" class="form-control select2"  data-placeholder="Select the year" style="width: 100%;">
                        <option value="">Select year</option>
                        <option value="2018-2019">2018-2019</option>
                        <option value="2019-2020">2019-2020</option>
                        <option value="2020-2021">2020-2021</option>
                        <option value="2021-2022">2021-2022</option>
                        <option value="2022-2023">2022-2023</option>
                        
                    </select>
        
                </div>
            </div>
           
            <div class="col-md-4">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
           
           
            
        </form>
        <a clas="btn btn-success" href="{{URL('export-company-data',$company->id)}}"><button>Export Company</button></a>
      </div>
</div>
@endsection