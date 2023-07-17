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
        <li class="nav-item ">
          <a href="{{route('admin.footer.edit-logo')}}" class="nav-link {{ (request()->is('admin/footer-edit-logo')) ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Footer Logo</p>
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
        <li class="nav-item">
          <a href="{{route('admin.uni-requested-course.index')}}" class="nav-link {{ (request()->is('admin/uni-requested-course')) ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Request Course</p>
          </a>
        </li>
      </ul>
    </li>
   

    <li class="nav-item">
      <a href="#" class="nav-link {{ (request()->is('admin/uni-requested-university')||request()->is('admin/uni-requested-university*')) ? 'active' : '' }}">
        <i class="nav-icon far fa-envelope"></i>
        <p>
          University
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
          <a href="{{route('admin.university.index')}}" class="nav-link {{ (request()->is('admin/university*')) ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Universities</p>
          </a>
        </li>
       
        <li class="nav-item">
          <a href="{{route('admin.uni-requested-university.index')}}" class="nav-link {{ (request()->is('admin/uni-requested-university*')) ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Request University</p>
          </a>
        </li>
      </ul>
    </li>
    
    
    <li class="nav-item">
      <a href="{{route('admin.about.index')}}" class="nav-link {{ (request()->is('admin/about*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>About</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('admin.footer.edit')}}" class="nav-link {{ (request()->is('admin/footer-edit')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>Footer</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.contact.edit')}}" class="nav-link {{ (request()->is('admin/contact*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>Contact</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('admin.blog.index')}}" class="nav-link {{ (request()->is('admin/blog*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>Blogs</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('admin.scholarship.index')}}" class="nav-link {{ (request()->is('admin/scholarship*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>Scholarships</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('admin.social-media.index')}}" class="nav-link {{ (request()->is('admin/social-media*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>Social Media</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('admin.level.index')}}" class="nav-link {{ (request()->is('admin/level*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>Level</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('admin.indexStudentEnquiry')}}" class="nav-link {{ (request()->is('admin/student-enquiry*')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>Student Enquiry</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.generalEnquiry')}}" class="nav-link {{ (request()->is('admin/general-enquiry')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-file"></i>
        <p>General Enquiry</p>
      </a>
    </li>


  </ul>
</nav>