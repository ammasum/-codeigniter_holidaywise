<?php

class Flight extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('flights_mdl');
        $this->lang->load('home_url', 'english');
        $this->load->helper('home_helper');
    }
    public function search(){
        $searchData["signature"] = "";
        $searchData["marker"] = "235918";
        $searchData["host"] = "localhost";
        $searchData["user_ip"] = "localhost";
        $searchData["locale"] = "en";
        $searchData["trip_class"] = "Y";
        $searchData["segments"] = array(
            array(
                "date" => $this->input->get("depart_date"),
                "destination" => $this->input->get("destination_iata"),
                "origin" => $this->input->get("origin_iata")
            )
        );
        if($this->input->get('return_date')){
            array_push($searchData["segments"], array(
                "date" => $this->input->get("return_date"),
                "destination" => $this->input->get("origin_iata"),
                "origin" => $this->input->get("destination_iata")
            ));
        }
        $searchData["passengers"] = array(
            "adults" => $this->input->get("adults"),
            "children" => $this->input->get("children"),
            "infants" => $this->input->get("infants")
        );

        $signature = $this->_createSignature($searchData);

        $searchData["signature"] = $signature;

        $url = 'http://api.travelpayouts.com/v1/flight_search';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($searchData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result =  json_decode(curl_exec($ch));
        curl_close($ch);

        $id = $this->flights_mdl->insert_search_id($result->search_id);
        $data["search_id"] = $id;
        $this->_view("flights", $data);
    }

    public function search_result($id){
        $result = $this->flights_mdl->get_search_id_data($id);
        if($result){
            $result = $result->result()[0];
            $url = 'http://api.travelpayouts.com/v1/flight_search_results?uuid=';
            $ch = curl_init($url . $result->search_id);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Encoding:gzip,deflate,sdch'));
            curl_setopt($ch,CURLOPT_ENCODING , "");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $http_result =  curl_exec($ch);
            curl_close($ch);
            echo $http_result;
        }else{
            
        }
    }

    private function _createSignature($data){
        $data["adults"] = $this->input->get("adults");
        $data["children"] = $this->input->get("children");
        $data["infants"] = $this->input->get("infants");
        $data["origin"] = $this->input->get("origin_iata");
        $data["destination"] = $this->input->get("destination_iata");
        $data["depart_date"] = $this->input->get("depart_date");
        $data["return_date"] = $this->input->get("return_date");
        $signature = "";
        $list_arr = array(
            'host', 'locale', 'marker', 'adults', 'children', 'infants',
            'depart_date', 'destination', 'origin'
        );
        if($this->input->get("return_date")){
            array_push($list_arr, 'return_date', 'origin', 'destination');
        }
        array_push($list_arr, 'trip_class', 'user_ip');
        foreach($list_arr as $key => $value){
            
            $signature .= $data[$value] . ":";
        }
        return md5(substr($signature, 0, -1));
    }

    private function _error($code){

    }

    private function _view($page, $data = ""){
        $path = 'home/';
        $this->load->view($path . 'inc/header', $data);
        $this->load->view($path . 'pages/' . $page, $data);
        $this->load->view($path . 'inc/footer');
    }
}