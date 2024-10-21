<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Agregar
	</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
  </head>
</head>
<body>
 	
	<div class=""> 
	 	
	 	<div class="container-fluid">
	 		<div class="row">
	 			<div class="col-2 p-0 m-0 d-none d-md-block">
	 				<div class="d-flex flex-column min-vh-100 flex-shrink-0 p-3 text-white bg-dark">
					    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
					      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
					      <span class="fs-4">Sidebar</span>
					    </a>
					    <hr>
					    <ul class="nav nav-pills  flex-column mb-auto">
					      <li class="nav-item">
					        <a href="#" class="nav-link active" aria-current="page">
					          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
					          Home
					        </a>
					      </li>
					      <li>
					        <a href="#" class="nav-link text-white">
					          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
					          Dashboard
					        </a>
					      </li>
					      <li>
					        <a href="#" class="nav-link text-white">
					          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
					          Orders
					        </a>
					      </li>
					      <li>
					        <a href="#" class="nav-link text-white">
					          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
					          Products
					        </a>
					      </li>
					      <li>
					        <a href="#" class="nav-link text-white">
					          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
					          Customers
					        </a>
					      </li>
					    </ul>
					    <hr>
					    <div class="dropdown">
					      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
					        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
					        <strong>Admin</strong>
					      </a>
					      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
					        <li><a class="dropdown-item" href="#">New project...</a></li>
					        <li><a class="dropdown-item" href="#">Settings</a></li>
					        <li><a class="dropdown-item" href="#">Profile</a></li>
					        <li><hr class="dropdown-divider"></li>
					        <li><a class="dropdown-item" href="#">Sign out</a></li>
					      </ul>
					    </div>
					</div>
	 			</div>
	 			<div class="col p-0 m-0">
	 				<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dar" data-bs-theme="dark">
					  <div class="container">
					    <a class="navbar-brand" href="#">Navbar</a>
					    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					      <span class="navbar-toggler-icon"></span>
					    </button>
					    <div class="collapse navbar-collapse" id="navbarNav">
					      <ul class="navbar-nav">
					        <li class="nav-item">
					          <a class="nav-link active" aria-current="page" href="#">Home</a>
					        </li>
					        <li class="nav-item">
					          <a class="nav-link" href="#">Features</a>
					        </li>
					        <li class="nav-item">
					          <a class="nav-link" href="#">Pricing</a>
					        </li>
					        <li class="nav-item">
					          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
					        </li>
					      </ul>
					    </div>
					    <form class="d-flex" role="search">
					      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					      <button class="btn btn-outline-success me-3" type="submit">Search</button>
					    </form>
					    <div class="dropdown">
					      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
					        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
					        <strong>Admin</strong>
					      </a>
					      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
					        <li><a class="dropdown-item" href="#">New project...</a></li>
					        <li><a class="dropdown-item" href="#">Settings</a></li>
					        <li><a class="dropdown-item" href="#">Profile</a></li>
					        <li><hr class="dropdown-divider"></li>
					        <li><a class="dropdown-item" href="#">Sign out</a></li>
					      </ul>
					    </div>
					  </div>
					</nav>
					<div id="main">
						<div class="container p-3"> 
                            <h2>
                                Agregar Producto
                            </h2>
							<form action="" method="">
								<div class="mb-3">
									<label for="name" class="form-label">Nombre del Producto</label>
									<input type="text" class="form-control" id="name" name="name" required>
								</div>
								<div class="mb-3">
									<label for="description" class="form-label">Descripción</label>
									<textarea class="form-control" id="description" name="description" rows="3" required></textarea>
								</div>
                                <div class="mb-3">
									<label for="features" class="form-label">Caracteristicas</label>
									<textarea class="form-control" id="features" name="features" rows="3" required></textarea>
								</div>
                                <div class="mb-3">
									<label for="brand" class="form-label">Marca</label>
									<input type="text" class="form-control" id="brand" name="brand" required>
								</div>
								<div class="mb-3">
									<label for="price" class="form-label">Precio</label>
									<input type="number" class="form-control" id="price" name="price" required>
								</div>
								<div class="mb-3">
									<label for="cover" class="form-label">Imagen del Producto</label>
									<input type="file" class="form-control" id="cover" name="cover" required>
								</div>
								<button type="submit" class="btn btn-primary">Agregar Producto</button>
							</form>
						</div>
					</div>
	 			</div>
	 		</div>
	 	</div>
		
		
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>