<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller 
{
	public function __construct( )
	{
		parent::__construct();
		
		$this->is_logged_in();
	}
	function is_logged_in( )
	{
		$is_logged_in = $this->session->userdata( 'logged_in' );
		if ( $is_logged_in !== 'true' || !isset( $is_logged_in ) ) {
			redirect( base_url() . 'index.php/login', 'refresh' );
		} //$is_logged_in !== 'true' || !isset( $is_logged_in )
	}
	function checkaccess($access)
	{
		$accesslevel=$this->session->userdata('accesslevel');
		if(!in_array($accesslevel,$access))
			redirect( base_url() . 'index.php/site?alerterror=You do not have access to this page. ', 'refresh' );
	}
	public function index()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data[ 'page' ] = 'dashboard';
		$data[ 'title' ] = 'Welcome';
		$this->load->view( 'template', $data );	
	}
	public function createuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
//        $data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createuser';
		$data[ 'title' ] = 'Create User';
		$this->load->view( 'template', $data );	
	}
	function createusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
            $data['category']=$this->category_model->getcategorydropdown();
            $data[ 'page' ] = 'createuser';
            $data[ 'title' ] = 'Create User';
            $this->load->view( 'template', $data );	
		}
		else
		{
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $accesslevel=$this->input->post('accesslevel');
            $status=$this->input->post('status');
            $socialid=$this->input->post('socialid');
            $logintype=$this->input->post('logintype');
            $json=$this->input->post('json');
//            $category=$this->input->post('category');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
			if($this->user_model->create($name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json)==0)
			$data['alerterror']="New user could not be created.";
			else
			$data['alertsuccess']="User created Successfully.";
			$data['redirect']="site/viewusers";
			$this->load->view("redirect",$data);
		}
	}
    function viewusers()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['page']='viewusers';
        $data['base_url'] = site_url("site/viewusersjson");
        
		$data['title']='View Users';
		$this->load->view('template',$data);
	} 
    function viewusersjson()
	{
		$access = array("1");
		$this->checkaccess($access);
        
        
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`user`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        
        $elements[1]=new stdClass();
        $elements[1]->field="`user`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`user`.`email`";
        $elements[2]->sort="1";
        $elements[2]->header="Email";
        $elements[2]->alias="email";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`user`.`socialid`";
        $elements[3]->sort="1";
        $elements[3]->header="SocialId";
        $elements[3]->alias="socialid";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`user`.`logintype`";
        $elements[4]->sort="1";
        $elements[4]->header="Logintype";
        $elements[4]->alias="logintype";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`user`.`json`";
        $elements[5]->sort="1";
        $elements[5]->header="Json";
        $elements[5]->alias="json";
       
        $elements[6]=new stdClass();
        $elements[6]->field="`accesslevel`.`name`";
        $elements[6]->sort="1";
        $elements[6]->header="Accesslevel";
        $elements[6]->alias="accesslevelname";
       
        $elements[7]=new stdClass();
        $elements[7]->field="`statuses`.`name`";
        $elements[7]->sort="1";
        $elements[7]->header="Status";
        $elements[7]->alias="status";
       
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `user` LEFT OUTER JOIN `logintype` ON `logintype`.`id`=`user`.`logintype` LEFT OUTER JOIN `accesslevel` ON `accesslevel`.`id`=`user`.`accesslevel` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`user`.`status`");
        
		$this->load->view("json",$data);
	} 
    
    
	function edituser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data['page']='edituser';
		$data['page2']='block/userblock';
		$data['title']='Edit User';
		$this->load->view('templatewith2',$data);
	}
	function editusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
			$data['before']=$this->user_model->beforeedit($this->input->post('id'));
			$data['page']='edituser';
//			$data['page2']='block/userblock';
			$data['title']='Edit User';
			$this->load->view('template',$data);
		}
		else
		{
            
            $id=$this->input->get_post('id');
            $name=$this->input->get_post('name');
            $email=$this->input->get_post('email');
            $password=$this->input->get_post('password');
            $accesslevel=$this->input->get_post('accesslevel');
            $status=$this->input->get_post('status');
            $socialid=$this->input->get_post('socialid');
            $logintype=$this->input->get_post('logintype');
            $json=$this->input->get_post('json');
//            $category=$this->input->get_post('category');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->user_model->getuserimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
			if($this->user_model->edit($id,$name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json)==0)
			$data['alerterror']="User Editing was unsuccesful";
			else
			$data['alertsuccess']="User edited Successfully.";
			
			$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deleteuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->deleteuser($this->input->get('id'));
//		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="User Deleted Successfully";
		$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}
	function changeuserstatus()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->changestatus($this->input->get('id'));
		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="Status Changed Successfully";
		$data['redirect']="site/viewusers";
        $data['other']="template=$template";
        $this->load->view("redirect",$data);
	}
    
    
    
    public function viewarticles()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewarticles";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["base_url"]=site_url("site/viewarticlesjson");
