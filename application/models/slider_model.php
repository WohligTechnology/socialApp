<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class slider_model extends CI_Model
{
public function create($alt,$status,$order,$image)
{
$data=array("alt" => $alt,"status" => $status,"order" => $order,"image" => $image);
$query=$this->db->insert( "slider", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("slider")->row();
return $query;
}
function getsingleblogimages($id){
$this->db->where("id",$id);
$query=$this->db->get("slider")->row();
return $query;
}
public function edit($id,$alt,$status,$order,$image)
{
$data=array("alt" => $alt,"status" => $status,"order" => $order,"image" => $image);
$this->db->where( "id", $id );
$query=$this->db->update( "slider", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `slider` WHERE `id`='$id'");
return $query;
}
}
?>
