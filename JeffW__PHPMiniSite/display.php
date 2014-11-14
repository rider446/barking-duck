<?php
//The purpose of this page is to display the data and diplay the input

require 'connection.php';

//write the sql statement with placehonders
$sql_input =    "INSERT INTO  tbl_person "
                . " (FName, "
                . "LName, "
                . "City, "
                . "st, "
                . "Salary, "
                . "Email, "
                . "VMake,"
                . "VModel) "
                . "VALUES ("
                . ":FName, "
                . ":LName, "
                . ":City, "
                . ":st, "
                . ":Salary, "
                . ":Email, "
                . ":VMake, "
                . ":VModel) ";

//prepare the squel statement
$sqlh_input = $pdo->prepare($sql_input);



//sanitize data
$FName = filter_var($_POST['FName'],FILTER_SANITIZE_STRING);
$LName = filter_var($_POST['LName'],FILTER_SANITIZE_STRING);
$City = filter_var($_POST['City'],FILTER_SANITIZE_STRING);
$State = filter_var($_POST['st'],FILTER_SANITIZE_STRING);
$Salary = filter_var($_POST['Salary'],FILTER_SANITIZE_STRING);
$Email = filter_var($_POST['Email'],FILTER_SANITIZE_STRING);
$VMake = filter_var($_POST['VMake'],FILTER_SANITIZE_STRING);
$VModel = filter_var($_POST['VModel'],FILTER_SANITIZE_STRING);

/*
 * 
ID Name	Description
FILTER_SANITIZE_EMAIL           Remove all characters, except letters, digits and !#$%&'*+-/=?^_`{|}~@.[]
FILTER_SANITIZE_ENCODED         URL-encode string, optionally strip or encode special characters
FILTER_SANITIZE_MAGIC_QUOTES	Apply addslashes()
FILTER_SANITIZE_NUMBER_FLOAT	Remove all characters, except digits, +- and optionally .,eE
FILTER_SANITIZE_NUMBER_INT	Remove all characters, except digits and +-
FILTER_SANITIZE_SPECIAL_CHARS	HTML-escape '"<>& and characters with ASCII value less than 32
FILTER_SANITIZE_FULL_SPECIAL_CHARS	 
FILTER_SANITIZE_STRING          Strip tags, optionally strip or encode special characters
FILTER_SANITIZE_STRIPPED	Alias of "string" filter
FILTER_SANITIZE_URL             Remove all characters, except letters, digits and $-_.+!*'(),{}|\\^~[]`<>#%";/?:@&=
FILTER_UNSAFE_RAW               Do nothing, optionally strip or encode special characters
 */


//bind parameters
$sqlh_input->bindparam(":FName",$FName);
$sqlh_input->bindparam(":LName",$LName);
$sqlh_input->bindparam(":City",$City);
$sqlh_input->bindparam(":st",$State);
$sqlh_input->bindparam(":Salary",$Salary);
$sqlh_input->bindparam(":Email",$Email);
$sqlh_input->bindparam(":VMake",$VMake);
$sqlh_input->bindparam(":VModel",$VModel);

$sqlh_input->execute();


//--Alternative Method using an array
/*
$sql_params=array(':dogname'=> $dogname,
                ':dogbreed' => $dogbreed,
                ':ownerfirstname' => $ownerfirstname ,
                ':ownerlastname' => $ownerlastname,
                ':city' => $city,
                ':st' => $st);
        
$sqlh_input->execute($sql_params);
 */       

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include 'menu.php';
        ?>
        <h2>Information Entered Successfully</h2>
        <?php
        echo ("First Name: $FName <br>");
        echo ("Last Name: $LName <br>");
        echo ("City: $City <br>");
        echo ("State: $State <br>");
        echo ("Salary: $Salary <br>");
        echo ("Email: $Email <br>");
        echo ("Vehicle Make: $VMake <br>");
        echo ("Vehicle Model: $VModel <br>");
        ?>
    </body>
</html>