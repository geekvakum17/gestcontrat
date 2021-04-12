<?php

class UserRequest {
    
    protected $databaseConnection;

    public function __construct($databaseConnection) {
        $this->databaseConnection = $databaseConnection;
    }

     //fonction d'authentification
    public function authenticate_user($raisonsociale, $password) {
        
        // Query SQL
        $querySQl = 'SELECT *  FROM visas_user  WHERE  raisonsociale = "'.$raisonsociale.'" AND password = "'.$password.'"' ;
        // Prepare and execute query
        $query = $this->databaseConnection->prepare($querySQl);
        $query->execute();
        var_dump($query);
        var_dump( $querySQl);
        // Fetching direct query result
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        var_dump( $result);
        // Close database connexion
        unset($this->databaseConnection); 
        $this->databaseConnection = null;
        // Return query result
        return (!empty($result)) ? $result : FALSE;
        
    }


    //fonction d'authentification
    public function modifidenty_user($id_user) {
        
        // Query SQL
        $querySQl = 'SELECT *  FROM visas_user  WHERE  id_user ="'.$id_user.'"' ;
        // Prepare and execute query
        $query = $this->databaseConnection->prepare($querySQl);
        $query->execute();
        // Fetching direct query result
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        // Close database connexion
        unset($this->databaseConnection); 
        $this->databaseConnection = null;
        // Return query result
        return (!empty($result)) ? $result : FALSE;
        
    }

    //fonction d'authentification
    public function udpateinfo_user($id_user, $raisonsociale, $password, $verif) {

          $req1=$this->databaseConnection->prepare('UPDATE visas_user set raisonsociale=:raisonsociale, password=:password, verif=:verif where id_user="'.$id_user.'" LIMIT 1 ');
           //liason de chaque marqueur à une valeur
            $req1->bindValue(':raisonsociale', $raisonsociale, PDO::PARAM_STR);
            $req1->bindValue(':password', $password, PDO::PARAM_STR);
            $req1->bindValue(':verif', $verif, PDO::PARAM_INT);
           // exécution de la requête préparé
           $resultat=$req1->execute();
           return (!empty($resultat)) ? $resultat : FALSE; 
    }

   
  //function de liste des activité
  public function listagenceregionale(){
      
        $querySQl ='SELECT `agence_regionale` FROM `visas_agenceregionale` ORDER BY agence_regionale DESC';
        $query = $this->databaseConnection->prepare($querySQl);
        $query->execute();
        // Fetching direct query result
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        // Return query result
        return (!empty($result)) ? $result : FALSE;
      
  }

