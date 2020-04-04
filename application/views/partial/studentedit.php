<h2>Update Student</h2>
<hr/>
<?php
    $msg = $this->session->flashdata('msg');
    if(isset($msg)){
        echo $msg;
    }
?>
<div class="panel-body" style="width:600px;">

    <form action="<?php echo base_url();?>Student/updateStudent" method="post">
    <input type="hidden" name="sid" value="<?php echo $stuById->sid ?>">
        <div class="form-group">
            <label>Student Name</label>
            <input type="text" name="name" value="<?php echo $stuById->name ?>" class="form-control span12">     
        </div>
        <div class="form-group">
            <label>Department</label>
            <select name="dep" class="form-control">
                <option value="">Select One</option>
                <?php 
                    foreach ($departmentdata as $ddata) {
                        if ($stuById->dep == $ddata->depid) { ?>
                            <option value="<?php echo $ddata->depid; ?>" selected="selected"><?php echo $ddata->depname; ?></option>
                        
                <?php } ?>
                <option value="<?php echo $ddata->depid; ?>"><?php echo $ddata->depname; ?></option>
            <?php } ?>
            </select> 
        </div>
        <div class="form-group">
            <label>Roll No.</label>
            <input type="number" name="roll" value="<?php echo $stuById->roll ?>" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Reg. No.</label>
            <input type="number" name="reg" value="<?php echo $stuById->reg ?>" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Session</label>
            <input type="text" name="session" value="<?php echo $stuById->session ?>" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Batch</label>
            <input type="number" name="batch" value="<?php echo $stuById->batch ?>" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="emial" name="email" value="<?php echo $stuById->email ?>" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="number" name="phone" value="<?php echo $stuById->phone ?>" class="form-control span12">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>

    </form>
</div>
