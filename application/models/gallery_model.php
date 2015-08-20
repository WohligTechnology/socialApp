<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class gallery_model extends CI_Model
{
public function create($order,$status,$name,$json)
{
$data=array("order" => $order,"status" => $status,"name" => $name,"json" => $json);
$query=$this->db->insert( "webapp_gallery", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_gallery")->row();
return $query;
}
function getsinglegallery($id){
$this->db->where("id",$id);
$query=$this->db->get("webapp_gallery")->row();
return $query;
}
public function edit($id,$order,$status,$name,$json)
{
$data=array("order" => $order,"status" => $status,"name" => $name,"json" => $json);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_gallery", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_gallery` WHERE `id`='$id'");
return $query;
}
}
?>
