<section class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">User Details</h3>
    </header>
    <div class="panel-body">
        <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editusersubmit');?>" enctype="multipart/form-data">
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Email</label>
                <div class="col-sm-4">
                    <div class="text-pad">
                        <?php echo $before->email; ?></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Name</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before->name);?>">
                </div>
            </div>


            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Email</label>
                <div class="col-sm-4">
                    <input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email',$before->email);?>">
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="description-field">Password</label>
                <div class="col-sm-4">
                    <input type="password" id="description-field" class="form-control" name="password" value="">
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="description-field">Confirm Password</label>
                <div class="col-sm-4">
                    <input type="password" id="description-field" class="form-control" name="confirmpassword" value="">
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">SocialId</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="socialid" value="<?php echo set_value('socialid',$before->socialid);?>">
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Contact</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="contact" value="<?php echo set_value('contact',$before->contact);?>">
                </div>
            </div>

            <div class=" form-group">
                <label class="col-sm-2 control-label">logintype</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="logintype" value="<?php echo set_value('logintype',$before->logintype);?>">
                </div>
            </div>

            <div class=" form-group">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( 'status',$status,set_value( 'status',$before->status),'class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
                </div>
            </div>

            <div class=" form-group">
                <label class="col-sm-2 control-label">Select Accesslevel</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( 'accesslevel',$accesslevel,set_value( 'accesslevel',$before->accesslevel),'onchange="operatorcategories()"class="chzn-select form-control" data-placeholder="Choose a Accesslevel..."'); ?>
                </div>
            </div>



            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Image</label>
                <div class="col-sm-4">
                    <span class="pull-left btn btn-default btn-file">
											Browse... <input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image',$before->image);?>">
											</span>
                    <?php if($before->image == "") { } else { ?>
                    <img src="<?php echo base_url('uploads')." / ".$before->image; ?>" width="140px" height="140px">
                    <?php } ?>
                </div>
            </div>

            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">json</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="json" value="<?php echo set_value('json',$before->json);?>">
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">address</label>
                <div class="col-sm-8">
                    <textarea name="address" id="" cols="20" rows="10" class="form-control tinymce">
                        <?php echo set_value( 'address',$before->address);?></textarea>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="<?php echo site_url('site/viewusers'); ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>
<script type="text/javascript">
    function operatorcategories() {
        console.log($('#accesslevelid').val());
        if ($('#accesslevelid').val() == 2) {
            $(".categoryclass").show();
        } else {
            $(".categoryclass").hide();
        }

    }
</script>