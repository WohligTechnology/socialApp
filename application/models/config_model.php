<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class config_model extends CI_Model
{
public function create($title,$content,$text,$type)
{
$data=array("title" => $title,"content" => $content,"text" => $text,"type" => $type);
$query=$this->db->insert( "config", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("config")->row();
return $query;
}
function getsingleconfig($id){
$this->db->where("id",$id);
$query=$this->db->get("config")->row();
return $query;
}
public function edit($id,$title,$content,$text,$image)
{
    if($image){
    $text=$image;
    }
$data=array("title" => $title,"content" => $content,"text" => $text,"image" => $image);
$this->db->where( "id", $id );
$query=$this->db->update( "config", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `config` WHERE `id`='$id'");
return $query;
}
    public function geteditpage($id){
    $query=$this->db->query("SELECT `type` FROM `config` WHERE `id`='$id'")->row();
        $type=$query->type;
        return $type;
    }
}
?>
