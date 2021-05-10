<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
			
            <div class="m-header">
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
                <a href="#!" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <img src="<?php echo $url ?>../../public/assets/images/aej.png"  style="width:100px; height:70px;" alt="" class="rounded-Corners">
                </a>
                
            </div><br>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <div class="search-bar">
                            <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li>
                        <div class="dropdown drp-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="feather icon-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-notification">
                                <div class="pro-head">
                                    <img src="<?php echo $url ?>../../public/assets/images/user/users.png" class="img-radius" alt="User-Profile-Image">
                                    <span><?php echo $User_pseudo  ?></span>
                                    <a href="./?page=out" class="dud-logout" title="Logout">
                                        <i class="feather icon-log-out"></i>
                                    </a>
                                </div>
                                <ul class="pro-body">
                                    <li><a href="./?page=out" class="dropdown-item"><i class="feather icon-lock"></i> se deconnecter</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            
        
</header>
<!-- [ Header ] end -->