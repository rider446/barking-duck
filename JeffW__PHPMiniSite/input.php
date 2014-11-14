<?php
require './connection.php';

echo $dbstatus;

//Query to select states
$sql_st = "SELECT st " .
        "FROM tbl_state " .
        "Order by st";

//execute the select query       
$result_st = $pdo->query($sql_st);
?>

<html>
    <head>
        <title>Input Page</title>
    </head>
    <body>
        <form method="POST" action="display.php">
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="2">Person Information</th>

                    </tr>
                </thead>
                <?php
                    include 'menu.php';
                ?>
                <tbody>
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" name="FName" value="" size="20" /></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="LName" value="" size="20" /></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><input type="text" name="City" value="" size="20" /></td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td><select name="st" >

                                <?php
                                while ($row = $result_st->fetch()) {
                                    echo('<option value="' . $row['st'] . '">' . $row['st'] . '</option>');
                                    print_r($row);
                                }
                                ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Salary</td>
                        <td><input type="text" name="Salary" value="" size="20" /></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="Email" value="" size="20" /></td>
                    </tr>
                    <tr>
                        <td>Vehicle Make</td>
                        <td><input type="text" name="VMake" value="" size="20" /></td>
                    </tr>
                    <tr>
                        <td>Vehicle Model</td>
                        <td><input type="text" name="VModel" value="" size="20" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Enter" /></td>
                    </tr>
                </tbody>
            </table>
            </form>
    </body>
</html>