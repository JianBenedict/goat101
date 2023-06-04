    <?php
    include '../classes/class-employee.php';
    // to get the code functions

    $action = isset($_GET['action']) ? $_GET['action'] : '';

    switch($action){
        case 'new':
            create_new_employee();
        break;
        case 'update':
            update_employee();
        break;
        case 'delete':
            delete_employee();
        break;
    }

    function create_new_employee(){
        $employee = new employee();
        $firstname = ucwords($_POST['firstname']);
        $lastname = ucwords($_POST['lastname']);
        $contactnumber = $_POST['contactnumber'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $type = $_POST['type'];

        
        $result = $employee->new_employee($firstname,$lastname,$contactnumber,$email,$address,$type);
        if($result){
            
            header('location: ../index.php?page=employees&subpage=emplist');
        }
    }
    function delete_employee()
{
    if (isset($_POST['EmployeeId']) && is_numeric($_POST['EmployeeId'])) {
        $employee = new Employee();
        $id = $_POST['EmployeeId'];
        $result = $employee->delete_employee($id);
        if ($result) {
            header('location: ../index.php?page=employees&subpage=emplist');
        } else {
            echo "Error deleting product.";
        }
    } else {
        echo "Invalid product ID.";
    }
}

    function update_employee(){
        $employee = new employee();
        $firstname = ucwords($_POST['firstname']);
        $lastname = ucwords($_POST['lastname']);
        $contactnumber = $_POST['contactnumber'];
        $email = $_POST['email'];
        $id = $_POST['EmployeeId'];
        $address = $_POST['address'];
        $type = $_POST['type'];
        
        $result = $employee->update_employee($firstname, $lastname, $contactnumber, $email, $id, $address, $type);
        if($result){
            header('location: ../index.php?page=employees&subpage=emplist');
        }
    }

    function deactivate_user(){
        $user = new User();
        $user_id = $_POST['userid']; 
        $result = $user->deactivate_user($user_id);
        if($result){
            header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$user_id);
        }
    }