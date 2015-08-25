<section class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">Login Config </h3>
    </header>
    <div class="panel-body">
        <div class="logintype normalLogin">
            <div class="checkbox">
                <label class="form-checkbox form-normal form-primary active form-text">
                    <input type="checkbox" checked=""  name="email">Email and Password Login</label>
            </div>

        </div>
        <div class="logintype googleLogin">
            <div class="checkbox">
                <label class="form-checkbox form-normal form-primary active form-text">
                    <input type="checkbox" checked="" name="Google">Google Login</label>
            </div>
            <div class="sublogintype" style=" min-height: 110px;">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="demo-text-input">Google App Id</label>
                    <div class="col-md-9">
                        <input type="text" id="demo-text-input" name="appid" class="form-control" placeholder="Text">
                        <small class="help-block">This is a help text</small>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="demo-text-input">Google Secret Id</label>
                    <div class="col-md-9">
                        <input type="text" id="demo-text-input" name="secret" class="form-control" placeholder="Text">
                        <small class="help-block">This is a help text</small>
                    </div>
                </div>
            </div>

        </div> 
        <div class="logintype facebookLogin">
            <div class="checkbox">
                <label class="form-checkbox form-normal form-primary active form-text">
                    <input type="checkbox" checked="" name="Facebook">Facebook Login</label>
            </div>
            <div class="sublogintype" style=" min-height: 110px;">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="demo-text-input">Facebook App Id</label>
                    <div class="col-md-9">
                        <input type="text" id="demo-text-input" name="appid" class="form-control" placeholder="Text">
                        <small class="help-block">This is a help text</small>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="demo-text-input">Facebook Secret Id</label>
                    <div class="col-md-9">
                        <input type="text" id="demo-text-input" name="secret" class="form-control" placeholder="Text">
                        <small class="help-block">This is a help text</small>
                    </div>
                </div>
            </div>

        </div>
        <div class="logintype twitterLogin">
            <div class="checkbox">
                <label class="form-checkbox form-normal form-primary active form-text">
                    <input type="checkbox" checked="" name="twitter">Twitter Login</label>
            </div>
            <div class="sublogintype" style=" min-height: 110px;">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="demo-text-input">Twitter App Key</label>
                    <div class="col-md-9">
                        <input type="text" id="demo-text-input" name="appid" class="form-control" placeholder="Text">
                        <small class="help-block">This is a help text</small>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="demo-text-input">Twitter Secret Id</label>
                    <div class="col-md-9">
                        <input type="text" id="demo-text-input" name="secret" class="form-control" placeholder="Text">
                        <small class="help-block">This is a help text</small>
                    </div>
                </div>
            </div>

        </div>
        <div class="logintype instagramLogin">
            <div class="checkbox">
                <label class="form-checkbox form-normal form-primary active form-text">
                    <input type="checkbox" checked="" name="instagram">Instagram Login</label>
            </div>
            <div class="sublogintype" style=" min-height: 110px;">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="demo-text-input">Instagram App Id</label>
                    <div class="col-md-9">
                        <input type="text" id="demo-text-input" name="appid" class="form-control" placeholder="Text">
                        <small class="help-block">This is a help text</small>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="demo-text-input">Instagram Secret Id</label>
                    <div class="col-md-9">
                        <input type="text" id="demo-text-input" name="secret" class="form-control" placeholder="Text">
                        <small class="help-block">This is a help text</small>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="hidden123">
            
            <form  class='form-horizontal tasi-form loginform' method='post' action='<?php echo site_url("site/editconfigsubmit");?>' enctype= 'multipart/form-data'>
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
<textarea name="content"  id="" cols="20" rows="10" class="form-control tinymce"><?php echo set_value( 'content',$before->content);?></textarea>
</div>
</div>
    
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Text</label>
<div class="col-sm-8">
<textarea name="text" class="logindata" id="" cols="20" rows="10" class="form-control tinymce"><?php echo set_value( 'text',$before->text);?></textarea>
</div>
</div>
    
<div class=" form-group" style="display:none">
<label class="col-sm-2 control-label" for="normal-field">Type</label>
<div class="col-sm-4">
<?php echo form_dropdown("type",$type,set_value('type',$before->type),"class='chzn-select form-control'");?>
</div>
</div>
<!--
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Save</button>
<a href='<?php echo site_url("site/viewconfig"); ?>' class='btn btn-secondary'>Cancel</a>
</div>
</div>
-->
</form>
            
        </div>

    </div>
    <div class="panel-footer">
        <div class="submitlogin">
            <button class="btn btn-info btn-labeled fa fa-check fa-lg loginsubmit" type="submit">Save</button>
             <a href='<?php echo site_url("site/viewconfig"); ?>' class="btn btn-danger btn-labeled fa fa-close fa-lg logincancel" type="submit">Cancel</a>
<!--            <button class="btn btn-danger btn-labeled fa fa-close fa-lg logincancel" type="submit">Cancel</button>-->
        </div>
    </div>
</section>


<script>
    var $logint = {};
    $(document).ready(function () {
        $(".logintype input[type=checkbox]").click(function () {
            var shouldshow = $(this).prop("checked");
            var $sublogin = $(this).parents(".logintype").children(".sublogintype");
            if (shouldshow) {
                $sublogin.show(200);
            } else {
                $sublogin.hide(200);
            }
        });

        $("button.loginsubmit").click(function () {
            var sendjson = [];
            var $logintype = $(".logintype");
            $logint = $logintype;
            for (var i = 0; i < $logintype.length; i++) {
                var obj = {};
                var $checkbox = $logintype.eq(i).children(".checkbox").find("input[type=checkbox]");
                var $inputs=$logintype.eq(i).children(".sublogintype").find("input");
                obj.name = $checkbox.attr("name");
                obj.value = $checkbox.prop("checked");
                for(var j=0;j<$inputs.length;j++)
                {
                    obj[$inputs.eq(j).attr("name")]=$inputs.eq(j).val();
                }
                sendjson.push(obj);
            }
            console.log(sendjson);
            
            $(".logindata").val(JSON.stringify(sendjson));
            $("form.loginform").submit();
        });

    });
</script>
