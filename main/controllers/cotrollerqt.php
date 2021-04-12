<?php

//  -----------------------------------------------------------------
//  |                                                       
//  |   DIRECTIVES AND INCLUSIONS                                       
//  |                                                       
//  -----------------------------------------------------------------
//  ...
//  -----------------------------------------------------------------
//  |                                                       
//  |   GLOBAL VARIABLES AND DATA RECEIVED (via POST or GET)                                       
//  |                                                       
//  -----------------------------------------------------------------
$client = (isset($_POST["client"]) && !empty($_POST["client"]) && is_string($_POST["client"])) ? $_POST["client"] : "";
$instruction = (isset($_POST["instruction"]) && !empty($_POST["instruction"]) && is_string($_POST["instruction"])) ? $_POST["instruction"] : "";
//  -----------------------------------------------------------------
//  |                                                       
//  |   CLIENT REQUEST PROCESSING ACCORDING INSTRUCTIONS                                  
//  |                                                       
//  -----------------------------------------------------------------
switch($instruction) {
    case "UPDATE_QUANTITY_PROD":
        //---------------------------------------------
        // Send response according the client
        //---------------------------------------------
        if (isset($client) && !empty($client)) {
            switch ($client) {
                case "entretenir":   
                    // Get parameters 
                      
                      $nom_pnom_dem = (isset($_POST["nom_pnom_dem"]) && !empty($_POST["nom_pnom_dem"]) && is_string($_POST["nom_pnom_dem"])) ? htmlspecialchars($_POST["nom_pnom_dem"]) : "";
                      $num_aej_dem = (isset($_POST["num_aej_dem"]) && !empty($_POST["num_aej_dem"]) && is_string($_POST["num_aej_dem"])) ? $_POST["num_aej_dem"] : "";
                      $sexe_dem = (isset($_POST["sexe_dem"]) && !empty($_POST["sexe_dem"]) && is_string($_POST["sexe_dem"])) ? htmlspecialchars($_POST["sexe_dem"]) : "";
                      $niv_forma = (isset($_POST["niv_forma"]) && !empty($_POST["niv_forma"]) && is_string($_POST["niv_forma"])) ? htmlspecialchars($_POST["niv_forma"]) : "";
                      $niv_exp = (isset($_POST["niv_forma"]) && !empty($_POST["niv_forma"]) && is_string($_POST["niv_forma"])) ? htmlspecialchars($_POST["niv_forma"]) : "";
                      $adequa_form_exp = (isset($_POST["adequa_form_exp"]) && !empty($_POST["adequa_form_exp"]) && is_string($_POST["adequa_form_exp"])) ? htmlspecialchars($_POST["adequa_form_exp"] ): "";
                      $con_metier_activ  = (isset($_POST["con_metier_activ"]) && !empty($_POST["con_metier_activ"]) && is_string($_POST["con_metier_activ"])) ? htmlspecialchars($_POST["con_metier_activ"]) : "";
                      $adq_form_metier_activ  = (isset($_POST["adq_form_metier_activ"]) && !empty($_POST["adq_form_metier_activ"]) && is_string($_POST["adq_form_metier_activ"])) ? htmlspecialchars($_POST["adq_form_metier_activ"]) : "";
                      $adq_exp_metier_activ = (isset($_POST["adq_exp_metier_activ"]) && !empty($_POST["adq_exp_metier_activ"]) && is_string($_POST["adq_exp_metier_activ"])) ? htmlspecialchars($_POST["adq_exp_metier_activ"]) : "";
                      $mait_out_rech_empl = (isset($_POST["mait_out_rech_empl"]) && !empty($_POST["mait_out_rech_empl"]) && is_string($_POST["mait_out_rech_empl"])) ? htmlspecialchars($_POST["mait_out_rech_empl"]) : "";
                      $con_exig_march = (isset($_POST["con_exig_march"]) && !empty($_POST["con_exig_march"]) && is_string($_POST["con_exig_march"])) ? htmlspecialchars($_POST["con_exig_march"]) : "";
                      $dep_doss_ent = (isset($_POST["dep_doss_ent"]) && !empty($_POST["dep_doss_ent"]) && is_string($_POST["dep_doss_ent"])) ? htmlspecialchars($_POST["dep_doss_ent"]) : "";
                      $cons_canaux = (isset($_POST["cons_canaux"]) && !empty($_POST["cons_canaux"]) && is_string($_POST["cons_canaux"])) ? htmlspecialchars($_POST["cons_canaux"] ): "";
                      $temp_recherche_empl = (isset($_POST["temp_recherche_empl"]) && !empty($_POST["temp_recherche_empl"]) && is_string($_POST["temp_recherche_empl"])) ?htmlspecialchars( $_POST["temp_recherche_empl"]) : "";
                      $autonomie = (isset($_POST["autonomie"]) && !empty($_POST["autonomie"]) && is_string($_POST["autonomie"])) ? htmlspecialchars($_POST["autonomie"]) : "";
                      $appreciation = (isset($_POST["appreciation"]) && !empty($_POST["appreciation"]) && is_string($_POST["appreciation"])) ? htmlspecialchars($_POST["appreciation"]) : "";
                      $axe_orien= (isset($_POST["axe_orien"]) && !empty($_POST["axe_orien"]) && is_string($_POST["axe_orien"])) ? htmlspecialchars($_POST["axe_orien"]) : "";
                      $preciser = (isset($_POST["preciser"]) && !empty($_POST["preciser"]) && is_string($_POST["preciser"])) ? htmlspecialchars($_POST["preciser"]) : "";
                      $date = (isset($_POST["date"]) && !empty($_POST["date"]) && is_string($_POST["date"])) ? htmlspecialchars($_POST["date"] ): "";
                      $id_users = (isset($_POST["id_users"]) && !empty($_POST["id_users"]) && is_string($_POST["id_users"])) ? $_POST["id_users"] : "";
                    // Processing
                      $resultat = $UserRequest->insert_entretenir($nom_pnom_dem, $num_aej_dem, $sexe_dem, $niv_forma, $niv_exp, $adequa_form_exp, $con_metier_activ, $adq_form_metier_activ, $adq_exp_metier_activ, $mait_out_rech_empl, $con_exig_march, $dep_doss_ent, $cons_canaux, $temp_recherche_empl, $autonomie, $appreciation, $axe_orien, $preciser, $date, $id_users);
                      
                    // Response
                    $response = array(
                        'error' => false,
                        'data' => $resultat
                    );
                    break;

                    case "update":
                        
                        $nom_pnom_dem = (isset($_POST["nom_pnom_dem"]) && !empty($_POST["nom_pnom_dem"]) && is_string($_POST["nom_pnom_dem"])) ? htmlspecialchars($_POST["nom_pnom_dem"]) : "";
                        $num_aej_dem = (isset($_POST["num_aej_dem"]) && !empty($_POST["num_aej_dem"]) && is_string($_POST["num_aej_dem"])) ? $_POST["num_aej_dem"] : "";
                        $sexe_dem = (isset($_POST["sexe_dem"]) && !empty($_POST["sexe_dem"]) && is_string($_POST["sexe_dem"])) ? htmlspecialchars($_POST["sexe_dem"]) : "";
                        $niv_forma = (isset($_POST["niv_forma"]) && !empty($_POST["niv_forma"]) && is_string($_POST["niv_forma"])) ? htmlspecialchars($_POST["niv_forma"]) : "";
                        $niv_exp = (isset($_POST["niv_forma"]) && !empty($_POST["niv_forma"]) && is_string($_POST["niv_forma"])) ? htmlspecialchars($_POST["niv_forma"]) : "";
                        $adequa_form_exp = (isset($_POST["adequa_form_exp"]) && !empty($_POST["adequa_form_exp"]) && is_string($_POST["adequa_form_exp"])) ? htmlspecialchars($_POST["adequa_form_exp"] ): "";
                        $con_metier_activ  = (isset($_POST["con_metier_activ"]) && !empty($_POST["con_metier_activ"]) && is_string($_POST["con_metier_activ"])) ? htmlspecialchars($_POST["con_metier_activ"]) : "";
                        $adq_form_metier_activ  = (isset($_POST["adq_form_metier_activ"]) && !empty($_POST["adq_form_metier_activ"]) && is_string($_POST["adq_form_metier_activ"])) ? htmlspecialchars($_POST["adq_form_metier_activ"]) : "";
                        $adq_exp_metier_activ = (isset($_POST["adq_exp_metier_activ"]) && !empty($_POST["adq_exp_metier_activ"]) && is_string($_POST["adq_exp_metier_activ"])) ? htmlspecialchars($_POST["adq_exp_metier_activ"]) : "";
                        $mait_out_rech_empl = (isset($_POST["mait_out_rech_empl"]) && !empty($_POST["mait_out_rech_empl"]) && is_string($_POST["mait_out_rech_empl"])) ? htmlspecialchars($_POST["mait_out_rech_empl"]) : "";
                        $con_exig_march = (isset($_POST["con_exig_march"]) && !empty($_POST["con_exig_march"]) && is_string($_POST["con_exig_march"])) ? htmlspecialchars($_POST["con_exig_march"]) : "";
                        $dep_doss_ent = (isset($_POST["dep_doss_ent"]) && !empty($_POST["dep_doss_ent"]) && is_string($_POST["dep_doss_ent"])) ? htmlspecialchars($_POST["dep_doss_ent"]) : "";
                        $cons_canaux = (isset($_POST["cons_canaux"]) && !empty($_POST["cons_canaux"]) && is_string($_POST["cons_canaux"])) ? htmlspecialchars($_POST["cons_canaux"] ): "";
                        $temp_recherche_empl = (isset($_POST["temp_recherche_empl"]) && !empty($_POST["temp_recherche_empl"]) && is_string($_POST["temp_recherche_empl"])) ?htmlspecialchars( $_POST["temp_recherche_empl"]) : "";
                        $autonomie = (isset($_POST["autonomie"]) && !empty($_POST["autonomie"]) && is_string($_POST["autonomie"])) ? htmlspecialchars($_POST["autonomie"]) : "";
                        $appreciation = (isset($_POST["appreciation"]) && !empty($_POST["appreciation"]) && is_string($_POST["appreciation"])) ? htmlspecialchars($_POST["appreciation"]) : "";
                        $axe_orien= (isset($_POST["axe_orien"]) && !empty($_POST["axe_orien"]) && is_string($_POST["axe_orien"])) ? htmlspecialchars($_POST["axe_orien"]) : "";
                        $preciser = (isset($_POST["preciser"]) && !empty($_POST["preciser"]) && is_string($_POST["preciser"])) ? htmlspecialchars($_POST["preciser"]) : "";
                        $id_demandeurs  = (isset($_POST["id_demandeurs"]) && !empty($_POST["id_demandeurs"]) && is_string($_POST["id_demandeurs"])) ? $_POST["id_demandeurs"] : "";
                        $resultat = $UserRequest->update_entre($nom_pnom_dem, $num_aej_dem, $sexe_dem, $niv_forma, $niv_exp, $adequa_form_exp, $con_metier_activ, $adq_form_metier_activ, $adq_exp_metier_activ, $mait_out_rech_empl, $con_exig_march, $dep_doss_ent, $cons_canaux, $temp_recherche_empl, $autonomie, $appreciation, $axe_orien, $preciser, $id_demandeurs);
                        if($resultat){
                            $_SESSION['user']= true;
                            header($url1 ."?page=listemenu");
                        }
                        
                    break;

                    case "guichet":   
                        // Get parameters 
                        $id_agence_users = (isset($_POST["id_agence_users"]) && !empty($_POST["id_agence_users"]) && is_string($_POST["id_agence_users"])) ? htmlspecialchars($_POST["id_agence_users"]) : "";
                          
                        // Processing
                          $resultat1 = $UserRequest->liste_guichet1($id_agence_users);
                        // Response
                        $response = array(
                            'error' => false,
                            'data' => $resultat1
                        );
                        break;

                    
                default :
                    $response = array('tag' => $instruction, 'success' => 0, 'error' => true,
                        'error_msg' => "Le serveur ne reconnait pas le client utilisé");
                    break;
            }
        } else {
            $response = array('tag' => $instruction, 'success' => 0, 'error' => true,
                'error_msg' => "Le serveur ne reconnait pas le client utilisé");
        }
        break;
    default:
        break;
}
//  -----------------------------------------------------------------
//  |                                                       
//  |   CLIENT REQUEST PROCESSING ACCORDING CONTEXT (INSTRUCTIONS)                                  
//  |                                                       
//  -----------------------------------------------------------------
if (isset($response)) {
    echo json_encode($response); 
} else if (isset($instruction) && !empty($instruction)) {
    echo json_encode($response);
} else {
    die(header("HTTP/1.1 400 Bad Request"));
}