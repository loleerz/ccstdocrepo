<?php
    // session_start();
    ob_start();
    include ('connection.php');

    if(isset($_POST['signin']))
    {
        //re-assign POST variables
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    *{
        font-family: 'Poppins', sans-serif;
    
    }
    .wrapper{
        background-image: url(a/bgg.jpg) ;

        background-repeat: no-repeat;
        background-size:100% 100%; 
        min-height:100vh;
        margin: 0;
        padding: 0;
    }
    .main{
        /*display: flex;
        justify-content: center;
        align-items: center;
        position: center;
    
    
        width: 550px;
        height: 300px;
        border: 1px solid red;*/
        padding: 20pt;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        width: 500px;
        height: 480px;
        
        background-color: #e9ecef;
        
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto;
        max-width: 100%;
        max-height: 100%;
        overflow: auto; 
    }
    .avatar{
        justify-content: center;
        width: 70px;
    
    }

    .input-box .input-box .input-field {
        width: 100px;
        padding: 40px;
        box-sizing: 2px solid black;
        background-color: white;
    
    }

    .input-box header {
    
        font-weight: 680;
        text-align: center;
        margin-bottom: 30px;
        font-size:20px;
    }
    .input-field{
        display: flex;
        flex-direction: column;
        position: relative;
        padding: 0 10px 0 10px;
    }
    .input{
        height: 45px;
        width: 100%;
        background: transparent;
        border: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
        outline: none;
        margin-bottom: 20px;
        color: #40414a;
    }
    .input-box .input-field label{
        position: absolute;
        top: 10px;
        left: 10px;
        pointer-events: none;
        transition: .5s;
    }
    .input-field input:focus ~ label
    {
        top: -10px;
        font-size: 13px;
    }
    .input-field input:valid ~ label
    {
        top: -10px;
        font-size: 13px;
        color: #5d5076;
    }
    .input-field .input:focus, .input-field .input:valid{
        border-bottom: 1px solid #743ae1;
    }
    .link-secondary{
        font-size: small;
    }
    .submit{
        border: none;
        outline: none;
        height: 50px;
        background: gray;
        border-radius: 10px;
        transition: .4s;
    }
    .submit:hover{
        background: rgba(37, 95, 156, 0.937);
        color: white;
    }
    .login{
        text-align: center;
        font-size: small;
        margin-top: 30px;
        color: white;
    }
    span a{
        text-decoration: none;
        font-weight: 700;
        color: #000;
        transition: .5s;
    }
    span a:hover{
        text-decoration: underline;
        color: #000;
    }

    @media only screen and (max-width: 768px)
    {
        .text{
            position: absolute;
            top: 70%;
            text-align: center;
        }
        .text p, i{
            font-size: 16px;
        }
    }
</style>
  <div class="wrapper">
    <div  class="container main">
                <div class="input-box">
                  
                    <header>  
                        <table>
                            <tr>
                                <td>
                                    <img src="a/logo-re.png" class="avatar" alt="avatar">
                                </td>
                                <td>
                                    <span class="fs-6">
                                        Clark College of Science and Technology
                                    </span>
                                    <br> 
                                    <p class="text-start fs-6 fw-normal mb-2">
                                        Senior High School Department
                                    </p>
                                </td>
                            </tr>
                        </table>
                        <h3 id="h3">
                            Sign In
                            <?php
                                if(isset($_POST['signin']))
                                {
                                    // Prepare a parameterized query to check the username and password
                                    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
                                    $stmt = $conn->prepare($query);
                                    $stmt->bind_param("ss", $username, $password);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows == 1) 
                                    {
                                        $row = $result->fetch_assoc();
                                        $usertype = $row['usertype'];
                                        $employee = $row['employee_no'];
                                        session_start();
                                        // Start session if a data record occurs
                                        $_SESSION['username'] = $username;
                                        $_SESSION['password'] = $password;
                                        $_SESSION['usertype'] = $usertype;
                                        $_SESSION['employee'] = $employee;


                                        // If the user logged in successfully, reset the login attempt count
                                        $query = "UPDATE users SET login_attempts = 0 WHERE username = ?";
                                        $stmt = $conn->prepare($query);
                                        $stmt->bind_param("s", $username);
                                        $stmt->execute();

                                        // Redirect to page of the usertype
                                        if ($_SESSION['usertype'] == "admin") 
                                        {
                                            header("Location: adminIndex.php");
                                            ob_end_flush();
                                        } 
                                        elseif ($_SESSION['usertype'] == "teacher") 
                                        {
                                            header("Location: teacherIndex.php");
                                            ob_end_flush();
                                        } 
                                        elseif ($_SESSION['usertype'] == "registrar") 
                                        {
                                            header("Location: registrarIndex.php");
                                            ob_end_flush();
                                        } 
                                        elseif ($_SESSION['usertype'] == "coordinator") 
                                        {
                                            header("Location: coordinatorIndex.php");
                                            ob_end_flush();
                                        }
                                    } 
                                    else 
                                    {
                                        // Fetch the user's current login attempt count from the database
                                        $query = "SELECT login_attempts FROM users WHERE username = ?";
                                        $stmt = $conn->prepare($query);
                                        $stmt->bind_param("s", $username);
                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        if($result->num_rows == 1)
                                        {
                                            $row = $result->fetch_assoc();
                                            $attempts = $row['login_attempts'];
                                            echo "<p class='text-danger fs-6 fw-normal'>Invalid Username or Password</p>";
                                            // Increment the login attempt count and update the database
                                            $query = "UPDATE users SET login_attempts = login_attempts + 1 WHERE username = ?";
                                            $stmt = $conn->prepare($query);
                                            $stmt->bind_param("s", $username);
                                            $stmt->execute();

                                            // If the user has reached the maximum number of attempts, prevent them from logging in
                                            if ($attempts >= 3) {
                                                echo "<p class='text-danger fs-6 fw-normal'>You have reached the maximum number of login attempts. Please try again later.</p>";
                                                exit();
                                            }
                                        }
                                        else
                                        {
                                            echo "<p class='text-danger fs-6 fw-normal'>Invalid Username or Password</p>";
                                        }
                                    }
                                }
                            ?>
                        </h3>
                    </header>
                    
                    <form action="" method="post">
                        <div class="input-field">
                            <input type="text" class="input" name="username" id="username" required autocomplete="off">
                            <label for="username">User</label> 
                        </div> 
                        <div class="input-field">
                            <input type="password" class="input" name="password" id="password" required>
                            <label for="password">Password</label>
                        </div> 
                        <p class="text-end">
                            <a href="" class="link-secondary link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover text-end pe-3">
                                <em>
                                    Forgot Password?
                                </em>
                            </a>
                        </p>
                        <div class="input-field">
                            <input type="submit" class="submit" name="signin" value="Sign In">
                        </div>
                        <div class="row">
                            <div class="col">
                                <figcaption>Don't have an account yet?</figcaption>
                                <span>
                                    <a href="">Register here!</a>
                                </span>
                            </div>
                        </div> 
                    </form>
                </div>  
    </div>
</div>
</body>
</html>