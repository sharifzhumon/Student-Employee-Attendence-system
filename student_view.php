<?php
include 'include/header.php';
include 'library/student.php';
?>

<?php
// error_reporting(0);
$cur_date = date('Y-m-d');
$stu= new Student ();
 ?>

 <?php // delete query for a data in database
 if ( isset($_GET['roll']) ) {

  $roll= $_GET['roll'];
  $del_user= $stu->delUser($roll);
 }
 ?>
 <?php
 if (isset($del_user)){
   echo $del_user;
 }
  ?>

        <section>
          <div class= 'alert alert-danger hidden' style="display:none"> <strong> Alert! </strong> Student attendence missing ! </div>
          <div class="card">

            <div class="card-header">
              <h2>
                <a type="button" class="btn btn-danger" href="add.php">Add Student</a>
                <a class="btn btn-info float-right" href="index.php">Take Attendence</a>
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
                    <th width="15%">Action</th>
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
                      <div class="btn-group" role="group" aria-label="Basic example">
                      <a type="button" class="btn btn-info" href="stu_update.php?id=<?php echo urlencode ($values['id']);?>&roll=<?php echo urlencode ($values['roll']);?>" style="border: 0.5px solid #204247;">Update</a>
                      <a type="button" class="btn btn-info" href="student_view.php?roll=<?php echo urlencode ($values['roll']);?>" style="border: 0.5px solid #204247;">Delete</a>
                      </div>
                    </td>
                  </tr>
  <?php } } ?>
              </table>

              </form>

            </div>
          </div>

        </section>
<script src="js/checkvalid.js">  </script>
<?php include 'include/footer.php' ?>
