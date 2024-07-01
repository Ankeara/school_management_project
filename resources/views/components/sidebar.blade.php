<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                    xml:space="preserve">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                </svg>
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashbohfghfgard</span><span class="sr-only">(current)</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="dashboard">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="./index.html"><span class="ml-1 item-text">Default</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./dashboard-analytics.html"><span
                                class="ml-1 item-text">Analytics</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./dashboard-sales.html"><span
                                class="ml-1 item-text">E-commerce</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./dashboard-saas.html"><span class="ml-1 item-text">Saas
                                Dashboard</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./dashboard-system.html"><span
                                class="ml-1 item-text">Systems</span></a>
                    </li>
                </ul>
            </li>
        </ul>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Components</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ url('/students') }}">
                    <i class="fe fe-24 fe-users fe-16"></i>
                    <span class="ml-3 item-text">Student</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ url('/teachers') }}">
                    <i class="fe fe-24 fe-user fe-16"></i>
                    <span class="ml-3 item-text">teacher</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ url('/courses') }}">
                    <i class="fe fe-24 fe-file fe-16"></i>
                    <span class="ml-3 item-text">courses</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ url('/batches') }}">
                    <i class="fe fe-24 fe-target fe-16"></i>
                    <span class="ml-3 item-text">Batches</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ url('/enrollments') }}">
                    <i class="fe fe-24 fe-sun fe-16"></i>
                    <span class="ml-3 item-text">Enrollment</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ url('/payments') }}">
                    <i class="fe fe-24 fe-dollar-sign fe-16"></i>
                    <span class="ml-3 item-text">Payment</span>
                </a>
            </li>

        </ul>

    </nav>
</aside>
