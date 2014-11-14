<?php
require ('connection.php');



if (!empty($_POST['FName'])) {



    //write the sql statement with placehonders
    $sql_update = "UPDATE tbl_person "
            . "SET FName = :FName, "
            . "LName = :LName, "
            . "City = :City, "
            . "st = :st, "
            . "Salary = :Salary, "
            . "Email = :Email, "
            . "VMake = :VMake, "
            . "VModel = :VModel, "
            . "VModel = :VModel "
            . "WHERE ID = :ID";

    //prepare the squel statement
    $sqlh_edit = $pdo->prepare($sql_update);


    //Sanitize Information
    $ud_FName = filter_var($_POST['FName'],FILTER_SANITIZE_STRING);
    $ud_LName = filter_var($_POST['LName'],FILTER_SANITIZE_STRING);
    $ud_City = filter_var($_POST['City'],FILTER_SANITIZE_STRING);
    $ud_State = filter_var($_POST['st'],FILTER_SANITIZE_STRING);
    $ud_Salary = filter_var($_POST['Salary'],FILTER_SANITIZE_STRING);
    $ud_Email = filter_var($_POST['Email'],FILTER_SANITIZE_STRING);
    $ud_VMake = filter_var($_POST['VMake'],FILTER_SANITIZE_STRING);
    $ud_VModel = filter_var($_POST['VModel'],FILTER_SANITIZE_STRING);
    $ud_ID = filter_var($_POST['ID'], FILTER_SANITIZE_NUMBER_INT);



    //bind parameters
    $sqlh_edit->bindparam(":FName",$ud_FName);
    $sqlh_edit->bindparam(":LName",$ud_LName);
    $sqlh_edit->bindparam(":City",$ud_City);
    $sqlh_edit->bindparam(":st",$ud_State);
    $sqlh_edit->bindparam(":Salary",$ud_Salary);
    $sqlh_edit->bindparam(":Email",$ud_Email);
    $sqlh_edit->bindparam(":VMake",$ud_VMake);
    $sqlh_edit->bindparam(":VModel",$ud_VModel);
    $sqlh_edit->bindparam(":ID", $ud_ID);

//input data
    $sqlh_edit->execute();

//open display data page
    header("Location: edit_display.php");
}


$sql_editData = "Select * "
        . " From tbl_person"
        . " Where ID="
        . $_SESSION['persEditID'];

$result_editDate = $pdo->query($sql_editData);

$row_edit = $result_editDate->fetch();

//----States
//Query to select states
$sql_st = "SELECT DISTINCT st " .
        "FROM tbl_state " .
        "Order by st";

//execute the select query       
$result_st = $pdo->query($sql_st);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Data</title>
        

    </head>
    <body>
        <?php
        include 'menu.php';
        ?>

        <h2>Edit Data</h2>
        <form method="POST" action="edit.php"  onsubmit="return confirm('Are you sure you want to continue')">
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="2">Person Information</th>

                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>First Name</td>
                        <td><input type="text" name="FName" value="<?php echo $row_edit['FName'] ?>" size="20" /></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="LName" value="<?php echo $row_edit['LName'] ?>" size="20" /></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><input type="text" name="City" value="<?php echo $row_edit['City'] ?>" size="20" /></td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td><select name="st" >

                                <?php
                                while ($row = $result_st->fetch()) {
                                    if ($row['st'] === $row_edit['st']) {

                                        echo('<option value="' . $row['st'] . '" selected>' . $row['st'] . '</option>');
                                    } else {
                                        echo('<option value="' . $row['st'] . '">' . $row['st'] . '</option>');
                                    }
                                }
                                ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Salary</td>
                        <td><input type="text" name="Salary" value="<?php echo $row_edit['Salary'] ?>" size="20" /></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="Email" value="<?php echo $row_edit['Email'] ?>" size="20" /></td>
                    </tr>
                    <tr>
                        <td>Vehicle Make</td>
                        <td><input type="text" name="VMake" value="<?php echo $row_edit['VMake'] ?>" size="20" /></td>
                    </tr>
                    <tr>
                        <td>Vehicle Model</td>
                        <td><input type="text" name="VModel" value="<?php echo $row_edit['VModel'] ?>" size="20" /></td>
                    </tr>
                    <tr>
                        <td>Vehicle Pic</td>
                        <td><input type="file" name="VPic" value="<?php echo $row_edit['VPic'] ?>" size="20" /></td>
                    </tr>
                    <tr>
                        <td>Record Id: <?php echo $row_edit['ID'] ?>  
                            <input type="hidden" name="ID" value="<?php echo $row_edit['ID'] ?> "/></td>
                        <td><input type="submit" value="Enter"/></td>
                    </tr>
                </tbody>
            </table>
        </form>


    </body>
</html>
