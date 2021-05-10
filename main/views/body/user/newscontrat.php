
	

<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Form Wizard</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Form Components</a></li>
                            <li class="breadcrumb-item"><a href="#!">Form Wizard</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Smart-Wizard ] start -->
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5>Wizard with Progress</h5>
                    </div>
                    <div class="card-body">
                        <div class="bt-wizard" id="progresswizard">
                            <ul class="nav nav-pills nav-fill mb-3">
                                <li class="nav-item"><a href="#progress-t-tab1" class="nav-link" data-toggle="tab">IDENTIFICATION DU TRAVAILLEUR</a></li>
                                <li class="nav-item"><a href="#progress-t-tab2" class="nav-link" data-toggle="tab">CONTENU DU CONTRAT</a></li>
                                <li class="nav-item"><a href="#progress-t-tab3" class="nav-link" data-toggle="tab">REMUNERATION</a></li>
                                <li class="nav-item"><a href="#progress-t-tab4" class="nav-link" data-toggle="tab">DIFFERENTS</a></li>
                            </ul>
                            <div id="bar" class="bt-wizard progress mb-3" style="height:6px">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"  style="width: 0%;"></div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active show" id="progress-t-tab1">
                                    <form>
                                    
                                        <div class="form-group row">
                                            <label for="progress-t-name" class="col-sm-3 col-form-label" >Non et Prénom <span style="color:red"; >*</span></label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="nomprenoms"  id="nomprenoms" placeholder="Nom et Prénom" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="progress-t-name" class="col-sm-3 col-form-label" >LIEUX DE NAISSANCE <span style="color:red"; >*</span></label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="lieunaissance"  id="lieunaissance" placeholder="Ex: Bondokou" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="progress-t-name" class="col-sm-3 col-form-label" >DATE DE NAISSANCE <span style="color:red"; >*</span></label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" name="datenaissance"  id="datenaissance" placeholder="Ex: 01-01-01" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="progress-t-sate" class="col-sm-3 col-form-label">SEXE <span style="color:red"; >*</span></label>
                                            <div class="col-sm-3">
                                                <select class="form-control" id="sexe" name="sexe">
                                                    <option selected="selected" value="HOMME">HOMME</option>
                                                    <option value="FEMME">FEMME</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="progress-t-name" class="col-sm-3 col-form-label" >FILIATION <span style="color:red"; >*</span></label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="nompere" id="nompere" placeholder="NOM DU PERE" required>
                                                <input type="text" class="form-control" name="nommere" id="nommere" placeholder="NOM DE LA MERE" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="progress-t-name" class="col-sm-3 col-form-label" >DOMICILE HABITUEL <span style="color:red"; >*</span>&nbsp;&nbsp;<span ; data-toggle="tooltip" data-placement="top" title="lieux de congé" >?</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="domicilehabituel" id="domicilehabituel" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="progress-t-sate" class="col-sm-3 col-form-label">COMMUNE&nbsp;&nbsp;&nbsp;<span  data-toggle="tooltip" data-placement="top" title="lieux d'habitation" >?</span></label>
                                            <div class="col-sm-3">
                                                <select class="form-control" name="communetravailleur" id="communetravailleur">
                                                <?php $result = $UserRequest->listecommune(); ?>
                                                <?php foreach($result as $data):?>
                                                   <option selected="selected" value="<?php echo $data['vil'];?>"><?php echo $data['vil'];?></option>
                                                <?php endforeach?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="progress-t-sate" class="col-sm-3 col-form-label">SOUS-PREFECTURE</label>
                                            <div class="col-sm-3">
                                                <select class="form-control" name="sousprefecturetravailleur" id="sousprefecturetravailleur">
                                                <?php $result = $UserRequest->listessousprefecture(); ?>
                                                  <?php foreach($result as $data):?>
                                                     <option selected="selected" value="<?php echo $data['lib_sousprefecture'];?>"><?php echo $data['lib_sousprefecture'];?></option>
                                                  <?php endforeach?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="progress-t-sate" class="col-sm-3 col-form-label">NATIONALITE <span style="color:red"; >*</span></label>
                                            <div class="col-sm-3">
                                                <select class="form-control" name="nationalite" id="nationalite">
                                                <?php $result = $UserRequest->listenationalite(); ?>
                                                  <?php foreach($result as $data):?>
                                                    <option selected="selected" value="<?php echo $data['nat'];?>"><?php echo $data['nat'];?></option>
                                                  <?php endforeach?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="progress-t-name" class="col-sm-3 col-form-label" >FONCTION <span style="color:red"; >*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="fonctiontravailleur" id="fonctiontravailleur" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="progress-t-name" class="col-sm-3 col-form-label" >BRANCHE PROFESSIONNELLE <span style="color:red"; >*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="brancheprofessionnelle" id="brancheprofessionnelle" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="progress-t-sate" class="col-sm-3 col-form-label">NOMBRE D'ENFANT A CHARGE <span style="color:red"; >*</span></label>
                                            <div class="col-sm-3">
                                                <select class="form-control" id="sexe" name="nombreenfants">
                                                    <option selected="selected" value=0>AUCUN</option>
                                                    <option value=1>1</option>
                                                    <option value=2>2</option>
                                                    <option value=3>3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="progress-t-name" class="col-sm-3 col-form-label" >NOM ET PRENOM DE LA PERSONNE A CONTACTER EN CAS DE NECESSITE <span style="color:red"; >*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="nomprenomspersonneurgence" id="nomprenomspersonneurgence" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="progress-t-name" class="col-sm-3 col-form-label" >ADRESSE DE LA PERSONNE A CONTACTER EN CAS DE NECESSITE <span style="color:red"; >*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="adressepersonneurgence" name="adressepersonneurgence" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="progress-t-name" class="col-sm-3 col-form-label" >CONTACT DE LA PERSONNE A CONTACTER EN CAS DE NECESSITE <span style="color:red"; >*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" iid="contactpersonneurgence" name="contactpersonneurgence" required>
                                            </div>
                                        </div><br><br><br>
                                </div>
                                <div class="tab-pane" id="progress-t-tab2">
                                 
                                        <div class="form-group row">
                                            <label for="progress-t-sate" class="col-sm-3 col-form-label">State</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="progress-t-sate">
                                                    <option>Select State</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="progress-t-address" class="col-sm-3 col-form-label">Address</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="progress-t-address" rows="3" spellcheck="false"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="progress-t-tab3">
                                    <form class="text-center">
                                        <i class="feather icon-check-circle display-3 text-success"></i>
                                        <h5 class="mt-3">Registration Done! . .</h5>
                                        <p>Lorem Ipsum is simply dummy text of the printing</p>
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Subscribe Newslatter</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="row justify-content-between btn-page">
                                    <div class="col-sm-6">
                                        <a href="#!" class="btn btn-primary button-previous">Previous</a>
                                    </div>
                                    <div class="col-sm-6 text-md-right">
                                        <a href="#!" class="btn btn-primary button-next">Next</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Smart-Wizard ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->
   
