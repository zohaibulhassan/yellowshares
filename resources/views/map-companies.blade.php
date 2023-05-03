@extends('layouts.app')
@section('title', 'Map Companies | YellowShare')
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
    <div class="col-sm-12">

        <form  method="POST" name="contact-form" data-parsley-validate="" novalidate=""
            method="POST" action="{{ route('map-company-details') }}">
            @csrf
           
            <input type="hidden" name="id" value="<?=$company->id?>">
            
    
            {{-- <div class=" col-md-6">
                <div class="form-group">
                    <label for="Select category">Select Company:-</label>
                    <div class="select2-purple">
                        <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                            <option value="">Select Companies</option>
                            @foreach ($companies as $company)
                               
                                <option value="{{ $company }}"  >{{ $tag->title }}</option>
                                
                            @endforeach
                        
                          </select>
                      </div>
        
                </div>
            </div>  --}}
           
            <div class=" col-md-12">
                <div class="form-group">
                    <label for="Select category">Select Company:-</label>
                    <div class="select2-purple">
                        <select class="select2" multiple="multiple" data-placeholder="Select a comapny" name="comapnies_id[]" style="width: 100%;">
                            {{-- <option value="">Select Companies</option> --}}
                            @foreach ($companies as $company)
                               
                                <option value="{{ $company->id }}" <?php echo (in_array($company->id, $shared_comapany) ? 'selected="selected"' : '');?> >{{ $company->company_name }}</option>
                                
                            @endforeach
                        
                          </select>
                      </div>
        
                </div>
            </div> 
           
            <button type="submit" class="btn btn-success">Submit</button>
        </form>

      </div>
</div>
@endsection