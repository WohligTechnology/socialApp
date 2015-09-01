<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class articles_model extends CI_Model
{
public function create($status,$title,$json,$content)
{
$data=array("status" => $status,"title" => $title,"json" => $json,"content" => $content,"timestamp" => $timestamp);
$query=$this->db->insert( "webapp_articles", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_articles")->row();
return $query;
}
function getsinglearticles($id){
$query=$this->db->query("SELECT `id`, `status`, `title`, `json`, `content` FROM `webapp_articles` WHERE `status`=1 AND `id`='$id'")->row();
return $query;
}
public function edit($id,$status,$title,$json,$content,$timestamp)
{
$data=array("status" => $status,"title" => $title,"json" => $json,"content" => $content,"timestamp" => $timestamp);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_articles", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_articles` WHERE `id`='$id'");
return $query;
}
}
?>
