<section class="full-width pageContent">
		<!-- navBar -->
		<div class="full-width navBar">
			<div class="full-width navBar-options">
				<i class="zmdi zmdi-swap btn-menu" id="btn-menu" tabindex="0"></i>	
				<div class="mdl-tooltip" for="btn-menu" data-upgraded=",MaterialTooltip" style="left: 329px; margin-left: -50px; top: 55px;">Hide / Show MENU</div>
				<nav class="navBar-options-list">
					<ul class="list-unstyle">
						<li class="btn-Notification" id="notifications" tabindex="0">
							<i class="zmdi zmdi-notifications"></i>
							<div class="mdl-tooltip" for="notifications" data-upgraded=",MaterialTooltip">Notifications</div>
						</li>
						<li class="btn-exit" id="btn-exit" tabindex="0">
							<i class="zmdi zmdi-power"></i>
							<div class="mdl-tooltip" for="btn-exit" data-upgraded=",MaterialTooltip">LogOut</div>
						</li>
						<li class="text-condensedLight noLink"><small>User Name</small></li>
						<li class="noLink">
							<figure>
								<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive mCS_img_loaded">
							</figure>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<div >
		@yield('contenido')
		</div>
</section>
<div id="mCSB_2_scrollbar_vertical" class="mCSB_scrollTools mCSB_2_scrollbar mCS-dark-thin mCSB_scrollTools_vertical" style="display: block;"><a href="#" class="mCSB_buttonUp" style="display: block;"></a><div class="mCSB_draggerContainer"><div id="mCSB_2_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 439px; max-height: 521px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div><a href="#" class="mCSB_buttonDown" style="display: block;"></a></div>
<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body mCustomScrollbar _mCS_3 mCS-autoHide mCS_no_scrollbar"><div  class="mCustomScrollBox mCS-light-thin mCSB_vertical mCSB_inside" tabindex="0" style="max-height: 541px;"><div id="mCSB_3_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
			<div class="full-width navLateral-body-logo text-center tittles">
				<i class="zmdi zmdi-close btn-menu"></i> FUNDIACERO S.A. 
			</div>
			<figure class="full-width navLateral-body-tittle-menu">
				<div>
					<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive mCS_img_loaded">
				</div>
				<figcaption>
					<span>
					Personal<br>
						<small>{{Auth::user()->usuario}}</small>
					</span>
				</figcaption>
			</figure>
			<nav class="full-width">
				<ul class="full-width list-unstyle menu-principal">
					<li @click="menu=13" class="full-width">
						<a href="#" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-view-dashboard"></i>
							</div>
							<div class="navLateral-body-cr">
								HOME
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li @click="menu=1" class="full-width">
								<a href="#" class="full-width">
									<div class="navLateral-body-cl">
									<i class="zmdi zmdi-label"></i>										
									</div>
									<div class="navLateral-body-cr">
										AREAS
									</div>
								</a>
							</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
							<i class="zmdi zmdi-store"></i>
							</div>
							<div class="navLateral-body-cr">
								ALMACEN PRINCIPAL
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">	
						<li @click="menu=2" class="full-width">
								<a href="#" class="full-width">
							<div class="navLateral-body-cl">
							<i class="zmdi zmdi-washing-machine"></i>
							</div>
							<div class="navLateral-body-cr">
								PRODUCTOS
							</div>
						</a>
							</li>						
						</ul>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-face"></i>
							</div>
							<div class="navLateral-body-cr">
								USERS
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="admin.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-account"></i>
									</div>
									<div class="navLateral-body-cr">
										ADMINISTRATORS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="client.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-accounts"></i>
									</div>
									<div class="navLateral-body-cr">
										CLIENT
									</div>
								</a>
							</li>
						</ul>
					</li>
					
					<li @click="menu=0" class="full-width">
						<a href="#" class="full-width">
							<div class="navLateral-body-cl">
							<i class="zmdi zmdi-balance"></i>
							</div>
							<div class="navLateral-body-cr">
								DASHBOARD
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="sales.html" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
							<div class="navLateral-body-cr">
								SALES
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="inventory.html" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-store"></i>
							</div>
							<div class="navLateral-body-cr">
								INVENTORY
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-wrench"></i>
							</div>
							<div class="navLateral-body-cr">
								SETTINGS
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="#!" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr">
										OPTION
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="#!" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr">
										OPTION
									</div>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
		
	</section>