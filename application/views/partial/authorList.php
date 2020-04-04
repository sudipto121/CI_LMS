<h2>Author List</h2>
			<hr/>
<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Author Name</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $i = 0 ;
        foreach($authordata as $adata){
            $i++;
        
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $adata->authorname; ?></td>
      <td>
          <a href="<?php echo base_url();?>Author/editauthor/<?php echo $adata->authorid; ?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you sure to Remove ?');" href="<?php echo base_url();?>Author/delauthor/<?php echo $adata->authorid; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
        <?php }?>
  </tbody>
</table>