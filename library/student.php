<?php
$file_path = realpath(dirname(__FILE__));
include_once($file_path.'/database.php');
 ?>

<?php

class Student
{
private $db;

 public  function __construct()
  {
    $this->db = new Database();
  }

  public function get_students(){
    $query= "select * from users";
    $results = $this->db->select($query);
    return $results;
}
public function get_one_student($id){
  $query= "select * from users where id=$id";
  $results = $this->db->select($query);
  return $results;
}

public function insertdata($name,$email,$sa_id){
  $name = mysqli_real_escape_string($this->db->link,$name);
  $email = mysqli_real_escape_string($this->db->link,$email);
  $sa_id = mysqli_real_escape_string($this->db->link,$sa_id);

  if (empty($name) || empty($email) || empty($sa_id)){
    $msg= "<div class= 'alert alert-danger'> <strong> Error! </strong> Field must not be empty ! </div>" ;
    return $msg;
  }
  else {
    $query = "insert into users(name,email,roll) values('$name','$email','$sa_id')";
    $insert = $this->db->insert($query);



    if ($insert){
      $msg= "<div class= 'alert alert-success'> <strong> success! </strong> Data inserted successfully ! </div>" ;
      return $msg;
    } else {
      $msg= "<div class= 'alert alert-danger'> <strong> Error! </strong> Data not inserted ! </div>" ;
      return $msg;
    }

  }

}

public function insertAttend($cur_date,$attend = array()){
  $query = 'select distinct atten_time from attendence';
  $get_data = $this->db->select($query);
  if ($get_data) {
  while ($result = $get_data->fetch_assoc()){
    $db_date= $result['atten_time'];
    if ($cur_date == $db_date) {
      $msg= "<div class= 'alert alert-danger'> <strong> Notice! </strong> Attendence already taken ! </div>" ;
      return $msg;
    }
  }
  }
  
  foreach ($attend as $attend_key => $attend_value) {

    if ($attend_value == "present") {
        $stu_query = "insert into attendence(roll,atten,atten_time) values ('$attend_key','present', now())";
        $data_insert= $this->db->insert($stu_query);

    }elseif ($attend_value == "absent") {

      $stu_query = "insert into attendence(roll,atten,atten_time) values ('$attend_key','absent', now())";
      $data_insert= $this->db->insert($stu_query);
    }
  }
  if ($data_insert){
    $msg= "<div class= 'alert alert-success'> <strong> success! </strong> Attendence inserted successfully ! </div>" ;
    return $msg;
  } else {
    $msg= "<div class= 'alert alert-danger'> <strong> Error! </strong> Attendence not inserted ! </div>" ;
    return $msg;
  }
}

  public function get_datelist(){
    $query = 'select distinct atten_time from attendence';
    $result = $this->db->select($query);
    return $result;
  }

public function getAlldata($dt){
  $query = "select users.name,users.email, attendence.*
  from users inner join attendence on users.roll = attendence.roll
  where atten_time ='$dt'";
  $result = $this->db->select($query);
  return $result;
}

public function updatesAttend($dt,$attend){

  foreach ($attend as $attend_key => $attend_value) {

    if ($attend_value == "present") {
      $query = " update attendence set atten = 'present' where roll = '".$attend_key."' and atten_time = '".$dt."' ";
      $data_update= $this->db->update($query);

    }elseif ($attend_value == "absent") {
      $query = " update attendence set atten = 'absent' where roll = '".$attend_key."' and atten_time = '".$dt."' ";
      $data_update= $this->db->update($query);

    }
  }
  if ($data_update){
    $msg= "<div class= 'alert alert-success'> <strong> success! </strong> Attendence data update successfully ! </div>" ;
    return $msg;
  } else {
    $msg= "<div class= 'alert alert-danger'> <strong> Error! </strong> Attendence data not updated ! </div>" ;
    return $msg;
  }
}

public function delUser($roll){
  $query = "DELETE FROM attendence WHERE roll=$roll";
  $del_user = $this->db->delete($query);

  $query = "DELETE FROM users WHERE roll=$roll";
  $del_user = $this->db->delete($query);



  if ($del_user){
    $msg= "<div class= 'alert alert-success'> <strong> success! </strong> User Data Deleted successfully ! </div>" ;
    return $msg;
  } else {
    $msg= "<div class= 'alert alert-danger'> <strong> Error! </strong> User Data Not Deleted ! </div>" ;
    return $msg;
  }
}
 public function updatetData($magic,$name,$email,$sa_id){

   $name = mysqli_real_escape_string($this->db->link,$name);
   $email = mysqli_real_escape_string($this->db->link,$email);
   $sa_id = mysqli_real_escape_string($this->db->link,$sa_id);

   if (empty($name) || empty($email) || empty($sa_id)){
     $msg= "<div class= 'alert alert-danger'> <strong> Error! </strong> Field must not be empty ! </div>" ;
     return $msg;
   }
   else {
     $up_query= "update users
       set
       name= '$name',
       email= '$email',
       roll = '$sa_id'
       where roll= $magic" ;
     $update = $this->db->update($up_query);


     $up_query= "update attendence
       set
       roll = '$sa_id'
       where roll= $magic" ;
     $update = $this->db->update($up_query);

     if ($update){
       $msg= "<div class= 'alert alert-success'> <strong> success! </strong> Data inserted successfully ! </div>" ;
       return $msg;
     } else {
       $msg= "<div class= 'alert alert-danger'> <strong> Error! </strong> Data not inserted ! </div>" ;
       return $msg;
     }

   }

 }

}
 ?>
