<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends CI_Controller {
   /**
    * Get All Data from this method.
    *
    * @return Response
   */

  public function crud()
  {
      $this->load->view('patients');
  }

   public function index()
   {
       $this->load->database();

       if(!empty($this->input->get("search"))){
          $this->db->like('firstname', $this->input->get("search"));
          $this->db->or_like('lastname', $this->input->get("search")); 
       }

       $this->db->get("tbl_patient");
       $query = $this->db->get("tbl_patient");

       $data['data'] = $query->result();
       $data['total'] = $this->db->count_all("tbl_patient");

       echo json_encode($data);

   }

   /**
    * Store Data from this method.
    *
    * @return Response
   */

   public function store()
   {
       $this->load->database();

       $insert = $this->input->post();
       $this->db->insert('tbl_patient', $insert);
       $id = $this->db->insert_id();
       $q = $this->db->get_where('tbl_patient', array('patient_id' => $id));

       echo json_encode($q->row());
    }

   /**
    * Edit Data from this method.
    *
    * @return Response
   */
   public function edit($id)
   {
       $this->load->database();
       $q = $this->db->get_where('tbl_patient', array('patient_id' => $id));

       echo json_encode($q->row());
   }

   /**
    * Update Data from this method.
    *
    * @return Response
   */
   public function update($id)
   {
       $this->load->database();

       $insert = $this->input->post();
       $this->db->where('patient_id', $id);
       $this->db->update('tbl_patient', $insert);
       $q = $this->db->get_where('tbl_patient', array('patient_id' => $id));


       echo json_encode($insert);

    }

   /**
    * Delete Data from this method.
    *
    * @return Response
   */
   public function delete($id)
   {
       $this->load->database();

       $this->db->where('patient_id', $id);
       $this->db->delete('tbl-patient');

       echo json_encode(['success'=>true]);
    }

}