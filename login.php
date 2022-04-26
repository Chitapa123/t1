<?php


require_once "config1.php";

require_once "sessio.php";


$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $name = trim($_POST['name']);

    $password = trim($_POST['password']);
	
    if (empty($name)) {

        $error .= '<p class="error">Please enter valid name.</p>';

    }


    if (empty($password)) {


        $error .= '<p class="error">Please enter your password.</p>';

    }

    if (empty($error)) {

        if($query = $db->prepare("SELECT * FROM users WHERE name = ?")) {

            $query->bind_param('s', $name);
			
            $query->execute();

            $row = $query->fetch();

            if ($row) {

                if (password_verify($password, $row['password'])) {

                    $_SESSION["userid"] = $row['id'];

                    $_SESSION["user"] = $row;

                    header("location: welcome.php");

                    exit;

                } else {

                    $error .= '<p class="error">The password is not valid.</p>';

                }

            } else {

                $error .= '<p class="error">No User exist with that name.</p>';

        }


        $query->close();

    }

    mysqli_close($db);

}

?>

<!doctype html>
<html>
<head>
<title> MYSELF </title>
</head>
<h1>My-PROFILE </h1>
<form name="myform" method="post" action=" " >
Name: <input type="text" name="name" class="form-control"required><br/>
Password: <input type="password" name="password" class="form-control"required><br/>
<input type="submit" name="submit" class="btn btn-primary" value="submit">
</form>

