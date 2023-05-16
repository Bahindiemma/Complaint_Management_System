<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{url('/')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " href="{{url('/complaint')}}">
          <i class="bi bi-exclamation-triangle"></i>
          <span>Complaints</span>
        </a>
      </li><!-- End Components Nav -->
      
      <li class="nav-item">
        <a class="nav-link " href="{{url('/responses')}}">
          <i class="bi bi-check"></i>
          <span>Responses</span>
        </a>
      </li>

      </li>

      {{-- <li class="nav-item">
        <a class="nav-link " href="{{url('/settings')}}">
          <i class="bi bi-gear"></i>
          <span>settings</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="{{url('/reports')}}">
          <i class="bi bi-file-text"></i>
               <span>Reports</span>
        </a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link " href="{{url('/users')}}">
          <i class="bi bi-person"></i>
          <span>Users</span>
        </a>
      </li>

    </ul>

  </aside>