<h2>Student Details</h2>
<hr/>

<div class="panel-body" style="width:600px;">

    <div class="form-group">
        <label>Student Name</label>: <?php echo $studentdata->name; ?>        
    </div>
    <div class="form-group">
        <label>Department</label>:
        <?php
          $sdepid = $studentdata->dep;
          $getdep = $this->dep_model->getDepartment($sdepid);
          if (isset($getdep)) { ?>
            <?php echo $getdep->depname; ?>
        <?php } ?>
                        
    </div>
    <div class="form-group">
        <label>Roll No.</label>: <?php echo $studentdata->roll; ?>       
    </div>
    <div class="form-group">
        <label>Reg. No.</label>: <?php echo $studentdata->reg; ?>        
    </div>
    <div class="form-group">
        <label>Session</label>: <?php echo $studentdata->session; ?>         
    </div>
    <div class="form-group">
        <label>Batch</label>: <?php echo $studentdata->batch; ?>        
    </div> 
    <div class="form-group">
        <label>Email</label>: <?php echo $studentdata->email; ?>        
    </div> 
    <div class="form-group">
        <label>Phone</label>: <?php echo $studentdata->phone; ?>        
    </div>       

</div>