$data["title"]="View articles";
$this->load->view("template",$data);
}
function viewarticlesjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_articles`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`statuses`.`name`";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_articles` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_articles`.`status`");
$this->load->view("json",$data);
}

public function createarticles()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createarticles";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Create articles";
$this->load->view("template",$data);
}
public function createarticlessubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("json","Json","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createarticles";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Create articles";
$this->load->view("template",$data);
}
else
{
$status=$this->input->get_post("status");
$title=$this->input->get_post("title");
$json=$this->input->get_post("json");
$content=$this->input->get_post("content");
if($this->articles_model->create($status,$title,$json,$content)==0)
$data["alerterror"]="New articles could not be created.";
else
$data["alertsuccess"]="articles created Successfully.";
$data["redirect"]="site/viewarticles";
$this->load->view("redirect",$data);
}
}
public function editarticles()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editarticles";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Edit articles";
$data["before"]=$this->articles_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editarticlessubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("json","Json","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editarticles";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Edit articles";
$data["before"]=$this->articles_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$status=$this->input->get_post("status");
$title=$this->input->get_post("title");
$json=$this->input->get_post("json");
$content=$this->input->get_post("content");
if($this->articles_model->edit($id,$status,$title,$json,$content)==0)
$data["alerterror"]="New articles could not be Updated.";
else
$data["alertsuccess"]="articles Updated Successfully.";
$data["redirect"]="site/viewarticles";
$this->load->view("redirect",$data);
}
}
public function deletearticles()
{
$access=array("1");
$this->checkaccess($access);
$this->articles_model->delete($this->input->get("id"));
$data["redirect"]="site/viewarticles";
$this->load->view("redirect",$data);
}
public function viewfrontmenu()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewfrontmenu";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["base_url"]=site_url("site/viewfrontmenujson");
$data["title"]="View frontmenu";
$this->load->view("template",$data);
}
function viewfrontmenujson()
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
$elements[2]->field="`tab1`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Parent";
$elements[2]->alias="parent";
$elements[3]=new stdClass();
$elements[3]->field="`statuses`.`name`";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_frontmenu` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_frontmenu`.`status` LEFT OUTER JOIN `webapp_frontmenu` as `tab1` ON `webapp_frontmenu`.`parent`=`tab1`.`id`");
$this->load->view("json",$data);
}

public function createfrontmenu()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createfrontmenu";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'parent' ] =$this->user_model->getfrontmenudropdown();
$data["title"]="Create frontmenu";
$this->load->view("template",$data);
}
public function createfrontmenusubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("parent","Parent","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("json","Json","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createfrontmenu";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'parent' ] =$this->user_model->getfrontmenudropdown();
$data["title"]="Create frontmenu";
$this->load->view("template",$data);
}
else
{
$order=$this->input->get_post("order");
$parent=$this->input->get_post("parent");
$status=$this->input->get_post("status");
$name=$this->input->get_post("name");
$json=$this->input->get_post("json");
if($this->frontmenu_model->create($order,$parent,$status,$name,$json)==0)
$data["alerterror"]="New frontmenu could not be created.";
else
$data["alertsuccess"]="frontmenu created Successfully.";
$data["redirect"]="site/viewfrontmenu";
$this->load->view("redirect",$data);
}
}
public function editfrontmenu()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editfrontmenu";
$data[ 'parent' ] =$this->user_model->getfrontmenudropdown();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Edit frontmenu";
$data["before"]=$this->frontmenu_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editfrontmenusubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("parent","Parent","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("json","Json","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["page"]="editfrontmenu";
$data[ 'parent' ] =$this->user_model->getfrontmenudropdown();
$data["title"]="Edit frontmenu";
$data["before"]=$this->frontmenu_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$order=$this->input->get_post("order");
$parent=$this->input->get_post("parent");
$status=$this->input->get_post("status");
$name=$this->input->get_post("name");
$json=$this->input->get_post("json");
if($this->frontmenu_model->edit($id,$order,$parent,$status,$name,$json)==0)
$data["alerterror"]="New frontmenu could not be Updated.";
else
$data["alertsuccess"]="frontmenu Updated Successfully.";
$data["redirect"]="site/viewfrontmenu";
$this->load->view("redirect",$data);
}
}
public function deletefrontmenu()
{
$access=array("1");
$this->checkaccess($access);
$this->frontmenu_model->delete($this->input->get("id"));
$data["redirect"]="site/viewfrontmenu";
$this->load->view("redirect",$data);
}
public function viewgallery()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewgallery";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["base_url"]=site_url("site/viewgalleryjson");
$data["title"]="View gallery";
$this->load->view("template",$data);
}
function viewgalleryjson()
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
$elements[2]->field="`statuses`.`name`";
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
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_gallery` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_gallery`.`status`");
$this->load->view("json",$data);
}

public function creategallery()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="creategallery";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Create gallery";
$this->load->view("template",$data);
}
public function creategallerysubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("json","Json","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["page"]="creategallery";
$data["title"]="Create gallery";
$this->load->view("template",$data);
}
else
{
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$name=$this->input->get_post("name");
$json=$this->input->get_post("json");
if($this->gallery_model->create($order,$status,$name,$json)==0)
$data["alerterror"]="New gallery could not be created.";
else
$data["alertsuccess"]="gallery created Successfully.";
$data["redirect"]="site/viewgallery";
$this->load->view("redirect",$data);
}
}
public function editgallery()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editgallery";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Edit gallery";
$data["before"]=$this->gallery_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editgallerysubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("json","Json","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editgallery";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Edit gallery";
$data["before"]=$this->gallery_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$name=$this->input->get_post("name");
$json=$this->input->get_post("json");
if($this->gallery_model->edit($id,$order,$status,$name,$json)==0)
$data["alerterror"]="New gallery could not be Updated.";
else
$data["alertsuccess"]="gallery Updated Successfully.";
$data["redirect"]="site/viewgallery";
$this->load->view("redirect",$data);
}
}
public function deletegallery()
{
$access=array("1");
$this->checkaccess($access);
$this->gallery_model->delete($this->input->get("id"));
$data["redirect"]="site/viewgallery";
$this->load->view("redirect",$data);
}
public function viewgalleryimage()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewgalleryimage";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'gallery' ] =$this->user_model->getgallerydropdown();
$data["base_url"]=site_url("site/viewgalleryimagejson");
$data["title"]="View galleryimage";
$this->load->view("template",$data);
}
function viewgalleryimagejson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_galleryimage`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`webapp_gallery`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Gallery";
$elements[1]->alias="gallery";
$elements[2]=new stdClass();
$elements[2]->field="`webapp_galleryimage`.`order`";
$elements[2]->sort="1";
$elements[2]->header="Order";
$elements[2]->alias="order";
$elements[3]=new stdClass();
$elements[3]->field="`statuses`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Status";
$elements[3]->alias="status";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_galleryimage` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_galleryimage`.`status` LEFT OUTER JOIN `webapp_gallery` ON `webapp_gallery`.`id`=`webapp_galleryimage`.`gallery`");
$this->load->view("json",$data);
}

