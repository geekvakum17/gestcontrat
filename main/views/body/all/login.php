

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">

						<img src="<?php echo $url ?>../../public/assets/images/aej.png" alt="" class="img-fluid mb-4">
						<h3 class="mb-3 f-w-400"><strong>Bienvenu dans</strong></h3>
						<h4 class="mb-3 f-w-400"><strong>L'Espace des Entreprises</strong></h4><br>
						<h4 class="mb-3 f-w-400">Identifiez-vous</h4>
						<form  method="POST" id="login-form" action="./?page=user" action="#!">
						<div class="form-group mb-3">
							<label class="floating-label" for="Email">Raison social</label>
							<input type="text" class="form-control" name="raisonsociale" id="raisonsociale" placeholder="" required>
						</div>
						<div class="form-group mb-4">
							<label class="floating-label" for="Password">Password</label>
							<input type="password" class="form-control" name="password" id="Password" placeholder="" required>
						</div>
						<button class="btn btn-block btn-primary mb-4">S'identifier</button>
						<p class="mb-0 text-muted">Vous n’avez pas de compte? <a href="auth-signup.html" class="f-w-400">Inscrivez-vous</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->