  //function de liste des branches d'activité
  public function listbrancheactiv(){
      
    $querySQl ='SELECT `lib_branche_activ` FROM `visas_brancheactivite` ORDER by lib_branche_activ DESC';
    $query = $this->databaseConnection->prepare($querySQl);
    $query->execute();
    // Fetching direct query result
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    // Return query result
    return (!empty($result)) ? $result : FALSE;
  
}

//function de liste des secteurs d'activité
public function listsecteuractiv(){
      
    $querySQl ='SELECT * FROM visas_secteur ';
    $query = $this->databaseConnection->prepare($querySQl);
    $query->execute();
    // Fetching direct query result
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    // Return query result
    return (!empty($result)) ? $result : FALSE;
  
}


public function listecommune(){
  $querySQl ='SELECT vil FROM `visas_ville` ORDER BY vil DESC ';
  $query = $this->databaseConnection->prepare($querySQl);
  $query->execute();
  // Fetching direct query result
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  // Return query result
  return (!empty($result)) ? $result : FALSE;
}

public function listessousprefecture(){
  $querySQl ='SELECT `lib_sousprefecture` FROM `visas_sousprefecture` ORDER BY lib_sousprefecture DESC';
  $query = $this->databaseConnection->prepare($querySQl);
  $query->execute();
  // Fetching direct query result
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  // Return query result
  return (!empty($result)) ? $result : FALSE;
}

public function listentreprise($raisonsociale){
  $querySQl ='SELECT  * FROM visas_entreprises where raisonsociale="'.$raisonsociale.'" LIMIT 1';
  $query = $this->databaseConnection->prepare($querySQl);
  $query->execute();
  // Fetching direct query result
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  // Return query result
  return (!empty($result)) ? $result : FALSE;
}

public function listeprise($id_entreprise){
  $querySQl ='SELECT * FROM visas_entreprises where id_entreprise="'.$id_entreprise.'" LIMIT 1';
  $query = $this->databaseConnection->prepare($querySQl);
  $query->execute();
  // Fetching direct query result
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  // Return query result
  return (!empty($result)) ? $result : FALSE;
}


public function gestnumber(){
  $querySQl ='SELECT count(id_entreprise)nbre FROM visas_entreprises';
  $query = $this->databaseConnection->prepare($querySQl);
  $query->execute();
  // Fetching direct query result
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  // Return query result
  return (!empty($result)) ? $result : FALSE;
}




public function addets($codeEts,$raisonsociale, $dateinscription, $telephonentreprise, $numcnps, $compteContribuable, $adresse, $villentreprise, $communeentreprise, $sousprefectureentreprise, $localisation, $activiteprincipale, $agenceregionale, $faxentreprise, $emailentrep, $nomprenomsemployeur, $qualitemployeur, $contactemployeur, $brancheactivite, $secteurbrancheactivite, $nbrpersetrange){

    $req=$this->databaseConnection->prepare('INSERT INTO visas_entreprises (codeEts, raisonsociale, dateinscription, telephonentreprise, numcnps, compteContribuable, adresse, villentreprise, communeentreprise, sousprefectureentreprise, localisation, activiteprincipale, agenceregionale, faxentreprise, emailentrep, nomprenomsemployeur, qualitemployeur, contactemployeur, brancheactivite, secteurbrancheactivite, nbrpersetrange) VALUES(:codeEts, :raisonsociale, :dateinscription, :telephonentreprise, :numcnps, :compteContribuable, :adresse, :villentreprise, :communeentreprise, :sousprefectureentreprise, :localisation, :activiteprincipale, :agenceregionale, :faxentreprise, :emailentrep, :nomprenomsemployeur, :qualitemployeur, :contactemployeur, :brancheactivite, :secteurbrancheactivite, :nbrpersetrange)');
    
    
    //liason de chaque marqueur à une valeur
    $req->bindValue(':codeEts', $codeEts, PDO::PARAM_STR);
     $req->bindValue(':raisonsociale', $raisonsociale, PDO::PARAM_STR);
     $req->bindValue(':dateinscription', $dateinscription, PDO::PARAM_STR);
     $req->bindValue(':telephonentreprise', $telephonentreprise, PDO::PARAM_STR);
     $req->bindValue(':numcnps', $numcnps, PDO::PARAM_STR);
     $req->bindValue(':compteContribuable', $compteContribuable, PDO::PARAM_STR);
     $req->bindValue(':numcnps', $numcnps, PDO::PARAM_STR);
     $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
     $req->bindValue(':villentreprise', $villentreprise, PDO::PARAM_STR);
     $req->bindValue(':communeentreprise', $communeentreprise, PDO::PARAM_STR);
     $req->bindValue(':sousprefectureentreprise', $sousprefectureentreprise, PDO::PARAM_STR);
     $req->bindValue(':localisation', $localisation, PDO::PARAM_STR);
     $req->bindValue(':activiteprincipale', $activiteprincipale, PDO::PARAM_STR);
     $req->bindValue(':agenceregionale', $agenceregionale, PDO::PARAM_STR);
     $req->bindValue(':faxentreprise', $faxentreprise, PDO::PARAM_STR);
     $req->bindValue(':emailentrep', $emailentrep, PDO::PARAM_STR);
     $req->bindValue(':nomprenomsemployeur', $nomprenomsemployeur, PDO::PARAM_STR);
     $req->bindValue(':qualitemployeur', $qualitemployeur, PDO::PARAM_STR);
     $req->bindValue(':contactemployeur', $contactemployeur, PDO::PARAM_STR);
     $req->bindValue(':brancheactivite', $brancheactivite, PDO::PARAM_STR);
     $req->bindValue(':secteurbrancheactivite', $secteurbrancheactivite, PDO::PARAM_STR);
     $req->bindValue(':nbrpersetrange', $nbrpersetrange, PDO::PARAM_INT);
    // exécution de la requête préparé
    $resultat=$req->execute();
    return (!empty($resultat)) ? $resultat : FALSE;
  }



