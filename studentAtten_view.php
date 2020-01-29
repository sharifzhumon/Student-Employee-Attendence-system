<?php
include 'include/header.php';
include 'library/student.php';
?>

<?php
error_reporting(0);
$dt= $_GET['dt'];
$stu= new Student ();
if ($_SERVER['REQUEST_METHOD']== 'POST'){
  $attend = $_POST['attend'];
  $update_attend = $stu->updatesAttend($dt,$attend);
}
 ?>

 <?php
 if (isset($update_attend)){
   echo $update_attend;
 }
  ?>
        <section>
          <div class= 'alert alert-danger hidden' style="display:none"> <strong> Alert! </strong> Student attendence missing ! </div>
          <div class="card">

            <div class="card-header">
              <h2>
                <a class="btn btn-success" href="add.php">Add Student</a>
                <a class="btn btn-info float-right" href="date_view.php">Back</a>
              </h2>
            </div>

            <div class="card-body">
              <div class="alert alert-secondary text-center">
              <h5>  <strong>Date: </strong> <?php echo $dt?> </h5>
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
            $get_student = $stu->getAlldata($dt);

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
                      <input type="radio" name="attend[<?php echo $values['roll']; ?>]" value="present" <?php if ($values['atten']== 'present'){ echo "checked";}  ?> >P
                      <input type="radio" name="attend[<?php echo $values['roll']; ?>]" value="absent" <?php if ($values['atten']== 'absent'){ echo "checked";} ?> >A
                    </td>
                  </tr>

  <?php } } ?>


                    <tr>
                      <td colspan="4">
                        <input type="submit" class="btn btn-primary" name="submit" value="Update">
                      </td>
                    </tr>

                </table>

              </form>

            </div>
          </div>

        </section>
<script src="js/checkvalid.js">  </script>
<?php include 'include/footer.php' ?>
