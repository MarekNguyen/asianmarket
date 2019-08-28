<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
      <ul class="nav flex-column">
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('pitaya.create')}}">
            <span data-feather="file"></span>
            Zamowienie
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pitaya.customercreate') }}">
              <span data-feather="file"></span>
              Klient
            </a>
          </li>
        

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Raport</span>
        <a class="d-flex align-items-center text-muted" href="#">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>
      <ul class="nav flex-column mb-2">
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('pitaya.report') }}">
            
            Suma
          </a>
        </li>
        
      </ul>
    </div>
  </nav>