  public function adduser($raisonsociale, $password, $codeEts, $verif, $id_type_user){

    $req=$this->databaseConnection->prepare('INSERT visas_user (raisonsociale, password, codeEts, verif, id_type_user) VALUES(:raisonsociale, :password, :codeEts, :verif, :id_type_user)');
    var_dump($req);
    //liason de chaque marqueur à une valeur
     $req->bindValue(':raisonsociale', $raisonsociale, PDO::PARAM_STR);
     $req->bindValue(':password', $password, PDO::PARAM_STR);
     $req->bindValue(':codeEts', $codeEts, PDO::PARAM_STR);
     $req->bindValue(':verif', $verif, PDO::PARAM_INT);
     $req->bindValue(':id_type_user', $id_type_user, PDO::PARAM_INT);
    // exécution de la requête préparé
    $resultat=$req->execute();
    return (!empty($resultat)) ? $resultat : FALSE;
  }

  //fonction d'authentification
  public function info_user($raisonsociale) {
        //var_dump($raisonsociale);
    // Query SQL
    $querySQl = 'SELECT *  FROM visas_user  WHERE  raisonsociale = "'.$raisonsociale.'" LIMIT 1';
    // Prepare and execute query
    $query = $this->databaseConnection->prepare($querySQl);
    $query->execute();
    // Fetching direct query result
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    // Close database connexion
    unset($this->databaseConnection); 
    $this->databaseConnection = null;
    // Return query result
    return (!empty($result)) ? $result : FALSE;
    
}


