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
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>

            

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <a href="<?=base_url()?>pv1/pv1_daya/tambah" class="btn btn-outline-success mb-1 float-right"><i class="fas fa-plus"></i> Tambah</a>
                    <br><br><br>
                    <form method="POST" action="<?=base_url()?>pv1/pv1_daya">
                    <table class="table table-bordered">
                        <tr>
                            <td>Tanggal Awal</td>
                            <td>
                                <input type="date" name="tanggal_awal" class="form-control" <?php if(!empty($_POST)){?> value="<?=$this->input->post('tanggal_awal', true)?>"<?php }?> >
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Akhir</td>
                            <td>
                                <input type="date" name="tanggal_akhir" class="form-control" <?php if(!empty($_POST)){?> value="<?=$this->input->post('tanggal_akhir', true)?>"<?php }?>>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <?php if(empty($_POST)){?>
                                <button class="btn btn-info" type="submit">Filter</button>
                                <?php }else{?>
                                <a href="<?=base_url()?>pv1/pv1_daya" class="btn btn-danger">Reset</a>
                                <?php }?>
                            </td>
                        </tr>
                    </table>
                    </form>
                    <br>
                    <br>
                    <br>
                    <table class="table table-bordered table-striped table-hover dataTables">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Humidity</td>
                                <td>Temp</td>
                                <td>Tanggal</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;foreach($row->result() as $row_data){?>
                            <tr>
                                <td><?=$no++?>.</td>
                                <td><?=$row_data->humidity?></td>
                                <td><?=$row_data->temp?></td>
								<td><?=$row_data->tanggal?></td>
                                <td>
                                <a href="<?=base_url()?>pv1/pv1_daya/remove/<?=$row_data->id?>" class="btn btn-outline-danger btn-sm mb-1 " onclick="return confirm('Apakah anda yakin akan menghapus data ini?');"><i class="fas fa-trash-alt"></i> Hapus</a>
                                <a href="<?=base_url()?>pv1/pv1_daya/edit/<?=$row_data->id?>" class="btn btn-outline-info btn-sm mb-1 " onclick="return confirm('Apakah anda yakin akan mengedit data ini?');"><i class="fas fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
<!---Container Fluid-->
<script>
	
Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Daya'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [<?php foreach($row_chart->result() as $r){ echo '"'.$r->tanggal.'", ';}?>]
    },
    yAxis: {
        title: {
            text: 'Temperature (°C)'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: true
        }
    },
    series: [{
        name: 'Humidity',
        data: [<?php foreach($row_chart->result() as $r){ echo $r->humidity.', ';}?>]
    }, {
        name: 'Temp',
        data: [<?php foreach($row_chart->result() as $r){ echo $r->temp.', ';}?>]
    }]
});
</script>
