<?php                  

wp_enqueue_script('cufon',MX_THEME_URL.'/ext/cufon/cufon-yui.js');
wp_enqueue_script('cufon-myriad-pro',MX_THEME_URL.'/ext/cufon/myriad-pro.cufonfonts.js');

function cufon_replace(){
?>
<script language="JavaScript">
<!--
/*Cufon.replace('.meta', { fontFamily: 'Myriad Pro Condensed', hover: true }); 
Cufon.replace('.myriad_pro_semibold', { fontFamily: 'Myriad Pro Semibold', hover: true }); 
//Cufon.replace('.mx_comments .comment-reply-link', { fontFamily: 'Myriad Pro Regular', hover: true }); 
Cufon.replace('.mx_comments .commentmetadata', { fontFamily: 'Myriad Pro Condensed Italic', hover: true }); 
Cufon.replace('h3,h4,h5,h3 a,h4 a,h5 a', { fontFamily: 'Myriad Pro Condensed', hover: true }); 
Cufon.replace('.box .header,.wp-caption-text,.mx_comments .comment-reply-link,th', { fontFamily: 'Myriad Pro Bold Italic', hover: true }); 
Cufon.replace('.myriad_pro_bold_condensed_italic', { fontFamily: 'Myriad Pro Bold Condensed Italic', hover: true }); 
Cufon.replace('h1,.col2 h2', { fontFamily: 'Myriad Pro Bold Condensed', hover: false }); */
/*Cufon.replace('#header h1 a,#header h1 a:hover', { fontFamily: 'Myriad Pro Bold Condensed',color: '-linear-gradient(#B5D5FC, 0.45=#ffffff, 0.45=#ffffff, #B5D5FC)',textShadow: '#074084 0.5px 1px, #074084 0px 0px', hover: false }); */
//Cufon.replace('h2,h1', { fontFamily: 'Myriad Pro Bold', hover: true, color: '#333333',textShadow: '#ccc 0px 0.8px, #333 0px 0px' }); 
//-->
</script>
<?php    
}

add_action("wp_head","cufon_replace");