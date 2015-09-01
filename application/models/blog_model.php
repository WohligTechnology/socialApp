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
    $query=$this->db->query("SELECT `id`, `name`, `title`, `json`, `content` FROM `webapp_blog` WHERE `id`='$id'")->row();
$query->blogimage=$this->db->query("SELECT `id`, `blog`, `status`, `order`, `image` FROM `webapp_blogimages` WHERE `status`=1 AND `blog`='$id'")->result();
   
$query->blogvideo=$this->db->query("SELECT `id`, `blog`, `status`, `order`, `video` FROM `webapp_blogvideo` WHERE `status`=1 AND `blog`='$id'")->result();
return $query;
}
public function edit($id,$name,$title,$json,$content,$timestamp)
{
$data=array("name" => $name,"title" => $title,"json" => $json,"content" => $content,"timestamp" => $timestamp);
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
