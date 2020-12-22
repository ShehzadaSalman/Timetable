<div class="sidebar" data-color="red" data-image="assets/img/sidebar-5.jpg">

  

<div class="sidebar-wrapper">
    <div class="logo">
        <a href="/home" class="simple-text" style = "display: flex; ">
        <i class="pe-7s-display1" style = "font-size: 32px; margin-right: 10px;"></i>
          <strong>TimeTable Maker</strong>
        </a>
    </div>

    <ul class="nav">
    <li class={{ $dashboard ?? 'not-active' }}>
            <a href="/home">
                <i class="pe-7s-graph"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <!-- <li class={{ $manage ?? 'not-active' }}>
            <a href="manage">
                <i class="pe-7s-user"></i>
                <p>Manage admin</p>
            </a>
        </li> -->
        <li class={{ $timetable ?? 'not-active' }}>
            <a href="/slot">
                <i class="pe-7s-note2"></i>
                <p>Create a Time Table</p>
            </a>
        </li>
        <li class={{ $instructor ?? 'not-active' }}>
            <a href="/instructor">
                <i class="pe-7s-users"></i>
                <p>Teacher</p>
            </a>
        </li>
        <li class={{ $department ?? 'not-active' }}>
            <a href="department">
                <i class="pe-7s-culture"></i>
                <p>Department</p>
            </a>
        </li>
        <li class={{ $semester ?? 'not-active' }}>
            <a href="semester">
                <i class="pe-7s-bookmarks"></i>
                <p>Class</p>
            </a>
        </li>
        <li class={{ $course ?? 'not-active' }}>
            <a href="course">
                <i class="pe-7s-notebook"></i>
                <p>Subject</p>
            </a>
        </li>
        <li class={{ $room ?? 'not-active'  }}>
            <a href="room">
                <i class="pe-7s-box2"></i>
                <p>Room</p>
            </a>
        </li>
        <li class="">
            <a target = "_blank" href="https://shehzada-salman072.medium.com/timetable-maker-documentation-95dfbcd9c439">
                <i class="pe-7s-study"></i>
                <p>How To Use This</p>
            </a>
        </li>

        <!-- <li class="">
    <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            <i class="pe-7s-back"></i>
            <p>{{ __('Logout') }} </p>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
    </form>
        </li> -->



    </ul>
</div>



</div>