public function creategalleryimage()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="creategalleryimage";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'gallery' ] =$this->user_model->getgallerydropdown();
$data["title"]="Create galleryimage";
$this->load->view("template",$data);
}
public function creategalleryimagesubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("gallery","Gallery","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$data[ 'gallery' ] =$this->user_model->getgallerydropdown();
$this->form_validation->set_rules("image","Image","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="creategalleryimage";
$data[ 'gallery' ] =$this->user_model->getgallerydropdown();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Create galleryimage";
$this->load->view("template",$data);
}
else
{
$gallery=$this->input->get_post("gallery");
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$alt=$this->input->get_post("alt");
//$image=$this->input->get_post("image");
       $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
if($this->galleryimage_model->create($gallery,$order,$status,$image,$alt)==0)
$data["alerterror"]="New galleryimage could not be created.";
else
$data["alertsuccess"]="galleryimage created Successfully.";
$data["redirect"]="site/viewgalleryimage";
$this->load->view("redirect",$data);
}
}
public function editgalleryimage()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editgalleryimage";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'gallery' ] =$this->user_model->getgallerydropdown();
$data["title"]="Edit galleryimage";
$data["before"]=$this->galleryimage_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editgalleryimagesubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("gallery","Gallery","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("image","Image","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editgalleryimage";
$data[ 'gallery' ] =$this->user_model->getgallerydropdown();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Edit galleryimage";
$data["before"]=$this->galleryimage_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$gallery=$this->input->get_post("gallery");
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$alt=$this->input->get_post("alt");
//$image=$this->input->get_post("image");
      $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->user_model->getgalleryimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
if($this->galleryimage_model->edit($id,$gallery,$order,$status,$image,$alt)==0)
$data["alerterror"]="New galleryimage could not be Updated.";
else
$data["alertsuccess"]="galleryimage Updated Successfully.";
$data["redirect"]="site/viewgalleryimage";
$this->load->view("redirect",$data);
}
}
public function deletegalleryimage()
{
$access=array("1");
$this->checkaccess($access);
$this->galleryimage_model->delete($this->input->get("id"));
$data["redirect"]="site/viewgalleryimage";
$this->load->view("redirect",$data);
}
public function viewvideogallery()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewvideogallery";
$data["base_url"]=site_url("site/viewvideogalleryjson");
$data["title"]="View videogallery";
$this->load->view("template",$data);
}
function viewvideogalleryjson()
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
$elements[2]->field="`statuses`.`name`";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_videogallery` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_videogallery`.`status`");
$this->load->view("json",$data);
}

public function createvideogallery()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createvideogallery";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'videogallery' ] =$this->user_model->getvideogallerydropdown();
$data["title"]="Create videogallery";
$this->load->view("template",$data);
}
public function createvideogallerysubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("json","Json","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createvideogallery";
$data[ 'videogallery' ] =$this->user_model->getvideogallerydropdown();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Create videogallery";
$this->load->view("template",$data);
}
else
{
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$name=$this->input->get_post("name");
$json=$this->input->get_post("json");
if($this->videogallery_model->create($order,$status,$name,$json)==0)
$data["alerterror"]="New videogallery could not be created.";
else
$data["alertsuccess"]="videogallery created Successfully.";
$data["redirect"]="site/viewvideogallery";
$this->load->view("redirect",$data);
}
}
public function editvideogallery()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editvideogallery";
$data[ 'videogallery' ] =$this->user_model->getvideogallerydropdown();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Edit videogallery";
$data["before"]=$this->videogallery_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editvideogallerysubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("json","Json","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'videogallery' ] =$this->user_model->getvideogallerydropdown();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["page"]="editvideogallery";
$data["title"]="Edit videogallery";
$data["before"]=$this->videogallery_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$name=$this->input->get_post("name");
$json=$this->input->get_post("json");
if($this->videogallery_model->edit($id,$order,$status,$name,$json)==0)
$data["alerterror"]="New videogallery could not be Updated.";
else
$data["alertsuccess"]="videogallery Updated Successfully.";
$data["redirect"]="site/viewvideogallery";
$this->load->view("redirect",$data);
}
}
public function deletevideogallery()
{
$access=array("1");
$this->checkaccess($access);
$this->videogallery_model->delete($this->input->get("id"));
$data["redirect"]="site/viewvideogallery";
$this->load->view("redirect",$data);
}
public function viewvideogalleryvideo()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewvideogalleryvideo";
$data["base_url"]=site_url("site/viewvideogalleryvideojson");
$data["title"]="View videogalleryvideo";
$this->load->view("template",$data);
}
function viewvideogalleryvideojson()
{
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
$elements[2]->field="`statuses`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";
$elements[3]=new stdClass();
$elements[3]->field="`webapp_videogallery`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Video Gallery";
$elements[3]->alias="videogallery";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_videogalleryvideo` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_videogalleryvideo`.`status` LEFT OUTER JOIN `webapp_videogallery` ON `webapp_videogallery`.`id`=`webapp_videogalleryvideo`.`videogallery`");
$this->load->view("json",$data);
}

