<section class="panel">
<header class="panel-heading">
<h3 class="panel-title">Config Details </h3>
</header>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editconfigsubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">

<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Title</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="title" value='<?php echo set_value('title',$before->title);?>'>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Content</label>
<div class="col-sm-8">
<textarea name="content" id="" cols="20" rows="10" class="form-control tinymce"><?php echo set_value( 'content',$before->content);?></textarea>
</div>
</div>
    
<!--
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Text</label>
<div class="col-sm-8">
<textarea name="text"  id="" cols="20" rows="10" class="form-control tinymce"><?php echo set_value( 'text',$before->text);?></textarea>
</div>
</div>
-->
    <div class=" form-group">
        <label class="col-sm-2 control-label" for="normal-field">Want Events?</label>
<select class="selstyle" name="text" >
  <option value="">Select</option>
  <option value="1">Yes</option>
  <option value="2">No</option>
</select>
        </div>
        </div>
    
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Save</button>
<a href='<?php echo site_url("site/viewconfig"); ?>' class='btn btn-secondary'>Cancel</a>
</div>
</div>
</form>
</div>
</section>
