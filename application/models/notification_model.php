<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class notification_model extends CI_Model
{
public function create($videogallery,$event,$videogalleryvideo,$galleryimage,$article,$status,$link,$image,$timestamp,$content)
{
$data=array("videogallery" => $videogallery,"event" => $event,"videogalleryvideo" => $videogalleryvideo,"galleryimage" => $galleryimage,"article" => $article,"status" => $status,"link" => $link,"image" => $image,"content" => $content);
$query=$this->db->insert( "webapp_notification", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_notification")->row();
return $query;
}
function getsinglenotification($id){
$this->db->where("id",$id);
$query=$this->db->get("webapp_notification")->row();
return $query;
}
public function edit($id,$videogallery,$event,$videogalleryvideo,$galleryimage,$article,$status,$link,$image,$timestamp,$content)
{
$data=array("videogallery" => $videogallery,"event" => $event,"videogalleryvideo" => $videogalleryvideo,"galleryimage" => $galleryimage,"article" => $article,"status" => $status,"link" => $link,"image" => $image,"timestamp" => $timestamp,"content" => $content);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_notification", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_notification` WHERE `id`='$id'");
    $query=$this->db->query("DELETE FROM `webapp_notificationuser` WHERE `notification`='$id'");
return $query;
}
}
?>
