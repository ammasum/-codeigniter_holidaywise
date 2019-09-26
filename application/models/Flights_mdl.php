<?php 

class Flights_mdl extends CI_Model{

    public function insert_search_id($search_id){
        $data = array(
            'search_id' => $search_id
        );
        $this->db->insert('flight_search_id_cache', $data);
        return $this->db->insert_id();
    }

    

}