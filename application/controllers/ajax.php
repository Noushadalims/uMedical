<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function index(){
		
	}

	public function searchPatent($keyword=null){
										$this->db->like('mobile', $keyword); 
										$this->db->or_like('phone', $keyword);
										$this->db->or_like('firstname', $keyword);
										$this->db->or_like('lastname', $keyword);
										$this->db->or_like('patientid', $keyword);
										$this->db->limit(30);

                                        $query = $this->db->get('patient_information');

                                      echo "  <tbody><tr>";
                                          echo "  <th>Patent ID</th>";
                                           echo " <th>Name</th>";
                                         echo "   <th>Age</th>";
                                       echo "     <th>Gender</th>";
                                        echo "    <th>Address</th>";
                                        echo "    <th>Contact No</th>";
                                       echo "    <th>Registration Dated</th>";
                                       echo " </tr>";
echo "</tbody>";
                                    

                                        foreach ($query->result() as $row)
                                        {

                                            
                                        echo "<tr>";
                                            echo "<td>".$row->patientid."</td>";
                                            echo "<td>".$row->title.".".$row->firstname." ".$row->lastname."</td>";
                                            echo "<td>".$row->age."</td>";
                                            echo "<td>".$row->gender."</td>";
                                            echo "<td>".$row->address."</td>";
                                            echo "<td>".$row->phone." / ".$row->mobile."</td>";
                                            echo "<td>".$row->registereddated."</td>";
                                        echo "</tr>";
                                        }

	}


}


                                 
                                 
                                 