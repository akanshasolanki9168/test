
<?php
class User extends CI_Controller
{
    var $resized_path;
    var $thumbs_path;

    public function index()
    {   
        $data['countries']=$this->User_model->fetch_country();
        $this->load->view('register',$data);
        $this->load->model('User_model');
        $this->load->library('session');
    }
    public function blogview()
    {
        if($this->session->userdata('ci_session'))
        {
            $data['blogg']=$this->User_model->view();
            $this->load->view('blog_view',$data);
        }
        else
        {
            $this->load->view('login');
        }
    }
   
    public function blogging()
    {
        $directory = './uploads/images/';
        if(is_dir($directory))
        {
            $config['upload_path']   = './uploads/images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 3000;
            $config['max_width'] = 100000;
            $config['max_height'] = 100000;
            $config['width'] = 100;
            $config['height'] = 100;
            $this->load->library('upload', $config);
        }
        else
        {
            mkdir('./uploads/images/', 0777, TRUE); 
        }
        if($this->input->post('submit'))
        {
           
            $id = $this->session->userdata['ci_session']['ID'];
            $data['blogg']=$this->User_model->blog($id);
            $this->load->view('welcome',$data);
            if (!$this->upload->do_upload('image'))
            { 
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('upload_form', $error);
                return false;
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('welcome', $data,$id);
                $image_data = $this->upload->data(); 
                $this->resized_path = realpath(APPPATH.'../uploads/resized');
                $this->thumbs_path = realpath(APPPATH.'../uploads/thumbs');
                $config = array(
                'source_image'      => $image_data['full_path'], 
                'new_image'         => $this->resized_path , 
                'maintain_ratio'    => true,
                'width'             => 90,
                'height'            => 90
                );
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $config = array(
                'source_image'      => $image_data['full_path'],
                'new_image'         => $this->thumbs_path,
                'maintain_ratio'    => true,
                'width'             => 60,
                'height'            => 60
                );
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
            }
            if($this->User_model->blogging())
            {
                echo "<script>alert('Added Successfully');</script>";
                redirect(base_url().'User/welcome','refresh'); 
            }
            else
            {
               return false;
            }
        }
        else
        {
            return false;
        }
    }
    public function loadoperation($pageno=0)
    {
        // rowperpage
        $rowperpage = $this->input->post('select');
        // row position
        if($pageno != 0)
        {
            $pageno = ($pageno-1) * $rowperpage;
        }
        $result=array(
            'id'=>$this->input->post('id'),
            'order'=>$this->input->post('order'),
            'value'=>$this->input->post('value')
            );
        $allcount = $this->User_model->getrecordCount();
        $users_record = $this->User_model->getresult($pageno,$rowperpage,$result);
        $search="";
        $order="";
        if($users_record)
        {
            if($result!=null)
            {
                $config['base_url'] = base_url().'index.php/User/loadoperation/';
                $config['use_page_numbers'] = TRUE;
                $config['total_rows'] = $allcount;
                $config['per_page'] = $rowperpage;
                $config['full_tag_open'] = '<div class="pagination">';
                $config['full_tag_close'] = '</div>';
                $config['first_link'] = '&laquo; First';
                $config['first_tag_open'] = '<li class="prev page">';
                $config['first_tag_close'] = '</li>';
                $config['last_link'] = 'Last &raquo;';
                $config['last_tag_open'] = '<li class="next page">';
                $config['last_tag_close'] = '</li>';
                $config['next_link'] = 'Next &rarr;';
                $config['next_tag_open'] = '<li class="next page">';
                $config['next_tag_close'] = '</li>';
                $config['prev_link'] = '&larr; Previous';
                $config['prev_tag_open'] = '<li class="prev page">';
                $config['prev_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li class="page">';
                $config['num_tag_close'] = '</li>';
                $config['anchor_class'] = 'follow_link';
                $this->pagination->initialize($config);
                
                $data['pagination'] = $this->pagination->create_links();
                $search=$this->input->post('.input-search');
                $this->session->set_userdata(array(".input-search"=>$search));
                $order=$this->input->post('.input-sort');
                $this->session->set_userdata(array("input-sort"=>$order));
                $data['result'] = $users_record;
                echo json_encode($data);

            }
            else
            {
                if($this->session->userdata('.input-search') != NULL)
                {
                    $search = $this->session->userdata('.input-search');
                }
                if($this->session->userdata('.input-sort') != NULL)
                {
                    $order = $this->session->userdata('.input-sort');
                }
            }
        }
        else
        {
            $result=null;
            echo json_encode($result);
        }
    }
    // public function welcome()
    // {
    //     if($this->User_model->logincheck())
    //     {
    //         $id = $this->session->userdata['ci_session']['ID'];
    //         $data['blogg']=$this->User_model->blog($id);
    //         if($this->session->userdata('ci_session'))
    //         {
    //             $this->load->view('welcome',$data);
    //         }
    //         else
    //         {
    //             $this->load->view('login');
    //         }     
    //     }
    //     else
    //     {
    //         if($this->session->userdata('ci_session'))    
    //         {
    //             $this->load->view('welcome');
    //         }
    //         else
    //         {
    //             $this->load->view('login');
    //         } 
    //     }
    // }
    // public function admin()
    // {
    //     if($this->session->userdata('ci_session'))    
    //     {
    //         $this->load->view('admin');
    //     }
    //     else
    //     {
    //         $this->load->view('login');
    //     } 
    // }
    public function welcome()
    {
        if($this->User_model->logincheck())
        {
            $set_data = $this->session->all_userdata();
            $result  = $this->User_model->getType($set_data);
            $id = $this->session->userdata['ci_session']['ID'];
            $data['blogg']=$this->User_model->blog($id);
            if($result == 'user' && $this->session->userdata('ci_session'))
            {
                $this->load->view('welcome',$data);
            }
            else
            {
                $this->load->view('login');
            } 
        }
        else
        {
            $this->load->view('login');
        }
    }
    public function admin()
    {
        if($this->User_model->logincheck())
        {
            $set_data = $this->session->all_userdata();
            $result  = $this->User_model->getType($set_data);
            if($result == 'admin' && $this->session->userdata('ci_session'))
            {
                $this->load->view('admin');
            }
            else
            {
                $this->load->view('login');
            } 
        }
        else
        {
            $this->load->view('login');
        }
    }
    public function log()
    { 

        if($this->User_model->logincheck())
        {
            $set_data = $this->session->all_userdata();
            if($set_data != null)
            {
                $result = $this->User_model->getType($set_data); 
                if($result == 'admin')
                {
                    redirect(base_url().'User/admin','refresh');
                }
                else
                {
                    redirect(base_url().'User/welcome','refresh');
                } 
            }               
            else
            {
               $this->load->view('login');
            }
        }
        else 
        {
            if($this->User_model->loginset())
            {
            $set_data = $this->session->all_userdata();
                if($set_data != null)
                {
                    $result = $this->User_model->getType($set_data); 
                    if($result == 'admin')
                    {
                        redirect(base_url().'User/admin','refresh');
                    }
                    else
                    {
                        redirect(base_url().'User/welcome','refresh');
                    } 
                }
                else
                {
                    $this->load->view('login');
                }
            }
            else
            {
                $this->load->view('login');
            }
        } 
    }
    public function wel_pagination($pageno)
    {
        $idd=$this->session->userdata['ci_session']['ID'];
        $rowperpage = $this->input->post('select');
        // row position
        if($pageno != 0)
        {
            $pageno = ($pageno-1) * $rowperpage;
        }
        $result=array(
            'id'=>$this->input->post('id'),
            'order'=>$this->input->post('order'),
            'value'=>$this->input->post('value')
            );

        $allcount = $this->User_model->all_count($idd);
        $users_record = $this->User_model->all_users($pageno,$rowperpage,$result);
        $search="";
        $order="";
        if($users_record)
        {
            if($result!=null)
            {
                $config['base_url'] = base_url().'index.php/User/blogfunction/';
                $config['use_page_numbers'] = TRUE;
                $config['total_rows'] = $allcount;
                $config['per_page'] = $rowperpage;
                $config['full_tag_open'] = '<div class="pagination">';
                $config['full_tag_close'] = '</div>';
                $config['first_link'] = '&laquo; First';
                $config['first_tag_open'] = '<li class="prev page">';
                $config['first_tag_close'] = '</li>';
                $config['last_link'] = 'Last &raquo;';
                $config['last_tag_open'] = '<li class="next page">';
                $config['last_tag_close'] = '</li>';
                $config['next_link'] = 'Next &rarr;';
                $config['next_tag_open'] = '<li class="next page">';
                $config['next_tag_close'] = '</li>';
                $config['prev_link'] = '&larr; Previous';
                $config['prev_tag_open'] = '<li class="prev page">';
                $config['prev_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li class="page">';
                $config['num_tag_close'] = '</li>';
                $config['anchor_class'] = 'follow_link';
                $this->pagination->initialize($config);

                $data['pagination'] = $this->pagination->create_links();
                $search=$this->input->post('.input-search');
                $this->session->set_userdata(array(".input-search"=>$search));
                $order=$this->input->post('.input-sort');
                $this->session->set_userdata(array("input-sort"=>$order));
                $data['result'] = $users_record;
                echo json_encode($data);
            }
            else
            {
                if($this->session->userdata('.input-search') != NULL)
                {
                    $search = $this->session->userdata('.input-search');
                }
                if($this->session->userdata('.input-sort') != NULL)
                {
                    $order = $this->session->userdata('.input-sort');
                }
            }
        }
        else
        {
            $result=null;
            echo json_encode($result);
        }
    }
    public function blogfunction($pageno)
    {
        $rowperpage = $this->input->post('select');
        if($pageno != 0)
        {
            $pageno = ($pageno-1) * $rowperpage;
        }
        $result=array(
            'id'=>$this->input->post('id'),
            'order'=>$this->input->post('order'),
            'value'=>$this->input->post('value')
            );
        $allcount = $this->User_model->getcount();
        $users_record = $this->User_model->getblog($pageno,$rowperpage,$result);
        $search="";
        $order="";
        if($users_record)
        {
            if($result!=null)
            {
                $config['base_url'] = base_url().'index.php/User/blogfunction/';
                $config['use_page_numbers'] = TRUE;
                $config['total_rows'] = $allcount;
                $config['per_page'] = $rowperpage;
                $config['full_tag_open'] = '<div class="pagination">';
                $config['full_tag_close'] = '</div>';
                $config['first_link'] = '&laquo; First';
                $config['first_tag_open'] = '<li class="prev page">';
                $config['first_tag_close'] = '</li>';
                $config['last_link'] = 'Last &raquo;';
                $config['last_tag_open'] = '<li class="next page">';
                $config['last_tag_close'] = '</li>';
                $config['next_link'] = 'Next &rarr;';
                $config['next_tag_open'] = '<li class="next page">';
                $config['next_tag_close'] = '</li>';
                $config['prev_link'] = '&larr; Previous';
                $config['prev_tag_open'] = '<li class="prev page">';
                $config['prev_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li class="page">';
                $config['num_tag_close'] = '</li>';
                $config['anchor_class'] = 'follow_link';
                $this->pagination->initialize($config);

                $data['pagination'] = $this->pagination->create_links();
                $search=$this->input->post('.input-search');
                $this->session->set_userdata(array(".input-search"=>$search));
                $order=$this->input->post('.input-sort');
                $this->session->set_userdata(array("input-sort"=>$order));
                $data['result'] = $users_record;
                echo json_encode($data);

            }
            else
            {
                if($this->session->userdata('.input-search') != NULL)
                {
                    $search = $this->session->userdata('.input-search');
                }
                if($this->session->userdata('.input-sort') != NULL)
                {
                    $order = $this->session->userdata('.input-sort');
                }
            }
        }
        else
        {
            $result=null;
            echo json_encode($result);
        }
    }

   
    // controller log function to load the login page
    
    public function registration()
    {
        $this->load->view('register');
    }
    // controller registera function to load the model for insertion
    public function validation()
    {
        $this->form_validation->set_rules('user_name', 'Name', 'required|max_length[20]');
        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[5]|max_length[10]');
        $this->form_validation->set_rules('user_age', 'Age', 'required');
        $this->form_validation->set_rules('user_mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('user_adda', 'Address 1', 'required|min_length[5]');
        $this->form_validation->set_rules('user_addb', 'Address 2', 'required|min_length[5]');
        $this->form_validation->set_rules('user_country', 'Country', 'required');
        $this->form_validation->set_rules('user_state', 'State', 'required');
        $this->form_validation->set_rules('user_city', 'City', 'required');
        $this->form_validation->set_rules('user_type', 'User Type', 'required');

        $data['countries']=$this->User_model->fetch_country();
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('register',$data);
        }
        else
        {
            if($this->User_model->register_user())
            {
                $user_password = $this->input->post('user_password');
                redirect(base_url().'User/index','refresh');
                echo "<script>alert('Successfully Inserted');</script>";
            }
            else
            {
                redirect(base_url().'User/index','refresh');
                echo "<script>alert('Not Inserted');</script>";
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('ci_session');
        $this->session->sess_destroy();
        redirect(base_url().'User/log','refresh');  
    }
    public function fetch_state()
    {
        if($this->input->post('country_id'))
        {
            echo $this->User_model->fetch_state($this->input->post('country_id'));
        }
    }
    public function fetch_city()
    {
        if($this->input->post('state_id'))
        {
           echo $this->User_model->fetch_city($this->input->post('state_id')); 
        }
    }
    public function fetch()
    {
        $result = array('data' => array());
        $data =$this->User_model->fetchData();
        if($data)
        {
            foreach($data as $key => $value)
            {

                $result['data'][$key] = array(
                'user_name' =>$value['user_name'],
                'age' =>$value['age'],
                'number' =>$value['number'],
                'address1' =>$value['address1'],
                'address2' =>$value['address2'],
                'country_name' =>$value['country_name'],
                'state_name' =>$value['state_name'],
                'city_name' =>$value['city_name']);
            }
            echo json_encode(array('data'=>$result['data'],"status" => 1000));
        }
        else
        {
            echo json_encode(array('data'=>$result['data'],"status" => 3000)); 
        }
    }
    
    public function oldData($id)
    {   
        $result = array();
        $data =$this->User_model->data_by_id($id);
        if($data)
        {
            $result =array(
                'User_id'=>($data['usr_id']),
                'User_name'=>($data['user_name']),
                'Age' => ($data['age']),
                'Number'=>($data['number']),
                'Address1' => ($data['address1']),
                'Address2'=>($data['address2']),
                'Country_name'=>($data['country_name']),
                'State_name'=>($data['state_name']),
                'City_name'=>($data['city_name'])
                );
            echo json_encode(array('data'=>$result,"status" => 1000));
        }
        else
        {
            echo json_encode(array('data'=>$result,"status" => 3000)); 
        }

    }
    public function update()
    {
        $id = $this->input->post('user_id');
        $data = array(
            'user_name' => $this->input->post('user_name'),
            'age' => $this->input->post('user_age'),
            'number' => $this->input->post('user_mobile'),
            'address1' => $this->input->post('user_adda'),
            'address2' => $this->input->post('user_addb'),
            'country'=>$this->input->post('user_country'),
            'state'=>$this->input->post('user_state'),
            'city'=>$this->input->post('user_city')
        );
        
        if($this->User_model->updation($id,$data))
        {
            echo "<script>alert('Updated Successfully');</script>";
            redirect(base_url().'User/admin','refresh');
        }
        else
        {
            echo "<script>alert('Not Updated');</script>";
        }
    }
    public function delete($id)
    {
        $data =$this->User_model->data_by_id($id);
        if(!empty($data) && $this->User_model->deletion($id))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}
    // public function blog()
    // {
    //     $data['blogg']=$this->User_model->blog();
    //     $this->load->view('welcome',$data);
    //     $this->load->model('User_model');
    // }
