<?php
/**
 * Plugin Name: Adventure Design Dev
 * Plugin URI: http://adventure-design.nl
 * Description: Development Tools
 * Version: 1.0.0
 * Author: Roy van Laar
 * Author URI: http://roy.vanlaar.co
 * License: GPL2
 */


add_action( 'wp_footer', 'ADDev' );

function ADDev() {
    
    if (is_user_logged_in()){
    
    echo ('<div style="position: fixed; bottom: 0; left: 0; right: 0; padding: 25px 0; width: 100%; background: #000; color: #fff; z-index: 99999; text-align: center; font-size: 0.8rem;">');
    echo ('Number of queries: ');
    $numQueries = get_num_queries();
    $maxQueries = '60';
        
        if( $numQueries > $maxQueries ){
            echo ('<span style="color: #E74C3C !important; font-weight: bold;">');
        } else { echo ('<span style="color: #27AE60 !important; font-weight: bold;">'); }
            echo $numQueries;
            echo _e(' queries');
        
            echo ' (Max is ' . $maxQueries . ')';
        
        if( $numQueries > $maxQueries ){
            echo ('</span>');
        } else { echo ('</span>'); }   
        
    echo ('&nbsp; | &nbsp;'); 
        
    echo ('Load time: ');
    $loadTime = timer_stop(0); 
    $maxTime = 2;
        if( $loadTime >= $maxTime ){
            echo ('<span style="color: #E74C3C !important; font-weight: bold;">');
        } else { echo ('<span style="color: #27AE60 !important; font-weight: bold;">'); }
            echo $loadTime;
            echo _e(' seconds');
        
            echo ' (Max is ' . $maxTime . ')';
        
        if( $loadTime > $maxTime ){
            echo ('</span>');
        } else { echo ('</span>'); }   
        
    echo ('&nbsp; | &nbsp;'); 
        
    echo ('Browser: ');
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
       echo 'Internet explorer';
     elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
        echo 'Internet explorer';
     elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
       echo 'Mozilla Firefox';
     elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
       echo 'Google Chrome';
     elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
       echo "Opera Mini";
     elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
       echo "Opera";
     elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
       echo "Safari";
     else
       echo 'Something else'; 
        
    echo ('&nbsp; | &nbsp;'); 
        
        
        $current_user = wp_get_current_user();
        
        echo ('Current user: <a href="mailto:');
        echo $current_user->user_email;
        echo ('" style="text-decoration: none; color: #fff; border-bottom: 1px solid #fff;">');
        echo $current_user->user_login;
        echo ('</a> / ');
        $user_info = get_userdata(1);
        echo ' Role: ' . implode(', ', $user_info->roles);
    
    }
    
}