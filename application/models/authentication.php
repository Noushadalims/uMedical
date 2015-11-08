<?php
Class Authentication extends CI_Model
{

   function __construct()
    {
        parent::__construct();
    }

   function validateUser($username, $password)
   {



     $this -> db -> select('userid, username, password, access_rights');
     $this -> db -> from('user');
     $this -> db -> where('username', $username);

     $password = $this->password_hash($password);

     $this -> db -> where('password', $password);
     $this -> db -> limit(1);

     $query = $this -> db -> get();

     if($query -> num_rows() == 1)
     {
          foreach($query->result() as $row)
         {
           $sess_array = array(
             'userid' => $row->userid,
             'username' => $row->username,
             'access_rights'=>$row->access_rights
           );

           $this->session->set_userdata('logged_in', $sess_array);

         }

       echo "Success";
     }
     else
     {
       echo "Error";
     }
   }

   public function password_hash($password){
    $salt = 'shiningStar';
    $hashed_value = md5($salt.$password);
    return $hashed_value;
   }

   public function logout(){
      $this->session->sess_destroy();
   }

   public function changePassword($oldPassword,$newPassword){
      
   }

}