public function createvideogalleryvideo()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createvideogalleryvideo";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'videogallery' ] =$this->user_model->getvideogallerydropdown();
$data["title"]="Create videogalleryvideo";
$this->load->view("template",$data);
}
public function createvideogalleryvideosubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("videogallery","Video Gallery","trim");
$this->form_validation->set_rules("url","Url","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createvideogalleryvideo";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'videogallery' ] =$this->user_model->getvideogallerydropdown();
$data["title"]="Create videogalleryvideo";
$this->load->view("template",$data);
}
else
{
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$videogallery=$this->input->get_post("videogallery");
$url=$this->input->get_post("url");
$alt=$this->input->get_post("alt");
if($this->videogalleryvideo_model->create($order,$status,$videogallery,$url,$alt)==0)
$data["alerterror"]="New videogalleryvideo could not be created.";
else
$data["alertsuccess"]="videogalleryvideo created Successfully.";
$data["redirect"]="site/viewvideogalleryvideo";
$this->load->view("redirect",$data);
}
}
public function editvideogalleryvideo()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editvideogalleryvideo";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'videogallery' ] =$this->user_model->getvideogallerydropdown();
$data["title"]="Edit videogalleryvideo";
$data["before"]=$this->videogalleryvideo_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editvideogalleryvideosubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("videogallery","Video Gallery","trim");
$this->form_validation->set_rules("url","Url","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'videogallery' ] =$this->user_model->getvideogallerydropdown();
$data["page"]="editvideogalleryvideo";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Edit videogalleryvideo";
$data["before"]=$this->videogalleryvideo_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$order=$this->input->get_post("order");
$status=$this->input->get_post("status");
$videogallery=$this->input->get_post("videogallery");
$url=$this->input->get_post("url");
    $alt=$this->input->get_post("alt");
if($this->videogalleryvideo_model->edit($id,$order,$status,$videogallery,$url,$alt)==0)
$data["alerterror"]="New videogalleryvideo could not be Updated.";
else
$data["alertsuccess"]="videogalleryvideo Updated Successfully.";
$data["redirect"]="site/viewvideogalleryvideo";
$this->load->view("redirect",$data);
}
}
public function deletevideogalleryvideo()
{
$access=array("1");
$this->checkaccess($access);
$this->videogalleryvideo_model->delete($this->input->get("id"));
$data["redirect"]="site/viewvideogalleryvideo";
$this->load->view("redirect",$data);
}
public function viewevents()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewevents";
$data["base_url"]=site_url("site/vieweventsjson");
$data["title"]="View events";
$this->load->view("template",$data);
}
function vieweventsjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_events`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`statuses`.`name`";
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
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_events` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_events`.`status`");
$this->load->view("json",$data);
}

public function createevents()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createevents";
$data[ 'status' ] =$this->user_model->getstatusdropdown();

$data["title"]="Create events";
$this->load->view("template",$data);
}
public function createeventssubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("timestamp","Timestamp","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createevents";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Create events";
$this->load->view("template",$data);
}
else
{
$status=$this->input->get_post("status");
$title=$this->input->get_post("title");
$timestamp=$this->input->get_post("timestamp");
$content=$this->input->get_post("content");
if($this->events_model->create($status,$title,$timestamp,$content)==0)
$data["alerterror"]="New events could not be created.";
else
$data["alertsuccess"]="events created Successfully.";
$data["redirect"]="site/viewevents";
$this->load->view("redirect",$data);
}
}
public function editevents()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editevents";
$data["title"]="Edit events";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["before"]=$this->events_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editeventssubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("timestamp","Timestamp","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["page"]="editevents";
$data["title"]="Edit events";
$data["before"]=$this->events_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$status=$this->input->get_post("status");
$title=$this->input->get_post("title");
$timestamp=$this->input->get_post("timestamp");
$content=$this->input->get_post("content");
if($this->events_model->edit($id,$status,$title,$timestamp,$content)==0)
$data["alerterror"]="New events could not be Updated.";
else
$data["alertsuccess"]="events Updated Successfully.";
$data["redirect"]="site/viewevents";
$this->load->view("redirect",$data);
}
}
public function deleteevents()
{
$access=array("1");
$this->checkaccess($access);
$this->events_model->delete($this->input->get("id"));
$data["redirect"]="site/viewevents";
$this->load->view("redirect",$data);
}
public function vieweventvideo()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="vieweventvideo";
$data["base_url"]=site_url("site/vieweventvideojson");
$data["title"]="View eventvideo";
$this->load->view("template",$data);
}
function vieweventvideojson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_eventvideo`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`webapp_events`.`title`";
$elements[1]->sort="1";
$elements[1]->header="event";
$elements[1]->alias="event";
$elements[2]=new stdClass();
$elements[2]->field="`webapp_videogallery`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Video Gallery";
$elements[2]->alias="videogallery";
$elements[3]=new stdClass();
$elements[3]->field="`statuses`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Status";
$elements[3]->alias="status";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_eventvideo` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_eventvideo`.`status` LEFT OUTER JOIN `webapp_videogallery` ON `webapp_videogallery`.`id`=`webapp_eventvideo`.`videogallery` LEFT OUTER JOIN `webapp_events` ON `webapp_events`.`id`=`webapp_eventvideo`.`event`");
$this->load->view("json",$data);
}

