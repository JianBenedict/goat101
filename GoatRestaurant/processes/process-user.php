<?php
include '../classes/class.user.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        create_new_admin();
	break;
    case 'update':
        update_user();
	break;
    case 'deactivate':
        deactivate_user();
	break;
}
//  the function to create, update or deactivate admins
function create_new_admin(){
	$admin = new Admin();
    $email = $_POST['email'];
    $lastname = ucwords($_POST['lastname']);
    $firstname = ucwords($_POST['firstname']);
    $password = $_POST['password'];
    $contactnumber = $_POST['contactnumber'];
    
    $result = $admin->new_admin($email,$password,$firstname,$lastname,$contactnumber);
    if($result){
        
        header('location: ../index.php?page=settings&subpage=list');
    }
}

function update_admin(){
	$user = new User();
    $email = $_POST['email'];
    $lastname = ucwords($_POST['lastname']);
    $firstname = ucwords($_POST['firstname']);
    $password = $_POST['password'];
    $contactnumber = $_POST['contactnumber'];
    
    $result = $admin->new_admin($email,$password,$lastname,$firstname,$contactnumber);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$user_id);
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