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
							<button class="btn btn-block btn-success mb-4">S'identifier</button>
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
                <form action="./?page=user" method="POST">
                <input type="hidden" name="instruction" value="addentreprise"/>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Name">RAISON SOCIAL DE L'ENTREPRISE</label>
                                <input type="text" class="form-control" name="raisonsociale" id="raisonsociale" required placeholder="" maxlength="70">
                                <?php $date = date("Y");
                                $result = $UserRequest->gestnumber();
                                $nbre = $result[0]['nbre'];
                                $code = "ENTRE".$date.($nbre+1); ?>
                                <input type="hidden" class="form-control" name="codeEts" id="codeEts" value="<?php echo $code ?>"  required readonly="readonly">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Name">ACTIVITE PRINCIPALE</label>
                                <input type="text" class="form-control" name="activiteprincipale"  id="activiteprincipale" required placeholder="" maxlength="70">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Sex">BRANCHE D'ACTIVITE</label>
                                <?php $result = $UserRequest->listbrancheactiv(); ?>
                                <select class="form-control" name="brancheactivite" id="brancheactivite">
                                <?php foreach($result as $data):?>
                                    <option selected="selected" value="<?php echo $data['lib_branche_activ'];?>"><?php echo $data['lib_branche_activ'];?></option>
                                <?php endforeach?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Name">NOM ET PRENOM DE LA PERSONNE AGISSANT POUR LE COMPTE DE L'EMPLOYEUR</label><br>
                                <input type="text" class="form-control" name="nomprenomsemployeur"  id="nomprenomsemployeur" required placeholder="" maxlength="70">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Name">QUALITE</label>
                                <input type="text" class="form-control" name="qualitemployeur"  id="qualitemployeur" required placeholder="" maxlength="30">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Name">N° CNPS DE L'EMPLOYEUR</label>
                                <input type="text" class="form-control" name="numcnps"  id="numcnps" required placeholder="" maxlength="30">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Name">N° CC 'EMPLOYEUR</label>
                                <input type="text" class="form-control" name="compteContribuable"  id="compteContribuable" required placeholder="" maxlength="30">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Sex">LOCALITE&nbsp;&nbsp;&nbsp;<span  data-toggle="tooltip" data-placement="top" title="lieux d'habitation" >?</span></label>
                                <?php $result = $UserRequest->listecommune(); ?>
                                <select class="form-control" name="communeentreprise" id="communeentreprise">
                                <?php foreach($result as $data):?>
                                    <option selected="selected" value="<?php echo $data['vil'];?>"><?php echo $data['vil'];?></option>
                                <?php endforeach?>
                                </select>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Sex">SOUS-PREFECTURE</label>
                                <?php $result = $UserRequest->listessousprefecture(); ?>
                                <select class="form-control" name="sousprefectureentreprise" id="sousprefectureentreprise">
                                <?php foreach($result as $data):?>
                                    <option selected="selected" value="<?php echo $data['lib_sousprefecture'];?>"><?php echo $data['lib_sousprefecture'];?></option>
                                <?php endforeach?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Name">ADRESSE</label>
                                <input type="text" class="form-control" id="adresse" name="adresse" required placeholder="" maxlength="20">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Name">TELEPHONE</label>
                                <input type="text" class="form-control" id="telephonentreprise" name="telephonentreprise" required placeholder="" maxlength="15">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Name">FAX</label>
                                <input type="text" class="form-control" id="faxentreprise" name="faxentreprise" required placeholder="" maxlength="15">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Name">CONTACT DE L'ENTREPRISE</label>
                                <input type="text" class="form-control" id="contactemployeur" name="contactemployeur" required placeholder="" maxlength="20">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Sex">DIVISION REGIONALE</label>
                                <?php $result = $UserRequest->listagenceregionale(); ?>
                                <select class="form-control" name="agenceregionale" id="agenceregionale">
                                <?php foreach($result as $data):?>
                                    <option selected="selected" value="<?php echo $data['agence_regionale'];?>"><?php echo $data['agence_regionale'];?></option>
                                <?php endforeach?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label" for="Address">LOCALISATION PRECISE DE L'ENTREPRISE</label>
                                <textarea class="form-control" name="localisation"  id="localisation" required rows="2" maxlength="100"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Sex">SECTEUR D'ACTIVITE</label>
                                <?php $result = $UserRequest->listsecteuractiv(); ?>
                                <select class="form-control" name="secteurbrancheactivite" id="secteurbrancheactivite">
                                <?php foreach($result as $data):?>
                                    <option selected="selected" value="<?php echo $data['lib_secteur'];?>"><?php echo $data['lib_secteur'];?></option>
                                <?php endforeach?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Name">DATE D'ENREGISTREMENT</label>
                                <input type="text" class="form-control" name="dateinscription"  id="dateinscription" readonly="readonly" value="<?php $date=date("Y-m-d"); echo $date ?>" required>
                                <input type="hidden" name="verif" value="1"/>
                                <input type="hidden" name="id_type_user" value="1"/>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label" for="Email">ADRESSE EMAIL</label>
                                <input type="email" class="form-control" name="emailentrep"  id="emailentrep" placeholder="" required maxlength="50">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label" for="Password">MOT DE PASSE</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="" required maxlength="11">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label" for="Password">CONFIRMER VOTRE MOT DE PASSE</label>
                                <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="" maxlength="11" required>
                            </div>
                        </div><br><br><br><br><br><br><br>
                        <script>
                                                
                           $('[name="password"], [name="password_confirm"]').on('keyup change', function () {
                            if ($('[name="password"]').val() !== $('[name="password_confirm"]').val()) {
                                $('#error-message').fadeOut().remove();
                            $('<span id="error-message">mot de passe non identique.</span>').css('color', 'red').insertAfter($('[name="password_confirm"]'));
                                $('form').find('button[type="submit"]').attr('disabled', true);
                        } else {
                                    $('#error-message').fadeOut();
                                $('form').find('button[type="submit"]').attr('disabled', false);
                            }
                        });
                        </script>

                        <div class="col-sm-12">
                            <button class="btn btn-danger" type="button" class="close" data-dismiss="modal" aria-label="Close" style=" margin-left: 25%">ANNULER</button>
                        
                            <button class="btn btn-primary" style=" margin-left: 30%">ENREGISTRER</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
