<?php
/**
 * Created by PhpStorm.
 * User: Mahedi Azad
 * Date: 4/17/15
 * Time: 11:49 AM
 */

class ApiGeneration {

    /**
     * Make an array to xml
     *
     * @param $array input data
     * @param bool $xml
     * @return mixed xml
     */
    public function array2xml($array, $xml = false){
        if($xml === false){
            $xml = new SimpleXMLExtended('<root/>');
        }
        foreach($array as $key => $value){
            if(is_array($value)){
                if(!is_numeric($key)){
                    array2xml($value, $xml->addChild($key));

                } else {
                    array2xml($value, $xml->addChild('item'));
                }

            }else{
                if(!is_numeric($key)){
                    $xml->addChild($key, $value);

                } else {
                    $xml->addChild('item', $value);
                }
            }
        }
        return $xml->asXML();
    }


    /* Setup the response header
           $data = array();
           $data['status'] = '200';
           $data['message'] = 'This is a sample api call. Change this to a description of what this API call does.';
           $data['link'] = 'http://yourdomain.com/path-to-your-api-documentation';
    */

    public function display($result, $format='json'){

        $data['request']['format'] = strtolower(htmlentities($format));
        $data['request']['date'] = date('Y-m-d h:i:s');
        $data['data'] = $result;

        if ($format=='json') {
            header("Content-Type: application/json;charset=utf-8");
            echo json_encode($data);
            exit;

        } elseif($format=='php') {
            header("Content-Type: application/php;charset=utf-8");
            echo serialize($data);
            exit;

        } elseif($format=='html') {
            header("Content-Type: text/html;charset=utf-8");
            print_r($data);
            exit;

        } elseif($format=='xml') {
            header("Content-Type: text/xml;charset=utf-8");
            print array2xml($data);
            exit;
        }
    }

} 