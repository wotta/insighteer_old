<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $expensesTitle }}</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="chart">
            <canvas id="barChart" style="height: 230px; width: 535px;" width="535" height="230"></canvas>
        </div>
    </div>
</div>

@push('js')
    <script>
      $(function () {
        var barChartCanvas = $('#barChart');

        new Chart(barChartCanvas, {
          type: 'bar',
          data: {
            labels : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
              {
                label: 'Electronics',
                backgroundColor: 'rgba(210, 214, 222, 1)',
                borderColor: 'rgba(210, 214, 222, 1)',
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [65, 59, 80, 81, 56, 55, 40]
              },
              {
                label: 'Digital Goods',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [28, 48, 40, 19, 86, 27, 90]
              }
            ]
          },
          options: {
            scaleBeginAtZero: true,
            scaleShowGridLines: false,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            responsive: true,
            maintainAspectRatio: true,
            datasetFill: false
          }
        });
      });
    </script>
@endpush