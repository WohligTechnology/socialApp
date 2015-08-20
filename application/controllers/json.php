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

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`webapp_articles`.`status`";
$elements[1]->sort="1";
$elements[1]->header="Status";
$elements[1]->alias="status";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`webapp_articles`.`title`";
$elements[2]->sort="1";
$elements[2]->header="Title";
$elements[2]->alias="title";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`webapp_articles`.`json`";
$elements[3]->sort="1";
$elements[3]->header="Json";
$elements[3]->alias="json";

$elements=array();
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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_articles`");
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

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`webapp_frontmenu`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`webapp_frontmenu`.`parent`";
$elements[2]->sort="1";
$elements[2]->header="Parent";
$elements[2]->alias="parent";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`webapp_frontmenu`.`status`";
$elements[3]->sort="1";
$elements[3]->header="Status";
$elements[3]->alias="status";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`webapp_frontmenu`.`name`";
$elements[4]->sort="1";
$elements[4]->header="Name";
$elements[4]->alias="name";

$elements=array();
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
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_frontmenu`");
$this->load->view("json",$data);
}
public function getsinglefrontmenu()
{
$id=$this->input->get_post("id");
$data["message"]=$this->frontmenu_model->getsinglefrontmenu($id);
$this->load->view("json",$data);
}
function getallgallery()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_gallery`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`webapp_gallery`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`webapp_gallery`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`webapp_gallery`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Name";
$elements[3]->alias="name";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`webapp_gallery`.`json`";
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
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_gallery`");
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
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_galleryimage`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`webapp_galleryimage`.`gallery`";
$elements[1]->sort="1";
$elements[1]->header="Gallery";
$elements[1]->alias="gallery";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`webapp_galleryimage`.`order`";
$elements[2]->sort="1";
$elements[2]->header="Order";
$elements[2]->alias="order";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`webapp_galleryimage`.`status`";
$elements[3]->sort="1";
$elements[3]->header="Status";
$elements[3]->alias="status";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`webapp_galleryimage`.`image`";
$elements[4]->sort="1";
$elements[4]->header="Image";
$elements[4]->alias="image";

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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_galleryimage`");
$this->load->view("json",$data);
}
public function getsinglegalleryimage()
{
$id=$this->input->get_post("id");
$data["message"]=$this->galleryimage_model->getsinglegalleryimage($id);
$this->load->view("json",$data);
}
function getallvideogallery()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_videogallery`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`webapp_videogallery`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`webapp_videogallery`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`webapp_videogallery`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Name";
$elements[3]->alias="name";

$elements=array();
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
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_videogallery`");
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
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_videogalleryvideo`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`webapp_videogalleryvideo`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`webapp_videogalleryvideo`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`webapp_videogalleryvideo`.`videogallery`";
$elements[3]->sort="1";
$elements[3]->header="Video Gallery";
$elements[3]->alias="videogallery";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`webapp_videogalleryvideo`.`url`";
$elements[4]->sort="1";
$elements[4]->header="Url";
$elements[4]->alias="url";

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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_videogalleryvideo`");
$this->load->view("json",$data);
}
public function getsinglevideogalleryvideo()
{
$id=$this->input->get_post("id");
$data["message"]=$this->videogalleryvideo_model->getsinglevideogalleryvideo($id);
$this->load->view("json",$data);
}
function getallevents()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_events`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`webapp_events`.`status`";
$elements[1]->sort="1";
$elements[1]->header="Status";
$elements[1]->alias="status";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`webapp_events`.`title`";
$elements[2]->sort="1";
$elements[2]->header="Title";
$elements[2]->alias="title";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`webapp_events`.`timestamp`";
$elements[3]->sort="1";
$elements[3]->header="Timestamp";
$elements[3]->alias="timestamp";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`webapp_events`.`content`";
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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_events`");
$this->load->view("json",$data);
}
public function getsingleevents()
{
$id=$this->input->get_post("id");
$data["message"]=$this->events_model->getsingleevents($id);
$this->load->view("json",$data);
}
function getalleventvideo()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_eventvideo`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`webapp_eventvideo`.`event`";
$elements[1]->sort="1";
$elements[1]->header="event";
$elements[1]->alias="event";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`webapp_eventvideo`.`videogallery`";
$elements[2]->sort="1";
$elements[2]->header="Video Gallery";
$elements[2]->alias="videogallery";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`webapp_eventvideo`.`status`";
$elements[3]->sort="1";
$elements[3]->header="Status";
$elements[3]->alias="status";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`webapp_eventvideo`.`order`";
$elements[4]->sort="1";
$elements[4]->header="Order";
$elements[4]->alias="order";

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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_eventvideo`");
$this->load->view("json",$data);
}
public function getsingleeventvideo()
{
$id=$this->input->get_post("id");
$data["message"]=$this->eventvideo_model->getsingleeventvideo($id);
$this->load->view("json",$data);
}
function getalleventimages()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_eventimages`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`webapp_eventimages`.`event`";
$elements[1]->sort="1";
$elements[1]->header="event";
$elements[1]->alias="event";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`webapp_eventimages`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`webapp_eventimages`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`webapp_eventimages`.`image`";
$elements[4]->sort="1";
$elements[4]->header="Image";
$elements[4]->alias="image";

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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_eventimages`");
$this->load->view("json",$data);
}
public function getsingleeventimages()
{
$id=$this->input->get_post("id");
$data["message"]=$this->eventimages_model->getsingleeventimages($id);
$this->load->view("json",$data);
}
function getallenquiry()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_enquiry`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`webapp_enquiry`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`webapp_enquiry`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Name";
$elements[2]->alias="name";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`webapp_enquiry`.`email`";
$elements[3]->sort="1";
$elements[3]->header="Email";
$elements[3]->alias="email";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`webapp_enquiry`.`title`";
$elements[4]->sort="1";
$elements[4]->header="Title";
$elements[4]->alias="title";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`webapp_enquiry`.`timestamp`";
$elements[5]->sort="1";
$elements[5]->header="Timestamp";
$elements[5]->alias="timestamp";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`webapp_enquiry`.`content`";
$elements[6]->sort="1";
$elements[6]->header="Content";
$elements[6]->alias="content";

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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_enquiry`");
$this->load->view("json",$data);
}
public function getsingleenquiry()
{
$id=$this->input->get_post("id");
$data["message"]=$this->enquiry_model->getsingleenquiry($id);
$this->load->view("json",$data);
}
function getallnotification()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_notification`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`webapp_notification`.`videogallery`";
$elements[1]->sort="1";
$elements[1]->header="Video Gallery";
$elements[1]->alias="videogallery";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`webapp_notification`.`event`";
$elements[2]->sort="1";
$elements[2]->header="event";
$elements[2]->alias="event";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`webapp_notification`.`videogalleryvideo`";
$elements[3]->sort="1";
$elements[3]->header="Video Gallery Video";
$elements[3]->alias="videogalleryvideo";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`webapp_notification`.`galleryimage`";
$elements[4]->sort="1";
$elements[4]->header="Gallery Image";
$elements[4]->alias="galleryimage";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`webapp_notification`.`article`";
$elements[5]->sort="1";
$elements[5]->header="article";
$elements[5]->alias="article";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`webapp_notification`.`status`";
$elements[6]->sort="1";
$elements[6]->header="Status";
$elements[6]->alias="status";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`webapp_notification`.`link`";
$elements[7]->sort="1";
$elements[7]->header="Link";
$elements[7]->alias="link";

$elements=array();
$elements[8]=new stdClass();
$elements[8]->field="`webapp_notification`.`image`";
$elements[8]->sort="1";
$elements[8]->header="Image";
$elements[8]->alias="image";

$elements=array();
$elements[9]=new stdClass();
$elements[9]->field="`webapp_notification`.`timestamp`";
$elements[9]->sort="1";
$elements[9]->header="Timestamp";
$elements[9]->alias="timestamp";

$elements=array();
$elements[10]=new stdClass();
$elements[10]->field="`webapp_notification`.`content`";
$elements[10]->sort="1";
$elements[10]->header="Content";
$elements[10]->alias="content";

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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_notification`");
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

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`webapp_blog`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`webapp_blog`.`title`";
$elements[2]->sort="1";
$elements[2]->header="Title";
$elements[2]->alias="title";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`webapp_blog`.`json`";
$elements[3]->sort="1";
$elements[3]->header="Json";
$elements[3]->alias="json";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`webapp_blog`.`content`";
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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_blog`");
$this->load->view("json",$data);
}
public function getsingleblog()
{
$id=$this->input->get_post("id");
$data["message"]=$this->blog_model->getsingleblog($id);
$this->load->view("json",$data);
}
function getallblogvideo()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_blogvideo`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`webapp_blogvideo`.`blog`";
$elements[1]->sort="1";
$elements[1]->header="Blog";
$elements[1]->alias="blog";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`webapp_blogvideo`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`webapp_blogvideo`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`webapp_blogvideo`.`video`";
$elements[4]->sort="1";
$elements[4]->header="Video";
$elements[4]->alias="video";

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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_blogvideo`");
$this->load->view("json",$data);
}
public function getsingleblogvideo()
{
$id=$this->input->get_post("id");
$data["message"]=$this->blogvideo_model->getsingleblogvideo($id);
$this->load->view("json",$data);
}
function getallblogimages()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_blogimages`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`webapp_blogimages`.`blog`";
$elements[1]->sort="1";
$elements[1]->header="ID";
$elements[1]->alias="blog";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`webapp_blogimages`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`webapp_blogimages`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`webapp_blogimages`.`image`";
$elements[4]->sort="1";
$elements[4]->header="Image";
$elements[4]->alias="image";

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
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_blogimages`");
$this->load->view("json",$data);
}
public function getsingleblogimages()
{
$id=$this->input->get_post("id");
$data["message"]=$this->blogimages_model->getsingleblogimages($id);
$this->load->view("json",$data);
}
} ?>