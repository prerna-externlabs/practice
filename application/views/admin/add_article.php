<?php include('header.php'); ?>

<div class="container" style="margin-top:20px;">
<h1>Add Article</h1>

<?php echo form_open('admin/uservalidation');?> 
<?php echo form_hidden('user_id',$this->session->userdata('id')); ?>

  <div class="from-group">
    <label for="article_title">Article Title</label>
   <?php echo form_input(['class' =>'form-control','placeholder'=>'Enter title','name'=>'article_title']);?>
   <div class="col-lg-6">
   <?php echo form_error('article_title');?>
   </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="article_body">Article Body</label>
            <?php echo form_textarea(['class' =>'form-control','placeholder'=>'Enter body','name'=>'article_body']);?>
        </div>
    </div>
    <div class="col-lg-6">
   <?php echo form_error('article_body');?>
   </div>
</div>

  <?php echo form_submit(['type'=>'submit' ,'class' =>'btn btn-default','value' => 'submit']);?>
  <?php echo form_reset(['type'=>'reset' ,'class' =>'btn btn-primary','value' => 'reset']);?>
 

</div>

<?php include('footer.php'); ?>