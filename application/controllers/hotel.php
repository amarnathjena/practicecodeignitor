<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
error_reporting(E_ALL);
ini_set("display_errors", "On");

class Hotel extends CI_Controller {

    var $UserName;
    var $Password;
    var $Host;
    
    public function index() {
        $xml_body = '';
        $xml_body .= '<AddHotelBookingDetail xmlns="http://TekTravel/HotelBookingApi">
                        <saveRequest>
                              <TripId>9729</TripId>
                              <BookingStatus>Vouchered</BookingStatus>
                        </saveRequest>
                      </AddHotelBookingDetail>';

        $result = $this->curl($xml_body);
        echo $result;
        return $result;
    }

    function credentials() {
        if ($_SERVER['HTTP_HOST'] == '192.168.0.42' || $_SERVER['HTTP_HOST'] == 'localhost') {
            $this->UserName = "slvtours";
            $this->Password = "travel@1234";
            $this->Host = "http://api.tektravels.com/tbohotelapi_v6/hotelservice.asmx?wsdl";
        } else {
            $this->UserName = "slvtours";
            $this->Password = "travel@1234";
            $this->Host = "http://api.tektravels.com/tbohotelapi_v6/hotelservice.asmx?wsdl";
        }
    }

    function curl($xml_body, $filepara) {
        $this->credentials();
        $xml = '';
        $xml .= '<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                    <soap:Header>
                        <AuthenticationData xmlns="http://TekTravel/HotelBookingApi">
                            <UserName>' . $this->UserName . '</UserName>
                            <Password>' . $this->Password . '</Password>
                        </AuthenticationData>
                    </soap:Header>
                    <soap:Body>';
        $xml .= $xml_body;
        $xml .= '</soap:Body> </soap:Envelope>';
        $ch = curl_init($this->Host);

        $this->xml_store($xml, $filepara, 'request');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $xmls = curl_exec($ch);
        $this->xml_store($xmls, $filepara, 'response');


        return $xmls;
    }

