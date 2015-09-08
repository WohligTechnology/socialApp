<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class eventvideo_model extends CI_Model
{
public function create($event,$videogallery,$status,$order,$url)
{
$data=array("event" => $event,"videogallery" => $videogallery,"status" => $status,"order" => $order,"url" => $url);
$query=$this->db->insert( "webapp_eventvideo", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_eventvideo")->row();
return $query;
}
function getsingleeventvideo($id){
$this->db->where("id",$id);
$query=$this->db->get("webapp_eventvideo")->row();
return $query;
}
public function edit($id,$event,$videogallery,$status,$order,$url)
{
$data=array("event" => $event,"videogallery" => $videogallery,"status" => $status,"order" => $order,"url" => $url);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_eventvideo", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_eventvideo` WHERE `id`='$id'");
return $query;
}
}
?>
