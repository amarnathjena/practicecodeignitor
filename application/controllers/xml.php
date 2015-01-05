<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL);
ini_set("display_errors", "On");
class Xml extends CI_Controller {
    
    function getDetails($noofrooms, $Adultcount, $Childcount, $Agebox1, $Agebox2){
        $string = "";
        $varchildrepeter = 0;
        for ($i = 0; $i < $noofrooms; $i++){
            $string.="<guestDetails>";
            $string.="<adults>" . $Adultcount[$i] . "</adults>";
            $countcb = $this->getChildage($Childcount[$i], $Agebox1, $Agebox2, $i);
            $string.=$countcb;
            $string.="</guestDetails>";
            $varchildrepeter++;
        }
        return $string;
    }
    function getChildage($chcount, $Age1, $Age2, $roomindex){
        $string2 = "";
        $string2.="<child>";
        if ($roomindex == 0){//for first room
            if ($chcount == 1){
                $string2.="<age>" . $Age1[0] . "</age>";
            }
            if ($chcount == 2){
                $string2.="<age>" . $Age1[0] . "</age>" . "<age>" . $Age2[0] . "</age>";
            }
        }
        if ($roomindex == 1){//for Second room
            if ($chcount == 1){
                $string2.="<age>" . $Age1[1] . "</age>";
            }
            if ($chcount == 2){
                $string2.="<age>" . $Age1[1] . "</age>" . "<age>" . $Age2[1] . "</age>";
            }
        }
        if ($roomindex == 2){//for third room
            if ($chcount == 1){
                $string2.="<age>" . $Age1[2] . "</age>";
            }
            if ($chcount == 2){
                $string2.="<age>" . $Age1[2] . "</age>" . "<age>" . $Age2[2] . "</age>";
            }
        }
        if ($roomindex == 3){//for forth room
            if ($chcount == 1){
                $string2.="<age>" . $Age1[3] . "</age>";
            }
            if ($chcount == 2){
                $string2.="<age>" . $Age1[3] . "</age>" . "<age>" . $Age2[3] . "</age>";
            }
        } 
        $string2.="</child>";
        return $string2;
    }