public function createeventvideo()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createeventvideo";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'event' ] =$this->user_model->geteventsdropdown();
$data[ 'videogallery' ] =$this->user_model->getvideogallerydropdown();
$data["title"]="Create eventvideo";
$this->load->view("template",$data);
}
public function createeventvideosubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("event","event","trim");
$this->form_validation->set_rules("videogallery","Video Gallery","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createeventvideo";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'videogallery' ] =$this->user_model->getvideogallerydropdown();
$data[ 'event' ] =$this->user_model->geteventsdropdown();
$data["title"]="Create eventvideo";
$this->load->view("template",$data);
}
else
{
$event=$this->input->get_post("event");
$videogallery=$this->input->get_post("videogallery");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
if($this->eventvideo_model->create($event,$videogallery,$status,$order)==0)
$data["alerterror"]="New eventvideo could not be created.";
else
$data["alertsuccess"]="eventvideo created Successfully.";
$data["redirect"]="site/vieweventvideo";
$this->load->view("redirect",$data);
}
}
public function editeventvideo()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editeventvideo";
$data[ 'videogallery' ] =$this->user_model->getvideogallerydropdown();
$data[ 'event' ] =$this->user_model->geteventsdropdown();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Edit eventvideo";
$data["before"]=$this->eventvideo_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editeventvideosubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("event","event","trim");
$this->form_validation->set_rules("videogallery","Video Gallery","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editeventvideo";
$data[ 'videogallery' ] =$this->user_model->getvideogallerydropdown();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'event' ] =$this->user_model->geteventsdropdown();
$data["title"]="Edit eventvideo";
$data["before"]=$this->eventvideo_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$event=$this->input->get_post("event");
$videogallery=$this->input->get_post("videogallery");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
if($this->eventvideo_model->edit($id,$event,$videogallery,$status,$order)==0)
$data["alerterror"]="New eventvideo could not be Updated.";
else
$data["alertsuccess"]="eventvideo Updated Successfully.";
$data["redirect"]="site/vieweventvideo";
$this->load->view("redirect",$data);
}
}
public function deleteeventvideo()
{
$access=array("1");
$this->checkaccess($access);
$this->eventvideo_model->delete($this->input->get("id"));
$data["redirect"]="site/vieweventvideo";
$this->load->view("redirect",$data);
}
public function vieweventimages()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="vieweventimages";
$data["base_url"]=site_url("site/vieweventimagesjson");
$data["title"]="View eventimages";
$this->load->view("template",$data);
}
function vieweventimagesjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_eventimages`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`webapp_events`.`title`";
$elements[1]->sort="1";
$elements[1]->header="event";
$elements[1]->alias="event";
$elements[2]=new stdClass();
$elements[2]->field="`statuses`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";
$elements[3]=new stdClass();
$elements[3]->field="`webapp_eventimages`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_eventimages` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_eventimages`.`status` LEFT OUTER JOIN `webapp_events` ON `webapp_events`.`id`=`webapp_eventimages`.`event`");
$this->load->view("json",$data);
}

public function createeventimages()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createeventimages";
$data[ 'event' ] =$this->user_model->geteventsdropdown();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Create eventimages";
$this->load->view("template",$data);
}
public function createeventimagessubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("event","event","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("image","Image","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["page"]="createeventimages";
$data[ 'event' ] =$this->user_model->geteventsdropdown();
$data["title"]="Create eventimages";
$this->load->view("template",$data);
}
else
{
$event=$this->input->get_post("event");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
//$image=$this->input->get_post("image");
       $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
if($this->eventimages_model->create($event,$status,$order,$image)==0)
$data["alerterror"]="New eventimages could not be created.";
else
$data["alertsuccess"]="eventimages created Successfully.";
$data["redirect"]="site/vieweventimages";
$this->load->view("redirect",$data);
}
}
public function editeventimages()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editeventimages";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'event' ] =$this->user_model->geteventsdropdown();
$data["title"]="Edit eventimages";
$data["before"]=$this->eventimages_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editeventimagessubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("event","event","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("image","Image","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editeventimages";
$data[ 'event' ] =$this->user_model->geteventsdropdown();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Edit eventimages";
$data["before"]=$this->eventimages_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$event=$this->input->get_post("event");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
//$image=$this->input->get_post("image");
      $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->user_model->geteventimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
if($this->eventimages_model->edit($id,$event,$status,$order,$image)==0)
$data["alerterror"]="New eventimages could not be Updated.";
else
$data["alertsuccess"]="eventimages Updated Successfully.";
$data["redirect"]="site/vieweventimages";
$this->load->view("redirect",$data);
}
}
public function deleteeventimages()
{
$access=array("1");
$this->checkaccess($access);
$this->eventimages_model->delete($this->input->get("id"));
$data["redirect"]="site/vieweventimages";
$this->load->view("redirect",$data);
}
public function viewenquiry()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewenquiry";
$data["base_url"]=site_url("site/viewenquiryjson");
$data["title"]="View enquiry";
$this->load->view("template",$data);
}
function viewenquiryjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_enquiry`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`user`.`name`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";
$elements[2]=new stdClass();
$elements[2]->field="`webapp_enquiry`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Name";
$elements[2]->alias="name";
$elements[3]=new stdClass();
$elements[3]->field="`webapp_enquiry`.`email`";
$elements[3]->sort="1";
$elements[3]->header="Email";
$elements[3]->alias="email";
$elements[4]=new stdClass();
$elements[4]->field="`webapp_enquiry`.`title`";
$elements[4]->sort="1";
$elements[4]->header="Title";
$elements[4]->alias="title";
$elements[5]=new stdClass();
$elements[5]->field="`webapp_enquiry`.`timestamp`";
$elements[5]->sort="1";
$elements[5]->header="Timestamp";
$elements[5]->alias="timestamp";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_enquiry` LEFT OUTER JOIN `user` ON `user`.`id`=`webapp_enquiry`.`user`");
$this->load->view("json",$data);
}

public function createenquiry()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createenquiry";
$data["user"]=$this->user_model->getuserdropdown();
$data["title"]="Create enquiry";
$this->load->view("template",$data);
}
public function createenquirysubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("email","Email","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("timestamp","Timestamp","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["user"]=$this->user_model->getuserdropdown();
$data["page"]="createenquiry";
$data["title"]="Create enquiry";
$this->load->view("template",$data);
}
else
{
$user=$this->input->get_post("user");
$name=$this->input->get_post("name");
$email=$this->input->get_post("email");
$title=$this->input->get_post("title");
$timestamp=$this->input->get_post("timestamp");
$content=$this->input->get_post("content");
if($this->enquiry_model->create($user,$name,$email,$title,$timestamp,$content)==0)
$data["alerterror"]="New enquiry could not be created.";
else
$data["alertsuccess"]="enquiry created Successfully.";
$data["redirect"]="site/viewenquiry";
$this->load->view("redirect",$data);
}
}
public function editenquiry()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editenquiry";
$data["user"]=$this->user_model->getuserdropdown();
$data["title"]="Edit enquiry";
$data["before"]=$this->enquiry_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editenquirysubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("email","Email","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("timestamp","Timestamp","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editenquiry";
$data["user"]=$this->user_model->getuserdropdown();
$data["title"]="Edit enquiry";
$data["before"]=$this->enquiry_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$user=$this->input->get_post("user");
$name=$this->input->get_post("name");
$email=$this->input->get_post("email");
$title=$this->input->get_post("title");
$timestamp=$this->input->get_post("timestamp");
$content=$this->input->get_post("content");
if($this->enquiry_model->edit($id,$user,$name,$email,$title,$timestamp,$content)==0)
$data["alerterror"]="New enquiry could not be Updated.";
else
$data["alertsuccess"]="enquiry Updated Successfully.";
$data["redirect"]="site/viewenquiry";
$this->load->view("redirect",$data);
}
}
public function deleteenquiry()
{
$access=array("1");
$this->checkaccess($access);
$this->enquiry_model->delete($this->input->get("id"));
$data["redirect"]="site/viewenquiry";
$this->load->view("redirect",$data);
}
public function viewnotification()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewnotification";
$data["base_url"]=site_url("site/viewnotificationjson");
$data["title"]="View notification";
$this->load->view("template",$data);
}
function viewnotificationjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_notification`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`webapp_videogallery`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Video Gallery";
$elements[1]->alias="videogallery";
$elements[2]=new stdClass();
$elements[2]->field="`webapp_events`.`title`";
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
$elements[5]->field="`webapp_articles`.`title`";
$elements[5]->sort="1";
$elements[5]->header="article";
$elements[5]->alias="article";
$elements[6]=new stdClass();
$elements[6]->field="`statuses`.`name`";
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
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_notification` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_notification`.`status` LEFT OUTER JOIN `webapp_articles` ON `webapp_articles`.`id`=`webapp_notification`.`article` LEFT OUTER JOIN `webapp_events` ON `webapp_events`.`id`=`webapp_notification`.`event` LEFT OUTER JOIN `webapp_videogallery` ON `webapp_videogallery`.`id`=`webapp_notification`.`videogallery`");
$this->load->view("json",$data);
}