 //fonction de mise à jour du password
 public function udpate_idantifiant($password, $raisonsociale,  $id_user) {

  $req1=$this->databaseConnection->prepare('UPDATE visas_user set raisonsociale=:raisonsociale, password=:password where  id_user="'. $id_user.'" LIMIT 1 ');
  var_dump($req1);
   //liason de chaque marqueur à une valeur
   $req1->bindValue(':raisonsociale', $raisonsociale, PDO::PARAM_STR);
    $req1->bindValue(':password', $password, PDO::PARAM_STR);
   // exécution de la requête préparé
   $resultat=$req1->execute();
   return (!empty($resultat)) ? $resultat : FALSE; 
}

public function updatets($id_entreprise, $raisonsociale, $dateinscription, $telephonentreprise, $numcnps, $compteContribuable, $adresse, $villentreprise, $communeentreprise, $sousprefectureentreprise, $localisation, $activiteprincipale, $agenceregionale, $faxentreprise, $emailentrep, $nomprenomsemployeur, $qualitemployeur, $contactemployeur, $brancheactivite, $secteurbrancheactivite){
  
  $req = $this->databaseConnection->prepare('UPDATE visas_entreprises SET raisonsociale=:raisonsociale, dateinscription=:dateinscription, telephonentreprise=:telephonentreprise, numcnps=:numcnps, compteContribuable=:compteContribuable, adresse=:adresse, villentreprise=:villentreprise, communeentreprise=:communeentreprise, sousprefectureentreprise=:sousprefectureentreprise, localisation=:localisation, activiteprincipale=:activiteprincipale, agenceregionale=:agenceregionale, faxentreprise=:faxentreprise, emailentrep=:emailentrep, nomprenomsemployeur=:nomprenomsemployeur, qualitemployeur=:qualitemployeur, contactemployeur=:contactemployeur, brancheactivite=:brancheactivite, secteurbrancheactivite=:secteurbrancheactivite  WHERE id_entreprise ='.$id_entreprise.' LIMIT 1');
  //liason de chaque marqueur à une valeur
     $req->bindValue(':raisonsociale', $raisonsociale, PDO::PARAM_STR);
     $req->bindValue(':dateinscription', $dateinscription, PDO::PARAM_STR);
     $req->bindValue(':telephonentreprise', $telephonentreprise, PDO::PARAM_STR);
     $req->bindValue(':numcnps', $numcnps, PDO::PARAM_STR);
     $req->bindValue(':compteContribuable', $compteContribuable, PDO::PARAM_STR);
     $req->bindValue(':numcnps', $numcnps, PDO::PARAM_STR);
     $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
     $req->bindValue(':villentreprise', $villentreprise, PDO::PARAM_STR);
     $req->bindValue(':communeentreprise', $communeentreprise, PDO::PARAM_STR);
     $req->bindValue(':sousprefectureentreprise', $sousprefectureentreprise, PDO::PARAM_STR);
     $req->bindValue(':localisation', $localisation, PDO::PARAM_STR);
     $req->bindValue(':activiteprincipale', $activiteprincipale, PDO::PARAM_STR);
     $req->bindValue(':agenceregionale', $agenceregionale, PDO::PARAM_STR);
     $req->bindValue(':faxentreprise', $faxentreprise, PDO::PARAM_STR);
     $req->bindValue(':emailentrep', $emailentrep, PDO::PARAM_STR);
     $req->bindValue(':nomprenomsemployeur', $nomprenomsemployeur, PDO::PARAM_STR);
     $req->bindValue(':qualitemployeur', $qualitemployeur, PDO::PARAM_STR);
     $req->bindValue(':contactemployeur', $contactemployeur, PDO::PARAM_STR);
     $req->bindValue(':brancheactivite', $brancheactivite, PDO::PARAM_STR);
     $req->bindValue(':secteurbrancheactivite', $secteurbrancheactivite, PDO::PARAM_STR);
     
  // exécution de la requête préparé
  $resultat=$req->execute();
  return (!empty($resultat)) ? $resultat : FALSE; 

}

public function listenationalite(){

  $querySQl ='SELECT nat FROM `visas_nationalite` ORDER BY nat DESC ';
    $query = $this->databaseConnection->prepare($querySQl);
    $query->execute();
    // Fetching direct query result
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    // Return query result
    return (!empty($result)) ? $result : FALSE;

}

public function addcontrat($nomprenoms, $lieunaissance, $datenaissance, $sexe, $nompere, $nommere, $domicilehabituel, $communetravailleur, $sousprefecturetravailleur, $nationalite, $fonctiontravailleur, $brancheprofessionnelle, $situationmatrimoniale, $nomprenomsconjoint, $nombreenfants, $nomprenomspersonneurgence, $adressepersonneurgence, $contactpersonneurgence, $nomprenomsemployeur, $raisonsociale, $typecontrat, $termeprecis, $unite, $termeimprecis, $periodeessai, $tempsperioessaideb, $tempsperioessaifin, $classementtravailleur, $salaire_base, $sursalaire, $montant, $autrecondition, $convention, $logement, $voiture, $autresavantage, $nbreexplaire, $dateinscription, $id_user, $statu){

  $req=$this->databaseConnection->prepare('INSERT INTO visas_demande (nomprenoms, lieunaissance, datenaissance, sexe, nompere, nommere, domicilehabituel, communetravailleur, sousprefecturetravailleur, nationalite, fonctiontravailleur, brancheprofessionnelle, situationmatrimoniale, nomprenomsconjoint, nombreenfants, nomprenomspersonneurgence, adressepersonneurgence, contactpersonneurgence, nomprenomsemployeur, raisonsociale, typecontrat, termeprecis, unite, termeimprecis, periodeessai, tempsperioessaideb, tempsperioessaifin, classementtravailleur, salaire_base, sursalaire, montant, autrecondition, convention, logement, voiture, autresavantage, nbreexplaire, dateinscription, id_user, statu)VALUES(:nomprenoms, :lieunaissance, :datenaissance, :sexe, :nompere, :nommere, :domicilehabituel, :communetravailleur, :sousprefecturetravailleur, :nationalite, :fonctiontravailleur, :brancheprofessionnelle, :situationmatrimoniale, :nomprenomsconjoint, :nombreenfants, :nomprenomspersonneurgence, :adressepersonneurgence, :contactpersonneurgence, :nomprenomsemployeur, :raisonsociale, :typecontrat, :termeprecis, :unite, :termeimprecis, :periodeessai,  :tempsperioessaideb, :tempsperioessaifin, :classementtravailleur, :salaire_base, :sursalaire, :montant, :autrecondition, :convention, :logement, :voiture, :autresavantage, :nbreexplaire, :dateinscription, :id_user, :statu)');
  $req->bindValue(':nomprenoms', $nomprenoms, PDO::PARAM_STR);
  $req->bindValue(':lieunaissance', $lieunaissance, PDO::PARAM_STR);
  $req->bindValue(':datenaissance', $datenaissance, PDO::PARAM_STR);
  $req->bindValue(':sexe', $sexe, PDO::PARAM_STR);
  $req->bindValue(':nompere', $nompere, PDO::PARAM_STR);
  $req->bindValue(':nommere', $nommere, PDO::PARAM_STR);
  $req->bindValue(':domicilehabituel', $domicilehabituel, PDO::PARAM_STR);
  $req->bindValue(':communetravailleur', $communetravailleur, PDO::PARAM_STR);
  $req->bindValue(':sousprefecturetravailleur', $sousprefecturetravailleur, PDO::PARAM_STR);
  $req->bindValue(':nationalite', $nationalite, PDO::PARAM_STR);
  $req->bindValue(':fonctiontravailleur', $fonctiontravailleur, PDO::PARAM_STR);
  $req->bindValue(':brancheprofessionnelle', $brancheprofessionnelle, PDO::PARAM_STR);
  $req->bindValue(':situationmatrimoniale', $situationmatrimoniale, PDO::PARAM_STR);
  $req->bindValue(':nomprenomsconjoint', $nomprenomsconjoint, PDO::PARAM_STR);
  $req->bindValue(':nombreenfants', $nombreenfants, PDO::PARAM_INT);
  $req->bindValue(':nomprenomspersonneurgence', $nomprenomspersonneurgence, PDO::PARAM_STR);
  $req->bindValue(':adressepersonneurgence', $adressepersonneurgence, PDO::PARAM_STR);
  $req->bindValue(':contactpersonneurgence', $contactpersonneurgence, PDO::PARAM_STR);
  $req->bindValue(':nomprenomsemployeur', $nomprenomsemployeur, PDO::PARAM_STR);
  $req->bindValue(':raisonsociale', $raisonsociale, PDO::PARAM_STR);
  $req->bindValue(':typecontrat', $typecontrat, PDO::PARAM_STR);
  $req->bindValue(':termeprecis', $termeprecis, PDO::PARAM_STR);
  $req->bindValue(':unite', $unite, PDO::PARAM_STR);
  $req->bindValue(':termeimprecis', $termeimprecis, PDO::PARAM_STR);
  $req->bindValue(':periodeessai', $periodeessai, PDO::PARAM_STR);
  $req->bindValue(':tempsperioessaideb', $tempsperioessaideb, PDO::PARAM_STR);
  $req->bindValue(':tempsperioessaifin', $tempsperioessaifin, PDO::PARAM_STR);
  $req->bindValue(':classementtravailleur', $classementtravailleur, PDO::PARAM_STR);
  $req->bindValue(':salaire_base', $salaire_base, PDO::PARAM_STR);
  $req->bindValue(':sursalaire', $sursalaire, PDO::PARAM_STR);
  $req->bindValue(':montant', $montant, PDO::PARAM_STR);
  $req->bindValue(':autrecondition', $autrecondition, PDO::PARAM_STR);
  $req->bindValue(':convention', $convention, PDO::PARAM_STR);
  $req->bindValue(':logement', $logement, PDO::PARAM_STR);
  $req->bindValue(':voiture', $voiture, PDO::PARAM_STR);
  $req->bindValue(':autresavantage', $autresavantage, PDO::PARAM_STR);
  $req->bindValue(':nbreexplaire', $nbreexplaire, PDO::PARAM_INT);
  $req->bindValue(':dateinscription', $dateinscription, PDO::PARAM_STR);
  $req->bindValue(':id_user', $id_user, PDO::PARAM_INT);
  $req->bindValue(':statu', $statu, PDO::PARAM_INT);
  // exécution de la requête préparé
  $resultat=$req->execute();
  return (!empty($resultat)) ? $resultat : FALSE;
}

public function listecontrat($id_user){
  // Query SQL
  $querySQl = 'SELECT id_demande, nomprenoms, lieunaissance, datenaissance, sexe, typecontrat, visas_statu.libelle_statu FROM visas_demande, visas_statu WHERE visas_demande.statu = visas_statu.code_statu and id_user="'.$id_user.'"';
  // Prepare and execute query
  $query = $this->databaseConnection->prepare($querySQl);
  $query->execute();
  // Fetching direct query result
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  // Close database connexion
  unset($this->databaseConnection); 
  $this->databaseConnection = null;
  // Return query result
  return (!empty($result)) ? $result : FALSE;
  
}


public function liste($id_demande){
  // Query SQL
  $querySQl = 'SELECT nomprenoms, lieunaissance, datenaissance, sexe, nationalite, fonctiontravailleur, typecontrat, dateinscription FROM visas_demande WHERE id_demande ="'.$id_demande.'"';
  // Prepare and execute query
  $query = $this->databaseConnection->prepare($querySQl);
  $query->execute();
  // Fetching direct query result
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  // Close database connexion
 // unset($this->databaseConnection); 
 // $this->databaseConnection = null;
  // Return query result
  return (!empty($result)) ? $result : FALSE;
  
}

public function liste1($id_demande){
  // Query SQL
  $querySQl = 'SELECT raisonsociale, nomprenoms, lieunaissance, datenaissance, sexe, nationalite, fonctiontravailleur, adresse, typecontrat, dateinscription, dureecontrat, datefincontrat  FROM visas_demande WHERE id_demande ="'.$id_demande.'"';
  // Prepare and execute query
  $query = $this->databaseConnection->prepare($querySQl);
  $query->execute();
  // Fetching direct query result
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  // Close database connexion
 // unset($this->databaseConnection); 
 // $this->databaseConnection = null;
  // Return query result
  return (!empty($result)) ? $result : FALSE;
  
}


public function renouvel($id_user){

   // Query SQL
   $querySQl = 'SELECT visas_entreprises.raisonsociale, nomprenomsemployeur, activiteprincipale, qualitemployeur, numcnps, localisation, adresse, telephonentreprise, faxentreprise, visas_user.id_user FROM visas_entreprises, visas_user WHERE visas_entreprises.codeEts = visas_user.codeEts and visas_user.id_user="'.$id_user.'"LIMIT 1';
   // Prepare and execute query
  
   $query = $this->databaseConnection->prepare($querySQl);
   $query->execute();
  
   // Fetching direct query result
   $result = $query->fetchAll(PDO::FETCH_ASSOC);
  
   // Close database connexion
  // unset($this->databaseConnection); 
  // $this->databaseConnection = null;
   // Return query result
   return (!empty($result)) ? $result : FALSE;

} 

public function renouvelcontrat($raisonsociale, $activiteprincipale, $nomprenomsemployeur, $qualitemployeur, $numcnps, $localisation, $adresse, $telephonentreprise, $faxentreprise, $nomprenoms, $datenaissance, $sexe, $lieunaissance, $adressetravailleur, $teltravailleur, $faxtravailleur, $nationalite, $fonctiontravailleur, $typecontrat, $dateinscription, $daterenouvellement, $salaire_base, $sursalaire, $montant, $id_user, $statu){
  
  $req=$this->databaseConnection->prepare('INSERT INTO visas_renouvellement(raisonsociale, activiteprincipale, nomprenomsemployeur, qualitemployeur, numcnps, localisation, adresse, telephonentreprise, faxentreprise, nomprenoms, datenaissance, sexe, lieunaissance, adressetravailleur, teltravailleur, faxtravailleur, nationalite, fonctiontravailleur, typecontrat, dateinscription, daterenouvellement, salaire_base, sursalaire, montant, id_user, statu)VALUES(:raisonsociale, :activiteprincipale, :nomprenomsemployeur, :qualitemployeur, :numcnps, :localisation, :adresse, :telephonentreprise, :faxentreprise, :nomprenoms, :datenaissance, :sexe, :lieunaissance, :adressetravailleur, :teltravailleur, :faxtravailleur, :nationalite, :fonctiontravailleur, :typecontrat, :dateinscription, :daterenouvellement, :salaire_base, :sursalaire, :montant, :id_user, :statu)');
  $req->bindValue(':raisonsociale', $raisonsociale, PDO::PARAM_STR);
  $req->bindValue(':activiteprincipale', $activiteprincipale, PDO::PARAM_STR);
  $req->bindValue(':nomprenomsemployeur', $nomprenomsemployeur, PDO::PARAM_STR);
  $req->bindValue(':qualitemployeur', $qualitemployeur, PDO::PARAM_STR);
  $req->bindValue(':numcnps', $numcnps, PDO::PARAM_STR);
  $req->bindValue(':localisation', $localisation, PDO::PARAM_STR);
  $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
  $req->bindValue(':telephonentreprise', $telephonentreprise, PDO::PARAM_STR);
  $req->bindValue(':faxentreprise', $faxentreprise, PDO::PARAM_STR);
  $req->bindValue(':nomprenoms', $nomprenoms, PDO::PARAM_STR);
  $req->bindValue(':datenaissance', $datenaissance, PDO::PARAM_STR);
  $req->bindValue(':sexe', $sexe, PDO::PARAM_STR);
  $req->bindValue(':lieunaissance', $lieunaissance, PDO::PARAM_STR);
  $req->bindValue(':adressetravailleur', $adressetravailleur, PDO::PARAM_STR);
  $req->bindValue(':teltravailleur', $teltravailleur, PDO::PARAM_STR);
  $req->bindValue(':faxtravailleur', $faxtravailleur, PDO::PARAM_STR);
  $req->bindValue(':nationalite', $nationalite, PDO::PARAM_STR);
  $req->bindValue(':fonctiontravailleur', $fonctiontravailleur, PDO::PARAM_STR);
  $req->bindValue(':typecontrat', $typecontrat, PDO::PARAM_STR);
  $req->bindValue(':dateinscription', $dateinscription, PDO::PARAM_STR);
  $req->bindValue(':daterenouvellement', $daterenouvellement, PDO::PARAM_STR);
  $req->bindValue(':salaire_base', $salaire_base, PDO::PARAM_STR);
  $req->bindValue(':sursalaire', $sursalaire, PDO::PARAM_STR);
  $req->bindValue(':montant', $montant, PDO::PARAM_STR);
  $req->bindValue(':id_user', $id_user, PDO::PARAM_INT);
  $req->bindValue(':statu', $statu, PDO::PARAM_INT);
  // exécution de la requête préparé
  $resultat=$req->execute();
  return (!empty($resultat)) ? $resultat : FALSE;
}

public function demecarte($nomprenoms, $datenaissance, $sexe, $nationalite, $adresse, $raisonsociale, $fonctiontravailleur, $typecontrat, $dureecontrat, $dateinscription, $datefincontrat, $id_user, $statu){

  $req=$this->databaseConnection->prepare('INSERT INTO visas_carte(nomprenoms, datenaissance, sexe, nationalite, adresse, raisonsociale, fonctiontravailleur, typecontrat, dureecontrat, dateinscription, datefincontrat, id_user, statu)VALUES(:nomprenoms, :datenaissance, :sexe, :nationalite, :adresse, :raisonsociale, :fonctiontravailleur, :typecontrat, :dureecontrat, :dateinscription, :datefincontrat, :id_user, :statu)');
  $req->bindValue(':nomprenoms', $nomprenoms, PDO::PARAM_STR);
  $req->bindValue(':datenaissance', $datenaissance, PDO::PARAM_STR);
  $req->bindValue(':sexe', $sexe, PDO::PARAM_STR);
  $req->bindValue(':nationalite', $nationalite, PDO::PARAM_STR);
  $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
  $req->bindValue(':raisonsociale', $raisonsociale, PDO::PARAM_STR);
  $req->bindValue(':fonctiontravailleur', $fonctiontravailleur, PDO::PARAM_STR);
  $req->bindValue(':typecontrat', $typecontrat, PDO::PARAM_STR);
  $req->bindValue(':dureecontrat', $dureecontrat, PDO::PARAM_STR);
  $req->bindValue(':dateinscription', $dateinscription, PDO::PARAM_STR);
  $req->bindValue(':datefincontrat', $datefincontrat ? $datefincontrat:'0000-00-00', PDO::PARAM_STR);
  $req->bindValue(':id_user', $id_user, PDO::PARAM_INT);
  $req->bindValue(':statu', $statu, PDO::PARAM_STR);
  
  // exécution de la requête préparé
  $resultat=$req->execute();
  return (!empty($resultat)) ? $resultat : FALSE;
}

public function listedemcarte($id_user){

  // Query SQL
  $querySQl = 'SELECT id_carte, nomprenoms, typecontrat, sexe, visas_statu.libelle_statu FROM visas_carte, visas_statu WHERE visas_statu.code_statu = visas_carte.statu and id_user="'.$id_user.'"';
  // Prepare and execute query
 
  $query = $this->databaseConnection->prepare($querySQl);
  $query->execute();
 
  // Fetching direct query result
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
 
  // Close database connexion
 // unset($this->databaseConnection); 
 // $this->databaseConnection = null;
  // Return query result
  return (!empty($result)) ? $result : FALSE;

} 


public function listedemrenouvel($id_user){

  // Query SQL
  $querySQl = 'SELECT id_renouvellement, raisonsociale, nomprenoms, sexe, typecontrat, visas_statu.libelle_statu FROM visas_renouvellement, visas_statu WHERE visas_statu.code_statu = visas_renouvellement.statu AND id_user="'.$id_user.'"';
  // Prepare and execute query
 
  $query = $this->databaseConnection->prepare($querySQl);
  $query->execute();
 
  // Fetching direct query result
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
 
  // Close database connexion
 // unset($this->databaseConnection); 
 // $this->databaseConnection = null;
  // Return query result
  return (!empty($result)) ? $result : FALSE;

} 

public function listeuser(){

  $querySQl = 'SELECT id_user,raisonsociale, password, visas_type_user.lib_type_user FROM visas_user, visas_type_user WHERE visas_user.id_type_user = visas_type_user.id_type_user';
  // Prepare and execute query
 
  $query = $this->databaseConnection->prepare($querySQl);
  $query->execute();
 
  // Fetching direct query result
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
 
  // Close database connexion
 // unset($this->databaseConnection); 
 // $this->databaseConnection = null;
  // Return query result
  return (!empty($result)) ? $result : FALSE;

}

public function lcount(){

  // Query SQL
  $querySQl = 'SELECT count(id_demande)nbre FROM visas_demande, visas_statu';
  // Prepare and execute query
 
  $query = $this->databaseConnection->prepare($querySQl);
  $query->execute();
 
  // Fetching direct query result
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
 
  // Close database connexion
 // unset($this->databaseConnection); 
 // $this->databaseConnection = null;
  // Return query result
  return (!empty($result)) ? $result : FALSE;

}






    
}