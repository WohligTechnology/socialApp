<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class blogvideo_model extends CI_Model
{
public function create($blog,$status,$order,$video)
{
$data=array("blog" => $blog,"status" => $status,"order" => $order,"video" => $video);
$query=$this->db->insert( "webapp_blogvideo", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_blogvideo")->row();
return $query;
}
function getsingleblogvideo($id){
$this->db->where("id",$id);
$query=$this->db->get("webapp_blogvideo")->row();
return $query;
}
public function edit($id,$blog,$status,$order,$video)
{
$data=array("blog" => $blog,"status" => $status,"order" => $order,"video" => $video);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_blogvideo", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_blogvideo` WHERE `id`='$id'");
return $query;
}
}
?>
