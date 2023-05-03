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
    <form  >
        
    <div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="Select tag">Select Year-</label>
            <select name="span_year" id="span_year" class="form-control select2"  data-placeholder="Select the year" style="width: 100%;">
                <option value="">Select year</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                
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
                <option value="{{$comp->company_name}}">{{$comp->company_name}}</option>
                @endforeach
                
            </select>

        </div>
    </div>
    <div class=" col-md-4" style="height:50%">
        <div class="form-group">
        <button type="submit" class="btn btn-success" id="property-filter">Search</button>
        </div>
    </div>
    </div>
    </form>
    

    

      <!-- PIE CHART -->
      <div class="col-md-6">

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title"></h3>

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


    <section class="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
              <div class="card">
                 
              </div>
                  <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                  
              <table class="table table-striped projects" id="company-table">
                  <thead >
                      <tr class="thead-dark" >
                        
                        <th scope="col">Company</th>
                        <th scope="col">NoShares</th>
                       
                        
                        <th scope="col">Percentage</th>
                        <th scope="col">Regnumber</th>
                        <th scope="col">ShareHolder</th>
                        <th scope="col">ShareHolderType</th>
                        <th scope="col">StockYearSpan</th>
                        
                        
                      </tr>
                  </thead>
                  <tbody>
                </tbody>
                  {{-- <tbody>
                    
                   
                    @foreach($response['company_share_data'] as $tg)
                      <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{ $tg->Company }}</td> 
                        <td>{{ $tg->NoShares }}</td> 
                        <td>{{ $tg->Percentage }}</td> 
                        <td>{{ $tg->Regnumber }}</td> 
                        <td>{{ $tg->ShareHolder }}</td> 
                        <td>{{ $tg->ShareHolderType }}</td> 
                        <td>{{ $tg->StockYearSpan }}</td> 
                                           
                        
                          
                          
                         
                      </tr>
                      @endforeach
                      
                  </tbody> --}}
              </table>
              <div id="no-data-message" style="display: none;">No  data found.</div>
             </div>
          </div>
            </div>
          </div>
          </div>
        </section>

</div>
  
<script>
    

$(document).on('click', '#property-filter', function(e) {

e.preventDefault();
console.log("demo");
let company_id = $('#company_id').val();
let span_year = $('#span_year').val();



let property_url = '{{ URL::to('view-graphdata') }}'
$.ajax({
    type: "GET",
    url: '{{ URL::to('graph-data-show') }}',
    data: {
        'company_id': company_id,
        'span_year':span_year
        
    },
   
        //-------------

    
            success: function(d) {
                console.log(d);
                
                var prt = d.property_status_chart_data;
                var companies_list =d.company_share_data;
               
               
                console.log(companies_list);
                if(companies_list.length>0)
                {
                    var html = '';
                for (var i = 0; i < companies_list.length; i++) {
                    html += `<tr>
                        
                        <td> ${companies_list[i].Company}</td> 
                        <td>${companies_list[i].NoShares}</td> 
                        <td>${companies_list[i].Percentage}</td> 
                        <td>${companies_list[i].Regnumber }</td> 
                        <td>${companies_list[i].ShareHolder }</td> 
                        <td>${companies_list[i].ShareHolderType }</td> 
                        <td>${companies_list[i].StockYearSpan }</td> 
                                           
                        
                          
                          
                         
                      </tr>`;
                }
                $('#company-table tbody').html(html);


                }
                else {
                    $('#no-data-message').show();
                }
               

                
                
                  // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#user-status-chart').get(0).getContext('2d')
        var donutData = {
            labels: prt.label,
            datasets: [{
                data: prt.count,
                backgroundColor: ['#f56954', '#f39c12', '#00c0ef'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and doughnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'pie',
            data: donutData,
            options: donutOptions
        })
            },

            failure: function() {}
        
    

   
    
        

    
});

});
</script>
@endsection

