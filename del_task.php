<?php

    session_start();

    error_reporting( 0 );

    if ( !( isset( $_SESSION['Name'] ) ) )
    {
       header( "Location: login.php" );
       exit;
    }

    if ( !is_numeric( $_GET['id'] ) ) 
       header( "Location: " . $_SERVER['HTTP_REFERER'] . "" );

    if ( $_SESSION['Name'] == "ROOT" )  
    {
       include( "config.php" ); 
		
       mysql_connect( $conf['dbhost'], $conf['dbuser'], $conf['dbpass'] ); 
       mysql_select_db( $conf["dbname"] ); 
			
       $id = mysql_real_escape_string( $_GET['id'] );
	
       mysql_query( "DELETE FROM tasks WHERE id='$id' LIMIT 1" );
	
       mysql_query( "DELETE FROM tasks_exec WHERE task_id='$id'" );

       header( "Refresh: 1; url = show_task.php" );
    }
    else
    {
       include( "header.php" );
       echo "Please login at root, observers cant delete task"; 
    }

?>
