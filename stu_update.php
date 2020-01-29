<?php
include 'include/header.php';
include 'library/student.php';
?>

<?php
$id = $_GET['id'];
$stu= new Student ();

if ($_SERVER['REQUEST_METHOD']== 'POST'){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $sa_id = $_POST['sa_id'];
  $magic = $_POST['magic'];
  $update_data = $stu->updatetData($magic,$name,$email,$sa_id);
}
 ?>

 <?php
 if (isset($update_data)){
   echo $update_data;
 }
?>

<?php
$get_one_student = $stu->get_one_student($id)->fetch_assoc();
?>


        <section>
          <div class="card">

            <div class="card-header">
              <h2>
                <a type="button" class="btn btn-danger" href="student_view.php">View Student</a>
                <a class="btn btn-info float-right" href="index.php">Take Attendence</a>
              </h2>
            </div>

            <div class="card-body">

              <form  action="" method="post">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name"value="<?php echo $get_one_student['name']?>" name= "name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo $get_one_student['email']?>" aria-describedby="emailHelp" required>
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="sa_id">ID</label>
                  <input type="text" class="form-control" id="sa_id" value="<?php echo $get_one_student['roll']?>" name= "sa_id" required>
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" id="magic" value="<?php echo $get_one_student['roll']?>" name= "magic" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>


              </form>

            </div>
          </div>

        </section>

<?php include 'include/footer.php' ?>
