<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	 /* Index Page for this controller.
	 
	 */
	
	public function index()
	{ 	
		
		 
	    $data['bank']=$this->db->select('bank')->distinct()->order_by('bank','ASC')->get('bank')->result();
	  

	    if($bank=$this->input->post('bank'))
	    {
	    	 $data['state']=$this->db->select('state')->distinct()->where('bank',$bank)->order_by('state','ASC')->get('bank')->result();
	    }

	    if( $state=$this->input->post('state') )
	    {  $bank=$this->input->post('bank');
	    	$where = array('bank' => $bank,
	    	 				'state'=>$state);
	    	 $data['district']=$this->db->select('district')->distinct()->where($where)->order_by('district','ASC')->get('bank')->result();
	    }

	    if( $district=$this->input->post('district') )
	    {  $bank=$this->input->post('bank');
	       $state=$this->input->post('state');
	    	$where = array('bank' => $bank,
	    	 				'state'=>$state,
	    	 				'district'=>$district);
	    	 $data['city']=$this->db->select('city')->distinct()->where($where)->order_by('city','ASC')->get('bank')->result();
	    }

	     if( $city=$this->input->post('city') )
	    {  $bank=$this->input->post('bank');
	       $state=$this->input->post('state');
	       $district=$this->input->post('district');
	    	$where = array('bank' => $bank,
	    	 				'state'=>$state,
	    	 				'district'=>$district,
	    	 				'city'=>$city);
	    	 $data['branch']=$this->db->select('branch')->distinct()->where($where)->order_by('branch','ASC')->get('bank')->result();
	    }

	     if($branch=$this->input->post('branch')  )
	    {  $bank=$this->input->post('bank');
	       $state=$this->input->post('state');
	       $district=$this->input->post('district');
	       $city=$this->input->post('city');
	    	$where = array('bank' => $bank,
	    	 				'state'=>$state,
	    	 				'district'=>$district,
	    	 				'city'=>$city,
	    	 				'branch'=>$branch);
	    	 $data['detail']=$this->db->where($where)->get('bank')->row_array();
	    }

	      $this->load->view('header');
          $this->load->view('home',$data);
          $this->load->view('footer');

	}

	public function bank_search(){


		$ifsc_code= $this->input->post('ifsc_search');
		$r=$this->db->where('ifsc',$ifsc_code)->or_where('micr',$ifsc_code)->get('bank')->result();

	   echo json_encode($r);
	
	}

	public function get(){
		$ifsc=$this->input->post('ifsc_code');
		$data=$this->db->where('ifsc',$ifsc)->or_where('micr',$ifsc)->get('bank')->row();

		if(isset($data)){
			echo'<div class="w3-col m12 s12 l8 " >
			<div class="w3-card-4  ">
			<span onclick="close_div(this)" class="w3-closebtn w3-right "><i class="fa fa-remove w3-padding" style="font-size:15px;"></i></span>
				<header class="w3-container w3-light-grey">
					<h3 >'.$data->bank.'</h3>
				</header>      
				<ul class="w3-ul">     
					<li class="w3-padding w3-hover-light-grey">
						IFSC CODE:'.$data->ifsc. 
						'</li>
						<li class="w3-padding w3-hover-light-grey">
							MICR CODE:'. $data->micr.
							'</li>
							<li class="w3-padding w3-hover-light-grey">
								BRANCH NAME:'.$data->branch.'
							</li>
							<li class="w3-padding w3-hover-light-grey">
								ADDRESS:'.$data->address.'
							</li>
							<li class="w3-padding w3-hover-light-grey">
								CONTACT NUMBER:'.$data->contact.'
							</li>
						</ul>
					</div>';

			}
			else
			{
				echo'<div class="w3-col m12 s12 l12 "  >
				<span onclick="close_div(this)" class="w3-closebtn w3-right "><i class="fa fa-remove w3-padding" style="font-size:15px;"></i></span>
			<div class="w3-card-4  ">     
				<ul class="w3-ul">     
					<li class="w3-padding w3-hover-light-grey w3-pale-red">
					OPPS!!!! BANK DETAIL NOT FOUND 

					</li>

				</ul>
				</div>';

			}




			}


	
}
