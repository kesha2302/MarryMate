<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel</title>
  {{-- <link rel="shortcut icon" type="image/png" href="{{ asset('AdminPanel/assets/images/logos/favicon2.png')}}" /> --}}
  <link rel="stylesheet" href="{{ asset('AdminPanel/assets/css/styles.min.css')}}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <h3 class="mt-2"><b>MarryMate</b><br>Vendor/EM <br>AdminPanel</h3>
            {{-- <img src="{{ asset('AdminPanel/assets/images/logos/dark-logo.svg')}}" width="180" alt="" /> --}}
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{url('/OtherAdmin')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-layout-dashboard"></i>
                  </span>
                  <span class="hide-menu">Dashboard</span>
                </a>
              </li>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">COMPONENTS</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{url('/Admin_customersdetail')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-user"></i>
                  </span>
                  <span class="hide-menu">View Bookings</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="{{url('/Adminfeedback')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-message"></i>
                  </span>
                  <span class="hide-menu"> View Reviews </span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{url('/Services')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-news"></i>
                  </span>
                  <span class="hide-menu">Service Details</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{url('/Packages')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-book"></i>
                  </span>
                  <span class="hide-menu">Package Details</span>
                </a>
              </li>


              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">AUTH</span>
              </li>



              @auth
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{url('/ManageProfile')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-user"></i>
                  </span>
                  <span class="hide-menu">Manage Profile</span>
                </a>
              </li>

            <li class="nav-small-cap">

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf

                </form>
                <a class="sidebar-link" href="#" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span>
                        <i class="ti ti-logout"></i>
                    </span>
                    <span class="hide-menu">Logout</span>
                </a>
            </li>
            @else
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{url('/Adminlogin')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-login"></i>
                  </span>
                  <span class="hide-menu">Login</span>
                </a>
              </li>

            @endauth

            </ul>

          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!--  Sidebar End -->
      <!--  Main wrapper -->

      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">

