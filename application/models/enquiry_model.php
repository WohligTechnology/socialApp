<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class enquiry_model extends CI_Model
{
public function create($user,$name,$email,$title,$timestamp,$content)
{
$data=array("user" => $user,"name" => $name,"email" => $email,"title" => $title,"content" => $content);
$query=$this->db->insert( "webapp_enquiry", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("webapp_enquiry")->row();
return $query;
}
function getsingleenquiry($id){
$this->db->where("id",$id);
$query=$this->db->get("webapp_enquiry")->row();
return $query;
}
public function edit($id,$user,$name,$email,$title,$timestamp,$content)
{
$data=array("user" => $user,"name" => $name,"email" => $email,"title" => $title,"timestamp" => $timestamp,"content" => $content);
$this->db->where( "id", $id );
$query=$this->db->update( "webapp_enquiry", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `webapp_enquiry` WHERE `id`='$id'");
return $query;
}
}
?>
