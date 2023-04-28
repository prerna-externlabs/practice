<?php include('header.php'); ?>

<div class="container" style="margin-top:20px;">
<h1>admin form</h1>
<?php if($error=$this->session->flashdata('login_failed')):?>
<div class="row">
  <div class="col-lg-6">
    <div class="alert alert-danger">
      <?php echo $error;?>
    </div>
  </div>
</div>
<?php endif;?>
<?php echo form_open('admin/login/login');?>
  <div class="from-group">
    <label for="username">username</label>
   <?php echo form_input(['class' =>'form-control','placeholder'=>'enter username','name'=>'uname']);?>
   <div class="col-lg-6">
   <?php echo form_error('uname');?>
   </div>
  </div>
  <div class="from-group">
    <label for="pwd">password</label>
    <?php echo form_password(['class' =>'form-control','placeholder'=>'enter password' ,'name'=>'pass']);?>
    <div class="col-lg-6">
   <?php echo form_error('pass');?>
   </div>
  </div>
  <?php echo form_submit(['type'=>'submit' ,'class' =>'btn btn-default','value' => 'submit']);?>
  <?php echo form_reset(['type'=>'reset' ,'class' =>'btn btn-primary','value' => 'reset']);?>
  <?php echo anchor('admin/register/','Sign Up?','class="link-class"');?>
 

</div>

<?php include('footer.php'); ?>