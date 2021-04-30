
	<section class="full-width pageContent">
		<!-- navBar -->
		<div class="full-width navBar">
			<div class="full-width navBar-options">
				<i class="zmdi zmdi-swap btn-menu" id="btn-menu" tabindex="0"></i>	
				<div class="mdl-tooltip" for="btn-menu" data-upgraded=",MaterialTooltip" style="left: 329px; margin-left: -50px; top: 55px;">Hide / Show MENU</div>
				<nav class="navBar-options-list">
					<ul class="list-unstyle">
											
						<li class="btn-exit" id="btn-exit" tabindex="0">
							<i class="zmdi zmdi-power" ></i>
							<div class="mdl-tooltip" for="btn-exit" data-upgraded=",MaterialTooltip">LogOut</div>
						</li>
						<li class="text-condensedLight noLink"><small>{{Auth::user()->nombreuser}}</small></li>
						<li class="noLink">
							<figure>
							<img src="{{asset('imagenes/usuarios/'.Auth::user()->imagen)}}" alt="Avatar" class="img-responsive mCS_img_loaded">
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
<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body mCustomScrollbar _mCS_3 mCS-autoHide mCS_no_scrollbar"><div  class="mCustomScrollBox mCS-light-thin mCSB_vertical mCSB_inside" tabindex="0" style="max-height: 100%;"><div id="mCSB_3_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
			<div class="full-width navLateral-body-logo text-center tittles">
			<a href="/"><img src="imagenes/logo.png" width="150px" height="70px" href="/"></a>
				<i class="zmdi zmdi-close btn-menu"></i> 
			</div>
			<figure class="full-width navLateral-body-tittle-menu">
				<div>
				<img src="{{asset('imagenes/usuarios/'.Auth::user()->imagen)}}" alt="Avatar" class="img-responsive mCS_img_loaded">
				</div>
				<figcaption>
					<span>
					{{Auth::user()->rolnombre}}<br>
						<small>{{Auth::user()->nombreuser}}</small>
					</span>
				</figcaption>
			</figure>
			<nav class="full-width">
				<ul class="full-width list-unstyle menu-principal">
				<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-store"></i>
							</div>
							<div class="navLateral-body-cr">
								PRINCIPAL
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
						<li @click="menu=0" class="full-width">
								<a href="#" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-view-dashboard"></i>
									</div>
									<div class="navLateral-body-cr">
										HOME
									</div>
								</a>
							</li>
						</ul>
					</li>
				
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
							<i class="zmdi zmdi-store"></i>
							</div>
							<div class="navLateral-body-cr">
								ALMACEN
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">	
						<li @click="menu=16" class="full-width">
								<a href="#" class="full-width">
							<div class="navLateral-body-cl">
							<i class="zmdi zmdi-washing-machine"></i>
							</div>
							<div class="navLateral-body-cr">
								PRODUCTOS
							</div>
						</a>
							</li>
							<li @click="menu=14" class="full-width">
								<a href="#" class="full-width">
									<div class="navLateral-body-cl">
									<i class="zmdi zmdi-card"></i>
									</div>
									<div class="navLateral-body-cr">
										REGISTRAR PEDIDO
									</div>
								</a>
							</li>						
						</ul>
					</li>
					
					
				
				
				</ul>
			</nav>
		
	</section>