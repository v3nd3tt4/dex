<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        <!-- <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active" aria-current="page">Blank Page</li>
        </ol> -->
    </div>

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="text-center">
                        <h4>Selamat Datang dalam Sistem</h4>
                        <hr>
                    </div>
                    <div class="row">
						<div id="container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!---Container Fluid-->
<script>
	Highcharts.chart('container', {
  chart: {
    type: 'spline'
  },
  title: {
    text: 'Monthly Average Temperature'
  },
  subtitle: {
    text: 'Source: WorldClimate.com'
  },
  xAxis: {
    categories: [<?php foreach($row->result() as $r){ echo '"'.$r->tanggal.'", ';}?>]
  },
  yAxis: {
    title: {
      text: 'Temperature'
    },
    labels: {
      formatter: function () {
        return this.value + '°';
      }
    }
  },
  tooltip: {
    crosshairs: true,
    shared: true
  },
  plotOptions: {
    spline: {
      marker: {
        radius: 4,
        lineColor: '#666666',
        lineWidth: 1
      }
    }
  },
  series: [{
    name: 'Humidity',
    marker: {
      symbol: 'square'
    },
    data: [<?php foreach($row->result() as $r){ echo $r->humidity.', ';}?>{
      y: 26.5,
      marker: {
        symbol: 'url(https://www.highcharts.com/samples/graphics/sun.png)'
      }
    }]

  }, {
    name: 'Temp',
    marker: {
      symbol: 'diamond'
    },
    data: [{
      y: 3.9,
      marker: {
        symbol: 'url(https://www.highcharts.com/samples/graphics/snow.png)'
      }
    }, <?php foreach($row->result() as $r){ echo $r->temp.', ';}?>]
  }]
});
</script>
