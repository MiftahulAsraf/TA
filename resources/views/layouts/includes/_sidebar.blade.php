<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link d-block">
      <img src="../../adminlte/img/logobenar.png" alt="Logo" class="brand-image img-circle elevation-3" style="bold">
      <span class="brand-text font-weight-light">Klinik Seira</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" data-widget="treeview">
        <div class="image">
          <img src="{{Auth::User()->getfoto()}}" class="img-circle elevation-2" alt="User Image">
        </div>
        
        <div class="info">
          <a class="d-block">{{Auth::User()->nama_user}}</a>
        </div>

      </div>

      

    <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if(Auth::user()->id_role == 3)
          <li class="nav-item">
            <a href="/akun" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                My Account
              </p>
            </a>
          </li>
          @endif
          @if(Auth::user()->id_role == 3)
          <li class="nav-item">
            <a href="/reservasi" class="nav-link">
              <i class="nav-icon fa fa-bookmark"></i>
              <p>
                Reservasi
              </p>
            </a>
          </li>
          @endif
          @if(Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
          <li class="nav-item">
            <a href="/rekammedis" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Rekam Medis
              </p>
            </a>
          </li>
          @endif
          @if(Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
          <li class="nav-item">
            <a href="/jadwal" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Jadwal Klinik Hari Ini
              </p>
            </a>
          </li>
          @endif
          @if(Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
          <li class="nav-item">
            <a href="/transaksi" class="nav-link">
              <i class="nav-icon fa fa-shopping-basket"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
          @endif
          @if(Auth::user()->id_role == 2 || Auth::user()->id_role == 3)
          <li class="nav-item">
            <a href="/konsultasi" class="nav-link">
              <i class="nav-icon fa fa-comments"></i>
              <p>
                Konsultasi
              </p>
            </a>
          </li>
          @endif
          @if(Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
          <li class="nav-item">
            <a href="/laporan" class="nav-link">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>
                Laporan Keuangan
              </p>
            </a>
          </li>
          @endif

          
          @if(Auth::user()->id_role == 1 )
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           <!--dropdown sidebar-->
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/user" class="nav-link">
                  <i class="nav-icon fa fa-users"></i>
                  <p>Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/pasien" class="nav-link">
                  <i class="nav-icon fa fa-user-md"></i>
                  <p>Data Pasien</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/penyakit" class="nav-link">
                  <i class="nav-icon fa fa-heartbeat"></i>
                  <p>Data Penyakit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/obat" class="nav-link">
                  <i class="nav-icon fa fa-medkit"></i>
                  <p>Data Obat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/layanantambahan" class="nav-link">
                  <i class="nav-icon fa fa-stethoscope"></i>
                  <p>Data Layanan Tambahan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/layanan" class="nav-link">
                  <i class="nav-icon fa fa-h-square"></i>
                  <p>Data Layanan Klinik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/waktu" class="nav-link">
                  <i class="nav-icon fa fa-clock"></i>
                  <p>Data Waktu Layanan</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(Auth::user()->id_role == 3)
          <li class="nav-item">
            <a href="/riwayattransaksi" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Riwayat Transaksi
              </p>
            </a>
          </li>
          @endif
          @if(Auth::user()->id_role == 3)
          <li class="nav-item">
            <a href="/riwayatreservasi" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Riwayat Reservasi
              </p>
            </a>
          </li>
          @endif
          <!-- @if(Auth::user()->id_role == 3)
          <li class="nav-item">
            <a href="/riwayatrekam" class="nav-link">
              <i class="nav-icon fa fa-stethoscope"></i>
              <p>
                Rekam Medis Pribadi
              </p>
            </a>
          </li>
          @endif -->
          @if(Auth::user()->id_role == 1 )
          <li class="nav-item">
            <a href="/konfirmasi" class="nav-link">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>
                Konfirmasi Reservasi
              </p>
            </a>
          </li>
          @endif
          
          <button class="btn btn-light" disabled>{{ Auth::User()->role->name }}</button>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
