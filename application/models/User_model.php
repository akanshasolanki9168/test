
<?php
class User_model extends CI_Model
{
    public function register_user()
    {
    $data=array(
                'user_name'=>$this->input->post('user_name'),
                'email'=>$this->input->post('user_email'),
                'password'=>sha1($this->input->post('user_password')),
                'age'=>$this->input->post('user_age'),
                'number'=>$this->input->post('user_mobile'),
                'address1'=>$this->input->post('user_adda'),
                'address2'=>$this->input->post('user_addb'),
                'country'=>$this->input->post('user_country'),
                'state'=>$this->input->post('user_state'),
                'city'=>$this->input->post('user_city'),
                'user_type'=>$this->input->post('user_type')
                );
            $this->load->database();
            $this->db->insert('detail',$data);
            if($this->db->affected_rows()>0)
            {
                return true;
            }
            else
            {
                return false;
            }
    } 
    public function view()
    {
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->join('detail','blog.user_id = detail.usr_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getresult($rowno,$rowperpage,$result)
    {
        $id=$result['id'];
        $value=$result['value'];
        $order=$result['order'];
        $this->db->select('*');
        $this->db->from('detail');
        $this->db->join('countries','countries.country_id = detail.country','left');
        $this->db->join('states','states.state_id=detail.state','left');
        $this->db->join('cities','cities.city_id = detail.city','left');
        $this->db->limit($rowperpage, $rowno);
        if($value['user_name'])
        {
            $this->db->like('user_name',$value['user_name']);
        }
        if($value['age'])
        {
            $this->db->like('age',$value['age']);
        }
        if($value['number'])
        {
            $this->db->like('number',$value['number']);
        }
        if($value['address1'])
        {
             $this->db->like('address1',$value['address1']);
        }
        if($value['address2'])
        {
            $this->db->like('address2',$value['address2']);
        }
        if($value['country_name'])
        {
            $this->db->like('country_name',$value['country_name']);
        }
        if($value['state_name'])
        {
            $this->db->like('state_name',$value['state_name']);
        }
        if($value['city_name'])
        {
            $this->db->like('city_name',$value['city_name']);
        }
        
        $this->db->order_by($id,$order);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }
    public function blogging()
    {
        $data = array(
        'title'=>$this->input->post('title'),
        'description'=>$this->input->post('description'),
        'image'=>$_FILES['image']['name'],
        'user_id'=>$this->session->userdata['ci_session']['ID']
        );
        $this->db->insert('blog',$data);
        if($this->db->affected_rows()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function blog($id)
    {
        $this->db->select('*');
        $this->db->from('detail');
        $this->db->where('usr_id',$id);
        $this->db->join('blog','blog.user_id = detail.usr_id','left');
        $query=$this->db->get();
        return $query->result_array();
    }
    public function getrecordCount()
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('detail');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['allcount'];
    }
    public function all_count($idd)
    {   
        $this->db->select('count(*) as allcount');
        $this->db->from('blog');
        $this->db->where('user_id',$idd);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['allcount'];
    }
    public function all_users($rowno,$rowperpage,$result)
    {
        $idd=$this->session->userdata['ci_session']['ID'];
        $id=$result['id'];
        $value=$result['value'];
        $order=$result['order'];
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->join('detail','blog.user_id = detail.usr_id');
        $this->db->where('user_id',$idd);
        $this->db->limit($rowperpage, $rowno);
        if($value['title'])
        {
            $this->db->like('title',$value['title']);
        }
        if($value['description'])
        {
            $this->db->like('description',$value['description']);
        }

        $this->db->order_by($id,$order);
        $query = $this->db->get();
        
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
       
    }
    public function getblog($rowno,$rowperpage,$result)
    {
        $id=$result['id'];
        $value=$result['value'];
        $order=$result['order'];
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->join('detail','blog.user_id = detail.usr_id');
        $this->db->limit($rowperpage, $rowno);
        if($value['title'])
        {
            $this->db->like('title',$value['title']);
        }
        if($value['description'])
        {
            $this->db->like('description',$value['description']);
        }
        if($value['user_name'])
        {
            $this->db->like('user_name',$value['user_name']);
        }
        $this->db->order_by($id,$order);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }

    }
    public function getType($set_data)
    {  
        $data=array(
            'email'=>$set_data['ci_session']['Email'],
            'password'=>$set_data['ci_session']['Password']
        );
        $query = $this->db->get_where('detail',$data);
        $result = $query->result_array();
        if(isset($result))
        {   
            return $result[0]['user_type'];
        }
        else
        {
            return false;
        }
    }
    public function loginset()
    {   
        $data = array(
            'email'=>$this->input->post('user_email'),
            'password'=>md5($this->input->post('user_password'))   
        );
        $result = $this->db->get_where('detail',$data);
        $row = $result->row();
        if($result->num_rows()>0)
        {
            $detail=array(
            'Email'=>$this->input->post('user_email'),
            'Password'=>md5($this->input->post('user_password')),
            'User_name'=>$row->user_name,
            'ID'=>$row->usr_id,
            'is_logged_in'=>true);
            $this->session->set_userdata('ci_session',$detail);
            return true;
        }
        else
        {
            return false;
        }
    }
    public function logincheck()
    {
        if($this->session->userdata('ci_session'))
        {
            return true;    
        }
        else
        {
            return false;
        }
    }
    public function fetch_state($country_id)
    {
        $this->db->where('country_id', $country_id);
        $this->db->order_by('state_name', 'ASC');
        $query = $this->db->get('states');
        $response = '<option value="">Select State</option>';
        foreach($query->result() as $row)
        {
            $response .= '<option value="'.$row->state_id.'">'.$row->state_name.'</option>';
        }
        return $response;
    }
    public function fetch_city($state_id)
    {
        $this->db->where('state_id', $state_id);
        $this->db->order_by('city_name', 'ASC');
        $query = $this->db->get('cities');
        $response = '<option value="">Select City</option>';
        foreach($query->result() as $row)
        {
            $response .= '<option value="'.$row->city_id.'">'.$row->city_name.'</option>';
        }
        return $response;
    }
    public function fetch_country()
    {
        $this->db->order_by('country_name','ASC');
        $query = $this->db->get('countries');
        return $query->result();
    }
    public function fetchData()
    {
        $this->db->select('*');
        $this->db->from('detail');
        $this->db->join('countries','countries.country_id = detail.country','left');
        $this->db->join('states','states.state_id=detail.state','left');
        $this->db->join('cities','cities.city_id = detail.city','left');
        $query = $this->db->get();
        $response = $query->result_array();
        return $response;
    }
    public function getcount()
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('blog');
        $query=$this->db->get();
        $result=$query->result_array();
        return $result[0]['allcount'];
    }
    public function data_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('detail');
        $this->db->where('usr_id', $id);
        $this->db->join('countries','countries.country_id = detail.country','left');
        $this->db->join('states','states.state_id=detail.state','left');
        $this->db->join('cities','cities.city_id = detail.city','left');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function updation($id,$data)
    {
        
        $this->db->select('*');
        $this->db->join('countries','countries.country_id = detail.country','left');
        $this->db->join('states','states.state_id=detail.state','left');
        $this->db->join('cities','cities.city_id = detail.city','left');
        $this->db->where('usr_id',$id);
        $this->db->update('detail', $data);
        $query = $this->db->get('detail');
        return $query->result_array();
    }   
    public function deletion($id)
    {
        $this->db->select('*');
        $this->db->where('usr_id',$id);
        $this->db->delete('detail');
        $query = $this->db->get('detail');
        return $query->row_array();
    }
}
