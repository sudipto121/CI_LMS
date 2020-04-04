<script src="<?php echo base_url();?>lib/jquery.dataTables.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>lib/jquery.dataTables.css"/>
<h2>Issue List</h2>
			<hr/>
<table class="display" id="issuelist">
  <thead>
    <tr>
      <th>No.</th>
      <th>Student Name</th>
      <th>Registration</th>
      <th>Department</th>
      <th>Book Name</th>
      <th>Issue Date</th>
      <th>Return Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $i = 0 ;
        foreach($issuedata as $idata){
            $i++;       
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $idata->studentname; ?></td>
      <td><?php echo $idata->reg; ?></td>
      <td>
        <?php
          $sdepid = $idata->dep;
          $getdep = $this->dep_model->getDepartment($sdepid);
          if (isset($getdep)) {
            echo $getdep->depname;
          }
        ?>
      </td>
      <td>
        <?php
          $bookid = $idata->book;
          $getbook = $this->book_model->bookById($bookid);
          if (isset($getbook)) { ?>
            <a href="<?php echo base_url();?>Manage/viewbook/<?php echo $bookid; ?>" target="_blank"><?php echo $getbook->bookname;?></a>
          <?php }
        ?>
      </td>
      <td><?php echo date("d/m/Y h:ia", strtotime($idata->date)); ?></td>
      <td><?php echo $idata->return; ?></td>
      <td>
        <a href="<?php echo base_url();?>Manage/editissue/<?php echo $idata->id; ?>"><i class="fa fa-pencil"></i></a>
        <a onclick="return confirm('Are you sure to Remove ?');" href="<?php echo base_url();?>Manage/delissue/<?php echo $idata->id; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
        ||
        <a target="_blank" href="<?php echo base_url();?>Manage/viewstudent/<?php echo $idata->reg; ?>"><i class="fa fa-eye"></i></a>
        
      </td>

      
    </tr>
    <?php }?>
  </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        $("#issuelist").DataTable();
    });
</script>