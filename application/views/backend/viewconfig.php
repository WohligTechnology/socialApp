<div id="page-title">
<a class="btn btn-primary btn-labeled fa fa-plus margined pull-right" href="<?php echo site_url("site/createconfig"); ?>">Create</a>
<h1 class="page-header text-overflow">Config Details </h1>
</div>
<div id="page-content">
<div class="row">
<div class="col-lg-12">
<div class="panel drawchintantable">
<?php $this->chintantable->createsearch("Config List");?>
<div class="fixed-table-container">
<div class="fixed-table-body">
<table class="table table-hover" id="" cellpadding="0" cellspacing="0">
<thead>
<tr>
<th data-field="id">ID</th>
<th data-field="title">Title</th>
<th data-field="type">Type</th>
<th data-field="text">Text</th>
<!--<th data-field="content">Description</th>-->
<th data-field="action">Action</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
<div class="fixed-table-pagination" style="display: block;">
<div class="pull-left pagination-detail">
<?php $this->chintantable->createpagination();?>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
function drawtable(resultrow) {
    if(resultrow.type==1){
    resultrow.type="Text";
    }
    else if(resultrow.type==2){
    resultrow.type="File";
    } 
    else if(resultrow.type==3){
    resultrow.type="Drop Down";
    }
return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.title + "</td><td>" + resultrow.type + "</td><td>" + resultrow.text + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editconfig?id=');?>"+resultrow.id+"'><i class='icon-pencil'></i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>
</div>
</div>
