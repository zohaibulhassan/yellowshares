{{-- @extends('layouts.app')
@section('title', 'Home | StockContent')
@section('content')
<div class="page_container">
    <div class=" col-md-6">
        <div class="form-group">
            <label for="Select tag">Year:-</label>
            <select name="" id="tag_id" class="select2" multiple="multiple" data-placeholder="Select the year" style="width: 100%;">
                <option value="">Select Year</option>
                <option value="2018-2019">2018-2019</option>
                <option value="2019-2020">2019-2020</option>
                <option value="2020-2021">2020-2021</option>
                <option value="2021-2022">2021-2022</option>
                <option value="2022-2023">2022-2023</option>
                
            </select>

        </div>
    </div>
    <div class=" col-md-6">
        <div class="form-group">
            <label for="Select category">Select Company:-</label>
            <select name="company_id" id="company_id" class="form-control">
                <option value="">Select comaony</option>
                <option value="">Test company</option>
                <option value="">ABC company</option>
                
            </select>

        </div>
    </div>
    <div class=" col-md-6">
        <div class="form-group">
            <label for="Select category">Select Company:-</label>
            <div class="select2-purple">
                <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
              </div>

        </div>
    </div>
</div>
    
@endsection --}}










@extends('layouts.app')
@section('title', 'Home | StockContent')
@section('content')
<div class="page_container">
    <form action="{{route('graph-data-show')}}" method="GET">
    <div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="Select tag">Select Year-</label>
            <select name="span_year" id="span_year" class="form-control select2"  data-placeholder="Select the year" style="width: 100%;">
                <option value="">Select year</option>
                <option value="2019">2018-2019</option>
                <option value="2020">2019-2020</option>
                <option value="2021">2020-2021</option>
                <option value="2022">2021-2022</option>
                <option value="2023">2022-2023</option>
                
            </select>

        </div>
    </div>
    <?php $companies = \App\Models\Company::all();?>
    <div class=" col-md-4">
        <div class="form-group">
            <label for="Select category">Select Company:-</label>
            <select name="company_id" id="company_id" class="form-control">
                <option value="">Select company</option>
                @foreach($companies as $comp)
                <option value="{{$comp->id}}">{{$comp->company_name}}</option>
                @endforeach
                
            </select>

        </div>
    </div>
    <div class=" col-md-4" style="height:50%">
        <div class="form-group">
        <button type="button" class="btn btn-success" id="property-filter">Search</button>
        </div>
    </div>
    </div>
    </form>
    

    

      <!-- PIE CHART -->
      <div class="col-md-6">

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Share  Info</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="user-status-chart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>

        </div>
    </div>

</div>
  
<script>
    

//     $(document).on('click', '#property-filter', function(e) {

// e.preventDefault();
// console.log("demo");
// let company_id = $('#company_id').val();
// let span_year = $('#span_year').val();



// let property_url = '{{ URL::to('view-graphdata') }}'
// $.ajax({
//     type: "GET",
//     url: '{{ URL::to('view-graphdata') }}',
//     data: {
//         'company_id': company_id,
//         'span_year':span_year
        
//     },
//     success: function(d) {
//         console.log(d);
//         var p_list = '';
//         for (var i = 0; i < d.length; i++) {

//             p_list += `<div class="col-sm-4 mb-3">
//                             <div class="card">
//                                 <img class="card_thumb" src="${d[i].property_image_url}">
//                                 <div class="card-body card_body">
//                                     <p class="card_title">${d[i].title}</p>
//                                     <p class="card_contact">Contact for Price</p>
//                                     <p class="card_desc">${d[i].description}</p>
//                                     <div class="card_footer_item_left">
//                                     <span class="card_desc">Posted: <small 
//                                         class="card_contact">${d[i].post_date}</small></span>
//                                     </div>
//                                     <div class="card_footer_item_right">
//                                     <a class="card_link" href=${property_url+'/'+d[i].id}>DETAILS<span
//                                     class="box_arrow"><span class="box_shaft"></span></span></a>
//                                     </div>
//                                 </div>
//                             </div>
//                         </div>`

//         }
//         $('#property-list').html(p_list);

//     },
// });

// });
</script>
@endsection

