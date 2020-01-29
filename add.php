<?php
include 'include/header.php';
include 'library/student.php';
?>

<?php
$stu= new Student ();
if ($_SERVER['REQUEST_METHOD']== 'POST'){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $sa_id = $_POST['sa_id'];
  $insert_data = $stu->insertdata($name,$email,$sa_id);
}
 ?>

 <?php
 if (isset($insert_data)){
   echo $insert_data;
 }

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
                  <input type="text" class="form-control" id="name" placeholder="Please enter Student/Employee name" name= "name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Please enter Student/Employee email address" aria-describedby="emailHelp" required>
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="sa_id">ID</label>
                  <input type="text" class="form-control" id="sa_id" placeholder="Please enter Student/Employee ID" name= "sa_id" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>


              </form>

            </div>
          </div>

        </section>

<?php include 'include/footer.php' ?>
