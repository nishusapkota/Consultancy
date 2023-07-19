<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item menu-open">
      <a href="{{route('university.home')}}" class="nav-link {{ (request()->is('university/home')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    
    {{-- <li class="nav-item">
      <a href="#" class="nav-link {{ (request()->is('university/course*')) ? 'active' : '' }}">
        <i class="nav-icon far fa-envelope"></i>
        <p>
          Courses
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
          <a href="{{route('university.courses.index')}}" class="nav-link {{ (request()->is('university/request/courses*')) ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Course</p>
          </a>
        </li>
        
      </ul>
    </li> --}}
   
    <li class="nav-item">
      <a href="{{route('university.courses.index')}}" class="nav-link {{ (request()->is('university/courses*')) ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Request Course</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('university.scholarship.index')}}" class="nav-link {{ (request()->is('university/scholarship*')) ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Request Scholarship</p>
      </a>
    </li>

    
    {{-- <li class="nav-item">
      <a href="{{route('admin.university.index')}}" class="nav-link {{ (request()->is('admin/university*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>Universities</p>
      </a>
    </li> --}}
    
    {{-- <li class="nav-item">
      <a href="{{route('admin.about.index')}}" class="nav-link {{ (request()->is('admin/about*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>About</p>
      </a>
    </li> --}}
    {{-- <li class="nav-item">
      <a href="{{ route('admin.blog.index')}}" class="nav-link {{ (request()->is('admin/blog*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>Blogs</p>
      </a>
    </li> --}}

    {{-- <li class="nav-item">
      <a href="{{ route('admin.scholarship.index')}}" class="nav-link {{ (request()->is('admin/scholarship*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>Scholarships</p>
      </a>
    </li> --}}

    {{-- <li class="nav-item">
      <a href="{{route('admin.level.index')}}" class="nav-link {{ (request()->is('admin/level*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>Level</p>
      </a>
    </li> --}}

    {{-- <li class="nav-item">
      <a href="{{route('admin.student-enquiry.index')}}" class="nav-link {{ (request()->is('admin/student-enquiry*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>Student Enquiry</p>
      </a>
    </li> --}}


  </ul>
</nav>