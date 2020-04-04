<h2>Add Book</h2>
    <hr/>
    <?php
        $msg = $this->session->flashdata('msg');
        if(isset($msg)){
            echo $msg;
        }
    ?>
   
    <div class="panel-body" style="width:600px;">

        <form action="<?php echo base_url();?>Book/addBookForm" method="post">
            <div class="form-group">
                <label>Book Name</label>
                <input type="text" name="bookname" class="form-control span12">               
            </div>
            <div class="form-group">
                <label>Department</label>
                <select name="dep" class="form-control">
                    <option value="">Select One</option>
                    <?php 
                        foreach ($depdata as $ddata) {
                    ?>
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
                    ?>
                    <option value="<?php echo $adata->authorid; ?>"><?php echo $adata->authorname; ?></option>
                <?php } ?>
                </select>               
            </div>
            <div class="form-group">
                <label>Total Book</label>
                <input type="text" name="stock" class="form-control span12">               
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
