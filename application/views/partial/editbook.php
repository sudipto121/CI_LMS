<h2>Update Book</h2>
    <hr/>
    <?php
        $msg = $this->session->flashdata('msg');
        if(isset($msg)){
            echo $msg;
        }
    ?>
   
    <div class="panel-body" style="width:600px;">

        <form action="<?php echo base_url();?>Book/updateBookForm" method="post">
        <input type="hidden" name="bookid" value="<?php echo $bookbyid->bookid ?>">

            <div class="form-group">
                <label>Book Name</label>
                <input type="text" name="bookname" value="<?php echo $bookbyid->bookname;?>" class="form-control span12">               
            </div>
            <div class="form-group">
                <label>Department</label>
                <select name="dep" class="form-control">
                    <option value="">Select One</option>
                    <?php 
                        foreach ($departmentdata as $ddata) {
                            if ($bookbyid->dep == $ddata->depid) { ?>
                                <option value="<?php echo $ddata->depid; ?>" selected="selected"><?php echo $ddata->depname; ?></option>
                            
                    <?php } ?>
                    <option value="<?php echo $ddata->depid; ?>"><?php echo $ddata->depname; ?></option>
                <?php } ?>
                </select> 
            </div>
            <div class="form-group">
                <label>Author</label>                              
                <select name="author" class="form-control">
                    <option value="">Select One</option>
                    <?php 
                        foreach ($authordata as $adata) {
                            if ($bookbyid->author == $adata->authorid) { ?>
                                <option value="<?php echo $adata->authorid; ?>" selected="selected"><?php echo $adata->authorname; ?></option>
                            
                    <?php } ?>
                    <option value="<?php echo $adata->authorid; ?>"><?php echo $adata->authorname; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Total Book</label>
                <input type="text" name="stock" value="<?php echo $bookbyid->stock;?>" class="form-control span12">               
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>

        </form>
    </div>
