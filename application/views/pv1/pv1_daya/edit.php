<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url()?>pv1/pv1_daya">Cur WP</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </div>

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <form action="<?=base_url()?>pv1/pv1_daya/update" method="POST">
                    <div class="form-group">
                            <label for="">Data:</label>
                            <input type="hidden" name="id" value="<?=$row->row()->id?>">
                            <input type="text" class="form-control" name="data" value="<?=$row->row()->data?>">
                        </div>
						<div class="form-group">
                            <label for="">Tanggal:</label>
                            <input type="text" class="form-control" name="tanggal" value="<?=$row->row()->tanggal?>">
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<!---Container Fluid-->
