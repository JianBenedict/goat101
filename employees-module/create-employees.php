<!DOCTYPE html>
<html>

  <head>
    <title>Register Employee</title>
    <link rel="stylesheet" type="text/css" href="css/create-user.css">
  </head>
  <!-- To create employee forms -->
  <body>
    <div class="container">
      <div class="form-block">
        <h3 class="form-heading">Provide the Required Information</h3>
        <form class="form" method="POST" action="processes/process-employee.php?action=new">
          <div class="form-block-half">
          <label for="firstname">First Name</label>
            <input type="text" id="firstname" class="input" name="firstname" placeholder="Your name.." required>
            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" class="input" name="lastname" placeholder="Your last name.." required>            
            
          <div class="form-block-half">
          <label for="contactnumber">Contact Number</label>
            <input type="text" id="contactnumber" class="input" name="contactnumber" placeholder="Your contact number.." required>
            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" placeholder="Your email.." required>
            <label for="address">Address</label>
            <input type="address" id="address" class="input" name="address" placeholder="Your address.." required>

            <label for="type">Employee Position</label>
            <select id="type" name="type">
              <option value="Cook">Cook</option>
              <option value="Server">Server</option>
              <option value="Cashier">Cashier</option>

            </select>
          </div>
          <div class="button-block">
            <input type="submit" value="Save" class="submit-button">
          </div>
        </form>
      </div>
    </div>
  </body>
  
</html>
