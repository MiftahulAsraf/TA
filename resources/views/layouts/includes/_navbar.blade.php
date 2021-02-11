  <nav class="main-header navbar navbar-expand navbar-dark bg-dark navbar-fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="  button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../dashboard" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/contact" class="nav-link">Contact</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications -->
      @if(Auth::user()->id_role == 3)
      <li class="nav-item dropdown"> 
          <a class="nav-link " href="/reservasi" >
          Reservasi
          </a>
      </li>    
      @endif
      @if(Auth::user()->id_role == 1)
      <li class="nav-item dropdown"> 
          <a class="nav-link " href="/pendaftaran" >
          Pendaftaran
          </a>
      </li>    
      @endif
      <li class="nav-item dropdown"> 
          <a class="nav-link dropdown" href="/logout" onclick="return confirm('anda yakin?')">
          <i class="fas fa-unlock"></i>
          </a>
      </li>       
    </ul>
</div>
  </nav>