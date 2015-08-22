<div id="page-title">
<a href="<?php echo site_url("site/viewfrontmenu"); ?>" class="btn btn-primary btn-labeled fa fa-arrow-left margined pull-right">Back</a>
<h1 class="page-header text-overflow">Frontmenu Details </h1>
</div>
<div id="page-content">
<div class="row">
<div class="col-lg-12">
<section class="panel">
<div class="panel-heading">
<h3 class="panel-title">
Create Frontmenu </h3>
</div>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createfrontmenusubmit");?>' enctype= 'multipart/form-data'>
<div class="panel-body">
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Order</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value('order');?>'>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Parent</label>
<div class="col-sm-4">
<?php echo form_dropdown("parent",$parent,set_value('parent'),"class='chzn-select form-control'");?>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Status</label>
<div class="col-sm-4">
<?php echo form_dropdown("status",$status,set_value('status'),"class='chzn-select form-control'");?>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Name</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="name" value='<?php echo set_value('name');?>'>
</div>
</div>
  <div class="form-group hidden">
                                <label class="col-sm-2 control-label" for="normal-field">json</label>
                                <div class="col-sm-4">
                                    <textarea name="json" id="" cols="20" rows="10" class="form-control fieldjsoninput"><?php echo json_encode($fieldjson,true); ?></textarea>

                                </div>
                            </div>
                            <div class="fieldjson"></div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary jsonsubmit">Save</button>
<a href="<?php echo site_url("site/viewfrontmenu"); ?>" class="btn btn-secondary">Cancel</a>
</div>
</div>
</form>
</div>
</section>
</div>
</div>
</div>
     <script type="text/javascript">
        $(document).ready(function () {
            //        console.log($(".fieldjsoninput").val());
            filljsoninput(".fieldjsoninput", ".fieldjson");
            $(".jsonsubmit").click(function () {
                jsonsubmit(".fieldjsoninput", ".fieldjson");
                //return false;
            });
        });
    </script>
