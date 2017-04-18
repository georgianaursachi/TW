<?php


if (isset($_POST["login"]) && isset($_POST["uname"]) && isset($_POST["psw"])) {
    $result = login ($_POST["uname"], $_POST["psw"]);
   
    header('Location: index.php');
    exit();
}


function show_header($titlu) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <title><?php echo $titlu; ?></title>
    </head>
    <style>
        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
               display: block;
               float: none;
            }
            .cancelbtn {
               width: 100%;
            }
        }
    </style>
    <body>
    

    <?php
}

function show_footer() {
        global $err;
        global $e;
    if ($e > 0) 
        print_r($err);
    ?>

        </body>
        </html>
        
    <?php
}

function show_login(){
      ?>
    <h2>Login Form</h2>

    <form method="post">

      <div class="container">
        <label><b>E-mail</b></label>
        <input type="text" placeholder="Enter e-mail" name="uname" required>

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit" name = "login">Login</button>
        <input type="checkbox" checked="checked"> Remember me
      </div>

      <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
      </div>
    </form>
        <?php
}

function show_table ($pagina, $filtru) {
    global $conn;
    global $name_edit;
    global $err;
    global $e;
    echo "<table><tr><td>Disease Name</td><td>Description</td><td>Salt</td><td>Sugar</td><td>Fats</td><td>Carbs</td><td>Fiber</td><td>Protein</td><td>Calories</td><td>Saturates</td></tr>";
    $query = "SELECT disease_name, nvl(description, 'NULL') as DESCRIPTION, NVL(salt, 0.0) AS SALT, NVL(sugar, 0.0) AS SUGAR,  NVL(FATS, 0.0) AS FATS,  NVL(CARBOHYDRATE,0.0) AS CARBOHYDRATE,  NVL(FIBER, 0.0) AS FIBER,  NVL(PROTEIN, 0.0) AS PROTEIN,  NVL(CALORIES, 0.0) AS CALORIES,  NVL(SATURATES, 0.0) AS SATURATES from (select m.disease_name, m.description, m.salt, m.sugar, m.fats, m.carbohydrate, m.fiber, m.protein, m.calories, m.saturates, rownum r from diseases m where disease_name like '".$filtru."%' order by id) where r >= (".$pagina."-1)*20+1 and r <= ".$pagina."*20";
        
    $stid = oci_parse($conn, $query);  
    oci_execute($stid);
        
    while(($row = oci_fetch_array($stid, OCI_ASSOC)) != false){
		if ($row["DISEASE_NAME"] == $name_edit) 
		{
            $disease_name = $row["DISEASE_NAME"];
            $description = $row["DESCRIPTION"];
            $salt = ($row["SALT"]);
            $sugar = ($row["SUGAR"]);
            $fats = ($row["FATS"]);
            $carbs = ($row["CARBOHYDRATE"]);
            $fiber = ($row["FIBER"]);
            $protein = ($row["PROTEIN"]);
            $calories = ($row["CALORIES"]);
            $saturates = ($row["SATURATES"]);
		}
		echo "<tr><td>".$row["DISEASE_NAME"]."</td><td>".$row["DESCRIPTION"]."</td><td>".$row["SALT"]."</td><td>".$row["SUGAR"]."</td><td>".$row["FATS"]."</td><td>".$row["CARBOHYDRATE"]."</td><td>".$row["FIBER"]."</td><td>".$row["PROTEIN"]."</td><td>".$row["CALORIES"]."</td><td>".$row["SATURATES"]."</td><td>
			<a href='index.php?filter=$filtru&page=$pagina&oper=delete&disease_name=".$row["DISEASE_NAME"]."'>Delete</a> | 
			<a href='index.php?filter=$filtru&page=$pagina&oper=edit&disease_name=".$row["DISEASE_NAME"]."' onClick=\"show();\">Edit</a>
		</td></tr>";
	}
    oci_free_statement($stid);
	echo "</table> <br> <hr>";
	if ($pagina>1) {
		echo "<a href='index.php?filter=$filtru&page=".($pagina-1)."' onClick=\"hide();\">Back</a> | ";
	}
	if ($pagina<50) {
		echo "<a href='index.php?filter=$filtru&page=".($pagina+1)."' onClick=\"hide();\">Next</a>";
	}
    
    ?>
      
    <br> <hr>
	
	<form name="loginForm" action="" method="post">
			<div class="auth_colt_stanga_jos"></div>
			<div class="auth_colt_dreapta_sus"></div>
			<div class="auth_title"><div class="auth_logo"></div><span>Filtrare: <input type="text" name="filtru" maxlength="50" value="<?php echo $filtru;?>"> <input class="but_autentificare" type="submit" name="submit" value="Filter">
			</div>
		</form>		
	<HR>	
		<form id="formular" name="loginForm" action="" method="post">
			<div class="auth_colt_stanga_jos"></div>
			<div class="auth_colt_dreapta_sus"></div>
			<div class="auth_title"><div class="auth_logo"></div><span>Add / Edit Diseases</span></div>
			<div class="auth_form">
				<input type='hidden' name="operation" value="<?php echo $name_edit;?>">
				<div class="auth_form_label"><span>Disease_Name</span> <input type="text" name="disease_name" maxlength="50" value="<?php echo $disease_name;?>"><div class="clear"></div></div>
				<div class="auth_form_label"><span>Description</span> <input type="text" name="description" maxlength="50" value="<?php echo $description;?>"><div class="clear"></div></div>
				<div class="auth_form_label"><span>Salt</span> <input type="text" name="salt" maxlength="50" value="<?php echo $salt;?>"><div class="clear"></div></div>
                <div class="auth_form_label"><span>Sugar</span> <input type="text" name="sugar" maxlength="50" value="<?php echo $sugar;?>"><div class="clear"></div></div>
                <div class="auth_form_label"><span>Fats</span> <input type="text" name="fats" maxlength="50" value="<?php echo $fats;?>"><div class="clear"></div></div>
                <div class="auth_form_label"><span>Carbohydrate</span> <input type="text" name="carbs" maxlength="50" value="<?php echo $carbs;?>"><div class="clear"></div></div>
                <div class="auth_form_label"><span>Fiber</span> <input type="text" name="fiber" maxlength="50" value="<?php echo $fiber;?>"><div class="clear"></div></div>
                <div class="auth_form_label"><span>Protein</span> <input type="text" name="protein" maxlength="50" value="<?php echo $protein;?>"><div class="clear"></div></div>
                <div class="auth_form_label"><span>Calories</span> <input type="text" name="calories" maxlength="50" value="<?php echo $calories;?>"><div class="clear"></div></div>
                <div class="auth_form_label"><span>Saturates</span> <input type="text" name="saturates" maxlength="50" value="<?php echo $saturates;?>"><div class="clear"></div></div>
			</div>
			<div class="auth_butoane">
					<input class="but_autentificare" type="submit" name="submit" value="Save">
			</div>
		</form>  
        <script>
        function hide(){
            document.getElementById("formular").style.display = 'none';
        }	
        function show(){
            document.getElementById("formular").style.display = 'block';
        }	
        </script>
    <?php
}

?>