    public function index(){
		
        $cin = "04/01/2015";
        $cout = "05/01/2015";
        $totaladult = 1;
        $totalchid = 0;
        $norooms = 1;
        $city="Mumbai";
        $dummy_ageofchild = 2;
        $countchildbeds = 0;

        $getdetails = $this->getDetails($norooms, $totaladult, $totalchid, $dummy_ageofchild, $dummy_ageofchild);
        pr($getdetails, 1);
        $checkin=$cin;
        $checkout=$cout;

        $xml_data='<arzHotelAvailReq>
            <clientInfo>
                <username>IndiaTripXML</username>
                <userType>ArzooHWS1.1</userType>
                <userID>57345</userID>
                <password>*F85AE6397FF7F5AE19CBDCF84F2852960E6003A4</password>
                <partnerID>100200</partnerID>
            </clientInfo>
            <requestSegment>
                <currency>INR</currency>
                <searchType>search</searchType>
                <residentOfIndia>true</residentOfIndia>
                <stayDateRange>
                    <start>'.$checkin.'</start>
                    <end>'.$checkout.'</end>
                </stayDateRange>
                <roomStayCandidate>';
        $xml_data.=$getdetails;
        $xml_data.='</roomStayCandidate>
                <hotelSearchCriteria>
                    <hotelCityName>'.$city.'</hotelCityName>
                    <hotelName></hotelName>
                    <area></area>
                    <attraction></attraction>
                    <rating></rating>
                    <sortingPreference>3</sortingPreference>
                    <hotelPackage>N</hotelPackage>
                </hotelSearchCriteria>
            </requestSegment>
        </arzHotelAvailReq>';

        //echo $xml_data;//exit('');

        $wsdl='http://live.arzoo.com/HotelWS1.1/services/HotelAvailSearch?wsdl';

        $int_zona = 5;
        $int_peso = 1001;
        $options = array('compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP);
        $cliente = new SoapClient($wsdl, $options);
        try {
            $results = $cliente->__call('getHotelAvailSearch', array($xml_data));   
        } catch (SoapFault $Exception) {    
            $error=$Exception;
        }
        error_reporting(E_ALL);
        ini_set('display_errors','Off');
        $xmlDoc = new DOMDocument();
        $xmlDoc->loadXML($results);
        $resultHotels=$xmlDoc->getElementsByTagName('hotelName');
        
        
        
        $i=1;
        foreach ($resultHotels as $hotel) {       
           $hoteldetail=$hotel->getElementsByTagName('hoteldetail')->item(0);
           $hotelid=$hoteldetail->getElementsByTagName('hotelid')->item(0)->nodeValue;
           $hotelname=$hoteldetail->getElementsByTagName('hotelname')->item(0)->nodeValue;
           $hoteldesc=$hoteldetail->getElementsByTagName('hoteldesc')->item(0)->nodeValue;

           $citywiselocation=$hoteldetail->getElementsByTagName('contactinfo')->item(0)->getElementsByTagName('citywiselocation')->item(0)->nodeValue;   
           $address=$hoteldetail->getElementsByTagName('contactinfo')->item(0)->getElementsByTagName('address')->item(0)->nodeValue;   
           $starrating=$hoteldetail->getElementsByTagName('starrating')->item(0)->nodeValue;
           $minRate=$hoteldetail->getElementsByTagName('minRate')->item(0)->nodeValue;
           $webService=$hoteldetail->getElementsByTagName('webService')->item(0)->nodeValue;
           $image=$hoteldetail->getElementsByTagName('images')->item(0)->getElementsByTagName('imagepath')->item(0)->nodeValue;
           $priceVal[]=$minRate;
        }


        foreach ($hotel->getElementsByTagName('ratedetail') as $ratedetail) {
            foreach ($ratedetail->getElementsByTagName('rate') as $rate) {  

                $ratetype=$rate->getElementsByTagName('ratetype')->item(0)->nodeValue;
                $hotelPackage=$rate->getElementsByTagName('hotelPackage')->item(0)->nodeValue;
                $roomtype=$rate->getElementsByTagName('roomtype')->item(0)->nodeValue;
                $roombasis=$rate->getElementsByTagName('roombasis')->item(0)->nodeValue;
                $roomTypeCode=$rate->getElementsByTagName('roomTypeCode')->item(0)->nodeValue;
                $ratePlanCode=$rate->getElementsByTagName('ratePlanCode')->item(0)->nodeValue;

                $validdays=$rate->getElementsByTagName('ratebands')->item(0)->getElementsByTagName('validdays')->item(0)->nodeValue;
                $wsKey=$rate->getElementsByTagName('ratebands')->item(0)->getElementsByTagName('wsKey')->item(0)->nodeValue;
                $extGuestTotal=$rate->getElementsByTagName('ratebands')->item(0)->getElementsByTagName('extGuestTotal')->item(0)->nodeValue;
                $roomTotal=$rate->getElementsByTagName('ratebands')->item(0)->getElementsByTagName('roomTotal')->item(0)->nodeValue;
                $servicetaxTotal=$rate->getElementsByTagName('ratebands')->item(0)->getElementsByTagName('servicetaxTotal')->item(0)->nodeValue;
                $discount=$rate->getElementsByTagName('ratebands')->item(0)->getElementsByTagName('discount')->item(0)->nodeValue;
                $commission=$rate->getElementsByTagName('ratebands')->item(0)->getElementsByTagName('commission')->item(0)->nodeValue;
                $originalRoomTotal=$rate->getElementsByTagName('ratebands')->item(0)->getElementsByTagName('originalRoomTotal')->item(0)->nodeValue;

            }
        }
    }   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */