<?php


$authentication_type = $_GET["type"];

if ($authentication_type == "login") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = find_user($email);

    if ($user->id == -1) {
        echo "<br>authentication failed :(";
        return;
    }

    if (password_verify($password, $user->password)) {
        echo "<br>authentication succesfull!!!";
    } else {
        echo "<br>wrong password!";
        echo "<br>password given: $password";
        echo "<br>password awaited: $user->password";
    }
} else if ($authentication_type == "register") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $id = random_int(1, 1000000);

    $params = ["id" => $id, "username" => $username, "password" => $hash, "email" => $email];
    $user = new Users($params);

    echo "<br>password given: $password<br>";

    $result = add_user($user);

    if ($result) {
        echo "<br>succesfully registered!!!";
    } else {
        echo "<br>failed to register :(";
    }
} else {
    header("location: ../index.php");
}