<script>
    $(document).ready(function() {
        $('#besicwizard').bootstrapWizard({
            withVisible: false,
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
            'firstSelector': '.button-first',
            'lastSelector': '.button-last'
        });
        $('#btnwizard').bootstrapWizard({
            withVisible: false,
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
            'firstSelector': '.button-first',
            'lastSelector': '.button-last'
        });
        $('#progresswizard').bootstrapWizard({
            withVisible: false,
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
            'firstSelector': '.button-first',
            'lastSelector': '.button-last',
            onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index + 1;
                var $percent = ($current / $total) * 100;
                $('#progresswizard .progress-bar').css({
                    width: $percent + '%'
                });
            }
        });
        $('#validationwizard').bootstrapWizard({
            withVisible: false,
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
            'firstSelector': '.button-first',
            'lastSelector': '.button-last',
            onNext: function(tab, navigation, index) {
                if (index == 1) {
                    if (!$('#validation-t-name').val()) {
                        $('#validation-t-name').focus();
                        $('.form-1').addClass('was-validated');
                        return false;
                    }
                    if (!$('#validation-t-email').val()) {
                        $('#validation-t-email').focus();
                        $('.form-1').addClass('was-validated');
                        return false;
                    }
                    if (!$('#validation-t-pwd').val()) {
                        $('#validation-t-pwd').focus();
                        $('.form-1').addClass('was-validated');
                        return false;
                    }
                }
                if (index == 2) {
                    if (!$('#validation-t-address').val()) {
                        $('#validation-t-address').focus();
                        $('.form-2').addClass('was-validated');
                        return false;
                    }
                }
            }
        });
        $('#tabswizard').bootstrapWizard({
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
        });
        $('#verticalwizard').bootstrapWizard({
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
        });
    });
</script>

