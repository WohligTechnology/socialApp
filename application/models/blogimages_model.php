<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class blogimages_model extends CI_Model
{
public function create($blog,$status,$order,$image)
{
$data=array("blog" => $blog,"status" => $status,"order" => $order,"image" => $image);
$query=$this->db->insert( "webapp_blogimages", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_blogimages")->row();
return $query;
}
function getsingleblogimages($id){
$this->db->where("id",$id);
$query=$this->db->get("webapp_blogimages")->row();
return $query;
}
public function edit($id,$blog,$status,$order,$image)
{
$data=array("blog" => $blog,"status" => $status,"order" => $order,"image" => $image);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_blogimages", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_blogimages` WHERE `id`='$id'");
return $query;
}
}
?>
