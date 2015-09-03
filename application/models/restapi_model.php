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
    public function signup($username,$email,$password,$dob){
$data=array("username" => $username,"email" => $email,"password" => md5($password),"dob" => $dob);
$query=$this->db->insert( "user", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  1;
    }
    public function signin($username,$password){
     $password=md5($password);
        $query=$this->db->query("SELECT `id` FROM `user` WHERE `username`='$username' AND `password`= '$password'");
        if($query->num_rows > 0)
        {
            $user=$query->row();
            $user=$user->id;
            

            $newdata = array(
                'username'     => $username,
                'password' => $password,
                'logged_in' => true,
                'id'=> $user
            );

            $this->session->set_userdata($newdata);
            //print_r($newdata);
            return true;
        }
        else
        return false;
    }
    
    public function getappconfig(){
    $query=$this->db->query("SELECT `id`, `title`, `content`, `text`, `type`, `image` FROM `config`")->result();
       return $query;
    }
}
?>
