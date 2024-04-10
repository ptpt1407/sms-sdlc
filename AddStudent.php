<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<style>
    table{
        width: 100%;
        height: auto;
    }
    input{
        width: 300px;
        border-radius: 10px;    
    }
</style>
<body>
<form method="post">
        <table>
            <caption><b>Add Student</b></caption>
            <tr>
                <td>Rollno</td>
                <td><input type="text" name="Rollno"/> </td>
            </tr>
            <tr>
                <td>Student Name</td>
                <td><input type="text" name="Sname"/> </td>
            </tr>
            <tr>
                <td>Student Address</td>
                <td><input type="text" name="Address"/> </td>
            </tr>
            <tr>
                <td>Student Email</td>
                <td><input type="text" name="Email"/> </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Add" name="btnAdd"/>
                    <input type="reset" value="Cancel" name="btnCancel"/>
                    <a href="StudentList.php">Back</a>
                    <?php
                    include "db_conn.php";
                    if(isset($_POST['btnAdd'])) {
                        $Rollno = $_POST['Rollno'];
                        $Sname = $_POST['Sname'];
                        $Address = $_POST['Address'];
                        $Email = $_POST['Email'];
                        if($Rollno=="" || $Sname=="" || $Address=="" || $Email=="") {
                            echo "(*) Fields cannot be empty";
                        } else {
                            $sql = "SELECT Rollno FROM students WHERE Rollno='$Rollno'";
                            $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result)==0) {
                                $sql = "INSERT INTO students VALUES ('$Rollno', '$Sname', '$Address', '$Email')";
                                mysqli_query($conn,$sql);
                                header("Location: StudentList.php");
                                //echo '<meta http-equiv="refresh" content="0; URL=StudentList.php">';
                            } else {
                                echo "Student already exists";
                            }
                        }
                    }
                    ?>

                </td>
            </tr>
        </table>
    </form>
</body>
</html>