public function createnotification()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createnotification";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'videogallery' ] =$this->user_model->getvideogallerydropdown();
$data[ 'event' ] =$this->user_model->geteventsdropdown();
$data[ 'article' ] =$this->user_model->getarticlesdropdown();
$data["title"]="Create notification";
$this->load->view("template",$data);
}
public function createnotificationsubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("videogallery","Video Gallery","trim");
$this->form_validation->set_rules("event","event","trim");
$this->form_validation->set_rules("videogalleryvideo","Video Gallery Video","trim");
$this->form_validation->set_rules("galleryimage","Gallery Image","trim");
$this->form_validation->set_rules("article","article","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("link","Link","trim");
$this->form_validation->set_rules("image","Image","trim");
$this->form_validation->set_rules("timestamp","Timestamp","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'event' ] =$this->user_model->geteventsdropdown();
$data["page"]="createnotification";
$data[ 'videogallery' ] =$this->user_model->getvideogallerydropdown();
$data[ 'article' ] =$this->user_model->getarticlesdropdown();
$data["title"]="Create notification";
$this->load->view("template",$data);
}
else
{
$videogallery=$this->input->get_post("videogallery");
$event=$this->input->get_post("event");
$videogalleryvideo=$this->input->get_post("videogalleryvideo");
$galleryimage=$this->input->get_post("galleryimage");
$article=$this->input->get_post("article");
$status=$this->input->get_post("status");
$link=$this->input->get_post("link");
//$image=$this->input->get_post("image");
$timestamp=$this->input->get_post("timestamp");
$content=$this->input->get_post("content");
       $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
if($this->notification_model->create($videogallery,$event,$videogalleryvideo,$galleryimage,$article,$status,$link,$image,$timestamp,$content)==0)
$data["alerterror"]="New notification could not be created.";
else
$data["alertsuccess"]="notification created Successfully.";
$data["redirect"]="site/viewnotification";
$this->load->view("redirect",$data);
}
}
public function editnotification()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editnotification";
$data[ 'videogallery' ] =$this->user_model->getvideogallerydropdown();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'event' ] =$this->user_model->geteventsdropdown();
$data[ 'article' ] =$this->user_model->getarticlesdropdown();
$data["title"]="Edit notification";
$data["before"]=$this->notification_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editnotificationsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("videogallery","Video Gallery","trim");
$this->form_validation->set_rules("event","event","trim");
$this->form_validation->set_rules("videogalleryvideo","Video Gallery Video","trim");
$this->form_validation->set_rules("galleryimage","Gallery Image","trim");
$this->form_validation->set_rules("article","article","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("link","Link","trim");
$this->form_validation->set_rules("image","Image","trim");
$this->form_validation->set_rules("timestamp","Timestamp","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editnotification";
$data[ 'videogallery' ] =$this->user_model->getvideogallerydropdown();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'event' ] =$this->user_model->geteventsdropdown();
$data[ 'article' ] =$this->user_model->getarticlesdropdown();
$data["title"]="Edit notification";
$data["before"]=$this->notification_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$videogallery=$this->input->get_post("videogallery");
$event=$this->input->get_post("event");
$videogalleryvideo=$this->input->get_post("videogalleryvideo");
$galleryimage=$this->input->get_post("galleryimage");
$article=$this->input->get_post("article");
$status=$this->input->get_post("status");
$link=$this->input->get_post("link");
//$image=$this->input->get_post("image");
$timestamp=$this->input->get_post("timestamp");
$content=$this->input->get_post("content");
      $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->user_model->getnotificationimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
if($this->notification_model->edit($id,$videogallery,$event,$videogalleryvideo,$galleryimage,$article,$status,$link,$image,$timestamp,$content)==0)
$data["alerterror"]="New notification could not be Updated.";
else
$data["alertsuccess"]="notification Updated Successfully.";
$data["redirect"]="site/viewnotification";
$this->load->view("redirect",$data);
}
}
public function deletenotification()
{
$access=array("1");
$this->checkaccess($access);
$this->notification_model->delete($this->input->get("id"));
$data["redirect"]="site/viewnotification";
$this->load->view("redirect",$data);
}
public function viewnotificationuser()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewnotificationuser";
$data["notification"]=$this->user_model->getnotificationdropdown();
$data["base_url"]=site_url("site/viewnotificationuserjson");
$data["title"]="View notificationuser";
$this->load->view("template",$data);
}
function viewnotificationuserjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_notificationuser`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`webapp_notificationuser`.`notification`";
$elements[1]->sort="1";
$elements[1]->header="Notification";
$elements[1]->alias="notification";
$elements[2]=new stdClass();
$elements[2]->field="`webapp_notificationuser`.`user`";
$elements[2]->sort="1";
$elements[2]->header="User";
$elements[2]->alias="user";
$elements[3]=new stdClass();
$elements[3]->field="`webapp_notificationuser`.`timestamp`";
$elements[3]->sort="1";
$elements[3]->header="Timestamp";
$elements[3]->alias="timestamp";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_notificationuser`");
$this->load->view("json",$data);
}

