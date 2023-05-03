

@extends('layouts.app')
@section('title', 'Home | StockContent')
@section('content')
<div class="page_container">
    <form>
    <div class="row">
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
        <button type="button" class="btn btn-success">Search</button>
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
    $(document).ready(function() {

        //LoadGraph();
    });
       //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Test',
          
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------

    // function LoadGraph() {
    //     url = document.location.origin + '/admin/getdashboarddata';
    //     $.ajax({
    //         type: "GET",
    //         url: url,
    //         success: function(d) {
    //             console.log(d);
    //             var data = d.blog_status_chart_data;
    //             var prt = d.property_status_chart_data;
    //             console.log(data);
    //             var blogs_count_chart_data = d.blogs_count_chart_data;
    //             var property_count_chart_data = d.property_count_chart_data;
    //             var subscriber_count_chart_data = d.subscriber_count_chart_data;
    //             var user_count_chart_data = d.user_count_chart_data;
    //             console.log(d);

    //             uploadStatusGraph(data.label, data.count)
    //             uploadPropertyGraph(prt.label, prt.count)
    //         },

    //         failure: function() {}
    //     });
    // }

    // function uploadStatusGraph(label, count) {
    //     //-------------
    //     //- DONUT CHART -
    //     //-------------
    //     // Get context with jQuery - using jQuery's .get() method.
    //     var donutChartCanvas = $('#blog-status-chart').get(0).getContext('2d')
    //     var donutData = {
    //         labels: label,
    //         datasets: [{
    //             data: count,
    //             backgroundColor: ['#f56954', '#f39c12', '#00c0ef'],
    //         }]
    //     }
    //     var donutOptions = {
    //         maintainAspectRatio: false,
    //         responsive: true,
    //     }
    //     //Create pie or douhnut chart
    //     // You can switch between pie and doughnut using the method below.
    //     new Chart(donutChartCanvas, {
    //         type: 'pie',
    //         data: donutData,
    //         options: donutOptions
    //     })


    // }

    // function uploadPropertyGraph(label, count) {
    //     //-------------
    //     //- DONUT CHART -
    //     //-------------
    //     // Get context with jQuery - using jQuery's .get() method.
    //     var donutChartCanvas = $('#user-status-chart').get(0).getContext('2d')
    //     var donutData = {
    //         labels: label,
    //         datasets: [{
    //             data: count,
    //             backgroundColor: ['#f56954', '#f39c12', '#00c0ef'],
    //         }]
    //     }
    //     var donutOptions = {
    //         maintainAspectRatio: false,
    //         responsive: true,
    //     }
    //     //Create pie or douhnut chart
    //     // You can switch between pie and doughnut using the method below.
    //     new Chart(donutChartCanvas, {
    //         type: 'pie',
    //         data: donutData,
    //         options: donutOptions
    //     })


    // }
</script>
@endsection

