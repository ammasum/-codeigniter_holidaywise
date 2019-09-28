<?php 

class Flights_mdl extends CI_Model{

    public function insert_search_id($search_id){
        $data = array(
            'search_id' => $search_id
        );
        $this->db->insert('flight_search_id_cache', $data);
        return $this->db->insert_id();
    }

    public function get_search_id_data($id){
        $this->db->where('id', $id);
        $result = $this->db->get('flight_search_id_cache');
        return $result->num_rows() > 0 ? $result : false;
    }

}