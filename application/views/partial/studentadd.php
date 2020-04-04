<h2>Add Student</h2>
<hr/>
<?php
    $msg = $this->session->flashdata('msg');
    if(isset($msg)){
        echo $msg;
    }
?>
   
<div class="panel-body" style="width:600px;">

    <form action="<?php echo base_url();?>Student/addStudentForm" method="post">
        <div class="form-group">
            <label>Student Name</label>
            <input type="text" name="name" class="form-control span12">               
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
            <label>Roll No.</label>
            <input type="number" name="roll" class="form-control span12">                
        </div>
        <div class="form-group">
            <label>Reg. No.</label>
            <input type="number" name="reg" class="form-control span12">                
        </div>
        <div class="form-group">
            <label>Session</label>
            <input type="text" name="session" class="form-control span12">                
        </div>
        <div class="form-group">
            <label>Batch</label>
            <input type="number" name="batch" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="number" name="phone" class="form-control span12">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>

    </form>
</div>
