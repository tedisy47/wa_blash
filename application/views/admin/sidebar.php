<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?=base_url()?>asset_admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Wa Blash</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$this->session->userdata('username')?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="<?=site_url('pesan/insert')?>" class="nav-link">
              <i class="nav-icon fa fa-paper-plane"></i>
              <p>
                Kirim Pesan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('pesan_blash/insert')?>" class="nav-link">
              <i class="nav-icon fa fa-paper-plane"></i>
              <p>
                Blaah WA
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('kontak_grup')?>" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Grup Kontak
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('kontak')?>" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Kontak
              </p>
            </a>
          </li>
          <?php if ($this->session->userdata('level')=='superadmin'):?>
          <li class="nav-item">
            <a href="<?=site_url('user')?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <?php endif ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
