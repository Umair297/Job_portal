<!doctype html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="public/dashboard/assets/"
  data-template="vertical-menu-template"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Job_Portal</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="public/dashboard/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="public/dashboard/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="public/dashboard/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="public/dashboard/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->

    <link rel="stylesheet" href="public/dashboard/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="public/dashboard/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />

    <link rel="stylesheet" href="public/dashboard/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="public/dashboard/assets/vendor/libs/node-waves/node-waves.css" />

    <link rel="stylesheet" href="public/dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="public/dashboard/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="public/dashboard/assets/vendor/libs/sweetalert2/sweetalert2.css" />
    <link rel="stylesheet" href="public/dashboard/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="public/dashboard/assets/vendor/libs/@form-validation/form-validation.css" />
 
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css"/>
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="public/dashboard/assets/vendor/js/helpers.js"></script>
  
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="public/dashboard/assets/vendor/js/template-customizer.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <script src="public/dashboard/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                    fill="#7367F0" />
                  <path
                    opacity="0.06"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                    fill="#161616" />
                  <path
                    opacity="0.06"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                    fill="#161616" />
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                    fill="#7367F0" />
                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
              <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
    @php
        $user = Auth::user(); // Get the authenticated user
    @endphp

    <!-- Always show Dashboard to all users -->
    <li class="menu-item active">
        <a href="{{ route('home') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Dashboards">Dashboards</div>
        </a>
    </li>

    @if($user)
        @if($user->role === 'Admin')
            <!-- Admin can see everything -->
            <li class="menu-item active">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Users">Users</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('user.index') }}" class="menu-link">
                            <div data-i18n="List">List</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item active">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Company Register">Company Register</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('companies.index') }}" class="menu-link">
                            <div data-i18n="List">List</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item active">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                    <div data-i18n="Jobs">Jobs</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('jobs.list') }}" class="menu-link">
                            <div data-i18n="List">List</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item active">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Candidates">Candidates</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('job.applications.index') }}" class="menu-link">
                            <div data-i18n="List">List</div>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Admin-only sections -->
           

            <li class="menu-item active">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-notebook"></i>
                    <div data-i18n="Blogs">Blogs</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('blogs.index') }}" class="menu-link">
                            <div data-i18n="List">List</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item active">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-book"></i>
                    <div data-i18n="Tutorials">Tutorials</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('tutorials.index') }}" class="menu-link">
                            <div data-i18n="List">List</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item active">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-message-question"></i>
                    <div data-i18n="FAQ">FAQ</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('questions.index') }}" class="menu-link">
                            <div data-i18n="List">List</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item active">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i style="margin-right: 12px;" class="bi bi-cash-stack"></i>
                    <div data-i18n="Pricing">Pricing</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('subscribers') }}" class="menu-link">
                            <div data-i18n="List">List</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item active">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-address-book"></i>
                    <div data-i18n="Contacts">Contacts</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('contacts.index') }}" class="menu-link">
                            <div data-i18n="List">List</div>
                        </a>
                    </li>
                </ul>
            </li>
          


        @elseif($user->role === 'Job_uploader')
            <!-- Job Uploader can see Company Register, Jobs, and Candidates -->
            <li class="menu-item active">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Company Register">Company Register</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('companies.index') }}" class="menu-link">
                            <div data-i18n="List">List</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item active">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                    <div data-i18n="Jobs">Jobs</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('jobs.list') }}" class="menu-link">
                            <div data-i18n="List">List</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item active">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Candidates">Candidates</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('job.applications.index') }}" class="menu-link">
                            <div data-i18n="List">List</div>
                        </a>
                    </li>
                </ul>
            </li>

        @elseif($user->role === 'Job_seeker' || $user->role === 'Staff')
            <!-- Job Seeker & Staff can ONLY see Dashboard -->
            <!-- No extra items needed -->
        @endif
    @endif
</ul>

        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="ti ti-menu-2 ti-md"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
             

              <ul class="navbar-nav flex-row align-items-center ms-auto">
              
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow p-0"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="public/dashboard/assets/img/avatars/1.png" alt class="rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item mt-0" href="pages-account-settings-account.html">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0 me-2">
                            <div class="avatar avatar-online">
                              <img src="public/dashboard/assets/img/avatars/1.png" alt class="rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-0">{{auth()->user()->name}}
                            </h6>
                            <small class="text-muted">{{auth()->user()->role}}</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider my-1 mx-n2"></div>
                    </li>
                    <li>
                    <div class="d-grid px-2 pt-2 pb-1">
                                    <!-- Dashboard Button -->
                                    <a href="http://localhost/job_portal/" class="btn btn-sm btn-primary d-flex" style="background-color:rgb(82, 93, 247); border-color: none; color: white; font-family: 'Catamaran', sans-serif;">
                                        <small class="align-middle">Home</small>
                                        <i class="ti ti-dashboard ms-2 ti-14px"></i>
                                    </a>
                                </div>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="ti ti-logout me-3 ti-md"></i>
                                            <span class="align-middle">Logout</span>
                                        </a>
                                      
                                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>

            <!-- Search Small Screens -->
            <div class="navbar-search-wrapper search-input-wrapper d-none">
              <input
                type="text"
                class="form-control search-input container-xxl border-0"
                placeholder="Search..."
                aria-label="Search..." />
              <i class="ti ti-x search-toggler cursor-pointer"></i>
            </div>
          </nav>

          <!-- / Navbar -->

         <!-- Content wrapper -->
         <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="public/dashboard/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="public/dashboard/assets/vendor/libs/popper/popper.js"></script>
    <script src="public/dashboard/assets/vendor/js/bootstrap.js"></script>
    <script src="public/dashboard/assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="public/dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="public/dashboard/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="public/dashboard/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="public/dashboard/assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="public/dashboard/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="public/dashboard/assets/vendor/libs/moment/moment.js"></script>
    <script src="public/dashboard/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
    <script src="public/dashboard/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="public/dashboard/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="public/dashboard/assets/vendor/libs/select2/select2.js"></script>
    <script src="public/dashboard/assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="public/dashboard/assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="public/dashboard/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="public/dashboard/assets/vendor/libs/@form-validation/auto-focus.js"></script>

    <!-- Main JS -->
    <script src="public/dashboard/assets/js/main.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>
    <!-- Page JS -->
    <script src="public/dashboard/assets/js/modal-edit-user.js"></script>
    <script src="public/dashboard/assets/js/modal-edit-cc.js"></script>
    <script src="public/dashboard/assets/js/modal-add-new-cc.js"></script>
    <script src="public/dashboard/assets/js/modal-add-new-address.js"></script>
    <script src="public/dashboard/assets/js/app-ecommerce-customer-detail.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>

    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

  </body>
</html>