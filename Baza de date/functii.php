<?php

$conn = bd_connect();

function bd_connect() {
    global $conn;
    $conn = oci_connect('MADALINA', 'MADALINA', 'localhost/xe');
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    return $conn;
}

function is_logged_in() {
    global $conn;
    global $err;
    global $e;
    $token = isset($_COOKIE["auth"]) ? $_COOKIE["auth"] : '';
   
    if($token == '') 
        return false;

    $query = "  DECLARE
                v_result NUMBER;
                BEGIN
                userPackage.verificareToken(:v_result, '".$token."');
                END;";
    $stid = oci_parse($conn, $query);
    oci_bind_by_name($stid, ':v_result', $result,1);
    oci_execute($stid, OCI_DEFAULT);
    oci_free_statement($stid);
    if ($result == "1")
        return true;
    else return false;
    
       
}

function login ($username, $passwd) {
    global $conn;
    global $err;
    global $e;
    $query = "DECLARE 
                v_token users.token%type;
                res users.token%type;
            BEGIN 
            userPackage.conectareUser(:v_token, '".$username."', '".$passwd."');
            END;";
    
    $stid = oci_parse($conn, $query);
    oci_bind_by_name($stid, ':v_token', $result, 32);
    oci_execute($stid, OCI_DEFAULT);
    oci_free_statement($stid);
    if ($result == "fail")
        return '';
    setcookie("auth", $result, time()+3600*24);
    return $result;
        
}

?>