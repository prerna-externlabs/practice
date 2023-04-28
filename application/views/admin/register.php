<?php include('header.php'); ?>

<div class="container" style="margin-top:20px;">
<h1>register form </h1>
<?php echo form_open('admin/sendemail');?>
<div class="row">
    <div class="col-lg-6">

  <div class="from-group">
    <label for="username">username</label>
   <?php echo form_input(['class' =>'form-control','placeholder'=>'enter username','name'=>'username']);?>
   <div class="col-lg-6">
   <?php echo form_error('username');?>
   </div>
  </div>
  <div class="from-group">
    <label for="pwd">password</label>
    <?php echo form_password(['class' =>'form-control','placeholder'=>'enter password' ,'name'=>'password	']);?>
    <div class="col-lg-6">
   <?php echo form_error('password');?>
   </div>
  </div>
  <div class="from-group">
    <label for="fristname">fristname</label>
   <?php echo form_input(['class' =>'form-control','placeholder'=>'enter fristname','name'=>'firstname']);?>
   <div class="col-lg-6">
   <?php echo form_error('firstname');?>
   </div>
  </div>

  <div class="from-group">
    <label for="lastname">lastname</label>
   <?php echo form_input(['class' =>'form-control','placeholder'=>'enter lastname','name'=>'lastname']);?>
   <div class="col-lg-6">
   <?php echo form_error('lastname');?>
   </div>
  </div>


  <div class="from-group">
    <label for="email">email</label>
   <?php echo form_input(['class' =>'form-control','placeholder'=>'enter email','name'=>'email']);?>
   <div class="col-lg-6">
   <?php echo form_error('email');?>
   </div>
  </div>
  <?php echo form_submit(['type'=>'submit' ,'class' =>'btn btn-default','value' => 'submit']);?>
  <?php echo form_reset(['type'=>'reset' ,'class' =>'btn btn-primary','value' => 'reset']);?>
  
 
    </div>
</div>
</div>

<?php include('footer.php'); ?>