<?php 

class Common_model extends CI_Model
{
	
	//login
	public function login_user($mobile,$password)
    {
        $password_new = $password;

      $this->db->where(['mobile_no'=>$mobile]);
      $this->db->where(['new_password'=>$password_new]);
      $result = $this->db->get('expert');
     		
      if($result->num_rows()==1)
      {
       
        return $result->result();

    	}
      else
      {
        return $result->num_rows();
      }
    }

  public  function insert_new($data)
    {
     $this->db->insert_batch('batch_student', $data);
    }



	public function insert($table_name,$data)
	{
		if($this->db->insert($table_name,$data))
		{
      
			// $insert_id = $this->db->insert_id();

  		// 	 return  $insert_id;
		}
		else
		{
			return false;
		}

    }
	
	public function update($table_name,$data,$where_column,$where_id)
	{
		
			$this->db->where($where_column, $where_id);
			
			if($this->db->update($table_name,$data))
			{
				return true;

			}
			else
			{
				return false;
			}
		
	}
	//count
	public function get_data_by_id_count($table_name,$id,$column_name)
	{
		if( $query = $this->db->get_where($table_name, array($column_name => $id))->num_rows())
		{
			return $query;
		}
		else
		{
			return false;
		}

	}

	//result
    public function get_data_by_id($table_name,$id,$column_name)
	{
		if( $query = $this->db->get_where($table_name, array($column_name => $id))->result())
		{
			return $query;
		}
		else
		{
			return false;
		}

	}

	public function get_expert($mobile)
	{
		$this->db->select('*');
        $this->db->from('expert');        
        $this->db->where('mobile_no',$mobile);        
        $query=$this->db->get();
        return $query->result_array();
    }

function fetch_single_details($student_id)
 {
  $this->db->where('id', $student_id);
  $data = $this->db->get_where("batch_student", array("id" => $student_id))->result();
   $output = '<table width="100%" cellspacing="5" cellpadding="5">';
  $output2 = '

  <head>
        <style>
         
      
        </style>
  </head>
  <body>
  <img width="100%" height="100%" src="images/abc.jpeg" />

 

  </body>

  ';

	$anuj = "
	<html>
		<head>
			<style>

hr {
  background-color: #be2d24;
  height: 3px;
  margin: 5px;
}

div#cert-footer {
  position: absolute;
  width: 60%;
  top: 550px;
  text-align: center;
}

#cert-stamp, #cert-ceo-sign {
  width: 60%;
  display: inline-block;
}

div#cert-issued-by, div#cert-ceo-design {
  width: 40%;
  display: inline-block;
  float: left;
}

div#cert-ceo-design {
  margin-left: 10%;
}

h1 {
  font-family: 'Saira Condensed', sans-serif;
  margin: 5px 0px;
}

body {
  width: 950px;
  height: 690px;
  position: absolute;
  left: 30px;
  top: 30px;
  border: 3px solid red;
}

p {
  font-family: 'Arial', sans-serif;
  font-size: 18px;
  margin: 5px 0px;
}

html {
  display: inline-block;
  width: 1024px;
  height: 768px;
  border: 2px solid red;
  background: #eee url('https://i.pinimg.com/originals/b3/17/db/b317db24945589699a4ef18150dc5b73.jpg');
no-repeat; background-size: 100%;
}

h1#cert-holder {
  font-size: 50px;
  color: #be2d24;
}

p.smaller {
  font-size: 17px !important;
}

div#cert-desc {
  width: 70%;
}

p#cert-from {
  color: #be2d24;
  font-family: 'Saira Condensed', sans-serif;
}

div#cert-verify {
  opacity: 1;
  position: absolute;
  top: 680px;
  left: 60%;
  font-size: 12px;
  color: grey;
}
			
			</style>
		</head>
		<body>
	
	";
  foreach($data as $row)
  {
	$anuj .='
	<h1 id="cert-title">
  Certificate of Proficiency
</h1>
<br><br><br><br>

<p class="smaller" id="cert-declaration">
  THIS IS TO CERTIFY THAT
</p>

<h1 id="cert-holder">
  Firstname Surname
</h1>

<p class="smaller" id="cert-completed-line">
  has successfully completed the
</p>

<h2 id="cert-course">
  Course in Question
</h2>

<div id="cert-desc"
  <p class="smaller" id="cert-details">
    which includes the knowledge of English for Technical Conversations, Applied Mathematics, General Robotics Science, Basic Computing, Web & Mobile Development and Basic User Interface Design.
  </p>
</div>

<br>
<p id="cert-from" class="smaller">
  &nbsp; from www.companywebsite.com
</p>

<br>
<p class="smaller" id="cert-issued">
 <b>Issued on:</b> {{date}}.
</p>

<div id="cert-footer">
  <div id="cert-issued-by">
    <img id="cert-stamp" src="https://i7.pngguru.com/preview/585/794/452/paper-rubber-stamp-postage-stamps-company-seal-seal-thumbnail.jpg">
    <hr>
    <p>Issued by<br>THE COMPANY S.L.</p>
  </div>
  <div id="cert-ceo-design">
    <img id="cert-ceo-sign" src="https://i7.pngguru.com/preview/585/794/452/paper-rubber-stamp-postage-stamps-company-seal-seal-thumbnail.jpg">
    <hr>
    <p>Company Ceo<br>CEO of The Company</p>
  </div>
</div>

<div id="cert-verify">
    Verify at companywebsite.ai/verify/XYZ12ER56129F. <br> 
    Company has confirmed the participation of this individual in the course.
  </div>



	
	';



//    $output .= '
//    <tr>
//     <td width="75%">
//      <p><b>Name : </b>'.$row->student_name.'</p>
//      <p><b>Address : </b>'.$row->student_mobile.'</p>
//      <p><b>City : </b>'.$row->student_email .'</p>
//      <p><b>Postal Code : </b>'.$row->mail_sent.'</p>
//      <p><b>Country : </b> '.$row->created_at.' </p>
//     </td>
//    </tr>
//    ';
  }
 
  $anuj .= "
 </body> 
  </html>";
  $output .= '</table>';
  return $anuj;
 }
    
    

}
?>