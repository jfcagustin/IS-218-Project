function validate() {
    var fname = document.getElementById("fname").value;
    var letters = "/^[A-Za-z]+$/";
    if(fname.match(letters)) {
        return true;
    }

    else
    {
        document.getElementById('fname').innerHTML="*Numbers not allowed*";
        return false;
    }

    var lname = document.getElementById("lname").value;
    if(lname.match(letters)) {
        return true;
    }

    else
    {
        document.getElementById('lname').innerHTML="*Numbers not allowed*";
        return false;
    }
    var email = document.getElementById("email").value;
    var emailreq="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/"
    if(email.match(emailreq)) {
        return true;
    }

    else
    {
        document.getElementById('email').innerHTML="*You need an @ and .*";
        return false;
    }

    var password = document.getElementById("email").value;
    var passwordreq="/(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{1,}/"
    if(password.match(passwordreq)) {
        return true;
    }

    else
    {
        document.getElementById('password').innerHTML="*You need at least one special character.*";
        return false;
    }

}
