<?php 

$instruction = (isset($_POST["instruction"]) && !empty($_POST["instruction"]) && is_string($_POST["instruction"])) ? $_POST["instruction"] : "";
//var_dump($instruction);
switch($instruction) {
    case "login":
        
        // On récupère les infos du formulaire de connexion
        $raisonsociale = (isset($_POST["raisonsociale"]) && !empty($_POST["raisonsociale"]) && is_string($_POST["raisonsociale"])) ? $_POST["raisonsociale"] : "";
        $password = (isset($_POST["password"]) && !empty($_POST["password"]) && is_string($_POST["password"])) ? $_POST["password"] : "";
        // On récupère les infos correspondant aux données du formulaire de connexion dans la base de données
        var_dump($_POST);
        $User_profile = $UserRequest->authenticate_user($raisonsociale, $password);
        //var_dump($User_profile);
        // Si les informations de l'utilisateur sont retournées alors l'authentication est reussie
        if ($User_profile!==FALSE){
            foreach($User_profile as $User_info):
                // On ouvre une session avec ses paramètres retournées par la B.D.
                //session_start();
                $_SESSION['raisonsociale']= $User_info['raisonsociale'];
                $_SESSION['verif'] = $User_info['verif'];
                $_SESSION['id_user'] = $User_info['id_user'];
                $_SESSION['id_type_user'] = $User_info['id_type_user'];
              endforeach;
                if($_SESSION['verif']==0)
                {
                    $_SESSION["login"]=TRUE;
                    header($url1."?page=changidenty");
                }elseif($_SESSION['id_type_user']==2)
                {
                  $_SESSION["login"]=TRUE;
                  header($url1."?page=pageadmin");
                }else{
                    // On le redirige vers page d'accueil
                    $_SESSION["login"]=TRUE;
                    echo '<script> window.location.href="?page=menu"</script>';
                }
            }else{
               // Sinonerror=1rien est retourné alors l'authentification à échouée
               session_start();
               $_SESSION['error']='';
               $error=1;
               //echo $error;
                $_SESSION['error']=$error;
                //echo $_SESSION['error'];
                echo '<script> window.location.href="?page=login"</script>';  
            }
        break; 

        case "addentreprise":
            $codeEts = (isset($_POST["codeEts"]) && !empty($_POST["codeEts"]) && is_string($_POST["codeEts"])) ? htmlspecialchars($_POST["codeEts"]) : "";
            $raisonsociale = (isset($_POST["raisonsociale"]) && !empty($_POST["raisonsociale"]) && is_string($_POST["raisonsociale"])) ? htmlspecialchars($_POST["raisonsociale"]) : "";
            $activiteprincipale = (isset($_POST["activiteprincipale"]) && !empty($_POST["activiteprincipale"]) && is_string($_POST["activiteprincipale"])) ? htmlspecialchars($_POST["activiteprincipale"]) : "";
            $brancheactivite = (isset($_POST["brancheactivite"]) && !empty($_POST["brancheactivite"]) && is_string($_POST["brancheactivite"])) ? htmlspecialchars($_POST["brancheactivite"]) : "";
            $nomprenomsemployeur = (isset($_POST["nomprenomsemployeur"]) && !empty($_POST["nomprenomsemployeur"]) && is_string($_POST["nomprenomsemployeur"])) ? htmlspecialchars($_POST["nomprenomsemployeur"]) : "";
            $qualitemployeur = (isset($_POST["qualitemployeur"]) && !empty($_POST["qualitemployeur"]) && is_string($_POST["qualitemployeur"])) ? htmlspecialchars($_POST["qualitemployeur"]) : "";
            $numcnps = (isset($_POST["numcnps"]) && !empty($_POST["numcnps"]) && is_string($_POST["numcnps"])) ? htmlspecialchars($_POST["numcnps"]) : "";
            $compteContribuable = (isset($_POST["compteContribuable"]) && !empty($_POST["compteContribuable"]) && is_string($_POST["compteContribuable"])) ? htmlspecialchars($_POST["compteContribuable"]) : "";
            $communeentreprise = (isset($_POST["communeentreprise"]) && !empty($_POST["communeentreprise"]) && is_string($_POST["communeentreprise"])) ? htmlspecialchars($_POST["communeentreprise"]) : "";
            $villentreprise = (isset($_POST["villentreprise"]) && !empty($_POST["villentreprise"]) && is_string($_POST["villentreprise"])) ? htmlspecialchars($_POST["villentreprise"]) : "";
            $sousprefectureentreprise = (isset($_POST["sousprefectureentreprise"]) && !empty($_POST["sousprefectureentreprise"]) && is_string($_POST["sousprefectureentreprise"])) ? htmlspecialchars($_POST["sousprefectureentreprise"]) : "";
            $localisation = (isset($_POST["localisation"]) && !empty($_POST["localisation"]) && is_string($_POST["localisation"])) ? htmlspecialchars($_POST["localisation"]) : "";
            $adresse = (isset($_POST["adresse"]) && !empty($_POST["adresse"]) && is_string($_POST["adresse"])) ? htmlspecialchars($_POST["adresse"]) : "";
            $telephonentreprise = (isset($_POST["telephonentreprise"]) && !empty($_POST["telephonentreprise"]) && is_string($_POST["telephonentreprise"])) ? htmlspecialchars($_POST["telephonentreprise"]) : "";
            $faxentreprise = (isset($_POST["faxentreprise"]) && !empty($_POST["faxentreprise"]) && is_string($_POST["faxentreprise"])) ? htmlspecialchars($_POST["faxentreprise"]) : "";
            $contactemployeur = (isset($_POST["contactemployeur"]) && !empty($_POST["contactemployeur"]) && is_string($_POST["contactemployeur"])) ? htmlspecialchars($_POST["contactemployeur"]) : "";
            $agenceregionale = (isset($_POST["agenceregionale"]) && !empty($_POST["agenceregionale"]) && is_string($_POST["agenceregionale"])) ? htmlspecialchars($_POST["agenceregionale"]) : "";
            $secteurbrancheactivite = (isset($_POST["secteurbrancheactivite"]) && !empty($_POST["secteurbrancheactivite"]) && is_string($_POST["secteurbrancheactivite"])) ? htmlspecialchars($_POST["secteurbrancheactivite"]) : "";
            $emailentrep = (isset($_POST["emailentrep"]) && !empty($_POST["emailentrep"]) && is_string($_POST["emailentrep"])) ? htmlspecialchars($_POST["emailentrep"]) : "";
            $dateinscription = (isset($_POST["dateinscription"]) && !empty($_POST["dateinscription"]) && is_string($_POST["dateinscription"])) ? htmlspecialchars($_POST["dateinscription"]) : "";
            $nbrpersetrange = (isset($_POST["nbrpersetrange"]) && !empty($_POST["nbrpersetrange"]) && is_string($_POST["nbrpersetrange"])) ? htmlspecialchars($_POST["nbrpersetrange"]) : 0;
            $password  = (isset($_POST["password"]) && !empty($_POST["password"]) && is_string($_POST["password"])) ? htmlspecialchars($_POST["password"]) : "";
            $verif = (isset($_POST["verif"]) && !empty($_POST["verif"]) && is_string($_POST["verif"])) ? htmlspecialchars($_POST["verif"]) : "";
            $id_type_user = (isset($_POST["id_type_user"]) && !empty($_POST["id_type_user"]) && is_string($_POST["id_type_user"])) ? htmlspecialchars($_POST["id_type_user"]) : "";
            $result= $UserRequest->addets($codeEts,$raisonsociale, $dateinscription, $telephonentreprise, $numcnps, $compteContribuable, $adresse, $villentreprise, $communeentreprise, $sousprefectureentreprise, $localisation, $activiteprincipale, $agenceregionale, $faxentreprise, $emailentrep, $nomprenomsemployeur, $qualitemployeur, $contactemployeur, $brancheactivite, $secteurbrancheactivite, $nbrpersetrange);
            $result0= $UserRequest->adduser($raisonsociale, $password, $codeEts, $verif, $id_type_user);
            if($result){
                 $_SESSION['raisonsociale']=$raisonsociale;
                 var_dump($_SESSION['raisonsociale']);
                $_SESSION["login"]=TRUE;
                header($url1."?page=menu");
               }
        break;

        case "update":
          $id_entreprise = (isset($_POST["id_entreprise"]) && !empty($_POST["id_entreprise"]) && is_string($_POST["id_entreprise"])) ? htmlspecialchars($_POST["id_entreprise"]) : "";
          $raisonsociale = (isset($_POST["raisonsociale"]) && !empty($_POST["raisonsociale"]) && is_string($_POST["raisonsociale"])) ? htmlspecialchars($_POST["raisonsociale"]) : "";
          $activiteprincipale = (isset($_POST["activiteprincipale"]) && !empty($_POST["activiteprincipale"]) && is_string($_POST["activiteprincipale"])) ? htmlspecialchars($_POST["activiteprincipale"]) : "";
          $brancheactivite = (isset($_POST["brancheactivite"]) && !empty($_POST["brancheactivite"]) && is_string($_POST["brancheactivite"])) ? htmlspecialchars($_POST["brancheactivite"]) : "";
          $nomprenomsemployeur = (isset($_POST["nomprenomsemployeur"]) && !empty($_POST["nomprenomsemployeur"]) && is_string($_POST["nomprenomsemployeur"])) ? htmlspecialchars($_POST["nomprenomsemployeur"]) : "";
          $qualitemployeur = (isset($_POST["qualitemployeur"]) && !empty($_POST["qualitemployeur"]) && is_string($_POST["qualitemployeur"])) ? htmlspecialchars($_POST["qualitemployeur"]) : "";
          $numcnps = (isset($_POST["numcnps"]) && !empty($_POST["numcnps"]) && is_string($_POST["numcnps"])) ? htmlspecialchars($_POST["numcnps"]) : "";
          $compteContribuable = (isset($_POST["compteContribuable"]) && !empty($_POST["compteContribuable"]) && is_string($_POST["compteContribuable"])) ? htmlspecialchars($_POST["compteContribuable"]) : "";
          $communeentreprise = (isset($_POST["communeentreprise"]) && !empty($_POST["communeentreprise"]) && is_string($_POST["communeentreprise"])) ? htmlspecialchars($_POST["communeentreprise"]) : "";
          $villentreprise = (isset($_POST["villentreprise"]) && !empty($_POST["villentreprise"]) && is_string($_POST["villentreprise"])) ? htmlspecialchars($_POST["villentreprise"]) : "";
          $sousprefectureentreprise = (isset($_POST["sousprefectureentreprise"]) && !empty($_POST["sousprefectureentreprise"]) && is_string($_POST["sousprefectureentreprise"])) ? htmlspecialchars($_POST["sousprefectureentreprise"]) : "";
          $localisation = (isset($_POST["localisation"]) && !empty($_POST["localisation"]) && is_string($_POST["localisation"])) ? htmlspecialchars($_POST["localisation"]) : "";
          $adresse = (isset($_POST["adresse"]) && !empty($_POST["adresse"]) && is_string($_POST["adresse"])) ? htmlspecialchars($_POST["adresse"]) : "";
          $telephonentreprise = (isset($_POST["telephonentreprise"]) && !empty($_POST["telephonentreprise"]) && is_string($_POST["telephonentreprise"])) ? htmlspecialchars($_POST["telephonentreprise"]) : "";
          $faxentreprise = (isset($_POST["faxentreprise"]) && !empty($_POST["faxentreprise"]) && is_string($_POST["faxentreprise"])) ? htmlspecialchars($_POST["faxentreprise"]) : "";
          $contactemployeur = (isset($_POST["contactemployeur"]) && !empty($_POST["contactemployeur"]) && is_string($_POST["contactemployeur"])) ? htmlspecialchars($_POST["contactemployeur"]) : "";
          $agenceregionale = (isset($_POST["agenceregionale"]) && !empty($_POST["agenceregionale"]) && is_string($_POST["agenceregionale"])) ? htmlspecialchars($_POST["agenceregionale"]) : "";
          $secteurbrancheactivite = (isset($_POST["secteurbrancheactivite"]) && !empty($_POST["secteurbrancheactivite"]) && is_string($_POST["secteurbrancheactivite"])) ? htmlspecialchars($_POST["secteurbrancheactivite"]) : "";
          $emailentrep = (isset($_POST["emailentrep"]) && !empty($_POST["emailentrep"]) && is_string($_POST["emailentrep"])) ? htmlspecialchars($_POST["emailentrep"]) : "";
          $dateinscription = (isset($_POST["dateinscription"]) && !empty($_POST["dateinscription"]) && is_string($_POST["dateinscription"])) ? htmlspecialchars($_POST["dateinscription"]) : "";
          $nbrpersetrange = (isset($_POST["nbrpersetrange"]) && !empty($_POST["nbrpersetrange"]) && is_string($_POST["nbrpersetrange"])) ? htmlspecialchars($_POST["nbrpersetrange"]) : 0;
          $password  = (isset($_POST["password"]) && !empty($_POST["password"]) && is_string($_POST["password"])) ? htmlspecialchars($_POST["password"]) : "";
          $verif = (isset($_POST["verif"]) && !empty($_POST["verif"]) && is_string($_POST["verif"])) ? htmlspecialchars($_POST["verif"]) : "";
            $verif = (isset($_POST["verif"]) && !empty($_POST["verif"]) && is_string($_POST["verif"])) ? htmlspecialchars($_POST["verif"]) : "";
            $result= $UserRequest->updatets($id_entreprise, $raisonsociale, $dateinscription, $telephonentreprise, $numcnps, $compteContribuable, $adresse, $villentreprise, $communeentreprise, $sousprefectureentreprise, $localisation, $activiteprincipale, $agenceregionale, $faxentreprise, $emailentrep, $nomprenomsemployeur, $qualitemployeur, $contactemployeur, $brancheactivite, $secteurbrancheactivite);
            $result0 = $UserRequest->udpate_idantifiant($password, $raisonsociale, $_SESSION['id_user']);
            if($result){
                $_SESSION["login"]=TRUE;
                header($url1."?page=montreprise1");
              }
        break;

        case "updateinfo":
          $id_user = (isset($_POST["id_user"]) && !empty($_POST["id_user"]) && is_string($_POST["id_user"])) ? htmlspecialchars($_POST["id_user"]) : "";
          $raisonsociale = (isset($_POST["raisonsociale"]) && !empty($_POST["raisonsociale"]) && is_string($_POST["raisonsociale"])) ? htmlspecialchars($_POST["raisonsociale"]) : "";
          $password = (isset($_POST["password"]) && !empty($_POST["password"]) && is_string($_POST["password"])) ? htmlspecialchars($_POST["password"]) : "";
          $verif = (isset($_POST["verif"]) && !empty($_POST["verif"]) && is_string($_POST["verif"])) ? htmlspecialchars($_POST["verif"]) : "";
            $result= $UserRequest->udpateinfo_user($id_user, $raisonsociale, $password, $verif);
            var_dump($result);
            if($result){
              $_SESSION["login"]=TRUE;
              header($url1."?page=monetreprise");
            }

        break;

        case "newcontrat":
         $nomprenoms = (isset($_POST["nomprenoms"]) && !empty($_POST["nomprenoms"]) && is_string($_POST["nomprenoms"])) ? htmlspecialchars($_POST["nomprenoms"]) : "";
         $lieunaissance = (isset($_POST["lieunaissance"]) && !empty($_POST["lieunaissance"]) && is_string($_POST["lieunaissance"])) ? htmlspecialchars($_POST["lieunaissance"]) : "";
         $datenaissance = (isset($_POST["datenaissance"]) && !empty($_POST["datenaissance"]) && is_string($_POST["datenaissance"])) ? htmlspecialchars($_POST["datenaissance"]) : "";
         $sexe = (isset($_POST["sexe"]) && !empty($_POST["sexe"]) && is_string($_POST["sexe"])) ? htmlspecialchars($_POST["sexe"]) : "";
         $nompere = (isset($_POST["nompere"]) && !empty($_POST["nompere"]) && is_string($_POST["nompere"])) ? htmlspecialchars($_POST["nompere"]) : "";
         $nommere = (isset($_POST["nommere"]) && !empty($_POST["nommere"]) && is_string($_POST["nommere"])) ? htmlspecialchars($_POST["nommere"]) : "";
         $domicilehabituel = (isset($_POST["domicilehabituel"]) && !empty($_POST["domicilehabituel"]) && is_string($_POST["domicilehabituel"])) ? htmlspecialchars($_POST["domicilehabituel"]) : "";
         $communetravailleur = (isset($_POST["communetravailleur"]) && !empty($_POST["communetravailleur"]) && is_string($_POST["communetravailleur"])) ? htmlspecialchars($_POST["communetravailleur"]) : "";
         $sousprefecturetravailleur = (isset($_POST["sousprefecturetravailleur"]) && !empty($_POST["sousprefecturetravailleur"]) && is_string($_POST["sousprefecturetravailleur"])) ? htmlspecialchars($_POST["sousprefecturetravailleur"]) : "";
         $nationalite = (isset($_POST["nationalite"]) && !empty($_POST["nationalite"]) && is_string($_POST["nationalite"])) ? htmlspecialchars($_POST["nationalite"]) : "";
         $fonctiontravailleur = (isset($_POST["fonctiontravailleur"]) && !empty($_POST["fonctiontravailleur"]) && is_string($_POST["fonctiontravailleur"])) ? htmlspecialchars($_POST["fonctiontravailleur"]) : "";
         $brancheprofessionnelle = (isset($_POST["brancheprofessionnelle"]) && !empty($_POST["brancheprofessionnelle"]) && is_string($_POST["brancheprofessionnelle"])) ? htmlspecialchars($_POST["brancheprofessionnelle"]) : "";
         $situationmatrimoniale = (isset($_POST["situationmatrimoniale"]) && !empty($_POST["situationmatrimoniale"]) && is_string($_POST["situationmatrimoniale"])) ? htmlspecialchars($_POST["situationmatrimoniale"]) : "";
         $nomprenomsconjoint = (isset($_POST["nomprenomsconjoint"]) && !empty($_POST["nomprenomsconjoint"]) && is_string($_POST["nomprenomsconjoint"])) ? htmlspecialchars($_POST["nomprenomsconjoint"]) : "";
         $nombreenfants = (isset($_POST["nombreenfants"]) && !empty($_POST["nombreenfants"]) && is_string($_POST["nombreenfants"])) ? htmlspecialchars($_POST["nombreenfants"]) : 0;
         $nomprenomspersonneurgence = (isset($_POST["nomprenomspersonneurgence"]) && !empty($_POST["nomprenomspersonneurgence"]) && is_string($_POST["nomprenomspersonneurgence"])) ? htmlspecialchars($_POST["nomprenomspersonneurgence"]) : "";
         $adressepersonneurgence = (isset($_POST["adressepersonneurgence"]) && !empty($_POST["adressepersonneurgence"]) && is_string($_POST["adressepersonneurgence"])) ? htmlspecialchars($_POST["adressepersonneurgence"]) : "";
         $contactpersonneurgence = (isset($_POST["contactpersonneurgence"]) && !empty($_POST["contactpersonneurgence"]) && is_string($_POST["contactpersonneurgence"])) ? htmlspecialchars($_POST["contactpersonneurgence"]) : "";
         $nomprenomsemployeur = (isset($_POST["nomprenomsemployeur"]) && !empty($_POST["nomprenomsemployeur"]) && is_string($_POST["nomprenomsemployeur"])) ? htmlspecialchars($_POST["nomprenomsemployeur"]) : "";
         $raisonsociale = (isset($_POST["raisonsociale"]) && !empty($_POST["raisonsociale"]) && is_string($_POST["raisonsociale"])) ? htmlspecialchars($_POST["raisonsociale"]) : "";
         $typecontrat = (isset($_POST["typecontrat"]) && !empty($_POST["typecontrat"]) && is_string($_POST["typecontrat"])) ? htmlspecialchars($_POST["typecontrat"]) : "";
         $termeprecis = (isset($_POST["termeprecis"]) && !empty($_POST["termeprecis"]) && is_string($_POST["termeprecis"])) ? htmlspecialchars($_POST["termeprecis"]) : "";
         $unite = (isset($_POST["unite"]) && !empty($_POST["unite"]) && is_string($_POST["unite"])) ? htmlspecialchars($_POST["unite"]) : "";
         $termeimprecis = (isset($_POST["termeimprecis"]) && !empty($_POST["termeimprecis"]) && is_string($_POST["termeimprecis"])) ? htmlspecialchars($_POST["termeimprecis"]) : "";
         $periodeessai = (isset($_POST["periodeessai"]) && !empty($_POST["periodeessai"]) && is_string($_POST["periodeessai"])) ? htmlspecialchars($_POST["periodeessai"]) : "";
         $tempsperioessaideb = (isset($_POST["tempsperioessaideb"]) && !empty($_POST["tempsperioessaideb"]) && is_string($_POST["tempsperioessaideb"])) ? htmlspecialchars($_POST["tempsperioessaideb"]) : "";
         $tempsperioessaifin = (isset($_POST["tempsperioessaifin"]) && !empty($_POST["tempsperioessaifin"]) && is_string($_POST["tempsperioessaifin"])) ? htmlspecialchars($_POST["tempsperioessaifin"]) : "";
         $classementtravailleur = (isset($_POST["classementtravailleur"]) && !empty($_POST["classementtravailleur"]) && is_string($_POST["classementtravailleur"])) ? htmlspecialchars($_POST["classementtravailleur"]) : "";
         $salaire_base = (isset($_POST["salaire_base"]) && !empty($_POST["salaire_base"]) && is_string($_POST["salaire_base"])) ? htmlspecialchars($_POST["salaire_base"]) : "";
         $sursalaire = (isset($_POST["sursalaire"]) && !empty($_POST["sursalaire"]) && is_string($_POST["sursalaire"])) ? htmlspecialchars($_POST["sursalaire"]) : "";
         $montant = (isset($_POST["montant"]) && !empty($_POST["montant"]) && is_string($_POST["montant"])) ? htmlspecialchars($_POST["montant"]) : "";
         $autrecondition = (isset($_POST["autrecondition"]) && !empty($_POST["autrecondition"]) && is_string($_POST["autrecondition"])) ? htmlspecialchars($_POST["autrecondition"]) : "";
         $convention = (isset($_POST["convention"]) && !empty($_POST["convention"]) && is_string($_POST["convention"])) ? htmlspecialchars($_POST["convention"]) : "";
         $logement = (isset($_POST["logement"]) && !empty($_POST["logement"]) && is_string($_POST["logement"])) ? htmlspecialchars($_POST["logement"]) : "";
         $voiture = (isset($_POST["voiture"]) && !empty($_POST["voiture"]) && is_string($_POST["voiture"])) ? htmlspecialchars($_POST["voiture"]) : "";
         $autresavantage = (isset($_POST["autresavantage"]) && !empty($_POST["autresavantage"]) && is_string($_POST["autresavantage"])) ? htmlspecialchars($_POST["autresavantage"]) : "";
         $nbreexplaire = (isset($_POST["nbreexplaire"]) && !empty($_POST["nbreexplaire"]) && is_string($_POST["nbreexplaire"])) ? htmlspecialchars($_POST["nbreexplaire"]) : "";
         $dateinscription = (isset($_POST["dateinscription"]) && !empty($_POST["dateinscription"]) && is_string($_POST["dateinscription"])) ? htmlspecialchars($_POST["dateinscription"]) : "";
         $id_user = (isset($_POST["id_user"]) && !empty($_POST["id_user"]) && is_string($_POST["id_user"])) ? htmlspecialchars($_POST["id_user"]) : "";
         $statu = (isset($_POST["statu"]) && !empty($_POST["statu"]) && is_string($_POST["statu"])) ? htmlspecialchars($_POST["statu"]) : "0";
         $result= $UserRequest->addcontrat($nomprenoms, $lieunaissance, $datenaissance, $sexe, $nompere, $nommere, $domicilehabituel, $communetravailleur, $sousprefecturetravailleur, $nationalite, $fonctiontravailleur, $brancheprofessionnelle, $situationmatrimoniale, $nomprenomsconjoint, $nombreenfants, $nomprenomspersonneurgence, $adressepersonneurgence, $contactpersonneurgence, $nomprenomsemployeur, $raisonsociale, $typecontrat, $termeprecis, $unite, $termeimprecis, $periodeessai, $tempsperioessaideb, $tempsperioessaifin, $classementtravailleur, $salaire_base, $sursalaire, $montant, $autrecondition, $convention, $logement, $voiture, $autresavantage, $nbreexplaire, $dateinscription, $id_user, $statu);
         var_dump($result);
         if($result){
              $_SESSION["login"]=TRUE;
              echo '<script> window.location.href="?page=listecontrat"</script>';
              $_SESSION['id_user'] = $id_user;
            }
        break;

        case"search":
          
          $id_demande = (isset($_POST["id_demande"]) && !empty($_POST["id_demande"]) && is_string($_POST["id_demande"])) ? htmlspecialchars($_POST["id_demande"]) : "";
          $id_user = (isset($_POST["id_user"]) && !empty($_POST["id_user"]) && is_string($_POST["id_user"])) ? htmlspecialchars($_POST["id_user"]) : "";
          $_SESSION['id_demande'] = $id_demande;
          $_SESSION['id_user'] = $id_user;
          $_SESSION["login"]=TRUE;
          echo '<script> window.location.href="?page=renouvellement"</script>';
        break;

        case"renouvellement":
          
          $raisonsociale = (isset($_POST["raisonsociale"]) && !empty($_POST["raisonsociale"]) && is_string($_POST["raisonsociale"])) ? htmlspecialchars($_POST["raisonsociale"]) : "";
          $activiteprincipale = (isset($_POST["activiteprincipale"]) && !empty($_POST["activiteprincipale"]) && is_string($_POST["activiteprincipale"])) ? htmlspecialchars($_POST["activiteprincipale"]) : "";
          $nomprenomsemployeur = (isset($_POST["nomprenomsemployeur"]) && !empty($_POST["nomprenomsemployeur"]) && is_string($_POST["nomprenomsemployeur"])) ? htmlspecialchars($_POST["nomprenomsemployeur"]) : "";
          $qualitemployeur = (isset($_POST["qualitemployeur"]) && !empty($_POST["qualitemployeur"]) && is_string($_POST["qualitemployeur"])) ? htmlspecialchars($_POST["qualitemployeur"]) : "";
          $numcnps = (isset($_POST["numcnps"]) && !empty($_POST["numcnps"]) && is_string($_POST["numcnps"])) ? htmlspecialchars($_POST["numcnps"]) : "";
          $localisation = (isset($_POST["localisation"]) && !empty($_POST["localisation"]) && is_string($_POST["localisation"])) ? htmlspecialchars($_POST["localisation"]) : "";
          $adresse = (isset($_POST["adresse"]) && !empty($_POST["adresse"]) && is_string($_POST["adresse"])) ? htmlspecialchars($_POST["adresse"]) : "";
          $telephonentreprise = (isset($_POST["telephonentreprise"]) && !empty($_POST["telephonentreprise"]) && is_string($_POST["telephonentreprise"])) ? htmlspecialchars($_POST["telephonentreprise"]) : "";
          $faxentreprise = (isset($_POST["faxentreprise"]) && !empty($_POST["faxentreprise"]) && is_string($_POST["faxentreprise"])) ? htmlspecialchars($_POST["faxentreprise"]) : "";
          $nomprenoms = (isset($_POST["nomprenoms"]) && !empty($_POST["nomprenoms"]) && is_string($_POST["nomprenoms"])) ? htmlspecialchars($_POST["nomprenoms"]) : "";
          $datenaissance = (isset($_POST["datenaissance"]) && !empty($_POST["datenaissance"]) && is_string($_POST["datenaissance"])) ? htmlspecialchars($_POST["datenaissance"]) : "";
          $sexe = (isset($_POST["sexe"]) && !empty($_POST["sexe"]) && is_string($_POST["sexe"])) ? htmlspecialchars($_POST["sexe"]) : "";
          $lieunaissance = (isset($_POST["lieunaissance"]) && !empty($_POST["lieunaissance"]) && is_string($_POST["lieunaissance"])) ? htmlspecialchars($_POST["lieunaissance"]) : "";
          $adressetravailleur = (isset($_POST["adressetravailleur"]) && !empty($_POST["adressetravailleur"]) && is_string($_POST["adressetravailleur"])) ? htmlspecialchars($_POST["adressetravailleur"]) : "";
          $teltravailleur = (isset($_POST["teltravailleur"]) && !empty($_POST["teltravailleur"]) && is_string($_POST["teltravailleur"])) ? htmlspecialchars($_POST["teltravailleur"]) : "";
          $faxtravailleur = (isset($_POST["faxtravailleur"]) && !empty($_POST["faxtravailleur"]) && is_string($_POST["faxtravailleur"])) ? htmlspecialchars($_POST["faxtravailleur"]) : "";
          $nationalite = (isset($_POST["nationalite"]) && !empty($_POST["nationalite"]) && is_string($_POST["nationalite"])) ? htmlspecialchars($_POST["nationalite"]) : "";
          $fonctiontravailleur = (isset($_POST["fonctiontravailleur"]) && !empty($_POST["fonctiontravailleur"]) && is_string($_POST["fonctiontravailleur"])) ? htmlspecialchars($_POST["fonctiontravailleur"]) : "";
          $typecontrat = (isset($_POST["typecontrat"]) && !empty($_POST["typecontrat"]) && is_string($_POST["typecontrat"])) ? htmlspecialchars($_POST["typecontrat"]) : "";
          $dateinscription = (isset($_POST["dateinscription"]) && !empty($_POST["dateinscription"]) && is_string($_POST["dateinscription"])) ? htmlspecialchars($_POST["dateinscription"]) : "";
          $daterenouvellement = (isset($_POST["daterenouvellement"]) && !empty($_POST["daterenouvellement"]) && is_string($_POST["daterenouvellement"])) ? htmlspecialchars($_POST["daterenouvellement"]) : "0000-00-00";
          $salaire_base = (isset($_POST["salaire_base"]) && !empty($_POST["salaire_base"]) && is_string($_POST["salaire_base"])) ? htmlspecialchars($_POST["salaire_base"]) : "";
          $sursalaire = (isset($_POST["sursalaire"]) && !empty($_POST["sursalaire"]) && is_string($_POST["sursalaire"])) ? htmlspecialchars($_POST["sursalaire"]) : "";
          $montant = (isset($_POST["montant"]) && !empty($_POST["montant"]) && is_string($_POST["montant"])) ? htmlspecialchars($_POST["montant"]) : "";
          $id_user = (isset($_POST["id_user"]) && !empty($_POST["id_user"]) && is_string($_POST["id_user"])) ? htmlspecialchars($_POST["id_user"]) : "";
          $statu = (isset($_POST["statu"]) && !empty($_POST["statu"]) && is_string($_POST["statu"])) ? htmlspecialchars($_POST["statu"]) : "0";
          $result= $UserRequest->renouvelcontrat($raisonsociale, $activiteprincipale, $nomprenomsemployeur, $qualitemployeur, $numcnps, $localisation, $adresse, $telephonentreprise, $faxentreprise, $nomprenoms, $datenaissance, $sexe, $lieunaissance, $adressetravailleur, $teltravailleur, $faxtravailleur, $nationalite, $fonctiontravailleur, $typecontrat, $dateinscription, $daterenouvellement, $salaire_base, $sursalaire, $montant, $id_user, $statu);
          //var_dump($_POST);
          //var_dump($result);         
           if($result){
           $_SESSION["login"]=TRUE;
            echo '<script> window.location.href="?page=listedemrenouvel"</script>';
            }
        break;

        case"search1":
          $id_demande = (isset($_POST["id_demande"]) && !empty($_POST["id_demande"]) && is_string($_POST["id_demande"])) ? htmlspecialchars($_POST["id_demande"]) : "";
          $id_user = (isset($_POST["id_user"]) && !empty($_POST["id_user"]) && is_string($_POST["id_user"])) ? htmlspecialchars($_POST["id_user"]) : "";
          $_SESSION['id_demande'] = $id_demande;
          $_SESSION['id_user'] = $id_user;
          $_SESSION["login"]=TRUE;
          echo '<script> window.location.href="?page=demandecarte"</script>';
        break;
         

        case "demcarte":
          
          $nomprenoms = (isset($_POST["nomprenoms"]) && !empty($_POST["nomprenoms"]) && is_string($_POST["nomprenoms"])) ? htmlspecialchars($_POST["nomprenoms"]) : "";
          $datenaissance = (isset($_POST["datenaissance"]) && !empty($_POST["datenaissance"]) && is_string($_POST["datenaissance"])) ? htmlspecialchars($_POST["datenaissance"]) : "";
          $sexe = (isset($_POST["sexe"]) && !empty($_POST["sexe"]) && is_string($_POST["sexe"])) ? htmlspecialchars($_POST["sexe"]) : "";
          $nationalite = (isset($_POST["nationalite"]) && !empty($_POST["nationalite"]) && is_string($_POST["nationalite"])) ? htmlspecialchars($_POST["nationalite"]) : "";
          $adresse = (isset($_POST["adresse"]) && !empty($_POST["adresse"]) && is_string($_POST["adresse"])) ? htmlspecialchars($_POST["adresse"]) : "";
          $raisonsociale = (isset($_POST["raisonsociale"]) && !empty($_POST["raisonsociale"]) && is_string($_POST["raisonsociale"])) ? htmlspecialchars($_POST["raisonsociale"]) : "";
          $fonctiontravailleur = (isset($_POST["fonctiontravailleur"]) && !empty($_POST["fonctiontravailleur"]) && is_string($_POST["fonctiontravailleur"])) ? htmlspecialchars($_POST["fonctiontravailleur"]) : "";
          $typecontrat = (isset($_POST["typecontrat"]) && !empty($_POST["typecontrat"]) && is_string($_POST["typecontrat"])) ? htmlspecialchars($_POST["typecontrat"]) : "";
          $dureecontrat = (isset($_POST["dureecontrat"]) && !empty($_POST["dureecontrat"]) && is_string($_POST["dureecontrat"])) ? htmlspecialchars($_POST["dureecontrat"]) : "";
          $dateinscription = (isset($_POST["dateinscription"]) && !empty($_POST["dateinscription"]) && is_string($_POST["dateinscription"])) ? htmlspecialchars($_POST["dateinscription"]) : "";
          $datefincontrat = (isset($_POST["datefincontrat"]) && !empty($_POST["datefincontrat"]) && is_string($_POST["datefincontrat"])) ? htmlspecialchars($_POST["datefincontrat"]) : "0000-00-00";
          $id_user = (isset($_POST["id_user"]) && !empty($_POST["id_user"]) && is_string($_POST["id_user"])) ? htmlspecialchars($_POST["id_user"]) : "";
          $statu = (isset($_POST["statu"]) && !empty($_POST["statu"]) && is_string($_POST["statu"])) ? htmlspecialchars($_POST["statu"]) : "0";
          $result= $UserRequest->demecarte($nomprenoms, $datenaissance, $sexe, $nationalite, $adresse, $raisonsociale, $fonctiontravailleur, $typecontrat, $dureecontrat, $dateinscription, $datefincontrat, $id_user, $statu);
          //var_dump($datefincontrat);
          //var_dump($result);
          if($result){
            $_SESSION["login"]=TRUE;
            echo '<script> window.location.href="?page=listedemcarte"</script>';
          }
        break;



       
    

}
