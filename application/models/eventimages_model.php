<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class eventimages_model extends CI_Model
{
public function create($event,$status,$order,$image)
{
$data=array("event" => $event,"status" => $status,"order" => $order,"image" => $image);
$query=$this->db->insert( "webapp_eventimages", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_eventimages")->row();
return $query;
}
function getsingleeventimages($id){
$this->db->where("id",$id);
$query=$this->db->get("webapp_eventimages")->row();
return $query;
}
public function edit($id,$event,$status,$order,$image)
{
$data=array("event" => $event,"status" => $status,"order" => $order,"image" => $image);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_eventimages", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_eventimages` WHERE `id`='$id'");
return $query;
}
}
?>
