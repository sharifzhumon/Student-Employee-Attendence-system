<?php
include 'include/header.php';
include 'library/student.php';
?>

        <section>
          <div class="card">

            <div class="card-header">
              <h2>
                <a class="btn btn-success" href="add.php">Add Student</a>
                <a class="btn btn-info float-right" href="index.php">Take Attendence</a>
              </h2>
            </div>

            <div class="card-body">

              <form  action="" method="post">
                <table class="table table-hover">
                  <thead>
                    <th width="30%">Serial</th>
                    <th width="50%">Attendence Date</th>
                    <th width="20%">Action</th>

                  </thead>

            <?php
            $stu= new Student ();
            $get_date = $stu->get_datelist();

            if ($get_date){
              $i=0;
              while ($values = $get_date->fetch_assoc()) {
                $i++;
             ?>

                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $values['atten_time']; ?></td>
                    <td>
                      <a class="btn btn-primary"  href="studentAtten_view.php?dt=<?php echo $values['atten_time']; ?>"> View</a>
                    </td>
                  </tr>
  <?php } } ?>
                </table>

              </form>

            </div>
          </div>

        </section>

<?php include 'include/footer.php' ?>
