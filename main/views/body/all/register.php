
<!-- [ Main Content ] start -->
<div class="auth-wrapper">
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Form Validation ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-3 f-w-400"><strong><center>Bienvenu dans l'Espace des Entreprises</center></strong></h3>
						<br>
						<h4 class="mb-3 f-w-400">Inscrivez-vous</h4>
                    </div>
                    <div class="card-body">
                        <form id="validation-form123" action="./?page=user" method="POST">
                        <input type="hidden" name="instruction" value="addentreprise"/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">RAISON SOCIAL DE L'ENTREPRISE</label>
                                        <input type="text" class="form-control" name="raisonsociale" id="raisonsociale" required>
                                        <?php $date = date("Y");
                                        $result = $UserRequest->gestnumber();
                                        $nbre = $result[0]['nbre'];
                                        $code = "ENTRE".$date.($nbre+1); ?>
                                        <input type="hidden" class="form-control" name="codeEts" id="codeEts" value="<?php echo $code ?>"  required readonly="readonly">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">ACTIVITE PRINCIPALE</label>
                                        <input type="text" class="form-control" name="activiteprincipale" id="activiteprincipale" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">BRANCHE D'ACTIVITE</label>
                                        <?php $result = $UserRequest->listbrancheactiv(); ?>
                                        <select class="form-control" name="brancheactivite" id="brancheactivite">
                                            <?php foreach($result as $data):?>
                                             <option selected="selected" value="<?php echo $data['lib_branche_activ'];?>"><?php echo $data['lib_branche_activ'];?></option>
                                            <?php endforeach?>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">NOM ET PRENOM DE LA PERSONNE AGISSANT POUR LE COMPTE DE L'EMPLOYEUR</label>
                                        <input type="text" class="form-control" name="nomprenomsemployeur"  id="nomprenomsemployeur" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">QUALITE</label>
                                        <input type="text" class="form-control" name="qualitemployeur"  id="qualitemployeur" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">N° CNPS DE L'EMPLOYEUR</label>
                                        <input type="text" class="form-control" name="numcnps"  id="numcnps" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">N° CC 'EMPLOYEUR</label>
                                        <input type="text" class="form-control" name="compteContribuable"  id="compteContribuable" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">LOCALITE&nbsp;&nbsp;&nbsp;<span  data-toggle="tooltip" data-placement="top" title="lieux d'habitation" >?</span></label>
                                        <?php $result = $UserRequest->listecommune(); ?>
                                        <select class="form-control" name="communeentreprise" id="communeentreprise">
                                           <?php foreach($result as $data):?>
                                             <option selected="selected" value="<?php echo $data['vil'];?>"><?php echo $data['vil'];?></option>
                                             <?php endforeach?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">SOUS-PREFECTURE</label>
                                        <?php $result = $UserRequest->listessousprefecture(); ?>
                                        <select class="form-control" name="sousprefectureentreprise" id="sousprefectureentreprise">
                                            <?php foreach($result as $data):?>
                                                <option selected="selected" value="<?php echo $data['lib_sousprefecture'];?>"><?php echo $data['lib_sousprefecture'];?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">LOCALISATION PRECISE DE L'ENTREPRISE</label>
                                        <input type="text" class="form-control" name="localisation"  id="localisation" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">ADRESSE</label>
                                        <input type="text" class="form-control" id="adresse" name="adresse" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">TELEPHONE</label>
                                        <input type="text" class="form-control" id="telephonentreprise" name="telephonentreprise" placeholder="Phone: (999) 999-9999" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">FAX</label>
                                        <input type="text" class="form-control" id="faxentreprise" name="faxentreprise" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">CONTACT DE L'ENTREPRISE</label>
                                        <input type="text" class="form-control" id="contactemployeur" name="contactemployeur" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">DIVISION REGIONALE</label>
                                        <?php $result = $UserRequest->listagenceregionale(); ?>
                                        <select class="form-control" name="agenceregionale" id="agenceregionale">
                                            <?php foreach($result as $data):?>
                                                <option selected="selected" value="<?php echo $data['agence_regionale'];?>"><?php echo $data['agence_regionale'];?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">SECTEUR D'ACTIVITE</label>
                                        <?php $result = $UserRequest->listsecteuractiv(); ?>
                                        <select class="form-control" name="secteurbrancheactivite" id="secteurbrancheactivite">
                                            <?php foreach($result as $data):?>
                                                <option selected="selected" value="<?php echo $data['lib_secteur'];?>"><?php echo $data['lib_secteur'];?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">DATE D'ENREGISTREMENT</label>
                                        <input type="text" class="form-control" name="dateinscription"  id="dateinscription" readonly="readonly" value="<?php $date=date("Y-m-d"); echo $date ?>" required>
                                        <input type="hidden" name="verif" value="1"/>
                                        <input type="hidden" name="id_type_user" value="1"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">ADRESSE EMAIL</label>
                                        <input type="email" class="form-control" name="emailentrep"  id="emailentrep" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">MOT DE PASSE &nbsp;&nbsp;<span ; data-toggle="tooltip" data-placement="top" title="Mot de passe de votre espace" >?</span></label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">CONFIRMER VOTRE MOT DE PASSE</label>
                                        <input type="password" class="form-control" id="password" name="password_confirm">
                                    </div>
                                </div>
                            </div><br>
                            <center><button type="submit" class="btn btn-primary">ENREGISTRER</button></center>
                        </form>
                        <a href="./?page=login"><button class="btn btn-primary1" style=" margin: 10px 10% 10px 2%;">&nbsp;Retour</button></a>
                    </div>
                </div>
            </div>
            <!-- [ Form Validation ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
</div>
