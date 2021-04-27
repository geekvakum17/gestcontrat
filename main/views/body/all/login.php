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
						<form method="POST" id="login-form" action="./?page=user" action="#!">
							<input type="hidden" name="instruction" value="login" />
							<div class="form-group mb-3">
								<label class="floating-label" for="Email">Raison social</label>
								<input type="text" class="form-control" name="raisonsociale" id="raisonsociale" placeholder="" required>
							</div>
							<div class="form-group mb-4">
								<label class="floating-label" for="Password">Password</label>
								<input type="password" class="form-control" name="password" id="Password" placeholder="" required>
							</div>

							<?php
							if ((isset($_SESSION['error']) && !empty($_SESSION['error']) && $_SESSION['error'] == 1)) {
								echo "<span> la raison social ou le mot de passe est incorrect ! </span>";
								$_SESSION['error'] = 0;
							} else {
								echo " ";
							}

							?><br /><br />
							<button class="btn btn-block btn-primary mb-4">S'identifier</button>
							<p class="mb-0 text-muted">Vous n’avez pas de compte? <a href="#" data-toggle="modal" data-target="#modal-report" class="f-w-400">Inscrivez-vous</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->



	

        <!-- [ Main Content ] end -->
    </div>
</div>
<div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
			            <h3 class="mb-3 f-w-400"><strong><center>Inscrivez-vous</center></strong></h3><br><br><br>
						<h4 class="mb-3 f-w-400"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Name">Guardian Name</label>
                                <input type="text" class="form-control" id="Name" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label" for="Email">Email</label>
                                <input type="email" class="form-control" id="Email" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label" for="Password">Password</label>
                                <input type="password" class="form-control" id="Password" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Rollno">Children roll number</label>
                                <input type="text" class="form-control" id="Rollno" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label" for="Address">Address</label>
                                <textarea class="form-control" id="Address" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Sex">Select Sex</label>
                                <select class="form-control" id="Sex">
                                    <option value=""></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label" for="Icon">Profie Image</label>
                                <input type="file" class="form-control" id="Icon" placeholder="sdf">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Occupation">Occupation</label>
                                <input type="text" class="form-control" id="Occupation" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Age">Age</label>
                                <input type="text" class="form-control" id="Age" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-danger">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
