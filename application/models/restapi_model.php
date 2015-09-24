<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class restapi_model extends CI_Model
{
    public function createenquiry($name,$email,$user,$content,$title){
    $data=array("name" => $name,"email" => $email,"user" => $user,"content" => $content,"title" => $title);
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
	    $newdata=$this->db->query("SELECT * FROM `user` WHERE `id`='$id'")->row();
		if(!$query)
		return false;
		else
		return $newdata;
    }
    public function signin($username,$password){
     $password=md5($password);
        $query=$this->db->query("SELECT `id` FROM `user` WHERE `username`='$username' AND `password`= '$password'");
        if($query->num_rows > 0)
        {
            $user=$query->row();
            $user=$user->id;
            
		   $newdata=$this->db->query("SELECT * FROM `user` WHERE `id`='$user'")->row();
//            $newdata = array(
//                'username'     => $username,
//                'password' => $password,
//                'logged_in' => true,
//                'id'=> $user
//            );
		   
            $this->session->set_userdata($newdata);
            //print_r($newdata);
            return $newdata;
        }
        else
        return false;
    }
    
    public function getappconfig(){
    $query=$this->db->query("SELECT `id`, `title`, `content`, `text`, `type`, `image` FROM `config`")->result();
       return $query;
    }
      public function changepassword($id, $oldpassword, $newpassword, $confirmpassword) {
        $oldpassword = md5($oldpassword);
        $newpassword = md5($newpassword);
        $confirmpassword = md5($confirmpassword);
        if ($newpassword == $confirmpassword) {
            $useridquery = $this->db->query("SELECT `id` FROM `user` WHERE `password`='$oldpassword'");
            if ($useridquery->num_rows() == 0) {
                return 0;
            } else {
                $query = $useridquery->row();
                $userid = $query->id;
                $updatequery = $this->db->query("UPDATE `user` SET `password`='$newpassword' WHERE `id`='$userid'");
                return 1;
            }
        } else {
//            echo "New password and confirm password do not match!!!";
			return -1;
        }
    }
    
    public function profilesubmit($id,$name,$email,$password,$dob,$contact)
    {
        $password=md5($password);
        $data=array("name" => $name,"email" => $email,"password" => $password,"dob" => $dob,"contact" => $contact);
        $this->db->where( "id", $id );
        $query=$this->db->update( "user", $data );
        if(!$query)
        return  0;
        else
        return  1;
    }
    public function editprofile($id,$name,$email,$dob,$contact,$location)
    {
        $data=array("name" => $name,"email" => $email,"dob" => $dob,"contact" => $contact,"address" => $location);
        $this->db->where( "id", $id );
        $query=$this->db->update( "user", $data );
        $query1=$this->db->query("SELECT `id`, `name`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `dob`, `street`, `address`, `city`, `state`, `pincode`, `facebook`, `twitter`, `google`, `country`, `instagram`, `contact` FROM `user` WHERE `id`='$id'")->row();
        if($query)
        return  $query1;
        else
        return  0;
    }
    public function searcharticletitle($searchelement){
        $query=$this->db->query("SELECT `id`, `status`, `title`, `json`, `content`, `timestamp`, `image` FROM `webapp_articles` WHERE `title` LIKE '%$searchelement%'")->result();
        return $query;
    } 
    public function searcheventtitle($searchelement){
        $query=$this->db->query("SELECT `id`, `status`, `title`, `timestamp`, `content`, `image`, `startdate`, `starttime` FROM `webapp_events` WHERE `title` LIKE '%$searchelement%'")->result();
        return $query;
    }  
    public function searchblogtitle($searchelement){
        $query=$this->db->query("SELECT `id`, `name`, `title`, `json`, `content`, `timestamp` FROM `webapp_blog` WHERE `name` LIKe '%$searchelement%' OR `title` LIKE '%$searchelement%'")->result();
        return $query;
    } 
    public function searchgalleryname($searchelement){
        $query=$this->db->query("SELECT `id`, `order`, `status`, `name`, `json`, `timestamp`, `image` FROM `webapp_gallery` WHERE `name` LIKE '%$searchelement%'")->result();
        return $query;
    } 
    public function searchvideogalleryname($searchelement){
        $query=$this->db->query("SELECT `id`, `order`, `status`, `name`, `json`, `timestamp` FROM `webapp_videogallery` WHERE `name` LIKE '%$searchelement%'")->result();
        return $query;
    }
    public function searchelement($searchelement){
     $query['article']=$this->db->query("SELECT `id`, `status`, `title`, `json`, `content`, `timestamp`, `image` FROM `webapp_articles` WHERE `title` LIKE '%$searchelement%'")->result();
                $query['events']=$this->db->query("SELECT `id`, `status`, `title`, `timestamp`, `content`, `image`, `startdate`, `starttime` FROM `webapp_events` WHERE `title` LIKE '%$searchelement%'")->result();
           $query['blog']=$this->db->query("SELECT `id`, `name`, `title`, `json`, `content`, `timestamp` FROM `webapp_blog` WHERE `name` LIKe '%$searchelement%' OR `title` LIKE '%$searchelement%'")->result();
          $query['gallery']=$this->db->query("SELECT `id`, `order`, `status`, `name`, `json`, `timestamp`, `image` FROM `webapp_gallery` WHERE `name` LIKE '%$searchelement%'")->result();
          $query['videogallery']=$this->db->query("SELECT `id`, `order`, `status`, `name`, `json`, `timestamp` FROM `webapp_videogallery` WHERE `name` LIKE '%$searchelement%'")->result();
        return $query;
    }
}
?>