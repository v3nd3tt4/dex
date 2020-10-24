<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <!-- <img src="<?= base_url('assets/'); ?>img/logo/logo2.png"> -->
        </div>
        <div class="sidebar-brand-text mx-3">DEX</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item <?=$title=='Dashboard' || empty($title)? 'active' :'' ?>">
        <a class="nav-link" href="<?= base_url(); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>
    <?php if($this->session->userdata('level') == 'Admin'){?>

    <li class="nav-item <?=$title=='sensor_anemo' ? 'active' :''?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
            aria-controls="collapseForm">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>PLTB</span>
        </a>
        <div id="collapseForm" class="collapse <?=$title=='sensor_anemo' ? 'show' :''?>" aria-labelledby="headingForm" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">PLTB</h6>
            <a class="collapse-item" href="<?=base_url()?>pltb/sensor_anemo">Sensor Anemo</a>
            <a class="collapse-item" href="form_advanceds.html">Arus</a>
            <a class="collapse-item" href="form_advanceds.html">Angin</a>
            <a class="collapse-item" href="form_advanceds.html">Daya</a>
            </div>
        </div>
    </li>
    
    <li class="nav-item <?=$title=='User' || $title=='Tambah User' || $title=='Edit User' ? 'active' :'' ?>">
        <a class="nav-link" href="<?= base_url(); ?>user">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Data User</span>
        </a>
    </li>
	<!-- <li class="nav-item <?=$title=='Cur WP' || $title=='Tambah Cur WP' || $title=='Edit Cur WP' ? 'active' :'' ?>">
        <a class="nav-link" href="<?= base_url(); ?>cur_wp">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Data CUR WP</span>
        </a>
    </li>

	<li class="nav-item <?=$title=='Dryer' || $title=='Tambah Dryer' || $title=='Edit Dryer' ? 'active' :'' ?>">
        <a class="nav-link" href="<?= base_url(); ?>dryer">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Data Dryer</span>
        </a>
	</li>

    <li class="nav-item <?=$title=='Dryer2' || $title=='Tambah Dryer2' || $title=='Edit Dryer2' ? 'active' :'' ?>">
        <a class="nav-link" href="<?= base_url(); ?>dryer2">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Data Dryer 2</span>
        </a>
	</li>

    <li class="nav-item <?=$title=='Dryer3' || $title=='Tambah Dryer3' || $title=='Edit Dryer3' ? 'active' :'' ?>">
        <a class="nav-link" href="<?= base_url(); ?>dryer3">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Data Dryer 3</span>
        </a>
	</li>

    <li class="nav-item <?=$title=='Dryer4' || $title=='Tambah Dryer4' || $title=='Edit Dryer4' ? 'active' :'' ?>">
        <a class="nav-link" href="<?= base_url(); ?>dryer4">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Data Dryer 4</span>
        </a>
	</li>
	
	<li class="nav-item <?=$title=='Monitoring' || $title=='Tambah monitoring' || $title=='Edit monitoring' ? 'active' :'' ?>">
        <a class="nav-link" href="<?= base_url(); ?>monitoring">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Data Monitoring</span>
        </a>
    </li> -->
    
    <?php }?>

    
    
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
</ul>
<!-- Sidebar -->
