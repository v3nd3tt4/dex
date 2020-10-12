<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <!-- <img src="<?= base_url('assets/'); ?>img/logo/logo2.png"> -->
        </div>
        <div class="sidebar-brand-text mx-3">DEX</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>
    <?php if($this->session->userdata('level') == 'Admin'){?>
    
    <li class="nav-item <?=$title=='User' || $title=='Tambah User' || $title=='Edit User' ? 'active' :'' ?>">
        <a class="nav-link" href="<?= base_url(); ?>user">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Data User</span>
        </a>
    </li>
    
    <?php }?>

    
    
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
</ul>
<!-- Sidebar -->