<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class notificationuser_model extends CI_Model
{
public function create($notification,$user,$timestamp,$timestamp_receive)
{
$data=array("notification" => $notification,"user" => $user);
$query=$this->db->insert( "webapp_notificationuser", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_notificationuser")->row();
return $query;
}
function getsinglenotificationuser($id){
$this->db->where("id",$id);
$query=$this->db->get("webapp_notificationuser")->row();
return $query;
}
public function edit($id,$notification,$user,$timestamp,$timestamp_receive)
{
$data=array("notification" => $notification,"user" => $user,"timestamp" => $timestamp,"timestamp_receive" => $timestamp_receive);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_notificationuser", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_notificationuser` WHERE `id`='$id'");
return $query;
}
}
?>
