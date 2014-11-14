<?php
require ('connection.php');

if (isset($_POST)) {
    
    if (!empty($_POST['action'])) {
        if ($_POST['action'] === 'Delete') {
            $pID = filter_var($_POST['ID'], FILTER_SANITIZE_STRING);
            $sql_delete = "DELETE FROM tbl_person WHERE ID = " . $pID;
            $pdo->exec($sql_delete);
        }

      if ($_POST['action'] === 'Edit')
      {
          //NOTE: you cannot send any output to the current page (Display_Edit.php
          //You must go directly to the new page.
          $_SESSION['persEditID'] = filter_var($_POST['ID'], FILTER_SANITIZE_NUMBER_INT);  
          header("Location:edit.php");
      }
        
   }
    
    
}

$sql_selectEdit = "SELECT FName, LName, City, st, Salary, VMake, VModel, VPic, ID"
        . " FROM tbl_person "
        . " ORDER BY LName";

$result_edit = $pdo->query($sql_selectEdit);
?>

<html>
    <head>
        <title></title>
    </head>
    <body>
<?php
include 'menu.php';
?>


        <table border="1">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Salary</th>
                    <th>VMake</th>
                    <th>VModel</th>
                    <th>Car Pic</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
<?php
while ($row = $result_edit->fetch()) {
    echo('<tr>'
    . '<td>' . $row['FName'] . "</td>"
    . "<td>" . $row['LName'] . "</td>"
    . "<td>" . $row['City'] . "</td>"
    . "<td>" . $row['st'] . "</td>"
    . "<td>" . $row['Salary'] . "</td>"
    . "<td>" . $row['VModel'] . "</td>"
    . "<td>" . $row['VMake'] . "</td>"
    . '<td><img src="Pics//'. $row['VPic'] . '" width="100px"></td>'
    . '<td><form method="POST" action="edit_display.php"><input type="hidden" name="ID" value="'
    . $row['ID'] . '"/>'
    . '<input type="submit" value="Edit" name="action" />&nbsp;&nbsp;'
    . '<input type="submit" value="Delete" name="action" />'
    . '</form></td></tr>');
}
?>

            </tbody>
        </table>

    </body>
</html>