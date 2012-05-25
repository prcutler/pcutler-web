<?php 
 

function minimax_base_interface(){
    include("tpls/base-interface.php");
}

//function minimax_load_exts(){
    $exts = scandir(MX_THEME_DIR.'/ext/');
   foreach($exts as $ext){
       if(file_exists(MX_THEME_DIR.'/ext/'.$ext.'/extend.php'))
       include(MX_THEME_DIR.'/ext/'.$ext.'/extend.php');
       
   }
//}




?>