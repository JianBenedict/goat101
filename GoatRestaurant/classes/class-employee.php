<?php
class Employee{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='test';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	// to get the code functions for the employees
	
	public function new_employee($firstname,$lastname,$contactnumber,$email,$address){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$firstname,$lastname,$contactnumber,$email,$address],
		];
		$stmt = $this->conn->prepare("INSERT INTO employee (firstname,lastname,contactnumber,email,address) VALUES (?,?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}

		return true;

	}

	public function update_employee($firstname,$lastname,$contactnumber,$email,$id,$address){
		
		$sql = "UPDATE employee SET firstname=:firstname,lastname=:lastname,contactnumber=:contactnumber,email=:email,EmployeeId=:EmployeeId,address=:address WHERE EmployeeId=:EmployeeId";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':firstname'=>$firstname,':lastname'=>$lastname,':contactnumber'=>$contactnumber,':email'=>$email,':EmployeeId'=>$id,':address'=>$address,));
		return true;
	}

	public function list_employee(){
		$sql="SELECT * FROM employee";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
}
public function delete_employee($id)
	{
		$sql = "DELETE FROM employee WHERE EmployeeId = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $id);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	function get_EmployeeId($id){
		$sql="SELECT EmployeeId FROM employee WHERE EmployeeId = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$EmployeeId = $q->fetchColumn();
		return $EmployeeId;
	}

	function get_email($id){
		$sql="SELECT email FROM employee WHERE EmployeeId = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$email = $q->fetchColumn();
		return $email;
	}
	function get_firstname($id){
		$sql="SELECT firstname FROM employee WHERE EmployeeId = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$firstname = $q->fetchColumn();
		return $firstname;
	}
	function get_lastname($id){
		$sql="SELECT lastname FROM employee WHERE EmployeeId = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$lastname = $q->fetchColumn();
		return $lastname;
	}
	function get_contactnumber($id){
		$sql="SELECT contactnumber FROM employee WHERE EmployeeId = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$contactnumber = $q->fetchColumn();
		return $contactnumber;
	}
	function get_address($id){
		$sql="SELECT address FROM employee WHERE EmployeeId = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$address = $q->fetchColumn();
		return $address;
	}
	

	function get_session(){
		if(isset($_SESSION['login']) && $_SESSION['login'] == true){
			return true;
		}else{
			return false;
		}
	}
	public function check_login($email,$password){
		
		$sql = "SELECT count(*) FROM tbl_admin WHERE email = :email AND password = :password"; 
		$q = $this->conn->prepare($sql);
		$q->execute(['email' => $email,'password' => $password ]);
		$number_of_rows = $q->fetchColumn();
		

	
		if($number_of_rows == 1){
			
			$_SESSION['login']=true;
			$_SESSION['email']=$email;
			return true;
		}else{
			return false;
		}
	}
}
