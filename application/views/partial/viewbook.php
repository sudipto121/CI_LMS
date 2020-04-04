<h2>Book Details</h2>
<hr/>

<div class="panel-body" style="width:600px;">

    <div class="form-group">
        <label>Book Name</label>: <?php echo $bookbyid->bookname; ?>        
    </div>
    <div class="form-group">
        <label>Department</label>:
        <?php
          $sdepid = $bookbyid->dep;
          $getdep = $this->dep_model->getDepartment($sdepid);
          if (isset($getdep)) { ?>
            <?php echo $getdep->depname; ?>
        <?php } ?>
                        
    </div>
    <div class="form-group">
        <label>Author Name</label>:
        <?php
          $authorid = $bookbyid->author;
          $getauthor = $this->author_model->getAuthor($authorid);
          if (isset($getauthor)) {
            echo $getauthor->authorname;
          }
        ?>      
    </div>
    <div class="form-group">
        <label>Total Book</label>: <?php echo $bookbyid->stock; ?>        
    </div>
         
</div>
