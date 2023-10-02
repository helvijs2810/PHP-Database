<html>
<head>
    <title>Ace Training Registration</title>
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
</head>
<body>
    <header><?php include('./include/header.php'); ?></header>
    <form id="reg-form" class="reg-form" method="POST" action="./functions/register_routine.php" style = " margin-left: 200px; border-style: solid; border-color: #15223d">
        <div class="register-text"><h2>Register Form</h2></div>
        <table>
            <tr><td><label for="forename">Enter Forename</label></td></tr>
            <tr>
                <td><input id="forename" type="text" name="forename" autocomplete="off" required /></td>
            </tr>
            <tr><td><label for="surname">Enter Surname</label></td></tr>
            <tr>
                <td><input id="surname" type="text" name="surname" autocomplete="off" required /></td>
            </tr>
            <tr><td><label for="password">Enter Password</label></td></tr>
            <tr>
                <td><input id="password" type="password" name="password"  autocomplete="off" required /></td>
            </tr>
            <tr><td><label for="repassword">Confirm your Password</label></td></tr>
            <tr>
                <td><input id="repassword" type="password" name="repassword" autocomplete="off" required /></td>
            </tr>
            <tr><td><label for="email">Enter an Email</label></td></tr>
            <tr>
                <td><input id="email" type="text" name="email" autocomplete="off" required /></td>
            </tr>
            <tr>
                <td>
                    <p>Please Select a gender</p>
                </td>
            </tr>
            <tr>
                <td><label for="male">Male</label><input type="radio" name="gender" value="male"></td>
                <td><label for="female">Female</label><input type="radio" name="gender" value="female"></td>
                <td><label for="other">Other</label><input type="radio" name="gender" value="other"> </td>
            </tr>
            <tr>
                <td>Please Select User Type</td>
            </tr>
            <tr>
                <td><label for="student">Student</label><input type="radio" name="type" value="student"></td>
                <td><label for="tutor">Tutor</label><input type="radio" name="type" value="tutor"></td>
                <td><label for="admin">Admin</label><input type="radio" name="type" value="admin"></td>
            </tr>
            <tr>
                <td><div><button type="submit" class="button" name="registerBtn" value="Create"><span>Create </span> </button></div></td>
            </tr>
            <tr>
                <td><p class="center">Already have an account? <a href="./login.php">Login here</a></p></td>
            </tr>
        </table>
    </form>
</body>
<script>
    //jQuery script running while page is loaded
	$(document).ready(function() {
        //Create two methods for regex string comparison
        jQuery.validator.addMethod("alphabet", function(value, element) {
                return this.optional(element) || /^[a-zA-Z]+$/i.test(value);
        }, "Letters only please");

        jQuery.validator.addMethod("strongpass", function(value, element) {
                return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])/i.test(value);
        }, "Weak password (use at least one capital/small letter, number and special character)");
        
        //Validating from using jQuery functionality
        $("#reg-form").validate({
            rules: {
                forename : {
                required: true,
                minlength: 3,
                alphabet: true
                },
                surname : {
                required: true,
                minlength: 3,
                alphabet: true
                },
                password: {
                required: true,
                minlength : 5,
                strongpass: true
                }, 
                repassword: {
                required: true,
                minlength : 5,
                equalTo: "#password"
                },
                email: {
                required: true,
                email: true
                },
                gender: {
                required: true
                },
                type: {
                required: true
                }
        },
        //Set error messages if validation fails
        messages : {
            forename: {
                minlength: "Forename should be at least 3 characters",
            },
            surname: {
                minlength: "Surname should be at least 3 characters",
            },
            password: {
                min: "Password must be at least 5 characters long",
            },
            repassword: {
                min: "Password too short compared to original",
                equalTo: "Confirmation password does not match original password"
            },
            email: {
                email: "The email should be in the format: abc@domain.tld"
            },
            gender: {
                required: "Select valid gender",
            },
            type: {
                required: "Select your occupation",
            }
        }
    });
});
</script>
</html>