public function createnotificationuser()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createnotificationuser";
$data["notification"]=$this->user_model->getnotificationdropdown();
$data["title"]="Create notificationuser";
$data[ 'notification' ] =$this->user_model->getnotificationdropdown();
$data[ 'user' ] =$this->user_model->getuserdropdown();
$this->load->view("template",$data);
}
public function createnotificationusersubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("notification","Notification","trim");
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("timestamp","Timestamp","trim");
$this->form_validation->set_rules("timestamp_receive","Timestamp Received","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["notification"]=$this->user_model->getnotificationdropdown();
$data["page"]="createnotificationuser";
$data[ 'notification' ] =$this->user_model->getnotificationdropdown();
$data[ 'user' ] =$this->user_model->getuserdropdown();
$data["title"]="Create notificationuser";
$this->load->view("template",$data);
}
else
{
$notification=$this->input->get_post("notification");
$user=$this->input->get_post("user");
$timestamp=$this->input->get_post("timestamp");
$timestamp_receive=$this->input->get_post("timestamp_receive");
if($this->notificationuser_model->create($notification,$user,$timestamp,$timestamp_receive)==0)
$data["alerterror"]="New notificationuser could not be created.";
else
$data["alertsuccess"]="notificationuser created Successfully.";
$data["redirect"]="site/viewnotificationuser";
$this->load->view("redirect",$data);
}
}
public function editnotificationuser()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editnotificationuser";
$data["notification"]=$this->user_model->getnotificationdropdown();
$data[ 'notification' ] =$this->user_model->getnotificationdropdown();
$data[ 'user' ] =$this->user_model->getuserdropdown();
$data["title"]="Edit notificationuser";
$data["before"]=$this->notificationuser_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editnotificationusersubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("notification","Notification","trim");
$this->form_validation->set_rules("user","User","trim");
$this->form_validation->set_rules("timestamp","Timestamp","trim");
$this->form_validation->set_rules("timestamp_receive","Timestamp Received","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["notification"]=$this->user_model->getnotificationdropdown();
$data[ 'notification' ] =$this->user_model->getnotificationdropdown();
$data[ 'user' ] =$this->user_model->getuserdropdown();
$data["page"]="editnotificationuser";
$data["title"]="Edit notificationuser";
$data["before"]=$this->notificationuser_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$notification=$this->input->get_post("notification");
$user=$this->input->get_post("user");
$timestamp=$this->input->get_post("timestamp");
$timestamp_receive=$this->input->get_post("timestamp_receive");
if($this->notificationuser_model->edit($id,$notification,$user,$timestamp,$timestamp_receive)==0)
$data["alerterror"]="New notificationuser could not be Updated.";
else
$data["alertsuccess"]="notificationuser Updated Successfully.";
$data["redirect"]="site/viewnotificationuser";
$this->load->view("redirect",$data);
}
}
public function deletenotificationuser()
{
$access=array("1");
$this->checkaccess($access);
$this->notificationuser_model->delete($this->input->get("id"));
$data["redirect"]="site/viewnotificationuser";
$this->load->view("redirect",$data);
}
public function viewblog()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewblog";
$data["base_url"]=site_url("site/viewblogjson");
$data["title"]="View blog";
$this->load->view("template",$data);
}
function viewblogjson()
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
$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_blog`");
$this->load->view("json",$data);
}

public function createblog()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createblog";
$data["title"]="Create blog";
$this->load->view("template",$data);
}
public function createblogsubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("json","Json","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createblog";
$data["title"]="Create blog";
$this->load->view("template",$data);
}
else
{
$name=$this->input->get_post("name");
$title=$this->input->get_post("title");
$json=$this->input->get_post("json");
$content=$this->input->get_post("content");
if($this->blog_model->create($name,$title,$json,$content)==0)
$data["alerterror"]="New blog could not be created.";
else
$data["alertsuccess"]="blog created Successfully.";
$data["redirect"]="site/viewblog";
$this->load->view("redirect",$data);
}
}
public function editblog()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editblog";
$data["title"]="Edit blog";
$data["before"]=$this->blog_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editblogsubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("name","Name","trim");
$this->form_validation->set_rules("title","Title","trim");
$this->form_validation->set_rules("json","Json","trim");
$this->form_validation->set_rules("content","Content","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editblog";
$data["title"]="Edit blog";
$data["before"]=$this->blog_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$name=$this->input->get_post("name");
$title=$this->input->get_post("title");
$json=$this->input->get_post("json");
$content=$this->input->get_post("content");
if($this->blog_model->edit($id,$name,$title,$json,$content)==0)
$data["alerterror"]="New blog could not be Updated.";
else
$data["alertsuccess"]="blog Updated Successfully.";
$data["redirect"]="site/viewblog";
$this->load->view("redirect",$data);
}
}
public function deleteblog()
{
$access=array("1");
$this->checkaccess($access);
$this->blog_model->delete($this->input->get("id"));
$data["redirect"]="site/viewblog";
$this->load->view("redirect",$data);
}
public function viewblogvideo()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewblogvideo";
$data["base_url"]=site_url("site/viewblogvideojson");
$data["title"]="View blogvideo";
$this->load->view("template",$data);
}
function viewblogvideojson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_blogvideo`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`webapp_blog`.`title`";
$elements[1]->sort="1";
$elements[1]->header="Blog";
$elements[1]->alias="blog";
$elements[2]=new stdClass();
$elements[2]->field="`statuses`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";
$elements[3]=new stdClass();
$elements[3]->field="`webapp_blogvideo`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_blogvideo` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_blogvideo`.`status` LEFT OUTER JOIN `webapp_blog` ON `webapp_blog`.`id`=`webapp_blogvideo`.`blog`");
$this->load->view("json",$data);
}

