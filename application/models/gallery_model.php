<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class gallery_model extends CI_Model
{
public function create($order,$status,$name,$json,$image)
{
$data=array("order" => $order,"status" => $status,"name" => $name,"json" => $json,"image" => $image);
$query=$this->db->insert( "webapp_gallery", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_gallery")->row();
return $query;
}
function getsinglegallery($id){
//$query=$this->db->query("SELECT `webapp_gallery`.`id`, `webapp_gallery`.`order`, `webapp_gallery`.`status`,`webapp_gallery`.`name`, `webapp_gallery`.`json`,`webapp_galleryimage`.`id`, `webapp_galleryimage`.`gallery`, `webapp_galleryimage`.`order`, `webapp_galleryimage`.`status`, `webapp_galleryimage`.`image`, `webapp_galleryimage`.`alt` FROM `webapp_gallery` LEFT OUTER JOIN `webapp_galleryimage` ON `webapp_galleryimage`.`gallery`=`webapp_gallery`.`id` WHERE `webapp_gallery`.`id`='$id'")->result();
    $query=$this->db->query("SELECT `id`, `order`, `status`, `name`, `json` FROM `webapp_gallery` WHERE `status`=1 AND `id`='$id'")->row();
     
    $query->images=$this->db->query("SELECT `id`, `gallery`, `order`, `status`, `image`, `alt` FROM `webapp_galleryimage` WHERE `gallery`='$id' AND `status`=1")->result();
//    array_push($row->images);
return $query;
}
public function edit($id,$order,$status,$name,$json,$timestamp,$image)
{
$data=array("order" => $order,"status" => $status,"name" => $name,"json" => $json,"timestamp" => $timestamp,"image" => $image);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_gallery", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_gallery` WHERE `id`='$id'");
$query=$this->db->query("DELETE FROM `webapp_galleryimage` WHERE `gallery`='$id'");
return $query;
}
}
?>
