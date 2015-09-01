<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class restapi_model extends CI_Model
{
    public function createenquiry($name,$email,$user,$timestamp,$content,$title){
    $data=array("name" => $name,"email" => $email,"user" => $user,"timestamp" => $timestamp,"content" => $content,"title" => $title);
$query=$this->db->insert( "webapp_enquiry", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  1;
    }
    public function blogids(){
    $query=$this->db->query("SELECT `id` FROM `webapp_blog`")->result();
        return $query;
    }
}
?>
