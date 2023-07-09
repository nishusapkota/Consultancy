<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item menu-open">
      <a href="{{route('admin.dashboard')}}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link {{ (request()->is('admin/slider*')) ? 'active' : '' }}">
        <i class="nav-icon far fa-envelope"></i>
        <p>
          Sliders
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item ">
          <a href="{{route('admin.home.index')}}" class="nav-link {{ (request()->is('admin/slider/home*')) ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Home Slider</p>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a href="{{Route('admin.courses.index')}}" class="nav-link {{ (request()->is('admin/courses*')) ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Course</p>
          </a>
        </li> --}}
      </ul>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link {{ (request()->is('admin/course*')) ? 'active' : '' }}">
        <i class="nav-icon far fa-envelope"></i>
        <p>
          Courses
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item ">
          <a href="{{Route('admin.course-category.index')}}" class="nav-link {{ (request()->is('admin/course-category*')) ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Category</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{Route('admin.courses.index')}}" class="nav-link {{ (request()->is('admin/courses*')) ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Course</p>
          </a>
        </li>
      </ul>
    </li>
   
    <li class="nav-item">
      <a href="{{route('admin.university.index')}}" class="nav-link {{ (request()->is('admin/university*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>Universities</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.blog.index')}}" class="nav-link {{ (request()->is('admin/blog*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>Blogs</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('admin.level.index')}}" class="nav-link {{ (request()->is('admin/level*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>Level</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('admin.student-enquiry.index')}}" class="nav-link {{ (request()->is('admin/student-enquiry*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>Student Enquiry</p>
      </a>
    </li>


  </ul>
</nav>