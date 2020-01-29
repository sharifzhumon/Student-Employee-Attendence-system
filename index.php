<?php
include 'include/header.php';
include 'library/student.php';
?>

<?php
// error_reporting(0);
$cur_date = date('Y-m-d');
$stu= new Student ();
if ($_SERVER['REQUEST_METHOD']== 'POST'){
  $attend = $_POST['attend'];
  $insert_attend = $stu->insertAttend($cur_date,$attend);
}
 ?>

 <?php
 if (isset($insert_attend)){
   echo $insert_attend;
 }
  ?>
        <section>
          <div class= 'alert alert-danger hidden' style="display:none"> <strong> Alert! </strong> Student attendence missing ! </div>
          <div class="card">

            <div class="card-header">
              <h2>
                <!-- <a class="btn btn-success" href="add.php">Add Student</a>
                <a class="btn btn-success" href="add.php">Add Student</a> -->
                <div class="btn-group" role="group" aria-label="Basic example">
                <a type="button" class="btn btn-danger" href="add.php"  style="border: 0.5px solid #cf2115;">Add Student</a>
                <a type="button" class="btn btn-danger" href="student_view.php"  style="border: 0.5px solid #cf2115;">View Student</a>
                </div>
                <a class="btn btn-info float-right" href="date_view.php">View All</a>
              </h2>
            </div>

            <div class="card-body">
              <div class="alert alert-secondary text-center">
              <h5>  <strong>Date: </strong> <?php echo $cur_date?> </h5>
              </div>
              <form  action="" method="post">
                <table class="table  table-hover">
                  <thead>
                    <th width="13%">Serial</th>
                    <th width="27%">Student/Employee Name</th>
                    <th width="15%">ID</th>
                    <th width="30%">Email</th>
                    <th width="15%">Attendence</th>
                  </thead>

            <?php
            $get_student = $stu->get_students();

            if ($get_student){
              $i=0;
              while ($values = $get_student->fetch_assoc()) {
                $i++;
             ?>

                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $values['name']; ?></td>
                    <td><?php echo $values['roll']; ?></td>
                    <td><?php echo $values['email']; ?></td>
                    <td>
                      <input type="radio" name="attend[<?php echo $values['roll']; ?>]" value="present"  >P
                      <input type="radio" name="attend[<?php echo $values['roll']; ?>]" value="absent" >A
                    </td>
                  </tr>
  <?php } } ?>

                  <tr>
                    <td colspan="4">
                      <input type="submit" class="btn btn-primary" name="submit" value="submit">
                    </td>
                  </tr>

                </table>

              </form>

            </div>
          </div>

        </section>
<script src="js/checkvalid.js">  </script>
<?php include 'include/footer.php' ?>
