<!DOCTYPE html>
<html>
<head>
    <title text-align=center>Login</title>
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>
    <header><?php include('./include/header.php');?></header>
    <div style = " margin-left: 200px; border-style: solid; border-color: #15223d;">
    <main>
        <form id="login-form" class="login-form" method="POST">
        <div class="login-text"><h1>Login</h1></div>
            <table id="register">
                <tr>
                    <th><label for="username">Username:</label></th>
                    <th><input type="text" id="username" name="username"></th>
                </tr>
                <tr>
                    <th><label for="pass">Password:</label></th>
                    <th><input type="password" id="pass" name="pass"></th>
                </tr>
                <tr>
                    <th><div align="center"><button  dtype="submit" class="button" name="login" value="Login" style = "color: white; background-color: #15223;"><span>Login </span> </button></div></th>
                </tr>
                <tr>
                    <th><p class="center"> New user? <a href="./registration.php">Register here</a></p></th>
                </tr>
            </table>
        </form>
        <div id="error">
        </div>
    </div>
    </main>
    <script>
            $(function() {
                $('#login-form').on('submit', function(e){
                    e.preventDefault();

                    let $error = $('#error');

                    $.ajax({
                        type: 'POST',
                        url: './functions/request.php',
                        data: $(this).serialize()
                    }).then(function(res){
                        let data = JSON.parse(res);

                        if(data.error){
                            $error.html(data.error);
                            return;
                        }

                        localStorage.setItem("token", data.token);
                        location.href = './home.php';
                    }).fail(function(res){
                        $error.html('Cannot login please try later');
                    });
                });
            });
        </script>
</body>
</html>