<style>
    .navbar-logo {
      color: #FFF;
    }
    li {
          list-style: none;
    }

    li a {
          text-decoration: none;
          color: #FFF;
    }

    header {
      background: rgb(57,72,103);
      background: linear-gradient(180deg, rgba(57,72,103,0.7008928571428572) 0%, rgba(255,255,255,0) 100%);
    }
</style>
<header class="py-5">
    <div class="container-md">
      <div class="d-flex justify-content-between align-items-center flex-wrap">
        <h3 class="navbar-logo">SIG WISATA</h3>
        <ul class="d-flex gap-4">
          <li><a href="{{ url('/')}}">Beranda</a></li>
          <li><a href="{{ url('wisata')}}">Tempat Wisata</a></li>
          <li><a href="{{ url('/dashboard/login')}}">Dashboard</a></li>
        </ul>
      </div>
    </div>
</header>