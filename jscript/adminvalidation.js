function validateForm() {
    // Retrieve the form inputs
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var contactnumber = document.getElementById('contactnumber').value;

    // Regular expression patterns
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Requires a valid email format
    var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/; // Requires at least one digit, one lowercase letter, one uppercase letter, and allows special characters. Password length must be between 8 and 20 characters.
    var firstnamePattern = /^[A-Z][a-zA-Z ]*$/; // Requires the first name to start with an uppercase letter, followed by optional lowercase letters or spaces.
    var lastnamePattern = /^[A-Z][a-zA-Z ]*$/; // Requires the last name to start with an uppercase letter, followed by optional lowercase letters or spaces.
    var contactnumberPattern = /^\d{11}$/; // Requires exactly 11 digits for the contact number.

  
    if (!emailPattern.test(email)) {
        alert('Error Email');
        return false;
    }


    if (!passwordPattern.test(password)) {
        alert('Password Requires at least one digit, one lowercase letter, one uppercase letter, Password length must also be between 8 and 20 characters');
        return false;
    }

   
    if (!firstnamePattern.test(firstname)) {
        alert(' Your first name must start with an uppercase letter');
        return false;
    }
    

   
    if (!lastnamePattern.test(lastname)) {
        alert('Your last name must start with an uppercase letter');
        return false;
    }

    if (!contactnumberPattern.test(contactnumber)) {
        alert('Contact Number must be exactly 11 digits with no space');
        return false;
    }

    return true; 

}