    function curlpost() {
        $data = array("name" => "Hagrid", "age" => "36");
        $data_string = json_encode($data);
        $ch = curl_init('http://192.168.0.42/ticketpandit/hotel/hoteldetails.php');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);  // Seems like good practice
        $_SESSION['result'] = $result;
        print_r($_SESSION['result']);
    }

    function xml_store($xml, $filepara, $filename) {
        $string = $xml;
        $fb = fopen("../xmls/" . $filepara . "/" . $filepara . "_" . $filename . ".xml", "a+");
        if ($fb) {
            fwrite($fb, $string);
            fclose($fb);
        } /* else
          {
          echo "error : unable to open ";
          } */
    }

    function search($parameters) {
        $xml_body = '';
        $xml_body.='<Search xmlns="http://TekTravel/HotelBookingApi">
				<request>
					<CheckInDate>' . trim($parameters["h_chk_in"]) . '</CheckInDate>
					<CheckOutDate>' . trim($parameters["h_chk_out"]) . '</CheckOutDate>
					<CountryName>' . trim($parameters["h_country_name"]) . '</CountryName>
					<IsDomestic>' . trim($parameters["h_trip_type"]) . '</IsDomestic>
					<CityReference>' . trim($parameters["h_city_name"]) . '</CityReference>
					<CityId>' . trim($parameters["h_city_id"]) . '</CityId>
					<NoOfRooms>' . trim($parameters["rooms"]) . '</NoOfRooms>
					<RoomGuest>';
        for ($i = 1; $i <= $parameters["rooms"]; $i++) {
            $xml_body .= '
						<WSRoomGuestData>
							<NoOfAdults>' . trim($parameters["room_" . $i . "_adults"]) . '</NoOfAdults>
							<NoOfChild>' . trim($parameters["room_" . $i . "_childs"]) . '</NoOfChild>';
            if ($parameters["room_" . $i . "_childs"] > 0) {
                $xml_body .= '<ChildAge>';
                for ($j = 1; $j <= $parameters["room_" . $i . "_childs"]; $j++) {
                    $xml_body .= '<int>' . $parameters["room_" . $i . "_child" . $j . "_age"] . '</int>';
                }
                $xml_body .= '</ChildAge>';
            } else {
                $xml_body .= '<ChildAge><int>0</int></ChildAge>';
            }

            $xml_body .= '</WSRoomGuestData>';
        }
        $xml_body .= '</RoomGuest>
						<HotelName />
					<Rating>All</Rating>
				</request>
			</Search>';
        $result = $this->curl($xml_body, 'search');
        return $result;
    }

    function hotel_detail() {
        $hotel_index = (isset($_REQUEST['hid']) && $_REQUEST['hid'] != '') ? $_REQUEST['hid'] : '';
        $hotelSessionID = (isset($_REQUEST['sid']) && $_REQUEST['sid'] != '') ? $_REQUEST['sid'] : '';
        $xml_body = '';
        $xml_body .= '<GetHotelDetails xmlns="http://TekTravel/HotelBookingApi">
		  <request>
			<SessionId>' . $hotelSessionID . '</SessionId>
			<Index>' . $hotel_index . '</Index>
		  </request>
		</GetHotelDetails>';
        $result = $this->curl($xml_body);
        return $result;
    }

    function book() {
        //echo '<pre>';
        //print_r($_SESSION["Request"]);exit;	
        $sid = $_SESSION["sid"];
        $hid = $_SESSION["hid"];
        $_SESSION["hid"];

        $xml_body = '';
        $xml_body .= '<Book xmlns="http://TekTravel/HotelBookingApi">
			<request>
				<RoomCodes>';
        for ($i = 0; $i < count($_SESSION["roomidexing"]); $i++) {
            $xml_body .= '<string>' . $_SESSION['search'][$sid][$hid][$_SESSION["roomidexing"][$i]]['RoomTypeCode'] . '###' . $_SESSION['search'][$sid][$hid][$_SESSION["roomidexing"][$i]]['RatePlanCode'] . '</string>';
        }
        $xml_body .= '</RoomCodes>
				<Guest>';
        for ($i = 1; $i <= count($_SESSION["Request"]["adult_title"]); $i++) {
            for ($j = 0; $j < count($_SESSION["Request"]["adult_title"][$i]); $j++) {
                $xml_body .= '<WSGuest>
						<Title>' . $_SESSION["Request"]["adult_title"][$i][$j] . '</Title>
						<FirstName>' . $_SESSION["Request"]["adult_firstname"][$i][$j] . '</FirstName>
						<LastName>' . $_SESSION["Request"]["adult_lastname"][$i][$j] . '</LastName>
						<LeadGuest>';

                if ($i == 1 && $j == 0) {
                    $xml_body .= 'true</LeadGuest>
						<Age>' . $_SESSION["Request"]["adult_age"][$i][$j] . '</Age>
						<Addressline1>' . $_SESSION["Request"]["address"] . '</Addressline1>
						<Countrycode>91</Countrycode>
						<Areacode>01</Areacode>
						<Phoneno>' . $_SESSION["Request"]["mobile"] . '</Phoneno>
						<Email>' . $_SESSION["Request"]["email"] . '</Email>
						<City>' . $_SESSION["Request"]["city"] . '</City>
						<State>' . $_SESSION["Request"]["state"] . '</State>
						<Country>' . $_SESSION["Request"]["adult_age"] . '</Country>
						<Zipcode>' . $_SESSION["Request"]["pincode"] . '</Zipcode>';
                } else {
                    $xml_body .= 'false</LeadGuest>
						 <Age>' . $_SESSION["Request"]["adult_age"][$i][$j] . '</Age>';
                }
                $xml_body .= '<GuestType>Adult</GuestType>
						<RoomIndex>' . ($i - 1) . '</RoomIndex>
					</WSGuest>';
            }
        }

        for ($i = 1; $i <= count($_SESSION["Request"]["child_title"]); $i++) {
            for ($j = 0; $j < count($_SESSION["Request"]["child_title"][$i]); $j++) {
                $xml_body .= '<WSGuest>
						<Title>' . $_SESSION["Request"]["child_title"][$i][$j] . '</Title>
						<FirstName>' . $_SESSION["Request"]["child_firstname"][$i][$j] . '</FirstName>
						<LastName>' . $_SESSION["Request"]["child_lastname"][$i][$j] . '</LastName>
						<LeadGuest>false</LeadGuest>
						<Age>' . $_SESSION["Request"]["child_age"][$i][$j] . '</Age>';
                $xml_body .= '<GuestType>Child</GuestType>
						<RoomIndex>' . ($i - 1) . '</RoomIndex>
					</WSGuest>';
            }
        }
        $xml_body .= '</Guest>
				<SessionId>' . $sid . '</SessionId>
				<FlightInfo>time in morning</FlightInfo>
				<SpecialRequest>no</SpecialRequest>
				<PaymentInfo>
					<PaymentId>0</PaymentId>
					<Amount>0</Amount>
					<IPAddress>0</IPAddress>
					<TrackId>0</TrackId>
					<PaymentGateway>APICustomer</PaymentGateway>
					<PaymentModeType>Deposited</PaymentModeType>
				</PaymentInfo>
				<NoOfRooms>' . $_SESSION["rooms"] . '</NoOfRooms>
				<Index>' . $hid . '</Index>
				<HotelCode>' . $_SESSION['search'][$sid][$hid]['HotelCode'] . '</HotelCode>
				<HotelName>' . $_SESSION['search'][$sid][$hid]['HotelName'] . '</HotelName>
				<RoomDetails>';
        for ($i = 0; $i < count($_SESSION["roomidexing"]); $i++) {
            $rmid = $_SESSION["roomidexing"][$i];
            $xml_body .= '<WSHotelRoomsDetails>
						<Index>' . $_SESSION["roomidexing"][$i] . '</Index>
						<Rate>
							<TotalRate>' . $_SESSION['search'][$sid][$hid][$rmid]['TotalRate'] . '</TotalRate>
							<TotalTax>' . $_SESSION['search'][$sid][$hid][$rmid]['TotalTax'] . '</TotalTax>
							<Currency>' . $_SESSION['search'][$sid][$hid][$rmid]['Currency'] . '</Currency>
							<AgentMarkUp>' . $_SESSION['search'][$sid][$hid][$rmid]['AgentMarkUp'] . '</AgentMarkUp>
							<AgentCommission>' . $_SESSION['search'][$sid][$hid][$rmid]['AgentCommission'] . '</AgentCommission>
						</Rate>
						<RoomRate>
							<DayRates>
								<WSDayRates>
									<Days>' . $_SESSION['search'][$sid][$hid][$rmid]['days'] . '</Days>
									<BaseFare>' . $_SESSION['search'][$sid][$hid][$rmid]['BaseFare'] . '</BaseFare>
								</WSDayRates>
							</DayRates>
							<ExtraGuestCharges>0.00</ExtraGuestCharges>
							<DisCount>0.00</DisCount>
							<OtherCharges>0.00</OtherCharges>
							<ServiceTax>' . $_SESSION['search'][$sid][$hid][$rmid]['ServiceTax'] . '</ServiceTax>
							<TotalRoomRate>' . $_SESSION['search'][$sid][$hid][$rmid]['TotalRoomRate'] . '</TotalRoomRate>
							<TotalRoomTax>' . $_SESSION['search'][$sid][$hid][$rmid]['TotalRoomTax'] . '</TotalRoomTax>
						</RoomRate>
						<Amenities>
							<string>Full Breakfast</string>
						</Amenities>
						<Occupancy>
							<MaxAdult>0</MaxAdult>
							<MaxChild>0</MaxChild>
							<MaxInfant>0</MaxInfant>
							<MaxGuest>0</MaxGuest>
							<BaseAdult>0</BaseAdult>
							<BaseChild>0</BaseChild>
						</Occupancy>
						<RoomTypeCode>' . $_SESSION['search'][$sid][$hid][$rmid]['RoomTypeCode'] . '</RoomTypeCode>
						<RoomTypeName>' . $_SESSION['search'][$sid][$hid][$rmid]['RoomTypeName'] . '</RoomTypeName>
						<RatePlanCode>' . $_SESSION['search'][$sid][$hid][$rmid]['RatePlanCode'] . '</RatePlanCode>
						<SequenceNo>' . $_SESSION['search'][$sid][$hid][$rmid]['SequenceNo'] . '</SequenceNo>
					</WSHotelRoomsDetails>';
        }
        $xml_body .= '</RoomDetails>
			</request>
		</Book>';

        $result = $this->curl($xml_body, 'book');
        return $result;
    }

}
