<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class frontmenu_model extends CI_Model
{
public function create($order,$parent,$status,$name,$json)
{
$data=array("order" => $order,"parent" => $parent,"status" => $status,"name" => $name,"json" => $json);
$query=$this->db->insert( "webapp_frontmenu", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_frontmenu")->row();
return $query;
}
function getsinglefrontmenu($id){
$this->db->where("id",$id);
$query=$this->db->get("webapp_frontmenu")->row();
return $query;
}
public function edit($id,$order,$parent,$status,$name,$json)
{
$data=array("order" => $order,"parent" => $parent,"status" => $status,"name" => $name,"json" => $json);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_frontmenu", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_frontmenu` WHERE `id`='$id'");
return $query;
}
}
?>
