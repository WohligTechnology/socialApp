<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class videogallery_model extends CI_Model
{
public function create($order,$status,$name,$json)
{
$data=array("order" => $order,"status" => $status,"name" => $name,"json" => $json);
$query=$this->db->insert( "webapp_videogallery", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_videogallery")->row();
return $query;
}
function getsinglevideogallery($id){
$query=$this->db->query("SELECT `id`, `order`, `status`, `name`, `json` FROM `webapp_videogallery` WHERE `status`=1 AND `id`='$id'")->row();
    $query->videos=$this->db->query("SELECT `id`, `order`, `status`, `name`, `json` FROM `webapp_videogallery` WHERE `status`=1 AND `id`='$id'")->result();
return $query;
}
public function edit($id,$order,$status,$name,$json,$timestamp)
{
$data=array("order" => $order,"status" => $status,"name" => $name,"json" => $json,"timestamp" => $timestamp);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_videogallery", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_videogallery` WHERE `id`='$id'");
$query=$this->db->query("DELETE FROM `webapp_videogalleryvideo` WHERE `videogallery`='$id'");
return $query;
}
}
?>
