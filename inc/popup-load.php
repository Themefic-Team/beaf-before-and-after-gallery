<?php 
// Ajax loaded page

 /*
* Enqueue css and js in frontend
*/

if(isset($_POST['id'])) { // when search type is change
    $id = $_POST['id'];
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );  
    echo do_shortcode('[bafg id="'.$id.'"]'); 
?>
 
 
<?php
}else{
     
    die;
}