<?php
class Main_model extends CI_Model
{

    function __construct()
    {
    parent :: __construct();
    }
    function export_user() {
        $this->db->select(array('first_name', 'last_name', 'email'));
        $this->db->from('user');
        // $this->db->limit(10);  
        $query = $this->db->get();
        return $query->result_array();
    }
    function update_user($id,$first_name,$last_name,$email,$password){
    	$field=array(
        'first_name	'=>$first_name,
        'last_name'=>$last_name,
        'email'=>$email,
        'password'=>$password,
        'updated_at'=>date('Y-m-d')
            );
    	$this->db->where('id',$id);
        $this->db->update('user',$field);
        if($this->db->affected_rows()>0){
        	return true;
        }else{
        	return $this->db->error();
        }
    }
    function delete_user($id){
    	// $whr=['id'=>$id];
    	$this->db->where('id',$id);
        $this->db->delete('user');
        if($this->db->affected_rows()>0){
        	return true;
        }else{
        	return $this->db->error();
        }
    } 
    function add_user($field){
        $this->db->insert('user',$field);
        if($this->db->affected_rows()>0){
        	return true;
        }else{
        	return $this->db->error();
        }
    }
    function get_user(){
        $query = $this->db->get('user');
        $output='';
        if($query->num_rows()>0)
        {
            foreach($query->result() as $row)
            {

        		$output.='<tr>
        			<td><input value="Edit" class="btn btn-info edit_btn" id="'.$row->id.'" style="cursor:pointer"></td>
                    <td class="fn">'.$row->first_name.'</td>
                    <td class="ln">'.$row->last_name.'</td>
                    <td class="e">'.$row->email.'</td>
                    <td><input value="X" class="btn btn-warning delete_btn" id="'.$row->id.'" style="cursor:pointer"></td>
                </tr>';
            }
        } 
        else
        {
            $output="No Data Found";
        } 
		return $output;
	}
}