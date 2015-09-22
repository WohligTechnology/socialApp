<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Json extends CI_Controller 
{function getallarticles()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_articles`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`webapp_articles`.`status`";
$elements[1]->sort="1";
$elements[1]->header="Status";
$elements[1]->alias="status";

$elements[2]=new stdClass();
$elements[2]->field="`webapp_articles`.`title`";
$elements[2]->sort="1";
$elements[2]->header="Title";
$elements[2]->alias="title";

$elements[3]=new stdClass();
$elements[3]->field="`webapp_articles`.`json`";
$elements[3]->sort="1";
$elements[3]->header="Json";
$elements[3]->alias="json";

$elements[4]=new stdClass();
$elements[4]->field="`webapp_articles`.`content`";
$elements[4]->sort="1";
$elements[4]->header="Content";
$elements[4]->alias="content";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_articles`","WHERE `webapp_articles`.`status`=1");
$this->load->view("json",$data);
}
public function getsinglearticles()
{
$id=$this->input->get_post("id");
$data["message"]=$this->articles_model->getsinglearticles($id);
$this->load->view("json",$data);
}
function getallfrontmenu()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_frontmenu`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`webapp_frontmenu`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";

$elements[2]=new stdClass();
$elements[2]->field="`webapp_frontmenu`.`parent`";
$elements[2]->sort="1";
$elements[2]->header="Parent";
$elements[2]->alias="parent";

$elements[3]=new stdClass();
$elements[3]->field="`webapp_frontmenu`.`status`";
$elements[3]->sort="1";
$elements[3]->header="Status";
$elements[3]->alias="status";

$elements[4]=new stdClass();
$elements[4]->field="`webapp_frontmenu`.`name`";
$elements[4]->sort="1";
$elements[4]->header="Name";
$elements[4]->alias="name";

$elements[5]=new stdClass();
$elements[5]->field="`webapp_frontmenu`.`json`";
$elements[5]->sort="1";
$elements[5]->header="Json";
$elements[5]->alias="json";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="order";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_frontmenu`","WHERE `webapp_frontmenu`.`status`=1");
$this->load->view("json",$data);
}
//public function getsinglefrontmenu()
//{
//$id=$this->input->get_post("id");
//$data["message"]=$this->frontmenu_model->getsinglefrontmenu($id);
//$this->load->view("json",$data);
//}
function getallgallery()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_gallery`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`webapp_gallery`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";

$elements[2]=new stdClass();
$elements[2]->field="`webapp_gallery`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements[3]=new stdClass();
$elements[3]->field="`webapp_gallery`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Name";
$elements[3]->alias="name";

$elements[4]=new stdClass();
$elements[4]->field="`webapp_gallery`.`json`";
$elements[4]->sort="1";
$elements[4]->header="Json";
$elements[4]->alias="json";
    
$elements[5]=new stdClass();
$elements[5]->field="`webapp_gallery`.`image`";
$elements[5]->sort="1";
$elements[5]->header="image";
$elements[5]->alias="image";
    


$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="`webapp_gallery`.`order`")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_gallery`","WHERE `webapp_gallery`.`status`=1");
$this->load->view("json",$data);
}
public function getsinglegallery()
{
$id=$this->input->get_post("id");
$data["message"]=$this->gallery_model->getsinglegallery($id);
$this->load->view("json",$data);
}
function getallgalleryimage()
{
$data = json_decode(file_get_contents('php://input'), true);
    $id=$data['id'];
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_galleryimage`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`webapp_galleryimage`.`gallery`";
$elements[1]->sort="1";
$elements[1]->header="Gallery";
$elements[1]->alias="gallery";

$elements[2]=new stdClass();
$elements[2]->field="`webapp_galleryimage`.`order`";
$elements[2]->sort="1";
$elements[2]->header="Order";
$elements[2]->alias="order";

$elements[3]=new stdClass();
$elements[3]->field="`webapp_galleryimage`.`status`";
$elements[3]->sort="1";
$elements[3]->header="Status";
$elements[3]->alias="status";

$elements[4]=new stdClass();
$elements[4]->field="`webapp_galleryimage`.`image`";
$elements[4]->sort="1";
$elements[4]->header="Image";
$elements[4]->alias="src";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_galleryimage`","WHERE `webapp_galleryimage`.`status`=1 AND `webapp_galleryimage`.`gallery`='$id'");
$this->load->view("json",$data);
}
//public function getsinglegalleryimage()
//{
//$id=$this->input->get_post("id");
//$data["message"]=$this->galleryimage_model->getsinglegalleryimage($id);
//$this->load->view("json",$data);
//}
function getallvideogallery()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_videogallery`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`webapp_videogallery`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";

$elements[2]=new stdClass();
$elements[2]->field="`webapp_videogallery`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements[3]=new stdClass();
$elements[3]->field="`webapp_videogallery`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Name";
$elements[3]->alias="name";

$elements[4]=new stdClass();
$elements[4]->field="`webapp_videogallery`.`json`";
$elements[4]->sort="1";
$elements[4]->header="Json";
$elements[4]->alias="json";

 
    
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="`webapp_videogallery`.`order`")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_videogallery`","WHERE `webapp_videogallery`.`status`=1");
$this->load->view("json",$data);
}
public function getsinglevideogallery()
{
$id=$this->input->get_post("id");
$data["message"]=$this->videogallery_model->getsinglevideogallery($id);
$this->load->view("json",$data);
}
function getallvideogalleryvideo()
{
$data = json_decode(file_get_contents('php://input'), true);
    $id=$data['id'];
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_videogalleryvideo`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`webapp_videogalleryvideo`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";

$elements[2]=new stdClass();
$elements[2]->field="`webapp_videogalleryvideo`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements[3]=new stdClass();
$elements[3]->field="`webapp_videogalleryvideo`.`videogallery`";
$elements[3]->sort="1";
$elements[3]->header="Video Gallery";
$elements[3]->alias="videogallery";

$elements[4]=new stdClass();
$elements[4]->field="`webapp_videogalleryvideo`.`url`";
$elements[4]->sort="1";
$elements[4]->header="Url";
$elements[4]->alias="url";
    
$elements[5]=new stdClass();
$elements[5]->field="`webapp_videogallery`.`id`";
$elements[5]->sort="1";
$elements[5]->header="ID";
$elements[5]->alias="id";

$elements[6]=new stdClass();
$elements[6]->field="`webapp_videogallery`.`order`";
$elements[6]->sort="1";
$elements[6]->header="Order";
$elements[6]->alias="ordervideo";

$elements[7]=new stdClass();
$elements[7]->field="`webapp_videogallery`.`status`";
$elements[7]->sort="1";
$elements[7]->header="Status";
$elements[7]->alias="status";

$elements[8]=new stdClass();
$elements[8]->field="`webapp_videogallery`.`name`";
$elements[8]->sort="1";
$elements[8]->header="Name";
$elements[8]->alias="name";

$elements[9]=new stdClass();
$elements[9]->field="`webapp_videogallery`.`json`";
$elements[9]->sort="1";
$elements[9]->header="Json";
$elements[9]->alias="json";
    
$elements[10]=new stdClass();
$elements[10]->field="`webapp_videogalleryvideo`.`alt`";
$elements[10]->sort="1";
$elements[10]->header="alt";
$elements[10]->alias="alt";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="ordervideo";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_videogalleryvideo` LEFT OUTER JOIN `webapp_videogallery` ON `webapp_videogallery`.`id`=`webapp_videogalleryvideo`.`videogallery`","WHERE `webapp_videogallery`.`status`=1 AND `webapp_videogalleryvideo`.`status`=1 AND `webapp_videogalleryvideo`.`videogallery`='$id'");
$this->load->view("json",$data);
}
//public function getsinglevideogalleryvideo()
//{
//$id=$this->input->get_post("id");
//$data["message"]=$this->videogalleryvideo_model->getsinglevideogalleryvideo($id);
//$this->load->view("json",$data);
//}
function getallevents()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_events`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`webapp_events`.`status`";
$elements[1]->sort="1";
$elements[1]->header="Status";
$elements[1]->alias="status";

$elements[2]=new stdClass();
$elements[2]->field="`webapp_events`.`title`";
$elements[2]->sort="1";
$elements[2]->header="Title";
$elements[2]->alias="title";

$elements[3]=new stdClass();
$elements[3]->field="`webapp_events`.`timestamp`";
$elements[3]->sort="1";
$elements[3]->header="Timestamp";
$elements[3]->alias="timestamp";

$elements[4]=new stdClass();
$elements[4]->field="`webapp_events`.`content`";
$elements[4]->sort="1";
$elements[4]->header="Content";
$elements[4]->alias="content";
    
$elements[5]=new stdClass();
$elements[5]->field="`webapp_events`.`image`";
$elements[5]->sort="1";
$elements[5]->header="image";
$elements[5]->alias="image";
    
$elements[6]=new stdClass();
$elements[6]->field="`webapp_events`.`startdate`";
$elements[6]->sort="1";
$elements[6]->header="startdate";
$elements[6]->alias="startdate";
    
$elements[7]=new stdClass();
$elements[7]->field="`webapp_events`.`starttime`";
$elements[7]->sort="1";
$elements[7]->header="starttime";
$elements[7]->alias="starttime";
    

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_events`","WHERE `webapp_events`.`status`=1");
$this->load->view("json",$data);
}
public function getsingleevents()
{
      $data = json_decode(file_get_contents('php://input'), true);
		$id=$data['id'];
$data["message"]=$this->events_model->getsingleevents($id);
$this->load->view("json",$data);
}
 
 public function createenquiry(){
        $data = json_decode(file_get_contents('php://input'), true);
		$name=$data['name'];
		$email=$data['email'];
		$user=$data['user'];
		$content=$data['content'];
		$title=$data['title'];
      if(empty($data))
        {
		$data['message']=0;
		}
	    else{
        $data['message']=$this->restapi_model->createenquiry($name,$email,$user,$content,$title);
        }
        $this->load->view("json",$data);
 }
 public function signup(){
        $data = json_decode(file_get_contents('php://input'), true);
		$username=$data['username'];
		$email=$data['email'];
		$password=$data['password'];
		$dob=$data['dob'];
      if(empty($data))
        {
		$data['message']=0;
		}
	    else{
        $data['message']=$this->restapi_model->signup($username,$email,$password,$dob);
        }
        $this->load->view("json",$data);
 }
 public function signin(){
        $data = json_decode(file_get_contents('php://input'), true);
		$username=$data['username'];
		$password=$data['password'];
      if(empty($data))
        {
		$data['message']=0;
		}
	    else{
        $data['message']=$this->restapi_model->signin($username,$password);
        }
        $this->load->view("json",$data);
 }
 public function logout(){
        $this->session->sess_destroy();
        $data['message']=true;
        $this->load->view('json',$data);
 }
