
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/demo.css">
</head>

<body>


<?php

        session_start(); //Create session in  browser
        $sessionID = session_id();  //Setting and storing session ID
        setcookie("session_id",$sessionID,time()+3600,"/","localhost",false,true);   //Terminate cookie after 1 hour


        echo'<script> 			
					function loadDoc(method,url,htmlTag)
						{
							var xhttp = new XMLHttpRequest(); 
							xhttp.onreadystatechange = function() 
						{
							if(this.readyState==4 && this.status==200)
						{
							console.log("CSRF token scuessfully fetched : "+this.responseText);
							document.getElementById(htmlTag).setAttribute(\'value\', this.responseText) ;//.value = this.responseText;		   
						}
						};
							xhttp.open(method,url,true);
							xhttp.send();
							}
				</script>';

        echo '<div class="container-fluid">
                <header>
                    
                    <div class="limiter">
                        <h1>Cross Site Request Forgery Protection</h1>
                    </div>
                    
                    
                    
                </header>
                <div class ="logout">
                <a href="logoutClass.php">
                    <button class="btn btn-danger logoutbtn">Logout</button>  </a>

                <button onclick="myFunction()" class="btn btn-default viewbtn" >Token</button>
            </div>
                
                <div class="containerForm">
                    <div class="heading">
                        <h2>Welcome to Post me!</h2>
                    </div>
                    <div class="main">
                        <form method="POST" action="server.php">
                        
                            <div class="form-group owner">
                                <label for="owner">Owner</label>
                                <input type="text" class="form-control" id="owner">
                            </div>
                           <div class="form-group index">
                                <label for="index no">Index No</label>
                                <input type="text" class="form-control" id="INDEX NO">
                            </div>
                            
                        
                            <div class="form-group " id="submit">
                                <button type="submit" name="submit" class="btn btn-default" >Confirm</button>
                            </div>
                            
                            
                             <div class="form-group token" id="token1">
                                <label for="token1"></label>
                                <input type="text" class="form-control" id="csToken" name="CSR">
                            </div>
                            
                            
                          
                         </form>
                    </div>
                </div>
            </div>';



        echo '<script>
            var token = loadDoc("POST","server.php","csToken"); 

            </script>';


    ?>




                        <script>
                            function myFunction() {
                                var x = document.getElementById("token1");
                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                } else {
                                    x.style.display = "none";
                                }
                            }
                        </script>

</body>

</html>
