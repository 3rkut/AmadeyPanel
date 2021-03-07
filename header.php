<?
    echo "<html>

              <head>
	
	         <title>Amadey CC</title>
	
	         <link rel=\"stylesheet\" type=\"text/css\" href=\"f.st\style.css\">
	
	         <meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\">

              </head>";

    echo "<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#000000\">
	     <tr>
		<td align=\"center\">
		<table border=\"0\" width=\"1200\" cellspacing=\"0\" cellpadding=\"0\" height=\"100%\">
			<tr>
			   <td bgcolor=\"#FF0000\"><div align=\"center\"><img src=\"images\logo_small.png\"></div></td>
			   <td align=\"center\"><font color=\"#DDDDDD\" size=\"4\">
				<img src=\"images\b1.png\"> <a href=\"statistic.php\"><font color=\"#DDDDDD\">STATISTIC</font></a>&nbsp; |&nbsp;
				<img src=\"images\b2.png\"> <a href=\"show_bots.php\"><font color=\"#DDDDDD\">ONLINE UNITS</font></a>&nbsp; |&nbsp;
				<img src=\"images\b3.png\"> <a href=\"show_bots.php?show=all\"><font color=\"#DDDDDD\">ALL UNITS</font></a>&nbsp; |&nbsp;
				<img src=\"images\b4.png\"> <a href=\"show_task.php\"><font color=\"#DDDDDD\">TASKS LIST</font></a>&nbsp; |&nbsp;
                                <img src=\"images\b5.png\"> <a href=\"settings.php\"><font color=\"#DDDDDD\">SETTINGS</font></a>&nbsp; |&nbsp;
                                <img src=\"images\b6.png\"> <a href=\"login.php?logout=1\"><font color=\"#DDDDDD\">LOGOUT [";
                                 
                                echo $_SESSION['Name'];

                                echo "]</font></a></font></td>


			</tr>
		</table>
		</td>

	    </tr>
          </table>";

    echo "<table border=\"0\" width=\"1000\" cellspacing=\"0\" cellpadding=\"0\" height=\"5\">
	     <tr>
		<td></td>
	     </tr>
          </table>";

?>