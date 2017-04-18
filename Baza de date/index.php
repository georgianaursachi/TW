<?php
    include 'functii.php';  
    include 'html.php';

    $oper = isset($_GET["oper"]) ? $_GET["oper"] : "" ;
	$name = isset($_GET["disease_name"]) ? $_GET["disease_name"] : "" ;
	$page = isset($_GET["page"]) ? $_GET["page"] : 1 ;
	$filter  = isset($_GET["filter"]) ? $_GET["filter"] : "" ;
	if (!is_numeric($page) || $page<1)
		$page =1;

	$id_edit = 0;
	switch ($oper) {
		case "delete" :
			$query = "DELETE FROM DISEASES WHERE DISEASE_NAME = '".$name."'";
            $stid = oci_parse($conn, $query);
            oci_execute($stid, OCI_DEFAULT);
            oci_free_statement($stid);
			break;
		case "edit" :
			$name_edit = $name;
            
			break;
	}

	if (isset($_POST["submit"]) && $_POST["submit"] == "Save" && isset($_POST["disease_name"]) && isset($_POST["description"]) && isset($_POST["salt"]) && isset($_POST["sugar"]) && isset($_POST["fats"])&& isset($_POST["carbs"])&& isset($_POST["fiber"])&& isset($_POST["protein"])&& isset($_POST["calories"])&& isset($_POST["saturates"])) {
        
		$disease_name = $_POST["disease_name"];
		$description = $_POST["description"];
		$salt = ($_POST["salt"]);
        $sugar = ($_POST["sugar"]);
        $fats = ($_POST["fats"]);
        $carbs = ($_POST["carbs"]);
        $fiber = ($_POST["fiber"]);
        $protein = ($_POST["protein"]);
        $calories = ($_POST["calories"]);
        $saturates = ($_POST["saturates"]);
        
        if (is_numeric($salt) && is_numeric($sugar) && is_numeric($fats) && is_numeric($carbs) && is_numeric($fiber) && is_numeric($protein) && is_numeric($calories) && is_numeric($saturates)){
            $query = "DECLARE BEGIN diseasesPackage.updateDisease('".$disease_name."', '".$description."', ".$salt.", ".$sugar.", ".$fats.", ".$carbs.", ".$fiber.", ".$protein.", ".$calories.", ".$saturates."); END;";
            $stid = oci_parse($conn, $query);
            oci_execute($stid, OCI_DEFAULT);
            oci_free_statement($stid);
        }   
	}	
	
	if (isset($_POST["submit"]) && $_POST["submit"] == "Filter" ) {
		$filter = $_POST["filtru"];
		$page = 1;
	}

    show_header("ConDr");
    $auth = is_logged_in($conn);
   
    show_index($auth, $page, $filter);

    show_footer();

    function show_index($auth, $page, $filter) {
      if ($auth)
          show_table($page, $filter);
      else
          show_login();
    }


?>