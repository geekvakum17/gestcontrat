<body class="">
	
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="<?php echo $url ?>../../public/assets/images/user/users.png" alt="User-Profile-Image">
						<div class="user-details">
							<div id="more-details"><?php echo $User_pseudo  ?> <i class="fa fa-caret-down"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-inline">
							<li class="list-inline-item"><a href="./?page=out" data-toggle="tooltip" title="se deconnecter" class="text-danger"><i class="feather icon-power"></i></a></li>
						</ul>
					</div>
				</div><br><br><br>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<center><h2>MENU</h2></center>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">AJOUTS</span></a>
						<ul class="pcoded-submenu">
							<li><a href="./?page=newscontrat">Nouveau Contrat</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">LISTES</span></a>
						<ul class="pcoded-submenu">
							<li><a href="layout-horizontal.html" target="_blank">Liste Des Contrats</a></li>
							<li><a href="layout-horizontal-2.html" target="_blank">Liste Des Demandes De Renouvellement de Contrat</a></li>
							<li><a href="layout-horizontal-rtl.html" target="_blank">Liste Des Demandes De carte</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->