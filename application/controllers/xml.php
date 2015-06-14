<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Amar extends CI_Controller {
     
    public function __construct() {
        parent::__construct();
//        $this->load->helper('url');
//        $this->load->library('form_validation');
        //Here is code to restrict unauthorised user
        if(!$this->session->userdata('id'))
            redirect ('login');
        
        $this->load->model('user','',TRUE);
    }

    public function index() {
        
        include_once APPPATH."includes/xmlparser.php";
        $username = "ADD USERNAME";
	$password = "ADD PASSWORD";
        $checkindate = "2015-01-06";
        $checkoutdate = "2015-01-07";
        $country = "India";
        $city = "mumbai"; // Bangalore, delhi, kochi area, etc... this will be given by api creater
        $city_code = "10438"; // 10391, 10409, 10427, etc...
        $NoOfRooms = 1;
        $NoOfAdults = 1;
        $NoOfChild = 0;
        if (strtolower($country) == 'india') {
            $domestic = "true";
        } else {
            $domestic = "false";
        }

        $src_xml = "<soap:Envelope xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:xsd='http://www.w3.org/2001/XMLSchema' xmlns:soap='http://schemas.xmlsoap.org/soap/envelope/'>
                        <soap:Header>
                        <AuthenticationData xmlns='http://TekTravel/HotelBookingApi'>
                        <UserName>$username</UserName>
                        <Password>$password</Password>
                        </AuthenticationData>
                        </soap:Header>
                        <soap:Body>
                        <Search xmlns='http://TekTravel/HotelBookingApi'>
                        <request>
                        <CheckInDate>$checkindate</CheckInDate>
                        <CheckOutDate>$checkoutdate</CheckOutDate>
                        <CountryName>$country</CountryName>
                        <IsDomestic>$domestic</IsDomestic>
                        <CityReference>$city</CityReference>
                        <CityId>$city_code</CityId>
                        <NoOfRooms>$NoOfRooms</NoOfRooms>
                        <RoomGuest>
                        <WSRoomGuestData>
                        <NoOfAdults>$NoOfAdults</NoOfAdults>
                        <NoOfChild>$NoOfChild</NoOfChild>
                        <ChildAge>";
        if ($NoOfChild > 0) {
            $NoOfChild_r_c = count($this->input->post('ChildAge_r'));
            $childage = $this->input->post('ChildAge_r');
            for ($j = 1; $j <= $NoOfChild_r_c; $j++) {
                $childage_i = (integer) $childage[$i];
                $src_xml .="<int>$childage_i</int> ";
            }
        } else {
            $src_xml .="<int>0</int>";
        }
        $src_xml .= " 				
                        </ChildAge>
                        </WSRoomGuestData>";

        if ($NoOfRooms > 1 && $NoOfAdults) {
            
            for ($i = 0; $i < $NoOfAdults; $i++) {

                $NoOfAdults_i = intval($NoOfAdults[$i]);
                $NoOfChild_i = intval($NoOfChild[$i]);

                $src_xml .= "					
                            <WSRoomGuestData>
                            <NoOfAdults>$NoOfAdults_i</NoOfAdults>
                            <NoOfChild>$NoOfChild_i</NoOfChild>
                            <ChildAge>
                            <int>0</int>
                            </ChildAge>
                            </WSRoomGuestData>";
            }
        }
        $src_xml .="
                    </RoomGuest>
                    <HotelName/>
                    <Rating>All</Rating>
                    </request>
                    </Search>
                    </soap:Body>
                    </soap:Envelope>";

        $url = "http://api.tektravels.com/tbohotelapi_v6/hotelservice.asmx?wsdl";

        $curl_handle = curl_init($url);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_handle, CURLOPT_POST, 1);
        curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
        curl_setopt($curl_handle, CURLOPT_ENCODING, "gzip");
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $src_xml);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        $buffer = curl_exec($curl_handle);

        curl_close($curl_handle);
        
        $xmlDoc = new Domdocument();
        
        $parse = $xmlDoc->loadXML($buffer);
        
        $hresult = $xmlDoc->getElementsByTagName("SearchResponse")->item(0)->getElementsByTagName("SearchResult")->item(0)->getElementsByTagName("Result")->item(0)->getElementsByTagName("WSHotelResult");
        $tboSessionId = $xmlDoc->getElementsByTagName("SearchResponse")->item(0)->getElementsByTagName("SearchResult")->item(0)->getElementsByTagName("SessionId")->item(0)->nodeValue;

        $data['hotel_res'] = $hresult;
        $data['tboSessionId'] = $tboSessionId;
        $this->load->view('search_response', $data);
    }
    
    function get_hotel_details(){
        echo "You are inside : <strong>".__CLASS__."</strong> class and method as : <strong>".__FUNCTION__."()</strong>";
    }

    
}
