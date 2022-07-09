<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <body style="background-color: #153F59;">
	</body>
	<div class="container h-100">
	<h1 align="center"><b><FONT COLOR="white">License Alert System </FONT></b></h1>
		<div class="row h-100 justify-content-center align-items-center">
			<div class="card">
         <div align="center"> <img src="../images/logo.png" width="60%" height="60%"></div>
            <?php if(!empty($mensaje)): ?>
              <div class="alert alert-danger" role="alert">
                 <?php echo $mensaje; ?>
              </div>
            <?php endif; ?>
				<div class="card-body">
					<form form action = "login.php?action=validate" method="POST">
						<input type="hidden" class="hide" id="csrf_token" name="csrf_token" value="C8nPqbqTxzcML7Hw0jLRu41ry5b9a10a0e2bc2">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Email</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-envelope-open-o" aria-hidden="true"></i></span>
										</div>
										<input input type="email" name="correo"  class="form-control" placeholder="Correo electrónico" required="required" >
									</div>
									<div class="help-block with-errors text-danger"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Contraseña</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-unlock" aria-hidden="true"></i></span>
										</div>
										<input input type="password" name="contrasena" class="form-control" placeholder="**************" required="required">
									</div>
									<div class="help-block with-errors text-danger"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<input type="hidden" name="redirect" value="">
								<button type="submit"  class="btn btn-primary btn-lg btn-block">Login</button>
							</div>
						</div>
					</form>
					<!------<div class="clear"></div>
					<i class="fa fa-undo fa-fw"></i> ¿Se te olvidó tu contraseña? <a href="login.php?action=recuperar">Recupérala</a>
				---------->
				</div>
			</div>
		</div>
	</div>