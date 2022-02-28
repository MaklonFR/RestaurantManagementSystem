     
      <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/sale.png" alt="" height="24">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/sale.png" alt="" height="24"> <span class="logo-txt">Resto MyCafe</span>
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                    </div>

                    <div class="d-flex">
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon position-relative" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="bell" class="icon-lg"></i>
                                <span class="badge bg-danger rounded-pill">10</span>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-7.png"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium"><?php echo $user['nama']; ?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php?#"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                            </div>
                        </div>
            
                    </div>
                </div>
            </header>