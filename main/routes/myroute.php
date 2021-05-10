<?php
session_start();
$page = 'login';
$page = (isset($_GET['page'])&& !empty($_GET['page'])&& is_string($_GET['page'])) ? $_GET['page']:$page;

switch($page)
{
     case'login':
           include './main/views/components/head.php';
           include './main/views/body/all/login.php';
           include './main/views/components/script.php';
           include './main/views/components/footer.php';
     break;


     case'changidenty':
        
     break;


     case'menu':
    if (isset($_SESSION["login"]) && !empty($_SESSION["login"]) && $_SESSION["login"] == true) {
           include './main/views/components/head.php';
           include './main/views/components/navbar.php';
           include './main/views/components/header.php';
           include './main/views/body/user/menu.php';
           include './main/views/components/script.php';
           include './main/views/components/footer.php';
    } else {
          include './main/views/components/head.php';
          include './main/views/body/all/login.php';
          include './main/views/components/footer.php';
    }     
     break;

     case'monetreprise':
        
     break;

     case'updateinfo':
          
     break;

       case'montreprise1':
            
       break; //updateinfo

     case'contrat':
      
     break;

     case'listecontrat':
        

     break;

     case'fichecontrat':
        

     break;

     case'renouvellement':
      
     break;

     case'demandecarte':
      
     break;

    case'listedemrenouvel':
        if(isset($_SESSION["login"]) && !empty($_SESSION["login"]) && $_SESSION["login"]==true){
           include './main/views/components/head.php';
           include './main/views/components/header.php';
           include './main/views/body/user/listedemrenouvel.php';
           include './main/views/components/footer.php';
        }else{
           include './main/views/components/head.php';
           include './main/views/body/login.php'; 
           include './main/views/components/footer.php';
        } 
    break;

    case'listedemcarte':
        
    break;

    case'ajout_entreprise':
      
    break;

    case'user':
      include './main/controllers/user_controller.php'; 
    break;

     
    case'out':
        include './main/controllers/user_deconexion.php';
    break;

    default:
        
     break;
} 