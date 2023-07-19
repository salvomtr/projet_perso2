<?php
  
//==============================================================================
/**
* Output a debug message as a string
*
* Save a debug message using print_r.
*
* @param mixed $item value to be printed
* @param boolean $html convert result to an HTML string
*/
//==============================================================================

function gs_strprint ($item, $html = true) {
    ob_start ();
    print_r ($item);
    $p = ob_get_contents ();
    ob_end_clean ();
  
    return ($html ? htmlentities ($p) : $p);
  }
  
  //==============================================================================
  /**
  * Output a debug message
  *
  * Print a debug message using print_r, with PRE HTML encoding (or not).
  *
  * @param mixed $item value to be printed
  * @param boolean $html convert result to an HTML string
  */
  //==============================================================================
  
  function gs_print ($item, $html = true) {
    echo
      ($html
      ? '<pre>'.gs_strprint ($item, true).'</pre>'
      : gs_strprint ($item, false));
  }
  
  //==============================================================================
  /**
  * Fonction pour se connecter a lq bqse de donnees, retourne le lien mySQL 
  */
  //==============================================================================
  
  function My_mysql_connect () {

    //-- on se connecte 
    $host = '127.0.0.1';
    $login = 'root';
    $password = '';
    $bdd = 'projet_perso';

    $BddLinkAdmin = mysqli_connect($host,$login,$password,$bdd);
    return $BddLinkAdmin;

  }  


  //==============================================================================
  /**
  * Fonction pour faire le login 
  */
  //==============================================================================
  
  function My_login_user ($mail, $password) {
    $BddLinkAdmin = My_mysql_connect ();

    //-- On pose une question
    $laRequette = "select * from utilisateur where mail='".$mail."' and motDePasse='".$password."' ";
    //gs_print ($laRequette);
    $monResult =  mysqli_query ($BddLinkAdmin, $laRequette);
  
    //-- on affiche chaque elements de la réponse 
    $row = mysqli_fetch_array ($monResult);
      
    //-- on libere la memoire
    mysqli_free_result($monResult);
    
    //-- on ferme la connection mySQL
    mysqli_close($BddLinkAdmin);    

    return $row;
  }


?> 	