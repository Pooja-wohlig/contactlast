<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Json extends CI_Controller 
{
	public function insertsubmit()
    {
		$website=$this->input->get_post('website');
		$websiteall=$this->website_model->select($website);
		$myreq=$_SERVER;
		$host=$myreq["HTTP_HOST"];
//		echo $websiteall->website==$host;
		if($websiteall->website == $host )
        {
			$name=$this->input->get_post('name');   
			$email=$this->input->get_post('email');
			$phone=$this->input->get_post('phone');
			$query=$this->input->get_post('query');
			$subject=$this->input->get_post('subject');
			$json=$this->input->get_post('json');
			$createval=$this->contact_model->create($website,$name,$email,$phone,$query,$subject,$json); //insert values
			//echo $createval;
			if($createval!=0)
			{
				$data["message"]=$this->contact_model->select($createval);
			}
			else
			{
				$data["message"]=false;
			}
		}
		else
		{
			$data["message"]="You are not allowed";
		}
		$this->load->view('json',$data);   
	}    
	  
	public function getserver()
    {
		
		$this->load->view("json",$data);
	}    
}
//EndOfFile
?>