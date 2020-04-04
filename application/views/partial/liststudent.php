<script src="<?php echo base_url();?>lib/jquery.dataTables.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>lib/jquery.dataTables.css"/>
<h2>Student List</h2>
			<hr/>
<table class="display" id="studentlist">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Department</th>
      <th>Roll</th>
      <th>Registration</th>
      <th>Session</th>
      <th>Batch</th>
      <th>Email</th>
      <th>Phone</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $i = 0 ;
        foreach($studentdata as $sdata){
            $i++;       
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $sdata->name; ?></td>
      <td>
        <?php
          $sdepid = $sdata->dep;
          $getdep = $this->dep_model->getDepartment($sdepid);
          if (isset($getdep)) {
            echo $getdep->depname;
          }
        ?>
        </td>
      <td><?php echo $sdata->roll; ?></td>
      <td><?php echo $sdata->reg; ?></td>
      <td><?php echo $sdata->session; ?></td>
      <td><?php echo $sdata->batch; ?></td>
      <td><?php echo $sdata->email; ?></td>
      <td><?php echo $sdata->phone; ?></td>


      <td>
          <a href="<?php echo base_url();?>Student/editstudent/<?php echo $sdata->sid; ?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you sure to Remove ?');" href="<?php echo base_url();?>Student/delstudent/<?php echo $sdata->sid; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
        <?php }?>
  </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        $("#studentlist").DataTable();
    });
</script>