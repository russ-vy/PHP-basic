<?php

    if (isset($_SESSION['userID'])){
        header("Location: /");
        return;
    }
    elseif (isset($_POST['login']) && isset($_POST['passwd'])){
        if (auth()){
            if ($_SESSION['isAdmin'])
                header("Location: /admin");
            else
                header("Location: /");
            return;
        }
    }

?>

<div class='container'>

    <form class="login col-4" action="/login" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="passwd" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="register" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Register</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>