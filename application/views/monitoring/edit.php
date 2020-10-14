<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url()?>monitoring">Monitorin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </div>

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <form action="<?=base_url()?>monitoring/update" method="POST">
						<div class="form-group">
							<input type="hidden" name="id" value="<?=$row->row()->id?>">
                            <label for="">Latitude:</label>
                            <input type="text" class="form-control" name="latitude" value="<?=$row->row()->latitude?>">
						</div>
						<div class="form-group">
                            <label for="">Longitude:</label>
                            <input type="text" class="form-control" name="longitude" value="<?=$row->row()->longitude?>">
                        </div>
                        <div class="form-group">
                            <label for="">Heading:</label>
                            <input type="text" class="form-control" name="heading" value="<?=$row->row()->heading?>">
                        </div>
                        <div class="form-group">
                            <label for="">Tilt:</label>
                            <input type="text" class="form-control" name="tilt" value="<?=$row->row()->tilt?>">
                        </div>
						<div class="form-group">
                            <label for="">Speed:</label>
                            <input type="text" class="form-control" name="speed" value="<?=$row->row()->speed?>">
						</div>
						<div class="form-group">
                            <label for="">Waktu:</label>
                            <input type="text" class="form-control" name="waktu" value="<?=$row->row()->waktu?>">
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<!---Container Fluid-->
