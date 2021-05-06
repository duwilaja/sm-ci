
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_api extends CI_Controller {

    public function get_all()
    {

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.indicar.id/platform/public/index.php/sysapi/vehicles/list",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",    
            "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1laWRlbnRpZmllciI6IjE3MyIsImh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3dzLzIwMDUvMDUvaWRlbnRpdHkvY2xhaW1zL25hbWUiOiJJT1QuS09STEFOVEFTQEdNQUlMLkNPTSIsIkFzcE5ldC5JZGVudGl0eS5TZWN1cml0eVN0YW1wIjoiYTZhNjI0YzMtZDhmYi00NzI4LTdlN2MtMzlmYjJlNjdkNjQyIiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy9yb2xlIjoiQWRtaW5HcnVwIiwic3ViIjoiMTczIiwianRpIjoiYTY0NDZkM2ItNzcxNS00YWFlLWFjYzAtMGRkN2RmYTIwNjgyIiwiaWF0IjoxNjIwMTA1MzA4LCJ1c2VybmFtZSI6IklPVC5LT1JMQU5UQVNAR01BSUwuQ09NIiwiZnVsbG5hbWUiOiJJbmRpY2FyIERlbW8gIiwic3RhdHVzIjoiQWN0aXZlIiwicm9sZV9uYW1lIjoiQWRtaW5HcnVwLEFkbWluR3J1cCIsImV4cGlyZWQiOiIwNS8wNS8yMDIxIDA1OjE1OjA4IiwidHlwZV91c2VyIjoiQ3VzdG9tZXIiLCJ0ZW5hbnQiOiJEZWZhdWx0IiwiZ3JvdXAiOiJpb3Qua29ybGFudGFzQGdtYWlsLmNvbSxpb3Qua29ybGFudGFzQGdtYWlsLmNvbSIsImN1c3RvbWVyY29kZSI6IjhhYzhiYjY5MWI4OWFkNDk1Y2Q5NTkzZWZhMWZhMmRhIiwidGVuYW50Y29kZSI6IiIsInVzZXJjb2RlIjoiOTg5MDIzZDIwMTAxODU3ZjE4ZWU0OWU3NmYzNGRmZmUiLCJuYmYiOjE2MjAxMDUzMDgsImV4cCI6MTYyMDE5MTcwOCwiaXNzIjoiSW5kaUNhckJhY2tlbmQiLCJhdWQiOiJJbmRpQ2FyQmFja2VuZCJ9.RcuRItz7NOeN8CJppet7C35e-k__e1hQ_cmut-iyaJU"
            ),
            ));

            $response = curl_exec($curl);
            $data = json_decode($response, true);
            return $data;
            // echo $data;
            // echo json_encode($data);
    }

    public function get_by()
    {

            $curl = curl_init();
            $get_by = json_encode(array(
                "nopols"  => "7001"
            ));
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.indicar.id/platform/public/index.php/sysapi/vehicles/detailbynopol",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",    
            "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1laWRlbnRpZmllciI6IjE3MyIsImh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3dzLzIwMDUvMDUvaWRlbnRpdHkvY2xhaW1zL25hbWUiOiJJT1QuS09STEFOVEFTQEdNQUlMLkNPTSIsIkFzcE5ldC5JZGVudGl0eS5TZWN1cml0eVN0YW1wIjoiYTZhNjI0YzMtZDhmYi00NzI4LTdlN2MtMzlmYjJlNjdkNjQyIiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy9yb2xlIjoiQWRtaW5HcnVwIiwic3ViIjoiMTczIiwianRpIjoiNTkxZTZiZWEtYWI2MC00MDM4LTlhYWItZjdkODRlY2VjZDM5IiwiaWF0IjoxNjIwMTc4MTA1LCJ1c2VybmFtZSI6IklPVC5LT1JMQU5UQVNAR01BSUwuQ09NIiwiZnVsbG5hbWUiOiJJbmRpY2FyIERlbW8gIiwic3RhdHVzIjoiQWN0aXZlIiwicm9sZV9uYW1lIjoiQWRtaW5HcnVwLEFkbWluR3J1cCIsImV4cGlyZWQiOiIwNS8wNi8yMDIxIDAxOjI4OjI1IiwidHlwZV91c2VyIjoiQ3VzdG9tZXIiLCJ0ZW5hbnQiOiJEZWZhdWx0IiwiZ3JvdXAiOiJpb3Qua29ybGFudGFzQGdtYWlsLmNvbSxpb3Qua29ybGFudGFzQGdtYWlsLmNvbSIsImN1c3RvbWVyY29kZSI6IjhhYzhiYjY5MWI4OWFkNDk1Y2Q5NTkzZWZhMWZhMmRhIiwidGVuYW50Y29kZSI6IiIsInVzZXJjb2RlIjoiOTg5MDIzZDIwMTAxODU3ZjE4ZWU0OWU3NmYzNGRmZmUiLCJuYmYiOjE2MjAxNzgxMDUsImV4cCI6MTYyMDI2NDUwNSwiaXNzIjoiSW5kaUNhckJhY2tlbmQiLCJhdWQiOiJJbmRpQ2FyQmFja2VuZCJ9.R49qVrLL4UPE2ZtyGvdm6ONo5s4Lv8oqX-4sal3qV4U"
            ),
            CURLOPT_POSTFIELDS => $get_by,
            ));

            $response = curl_exec($curl);
            $data = json_decode($response, true);
            return $data;
            // echo $data;
            // echo json_encode($data);
    }

    function hahaha(){
        echo json_encode($this->get_by());
    }

}

