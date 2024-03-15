<header class="layout-header">
	<div class="top-bar">
		<div class="container-lg">
			<div class="row justify-content-end align-items-center no-gutters">
				<div class="col-auto">
					<div class="nav-size" data-aos="fade-left">
						<div class="row align-items-center no-gutters">
							<div class="col-auto"><label class="label">ขนาด</label></div>
							<div class="col">
								<div class="hstack">
									<a href="javascript:void(0)" id="fontSizeSmall" class="size-small" title="ขนาดอักษรเล็ก" target="_self">ก</a>
									<a href="javascript:void(0)" id="fontSizeMedium" class="size-medium active" title="ขนาดอักษรกลาง" target="_self">ก</a>
									<a href="javascript:void(0)" id="fontSizeLarge" class="size-large" title="ขนาดอักษรใหญ่" target="_self">ก</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-auto">
					<div class="nav-lang" data-aos="fade-left">
						<div class="row align-items-center no-gutters">
							<div class="col">
								<div class="hstack">
									<a title="TH" class="nav-lang-th active" target="_self" href="/">TH</a>
									<a title="EN" class="nav-lang-en" target="_self" href="/">EN</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg">
		<div class="container-lg">
			<a class="navbar-brand" href="index.php">Navbar Brand</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="news.php">News</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">offcanvas</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
							Dropdown
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tutorials
							<span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a tabindex="-1" href="#">HTML</a></li>
							<li><a tabindex="-1" href="#">CSS</a></li>
							<li class="dropdown-submenu">
								<a class="test" tabindex="-1" href="#">New dropdown <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a tabindex="-1" href="#">2nd level dropdown</a></li>
									<li><a tabindex="-1" href="#">2nd level dropdown</a></li>
									<li class="dropdown-submenu">
										<a class="test" href="#">Another dropdown <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="#">3rd level dropdown</a></li>
											<li><a href="#">3rd level dropdown</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</ul>
				<form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-primary" type="submit">Search</button>
				</form>
			</div>
		</div>
	</nav>
	<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasExample" data-backdrop="false" aria-labelledby="offcanvasExampleLabel">
		<div class="offcanvas-header">
			<h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
			<button type="button" class="btn-close text-reset" data-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
			<div>
				Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
			</div>
			<div class="dropdown mt-3">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
					Dropdown button
				</button>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<li><a class="dropdown-item" href="#">Action</a></li>
					<li><a class="dropdown-item" href="#">Another action</a></li>
					<li><a class="dropdown-item" href="#">Something else here</a></li>
				</ul>
			</div>
		</div>
	</div>
</header>