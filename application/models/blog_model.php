<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class blog_model extends CI_Model
{
public function create($name,$title,$json,$content)
{
$data=array("name" => $name,"title" => $title,"json" => $json,"content" => $content);
$query=$this->db->insert( "webapp_blog", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_blog")->row();
return $query;
}
function getsingleblog($id){
$this->db->where("id",$id);
$query=$this->db->get("webapp_blog")->row();
return $query;
}
public function edit($id,$name,$title,$json,$content)
{
$data=array("name" => $name,"title" => $title,"json" => $json,"content" => $content);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_blog", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_blog` WHERE `id`='$id'");
return $query;
}
}
?>