//function getalleventvideo()
//{
//$elements=array();
//$elements[0]=new stdClass();
//$elements[0]->field="`webapp_eventvideo`.`id`";
//$elements[0]->sort="1";
//$elements[0]->header="ID";
//$elements[0]->alias="id";
//
//$elements=array();
//$elements[1]=new stdClass();
//$elements[1]->field="`webapp_eventvideo`.`event`";
//$elements[1]->sort="1";
//$elements[1]->header="event";
//$elements[1]->alias="event";
//
//$elements=array();
//$elements[2]=new stdClass();
//$elements[2]->field="`webapp_eventvideo`.`videogallery`";
//$elements[2]->sort="1";
//$elements[2]->header="Video Gallery";
//$elements[2]->alias="videogallery";
//
//$elements=array();
//$elements[3]=new stdClass();
//$elements[3]->field="`webapp_eventvideo`.`status`";
//$elements[3]->sort="1";
//$elements[3]->header="Status";
//$elements[3]->alias="status";
//
//$elements=array();
//$elements[4]=new stdClass();
//$elements[4]->field="`webapp_eventvideo`.`order`";
//$elements[4]->sort="1";
//$elements[4]->header="Order";
//$elements[4]->alias="order";
//    
//
//
//$search=$this->input->get_post("search");
//$pageno=$this->input->get_post("pageno");
//$orderby=$this->input->get_post("orderby");
//$orderorder=$this->input->get_post("orderorder");
//$maxrow=$this->input->get_post("maxrow");
//if($maxrow=="")
//{
//}
//if($orderby=="")
//{
//$orderby="id";
//$orderorder="ASC";
//}
//$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_eventvideo`");
//$this->load->view("json",$data);
//}
//public function getsingleeventvideo()
//{
//$id=$this->input->get_post("id");
//$data["message"]=$this->eventvideo_model->getsingleeventvideo($id);
//$this->load->view("json",$data);
//}
//function getalleventimages()
//{
//$elements=array();
//$elements[0]=new stdClass();
//$elements[0]->field="`webapp_eventimages`.`id`";
//$elements[0]->sort="1";
//$elements[0]->header="ID";
//$elements[0]->alias="id";
//
//$elements=array();
//$elements[1]=new stdClass();
//$elements[1]->field="`webapp_eventimages`.`event`";
//$elements[1]->sort="1";
//$elements[1]->header="event";
//$elements[1]->alias="event";
//
//$elements=array();
//$elements[2]=new stdClass();
//$elements[2]->field="`webapp_eventimages`.`status`";
//$elements[2]->sort="1";
//$elements[2]->header="Status";
//$elements[2]->alias="status";
//
//$elements=array();
//$elements[3]=new stdClass();
//$elements[3]->field="`webapp_eventimages`.`order`";
//$elements[3]->sort="1";
//$elements[3]->header="Order";
//$elements[3]->alias="order";
//
//$elements=array();
//$elements[4]=new stdClass();
//$elements[4]->field="`webapp_eventimages`.`image`";
//$elements[4]->sort="1";
//$elements[4]->header="Image";
//$elements[4]->alias="image";
//
//$search=$this->input->get_post("search");
//$pageno=$this->input->get_post("pageno");
//$orderby=$this->input->get_post("orderby");
//$orderorder=$this->input->get_post("orderorder");
//$maxrow=$this->input->get_post("maxrow");
//if($maxrow=="")
//{
//}
//if($orderby=="")
//{
//$orderby="id";
//$orderorder="ASC";
//}
//$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_eventimages`");
//$this->load->view("json",$data);
//}
//public function getsingleeventimages()
//{
//$id=$this->input->get_post("id");
//$data["message"]=$this->eventimages_model->getsingleeventimages($id);
//$this->load->view("json",$data);
//}
//function getallenquiry()
//{
//$elements=array();
//$elements[0]=new stdClass();
//$elements[0]->field="`webapp_enquiry`.`id`";
//$elements[0]->sort="1";
//$elements[0]->header="ID";
//$elements[0]->alias="id";
//
//$elements=array();
//$elements[1]=new stdClass();
//$elements[1]->field="`webapp_enquiry`.`user`";
//$elements[1]->sort="1";
//$elements[1]->header="User";
//$elements[1]->alias="user";
//
//$elements=array();
//$elements[2]=new stdClass();
//$elements[2]->field="`webapp_enquiry`.`name`";
//$elements[2]->sort="1";
//$elements[2]->header="Name";
//$elements[2]->alias="name";
//
//$elements=array();
//$elements[3]=new stdClass();
//$elements[3]->field="`webapp_enquiry`.`email`";
//$elements[3]->sort="1";
//$elements[3]->header="Email";
//$elements[3]->alias="email";
//
//$elements=array();
//$elements[4]=new stdClass();
//$elements[4]->field="`webapp_enquiry`.`title`";
//$elements[4]->sort="1";
//$elements[4]->header="Title";
//$elements[4]->alias="title";
//
//$elements=array();
//$elements[5]=new stdClass();
//$elements[5]->field="`webapp_enquiry`.`timestamp`";
//$elements[5]->sort="1";
//$elements[5]->header="Timestamp";
//$elements[5]->alias="timestamp";
//
//$elements=array();
//$elements[6]=new stdClass();
//$elements[6]->field="`webapp_enquiry`.`content`";
//$elements[6]->sort="1";
//$elements[6]->header="Content";
//$elements[6]->alias="content";
//
//$search=$this->input->get_post("search");
//$pageno=$this->input->get_post("pageno");
//$orderby=$this->input->get_post("orderby");
//$orderorder=$this->input->get_post("orderorder");
//$maxrow=$this->input->get_post("maxrow");
//if($maxrow=="")
//{
//}
//if($orderby=="")
//{
//$orderby="id";
//$orderorder="ASC";
//}
//$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_enquiry`");
//$this->load->view("json",$data);
//}
//public function getsingleenquiry()
//{
//$id=$this->input->get_post("id");
//$data["message"]=$this->enquiry_model->getsingleenquiry($id);
//$this->load->view("json",$data);
//}
function getallusernotification()
{
    $id=$this->input->get('id');
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_notification`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`webapp_notification`.`videogallery`";
$elements[1]->sort="1";
$elements[1]->header="Video Gallery";
$elements[1]->alias="videogallery";

$elements[2]=new stdClass();
$elements[2]->field="`webapp_notification`.`event`";
$elements[2]->sort="1";
$elements[2]->header="event";
$elements[2]->alias="event";

$elements[3]=new stdClass();
$elements[3]->field="`webapp_notification`.`videogalleryvideo`";
$elements[3]->sort="1";
$elements[3]->header="Video Gallery Video";
$elements[3]->alias="videogalleryvideo";

$elements[4]=new stdClass();
$elements[4]->field="`webapp_notification`.`galleryimage`";
$elements[4]->sort="1";
$elements[4]->header="Gallery Image";
$elements[4]->alias="galleryimage";

$elements[5]=new stdClass();
$elements[5]->field="`webapp_notification`.`article`";
$elements[5]->sort="1";
$elements[5]->header="article";
$elements[5]->alias="article";

$elements[6]=new stdClass();
$elements[6]->field="`webapp_notification`.`status`";
$elements[6]->sort="1";
$elements[6]->header="Status";
$elements[6]->alias="status";

$elements[7]=new stdClass();
$elements[7]->field="`webapp_notification`.`link`";
$elements[7]->sort="1";
$elements[7]->header="Link";
$elements[7]->alias="link";

$elements[8]=new stdClass();
$elements[8]->field="`webapp_notification`.`image`";
$elements[8]->sort="1";
$elements[8]->header="Image";
$elements[8]->alias="image";

$elements[9]=new stdClass();
$elements[9]->field="`webapp_notification`.`timestamp`";
$elements[9]->sort="1";
$elements[9]->header="Timestamp";
$elements[9]->alias="timestamp";

$elements[10]=new stdClass();
$elements[10]->field="`webapp_notification`.`content`";
$elements[10]->sort="1";
$elements[10]->header="Content";
$elements[10]->alias="content";
    
$elements[11]=new stdClass();
$elements[11]->field="`webapp_notificationuser`.`id`";
$elements[11]->sort="1";
$elements[11]->header="notificationuserid";
$elements[11]->alias="notificationuserid";

$elements[12]=new stdClass();
$elements[12]->field="`webapp_notificationuser`.`notification`";
$elements[12]->sort="1";
$elements[12]->header="Notificationid";
$elements[12]->alias="notificationid";

$elements[13]=new stdClass();
$elements[13]->field="`webapp_notificationuser`.`user`";
$elements[13]->sort="1";
$elements[13]->header="User";
$elements[13]->alias="user";

$elements[14]=new stdClass();
$elements[14]->field="`webapp_notificationuser`.`timestamp`";
$elements[14]->sort="1";
$elements[14]->header="Timestampuser";
$elements[14]->alias="timestampuser";

$elements[15]=new stdClass();
$elements[15]->field="`webapp_notificationuser`.`timestamp_receive`";
$elements[15]->sort="1";
$elements[15]->header="Timestamp Received";
$elements[15]->alias="timestamp_receive";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="timestampuser";
$orderorder="DESC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_notification` LEFT OUTER JOIN `webapp_notificationuser` ON `webapp_notificationuser`.`notification`=`webapp_notification`.`id`","WHERE `webapp_notificationuser`.`user`='$id'");
$this->load->view("json",$data);
}
public function getsinglenotification()
{
$id=$this->input->get_post("id");
$data["message"]=$this->notification_model->getsinglenotification($id);
$this->load->view("json",$data);
}
function getallnotificationuser()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_notificationuser`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`webapp_notificationuser`.`notification`";
$elements[1]->sort="1";
$elements[1]->header="Notification";
$elements[1]->alias="notification";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`webapp_notificationuser`.`user`";
$elements[2]->sort="1";
$elements[2]->header="User";
$elements[2]->alias="user";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`webapp_notificationuser`.`timestamp`";
$elements[3]->sort="1";
$elements[3]->header="Timestamp";
$elements[3]->alias="timestamp";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`webapp_notificationuser`.`timestamp_receive`";
$elements[4]->sort="1";
$elements[4]->header="Timestamp Received";
$elements[4]->alias="timestamp_receive";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_notificationuser`");
$this->load->view("json",$data);
}
public function getsinglenotificationuser()
{
$id=$this->input->get_post("id");
$data["message"]=$this->notificationuser_model->getsinglenotificationuser($id);
$this->load->view("json",$data);
}
function getallblog()
{   
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_blog`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`webapp_blog`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements[2]=new stdClass();
$elements[2]->field="`webapp_blog`.`title`";
$elements[2]->sort="1";
$elements[2]->header="Title";
$elements[2]->alias="title";

$elements[3]=new stdClass();
$elements[3]->field="`webapp_blog`.`json`";
$elements[3]->sort="1";
$elements[3]->header="Json";
$elements[3]->alias="json";

$elements[4]=new stdClass();
$elements[4]->field="`webapp_blog`.`content`";
$elements[4]->sort="1";
$elements[4]->header="Content";
$elements[4]->alias="content";

$elements[5]=new stdClass();
$elements[5]->field="date(`webapp_blog`.`timestamp`)";
$elements[5]->sort="1";
$elements[5]->header="timestamp";
$elements[5]->alias="timestamp";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_blog`");
$this->load->view("json",$data);
}
public function getsingleblog()
{
$data = json_decode(file_get_contents('php://input'), true);
$id=$data['id'];
$data["message"]=$this->blog_model->getsingleblog($id);
$this->load->view("json",$data);
}
  public function authenticate() {

        $data['message'] = $this->user_model->authenticate();
        $this->load->view('json', $data);
    }
