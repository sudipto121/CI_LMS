<script src="<?php echo base_url();?>lib/jquery.dataTables.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>lib/jquery.dataTables.css"/>
<h2>Book List</h2>
			<hr/>
<table class="display" id="booklist">
  <thead>
    <tr>
      <th>#</th>
      <th>Book Name</th>
      <th>Department Name</th>
      <th>Author</th>
      <th>Total Book</th>
      
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $i = 0 ;
        foreach($allbook as $bdata){
            $i++;
        
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $bdata->bookname; ?></td>
      <td>
        <?php
          $sdepid = $bdata->dep;
          $getdep = $this->dep_model->getDepartment($sdepid);
          if (isset($getdep)) {
            echo $getdep->depname;
          }
        ?>
      </td> 
      <td>
        <?php
          $authorid = $bdata->author;
          $getauthor = $this->author_model->getAuthor($authorid);
          if (isset($getauthor)) {
            echo $getauthor->authorname;
          }
        ?>
      </td>
      <td><?php echo $bdata->stock; ?></td>
      <td>
          <a href="<?php echo base_url();?>Book/editbook/<?php echo $bdata->bookid; ?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you sure to Remove ?');" href="<?php echo base_url();?>Book/delbook/<?php echo $bdata->bookid; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
        <?php }?>
  </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        $("#booklist").DataTable();
    });
</script>