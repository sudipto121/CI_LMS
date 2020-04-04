<h2>Issue Book</h2>
<hr/>
<?php
    $msg = $this->session->flashdata('msg');
    if(isset($msg)){
        echo $msg;
    }
?>
   
<div class="panel-body" style="width:600px;">

    <form action="<?php echo base_url();?>Manage/updateIssueForm" method="post">
        <input type="hidden" name="id" value="<?php echo $issueById->id ?>">

        <div class="form-group">
            <label>Student Name</label>
            <input type="text" name="studentname" value="<?php echo $issueById->studentname; ?>" class="form-control span12">               
        </div>
        <div class="form-group">
            <label>Registration</label>
            <input type="text" name="reg" value="<?php echo $issueById->reg; ?>" class="form-control span12">               
        </div>
        <div class="form-group">
                <label>Department</label>
                <select name="dep" class="form-control">
                    <option value="">Select One</option>
                    <?php 
                        foreach ($departmentdata as $ddata) {
                            if ($issueById->dep == $ddata->depid) { ?>
                                <option value="<?php echo $ddata->depid; ?>" selected="selected"><?php echo $ddata->depname; ?></option>
                            
                    <?php } ?>
                    <option value="<?php echo $ddata->depid; ?>"><?php echo $ddata->depname; ?></option>
                <?php } ?>
                </select> 
            </div>       
        <div class="form-group">
                <label>Book Name</label>
                <select name="book" class="form-control">
                    <option value="">Select One</option>
                    <?php 
                        foreach ($bookdata as $ddata) {
                            if ($issueById->book == $ddata->bookid) { ?>
                                <option value="<?php echo $ddata->bookid; ?>" selected="selected"><?php echo $ddata->bookname; ?></option>
                            
                    <?php } ?>
                    <option value="<?php echo $ddata->bookid; ?>"><?php echo $ddata->bookname; ?></option>
                <?php } ?>
                </select> 
            </div>
            <div class="form-group">
                <label>Return Date</label>
                <input type="text" name="return" value="<?php echo $issueById->return; ?>" class="form-control span12">
            </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>

    </form>
</div>