<h2>Department List</h2>
			<hr/>
<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Department Name</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $i = 0 ;
        foreach($depdata as $ddata){
            $i++;
        
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $ddata->depname; ?></td>
      <td>
          <a href="<?php echo base_url();?>Department/editdepartment/<?php echo $ddata->depid; ?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you sure to Remove ?');" href="<?php echo base_url();?>Department/deldepartment/<?php echo $ddata->depid; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
        <?php }?>
  </tbody>
</table>