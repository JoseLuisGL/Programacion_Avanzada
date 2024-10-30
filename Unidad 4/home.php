<?php
include 'app/ProductController.php';
$ProductController = new ProductController();

	if (isset($_SESSION['user_id']) && $_SESSION['user_id']!=null) {
			
		$products = $ProductController->products();
		
	}else{

		header('Location: login.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Home
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
							<h2>Lista de productos</h2>
							<div class="row"> 
							<a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary">+Agregar</a>
                                <?php if (!empty($products)): ?>
                                    <?php foreach ($products as $product): ?>
                                    <div class="card m-1" style="width: 18rem;">
                                        <img src="<?= $product['cover'] ?>" class="card-img-top" alt="<?= $product['name'] ?>">
                                        <div class="card-body">
                                        <h5 class="card-title"><?= $product['name'] ?></h5>
                                        <p class="card-text"><?= $product['description'] ?></p>
                                        <a href="details/<?= $product['slug'] ?>" class="btn btn-primary">Detalles</a>
										<a data-bs-toggle="modal" data-bs-target="#staticBackdrop2" class="btn btn-primary edit-btn" data-slug="<?= $product['slug'] ?>">Editar</a>
										<a href="#" onclick="remove(<?= $product['id'] ?>)" class="btn btn-danger">Eliminar</a>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>No hay mass productoss</p>
                                <?php endif; ?>
							</div>
						</div>
					</div>
	 			</div>
	 		</div>
	 	</div>
	</div>
	<!-- Modal Agregar -->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="app/ProductController.php" method="POST" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Nombre</label>
						<input type="text" class="form-control" id="name" name="name" required>
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Slug</label>
						<input type="text" class="form-control" id="slug" name="slug" required>
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Descripcion</label>
						<input type="text" class="form-control" id="description" name="description" required>
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Features</label>
						<input type="text" class="form-control" id="features" name="features" required>
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Brands</label>
						<select class="form-control" name="brands" id="brands">
							<?php
								$brands = $ProductController->get_Brands();
								foreach ($brands as $brand) {
									echo "<option value=\"{$brand['id']}\">{$brand['name']}</option>";
								}
							?>
						</select>
					</div>
					<div class="mb-3">
						<label for="cover" class="form-label">Imagen del Producto</label>
						<input type="file" class="form-control" id="cover" name="cover" required>
					</div>
					<input type="hidden" name="action" value="create_product" />
					<div class="d-grid gap-2 col-6 mx-auto">
						<button class="btn btn-primary" type="submit">Agregar</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
			</div>
			</div>
		</div>
	</div>
	<!-- Modal Editar -->
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="app/ProductController.php" method="POST">
                    <div class="mb-3">
                        <label for="edit_nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="edit_slug" name="slug" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_description" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="edit_description" name="description" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_features" class="form-label">Características</label>
                        <input type="text" class="form-control" id="edit_features" name="features" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_brand" class="form-label">Marca:</label>
                        <select class="form-control" name="brand_id" id="edit_brand" required>
                            <?php
                            $brands = $ProductController->get_Brands();
                            foreach ($brands as $brand) {
                                echo "<option value=\"{$brand['id']}\">{$brand['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" id="edit_id" name="id" />
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                    </div>
                    <input type="hidden" name="action" value="edit_product" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

	<!-- Esto se tiene que hacer cuando se le da "OK" en la funcion remove() --->
	<form id="delete-form" action="app/ProductController.php" method="POST">
		<input type="hidden" name="action" value="remove_product" />
		<input type="hidden" id="delete-product-id" name="id" />
	</form>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>
    document.querySelectorAll(".edit-btn").forEach(button => {
        button.addEventListener("click", function() {
            const slug = this.getAttribute("data-slug");
           
            fetch(`app/ProductController.php?action=get_product&slug=${slug}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById("edit_name").value = data.name;
                    document.getElementById("edit_slug").value = data.slug;
                    document.getElementById("edit_description").value = data.description;
                    document.getElementById("edit_features").value = data.features;

					const brandSelect = document.getElementById("edit_brand");
        			brandSelect.value = data.brand_id;

					document.getElementById("edit_id").value = data.id; 
                })
                .catch(error => console.error("Error pa", error));
       	 	});
    	});
		function remove(productId){
			swal({
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this imaginary file!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
			})
			.then((willDelete) => {
			if (willDelete) {
				swal("Poof! Your imaginary file has been deleted!", {
				icon: "success",
				});
				document.getElementById("delete-product-id").value = productId;
                document.getElementById("delete-form").submit();
			} else {
				
			}
			});
		}
	</script>
</body>
</html>
