<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class galleryimage_model extends CI_Model
{
public function create($gallery,$order,$status,$image,$alt)
{
$data=array("gallery" => $gallery,"order" => $order,"status" => $status,"image" => $image,"alt" => $alt);
$query=$this->db->insert( "webapp_galleryimage", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_galleryimage")->row();
return $query;
}
function getsinglegalleryimage($id){
$this->db->where("id",$id);
$query=$this->db->get("webapp_galleryimage")->row();
return $query;
}
public function edit($id,$gallery,$order,$status,$image,$alt)
{
$data=array("gallery" => $gallery,"order" => $order,"status" => $status,"image" => $image,"alt" => $alt);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_galleryimage", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_galleryimage` WHERE `id`='$id'");
return $query;
}
}
?>
