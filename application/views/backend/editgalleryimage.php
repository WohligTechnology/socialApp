<section class="panel">
<header class="panel-heading">
<h3 class="panel-title">Galleryimage Details </h3>
</header>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editgalleryimagesubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Gallery</label>
<div class="col-sm-4">
<?php echo form_dropdown("gallery",$gallery,set_value('gallery',$before->gallery),"class='chzn-select form-control'");?>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Order</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value('order',$before->order);?>'>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Status</label>
<div class="col-sm-4">
<?php echo form_dropdown("status",$status,set_value('status',$before->status),"class='chzn-select form-control'");?>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Image</label>
<div class="col-sm-4">
<input type="file" id="normal-field" class="form-control" name="image" value='<?php echo set_value('image',$before->image);?>'>
    <?php if($before->image == "")
						 { }
						 else
						 { ?>
							<img src="<?php echo base_url('uploads')."/".$before->image; ?>" width="140px" height="140px">
						<?php }
					?>
</div>
</div>
    <div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Alt</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="alt" value='<?php echo set_value('alt',$before->alt);?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Save</button>
<a href='<?php echo site_url("site/viewgalleryimage?id=").$this->input->get('galleryid'); ?>' class='btn btn-secondary'>Cancel</a>
</div>
</div>
</form>
</div>
</section>
