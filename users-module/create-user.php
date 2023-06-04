<!DOCTYPE html>
<html>

  <head>
    <title>Register Employee</title>
    <link rel="stylesheet" type="text/css" href="css/create-user.css">
  </head>

  <script src="jscript/adminvalidation.js"></script>

  <!-- employee registration form -->
  <body>
    <div class = "container" >
      <div class="form-block">
        <h3 class="form-heading">Provide the Required Information</h3>
        <form class="form" method="POST" action="processes/process-user.php?action=new" onsubmit="return validateForm()">
          <div class="form-block-half">
            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" placeholder="Your email.." required>
            <label for="password">Password</label>
            <input type="password" id="password" class="input" name="password" placeholder="Enter password.." required>
          </div>
          
          <div class="form-block-half">
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" class="input" name="firstname" placeholder="Your name.." required>
            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" class="input" name="lastname" placeholder="Your last name.." required>
            <label for="contactnumber">Contact Number</label>
            <input type="text" id="contactnumber" class="input" name="contactnumber" placeholder="Your contact number.." required>
          </div>
          
          <div class="button-block">
            <input type="submit" value="Save" class="submit-button">
          </div>
        </form>
      </div>
    </div>
  </body>
  
</html>