public function createblogvideo()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createblogvideo";
$data[ 'blog' ] =$this->user_model->getblogdropdown();
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Create blogvideo";
$this->load->view("template",$data);
}
public function createblogvideosubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("blog","Blog","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("video","Video","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data[ 'blog' ] =$this->user_model->getblogdropdown();
$data["page"]="createblogvideo";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Create blogvideo";
$this->load->view("template",$data);
}
else
{
$blog=$this->input->get_post("blog");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
$video=$this->input->get_post("video");
if($this->blogvideo_model->create($blog,$status,$order,$video)==0)
$data["alerterror"]="New blogvideo could not be created.";
else
$data["alertsuccess"]="blogvideo created Successfully.";
$data["redirect"]="site/viewblogvideo";
$this->load->view("redirect",$data);
}
}
public function editblogvideo()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editblogvideo";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'blog' ] =$this->user_model->getblogdropdown();
$data["title"]="Edit blogvideo";
$data["before"]=$this->blogvideo_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editblogvideosubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("blog","Blog","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("video","Video","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editblogvideo";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'blog' ] =$this->user_model->getblogdropdown();
$data["title"]="Edit blogvideo";
$data["before"]=$this->blogvideo_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$blog=$this->input->get_post("blog");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
$video=$this->input->get_post("video");
if($this->blogvideo_model->edit($id,$blog,$status,$order,$video)==0)
$data["alerterror"]="New blogvideo could not be Updated.";
else
$data["alertsuccess"]="blogvideo Updated Successfully.";
$data["redirect"]="site/viewblogvideo";
$this->load->view("redirect",$data);
}
}
public function deleteblogvideo()
{
$access=array("1");
$this->checkaccess($access);
$this->blogvideo_model->delete($this->input->get("id"));
$data["redirect"]="site/viewblogvideo";
$this->load->view("redirect",$data);
}
public function viewblogimages()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewblogimages";
$data["base_url"]=site_url("site/viewblogimagesjson");
$data["title"]="View blogimages";
$this->load->view("template",$data);
}
function viewblogimagesjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`webapp_blogimages`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`webapp_blog`.`title`";
$elements[1]->sort="1";
$elements[1]->header="Blog";
$elements[1]->alias="blog";
$elements[2]=new stdClass();
$elements[2]->field="`statuses`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";
$elements[3]=new stdClass();
$elements[3]->field="`webapp_blogimages`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `webapp_blogimages` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`webapp_blogimages`.`status` LEFT OUTER JOIN `webapp_blog` ON `webapp_blog`.`id`=`webapp_blogimages`.`blog`");
$this->load->view("json",$data);
}

public function createblogimages()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createblogimages";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'blog' ] =$this->user_model->getblogdropdown();
$data["title"]="Create blogimages";
$this->load->view("template",$data);
}
public function createblogimagessubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("blog","ID","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("image","Image","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createblogimages";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'blog' ] =$this->user_model->getblogdropdown();
$data["title"]="Create blogimages";
$this->load->view("template",$data);
}
else
{
$blog=$this->input->get_post("blog");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
//$image=$this->input->get_post("image");
       $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
if($this->blogimages_model->create($blog,$status,$order,$image)==0)
$data["alerterror"]="New blogimages could not be created.";
else
$data["alertsuccess"]="blogimages created Successfully.";
$data["redirect"]="site/viewblogimages";
$this->load->view("redirect",$data);
}
}
public function editblogimages()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editblogimages";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'blog' ] =$this->user_model->getblogdropdown();
$data["title"]="Edit blogimages";
$data["before"]=$this->blogimages_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editblogimagessubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("blog","ID","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("image","Image","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editblogimages";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data[ 'blog' ] =$this->user_model->getblogdropdown();
$data["title"]="Edit blogimages";
$data["before"]=$this->blogimages_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$blog=$this->input->get_post("blog");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
//$image=$this->input->get_post("image");
      $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->user_model->getblogimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
if($this->blogimages_model->edit($id,$blog,$status,$order,$image)==0)
$data["alerterror"]="New blogimages could not be Updated.";
else
$data["alertsuccess"]="blogimages Updated Successfully.";
$data["redirect"]="site/viewblogimages";
$this->load->view("redirect",$data);
}
}
public function deleteblogimages()
{
$access=array("1");
$this->checkaccess($access);
$this->blogimages_model->delete($this->input->get("id"));
$data["redirect"]="site/viewblogimages";
$this->load->view("redirect",$data);
}

    
    
    // slider
    
    
    
    
    public function viewslider()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="viewslider";
$data["base_url"]=site_url("site/viewsliderjson");
$data["title"]="View slider";
$this->load->view("template",$data);
}
function viewsliderjson()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`slider`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";
$elements[1]=new stdClass();
$elements[1]->field="`slider`.`alt`";
$elements[1]->sort="1";
$elements[1]->header="Alt";
$elements[1]->alias="alt";
$elements[2]=new stdClass();
$elements[2]->field="`statuses`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";
$elements[3]=new stdClass();
$elements[3]->field="`slider`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";
$elements[4]=new stdClass();
$elements[4]->field="`slider`.`image`";
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
$maxrow=20;
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `slider` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`slider`.`status`");
$this->load->view("json",$data);
}

public function createslider()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="createslider";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Create slider";
$this->load->view("template",$data);
}
public function createslidersubmit() 
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("blog","ID","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("image","Image","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="createslider";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Create slider";
$this->load->view("template",$data);
}
else
{
$alt=$this->input->get_post("alt");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
//$image=$this->input->get_post("image");
       $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
if($this->slider_model->create($alt,$status,$order,$image)==0)
$data["alerterror"]="New slider could not be created.";
else
$data["alertsuccess"]="slider created Successfully.";
$data["redirect"]="site/viewslider";
$this->load->view("redirect",$data);
}
}
public function editslider()
{
$access=array("1");
$this->checkaccess($access);
$data["page"]="editslider";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Edit slider";
$data["before"]=$this->slider_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
public function editslidersubmit()
{
$access=array("1");
$this->checkaccess($access);
$this->form_validation->set_rules("id","ID","trim");
$this->form_validation->set_rules("blog","ID","trim");
$this->form_validation->set_rules("status","Status","trim");
$this->form_validation->set_rules("order","Order","trim");
$this->form_validation->set_rules("image","Image","trim");
if($this->form_validation->run()==FALSE)
{
$data["alerterror"]=validation_errors();
$data["page"]="editslider";
$data[ 'status' ] =$this->user_model->getstatusdropdown();
$data["title"]="Edit slider";
$data["before"]=$this->slider_model->beforeedit($this->input->get("id"));
$this->load->view("template",$data);
}
else
{
$id=$this->input->get_post("id");
$alt=$this->input->get_post("alt");
$status=$this->input->get_post("status");
$order=$this->input->get_post("order");
//$image=$this->input->get_post("image");
      $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->user_model->getsliderimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
if($this->slider_model->edit($id,$blog,$status,$order,$image)==0)
$data["alerterror"]="New slider could not be Updated.";
else
$data["alertsuccess"]="slider Updated Successfully.";
$data["redirect"]="site/viewslider";
$this->load->view("redirect",$data);
}
}
public function deleteslider()
{
$access=array("1");
$this->checkaccess($access);
$this->slider_model->delete($this->input->get("id"));
$data["redirect"]="site/viewslider";
$this->load->view("redirect",$data);
}

}
?>