//function getallblogvideo()
//{
//$elements=array();
//$elements[0]=new stdClass();
//$elements[0]->field="`webapp_blogvideo`.`id`";
//$elements[0]->sort="1";
//$elements[0]->header="ID";
//$elements[0]->alias="id";
//
//$elements=array();
//$elements[1]=new stdClass();
//$elements[1]->field="`webapp_blogvideo`.`blog`";
//$elements[1]->sort="1";
//$elements[1]->header="Blog";
//$elements[1]->alias="blog";
//
//$elements=array();
//$elements[2]=new stdClass();
//$elements[2]->field="`webapp_blogvideo`.`status`";
//$elements[2]->sort="1";
//$elements[2]->header="Status";
//$elements[2]->alias="status";
//
//$elements=array();
//$elements[3]=new stdClass();
//$elements[3]->field="`webapp_blogvideo`.`order`";
//$elements[3]->sort="1";
//$elements[3]->header="Order";
//$elements[3]->alias="order";
//
//$elements=array();
//$elements[4]=new stdClass();
//$elements[4]->field="`webapp_blogvideo`.`video`";
//$elements[4]->sort="1";
//$elements[4]->header="Video";
//$elements[4]->alias="video";
//
//$search=$this->input->get_post("search");
//$pageno=$this->input->get_post("pageno");
//$orderby=$this->input->get_post("orderby");
//$orderorder=$this->input->get_post("orderorder");
//$maxrow=$this->input->get_post("maxrow");
//if($maxrow=="")
//{
//}
//if($orderby=="")
//{
//$orderby="id";
//$orderorder="ASC";
//}
//$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_blogvideo`");
//$this->load->view("json",$data);
//}
//public function getsingleblogvideo()
//{
//$id=$this->input->get_post("id");
//$data["message"]=$this->blogvideo_model->getsingleblogvideo($id);
//$this->load->view("json",$data);
//}
//function getallblogimages()
//{
//$elements=array();
//$elements[0]=new stdClass();
//$elements[0]->field="`webapp_blogimages`.`id`";
//$elements[0]->sort="1";
//$elements[0]->header="ID";
//$elements[0]->alias="id";
//
//$elements=array();
//$elements[1]=new stdClass();
//$elements[1]->field="`webapp_blogimages`.`blog`";
//$elements[1]->sort="1";
//$elements[1]->header="ID";
//$elements[1]->alias="blog";
//
//$elements=array();
//$elements[2]=new stdClass();
//$elements[2]->field="`webapp_blogimages`.`status`";
//$elements[2]->sort="1";
//$elements[2]->header="Status";
//$elements[2]->alias="status";
//
//$elements=array();
//$elements[3]=new stdClass();
//$elements[3]->field="`webapp_blogimages`.`order`";
//$elements[3]->sort="1";
//$elements[3]->header="Order";
//$elements[3]->alias="order";
//
//$elements=array();
//$elements[4]=new stdClass();
//$elements[4]->field="`webapp_blogimages`.`image`";
//$elements[4]->sort="1";
//$elements[4]->header="Image";
//$elements[4]->alias="image";
//
//$search=$this->input->get_post("search");
//$pageno=$this->input->get_post("pageno");
//$orderby=$this->input->get_post("orderby");
//$orderorder=$this->input->get_post("orderorder");
//$maxrow=$this->input->get_post("maxrow");
//if($maxrow=="")
//{
//}
//if($orderby=="")
//{
//$orderby="id";
//$orderorder="ASC";
//}
//$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_blogimages`");
//$this->load->view("json",$data);
//}
//public function getsingleblogimages()
//{
//$id=$this->input->get_post("id");
//$data["message"]=$this->blogimages_model->getsingleblogimages($id);
//$this->load->view("json",$data);
//}
 
 function getallsliders()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`slider`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements[1]=new stdClass();
