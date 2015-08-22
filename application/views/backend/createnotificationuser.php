<div id="page-title">
<a href="<?php echo site_url("site/viewnotificationuser"); ?>" class="btn btn-primary btn-labeled fa fa-arrow-left margined pull-right">Back</a>
<h1 class="page-header text-overflow">Notificationuser Details </h1>
</div>
<div id="page-content">
<div class="row">
<div class="col-lg-12">
<section class="panel">
<div class="panel-heading">
<h3 class="panel-title">
Create Notificationuser </h3>
</div>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createnotificationusersubmit");?>' enctype= 'multipart/form-data'>
<div class="panel-body">
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Notification</label>
<div class="col-sm-4">
<?php echo form_dropdown("notification",$notification,set_value('notification'),"class='chzn-select form-control'");?>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">User</label>
<div class="col-sm-4">
<?php echo form_dropdown("user",$user,set_value('user'),"class='chzn-select form-control'");?>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Save</button>
<a href="<?php echo site_url("site/viewnotificationuser?id=").$this->input->get('id'); ?>" class="btn btn-secondary">Cancel</a>
</div>
</div>
</form>
</div>
</section>
</div>
</div>
</div>
