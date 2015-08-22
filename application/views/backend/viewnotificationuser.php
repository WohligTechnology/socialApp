<div id="page-title">
<a class="btn btn-primary btn-labeled fa fa-plus margined pull-right" href="<?php echo site_url("site/createnotificationuser?id=").$this->input->get('id'); ?>">Create</a>
<h1 class="page-header text-overflow">Notificationuser Details </h1>
</div>
<div id="page-content">
<div class="row">
<div class="col-lg-12">
<div class="panel drawchintantable">
<?php $this->chintantable->createsearch("Notificationuser List");?>
<div class="fixed-table-container">
<div class="fixed-table-body">
<table class="table table-hover" id="" cellpadding="0" cellspacing="0">
<thead>
<tr>
<th data-field="id">ID</th>
<th data-field="notification">Notification</th>
<th data-field="user">User</th>
<th data-field="timestamp">Timestamp</th>
<th data-field="timestamp_receive">Timestamp Received</th>
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
return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.notification + "</td><td>" + resultrow.user + "</td><td>" + resultrow.timestamp + "</td><td>" + resultrow.timestamp_receive + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editnotificationuser?id=');?>"+resultrow.id+"&notificationid="+resultrow.notificationid+"'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=return confirm(\"Are you sure you want to delete?\") href='<?php echo site_url('site/deletenotificationuser?id='); ?>"+resultrow.id+"&notificationid="+resultrow.notificationid+"'><i class='icon-trash '></i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>
</div>
</div>