$elements[1]->field="`slider`.`image`";
$elements[1]->sort="1";
$elements[1]->header="image";
$elements[1]->alias="image";

$elements[2]=new stdClass();
$elements[2]->field="`slider`.`order`";
$elements[2]->sort="1";
$elements[2]->header="order";
$elements[2]->alias="order";

$elements[3]=new stdClass();
$elements[3]->field="`slider`.`status`";
$elements[3]->sort="1";
$elements[3]->header="status";
$elements[3]->alias="status";

$elements[4]=new stdClass();
$elements[4]->field="`slider`.`alt`";
$elements[4]->sort="1";
$elements[4]->header="alt";
$elements[4]->alias="alt";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="order";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `slider`","WHERE `slider`.`status`=1 ");
$this->load->view("json",$data);
}
 public function getappconfig(){
$data["message"]=$this->restapi_model->getappconfig();
 $this->load->view("json",$data);
 }
  public function changepassword() {
       $data = json_decode(file_get_contents('php://input'), true);
        $id=$data['id'];
        $oldpassword=$data['oldpassword'];
        $newpassword=$data['newpassword'];
        $confirmpassword=$data['confirmpassword'];
       if(empty($data))
        {
		$data['message']=0;
		}
	    else{
        $data["message"] = $this->restapi_model->changepassword($id,$oldpassword,$newpassword,$confirmpassword);
        }
        $this->load->view("json", $data);
    } 
 public function profilesubmit() {
       $data = json_decode(file_get_contents('php://input'), true);
         $id=$data['id'];
         $name=$data['name'];
         $email=$data['email'];
         $password=$data['password'];
         $dob=$data['dob'];
        $contact=$data['contact'];
        if(empty($data))
        {
		$data['message']=0;
		}
	    else{
        $data["message"] = $this->restapi_model->profilesubmit($id,$name,$email,$password,$dob,$contact);
        }
        $this->load->view("json", $data);
    }
 public function editprofile() {
       $data = json_decode(file_get_contents('php://input'), true);
         $id=$data['id'];
         $name=$data['name'];
         $email=$data['email'];
         $dob=$data['dob'];
        $contact=$data['contact'];
        $location=$data['location'];
        if(empty($data))
        {
		$data['message']=0;
		}
	    else{
        $data["message"] = $this->restapi_model->editprofile($id,$name,$email,$dob,$contact,$location);
        }
        $this->load->view("json", $data);
    }
 
  public function forgotpassword()
    {
        $data = json_decode(file_get_contents('php://input'), true);
         $email=$data['email'];
        $email=$this->input->get_post('email');
        $userid=$this->user_model->getidbyemail($email);
		$this->load->helper('string');
        $randompassword=random_string('alnum',8);
		$data['message']=$this->user_model->forgotpasswordsubmit($randompassword,$userid);
        if($userid=="")
        {
            $data['message']="Not A Valid Email.";
            $this->load->view("json",$data);
        }
        else
        {
        $this->load->library('email');
        $this->email->from('jagruti@wohlig.com', 'Blazen');
        $this->email->to($email);
        $this->email->subject('Welcome to Blazen');   
            
        $message = "<html>

      <body>
    <div style='text-align:center;   width: 50%; margin: 0 auto;'>
        <h4 style='font-size:1.5em;padding-bottom: 5px;color: #e82a96;'>One Stop Barter</h4>
        <p style='font-size: 1em;padding-bottom: 10px;'>Your password is:</p>
        <p style='font-size: 1em;padding-bottom: 10px;'>$randompassword</p>
    </div>
    <div style='text-align:center;position: relative;'>
        <p style=' position: absolute; top: 8%;left: 50%; transform: translatex(-50%); font-size: 1em;margin: 0; letter-spacing:2px; font-weight: bold;'>
            Thank You
        </p>
    </div>
</body>

</html>";
        $this->email->message($message);
        $this->email->send();
//        $data["message"] = $this->email->print_debugger();
        if(empty($data))
        {
		$data['message']=0;
		}
	    else{
        $data["message"] = 'true';
        }
        $this->load->view("json", $data);
        
    }
    }
    public function searchelementold(){
        $searchelement=$this->input->get('searchelement');
        $data['articletitle']=$this->restapi_model->searcharticletitle($searchelement);
        $data['eventtitle']=$this->restapi_model->searcheventtitle($searchelement);
        $data['blogtitle']=$this->restapi_model->searchblogtitle($searchelement);
        $data['galleryname']=$this->restapi_model->searchgalleryname($searchelement);
        $data['videogalleryname']=$this->restapi_model->searchvideogalleryname($searchelement);
        $data['message']=array_merge($data['articletitle'], $data['eventtitle'], $data['blogtitle'],$data['galleryname'],           $data['videogalleryname']);
        $this->load->view("json", $data); 
 } 
 public function searchelement(){
      $data = json_decode(file_get_contents('php://input'), true);
        $searchelement=$data['searchelement'];
        $data['message']=$this->restapi_model->searchelement($searchelement);
        $this->load->view("json", $data); 
 }
} ?>