<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class events_model extends CI_Model
{
public function create($status,$title,$timestamp,$content,$image,$startdate,$starttime)
{
$data=array("status" => $status,"title" => $title,"content" => $content,"image" => $image,"startdate" => $startdate,"starttime" => $starttime);
$query=$this->db->insert( "webapp_events", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_events")->row();
return $query;
}
function getsingleevents($id){
$query=$this->db->query("SELECT `id`, `status`, `title`, date(`timestamp`) as `timestamp`, `content`,`image` FROM `webapp_events` WHERE `status`=1 AND `id`='$id'")->row();
$query->eventimages=$this->db->query("SELECT `id`, `event`, `status`, `order`, `image` FROM `webapp_eventimages` WHERE `event`='$id' 
AND `status`=1")->result();
$query->eventvideos=$this->db->query("SELECT `id`, `event`, `videogallery`, `status`, `order`,`url` FROM `webapp_eventvideo` WHERE `status`=1 AND `event`='$id'")->result();
    
return $query;
}
public function edit($id,$status,$title,$timestamp,$content,$image,$startdate,$starttime)
{
$data=array("status" => $status,"title" => $title,"timestamp" => $timestamp,"content" => $content,"image" => $image,"startdate" => $startdate,"starttime" => $starttime);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_events", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_events` WHERE `id`='$id'");
$query=$this->db->query("DELETE FROM `webapp_eventvideo` WHERE `event`='$id'");
$query=$this->db->query("DELETE FROM `webapp_eventimages` WHERE `event`='$id'");
return $query;
}
}
?>
