<div id="page-title">
<a href="<?php echo site_url("site/viewblogvideo"); ?>" class="btn btn-primary btn-labeled fa fa-arrow-left margined pull-right">Back</a>
<h1 class="page-header text-overflow">Blogvideo Details </h1>
</div>
<div id="page-content">
<div class="row">
<div class="col-lg-12">
<section class="panel">
<div class="panel-heading">
<h3 class="panel-title">
Create Blogvideo </h3>
</div>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createblogvideosubmit");?>' enctype= 'multipart/form-data'>
<div class="panel-body">
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Blog</label>
<div class="col-sm-4">
<?php echo form_dropdown("blog",$blog,set_value('blog'),"class='chzn-select form-control'");?>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Status</label>
<div class="col-sm-4">
<?php echo form_dropdown("status",$status,set_value('status'),"class='chzn-select form-control'");?>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Order</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value('order');?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Video</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="video" value='<?php echo set_value('video');?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Save</button>
<a href="<?php echo site_url("site/viewblogvideo"); ?>" class="btn btn-secondary">Cancel</a>
</div>
</div>
</form>
</div>
</section>
</div>
</div>
</div>
