<?php
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $dept = $_POST['dept'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if(!empty($name))
    {
        if(!empty($email))
        {
            if(!empty($phone))
            {
                if(!empty($age))
                {
                    if(!empty($sex))
                    {
                        if(!empty($dept))
                        {
                            $host = "localhost";
                            $dbusername = "root";
                            $dbpassword = "";
                            $dbname = "trip";
                                
                            $conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname);
                            if(mysqli_connect_error())
                            {
                                die("Connection Error (".mysqli_connect_errno().")".mysqli_connect_error());
                            }
                            else
                            {
                                $sql = "INSERT INTO ustrip (name, age, sex, dept, email, phone) VALUES ('$name', '$age', '$sex', '$dept', '$email', '$phone');";
                                if($conn-> query($sql) == true)
                                {
                                    header("location:registered.php");
                                }
                                else
                                {
                                    $message = "Not Registered! Please Try Again!";
                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                }
                                $conn-> close();
                            }
                        }
                        else
                        {
                            die("Department cannot be empty!");
                        }
                    }
                    else
                    {
                        die("Gender cannot be empty!");
                    }
                }
                else
                {
                    die("Age cannot be empty!");    
                }
            }
            else
            {
                die("Phone Number cannot be empty!");
            }
        }
        else
        {
            die("E-Mail cannot be empty!");
        }
    }
    else
    {
        die("Name cannot be empty!");
    }	
}		
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <title>US Trip Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="trip pic">
    <div class="container">
        <h1>U.S. Trip Form</h1>
        <h3>Please Fill This Form for the Registration of US TRIP!</h3>
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter Your Name" autocomplete="off">
            <select name="age" id="age">
                <option>18</option>
                <option>19</option>
                <option>20</option>
                <option>21</option>
                <option>22</option>
                <option>23</option>
                <option>24</option>
                <option>25</option>
            </select>
            <select name="sex" id="sex">
                <option>Male</option>
                <option>Female</option>
                <option>Others</option>
            </select>
            <select name="dept" id="dept">
                <option>CSE</option>
                <option>IT</option>
                <option>ECE</option>
                <option>CE</option>
                <option>ME</option>
                <option>EE</option>
            </select>
            
            <input type="email" name="email" id="email" placeholder="Enter Your Email" autocomplete="off">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone Number" autocomplete="off">
            <button class="btn" name="submit">SUBMIT</button>

        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>
