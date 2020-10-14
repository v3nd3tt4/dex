<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url()?>monitoring">Monitoring</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </div>

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
					<form action="<?=base_url()?>monitoring/store" method="POST">
						<div class="form-group">
                            <label for="">Latitude:</label>
                            <input type="text" class="form-control" name="latitude">
						</div>
						<div class="form-group">
                            <label for="">Longitude:</label>
                            <input type="text" class="form-control" name="longitude">
                        </div>
                        <div class="form-group">
                            <label for="">Heading:</label>
                            <input type="text" class="form-control" name="heading">
                        </div>
                        <div class="form-group">
                            <label for="">Tilt:</label>
                            <input type="text" class="form-control" name="tilt">
                        </div>
						<div class="form-group">
                            <label for="">Speed:</label>
                            <input type="text" class="form-control" name="speed">
						</div>
						<div class="form-group">
                            <label for="">Waktu:</label>
                            <input type="text" class="form-control" name="waktu">
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<!---Container Fluid-->
