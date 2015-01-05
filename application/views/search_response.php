<table border="1" width="80%" align="center">
    <tr style="background-color:#F2F0F0;">
        <td>#</td>
        <td>Image</td>
        <td>Hotel Name</td>
        <td>Category</td>
        <td>Hotel Location</td>			
        <td>Total Rate</td>
    </tr>
    <?php
    $i = 1;

    foreach ($hotel_res as $result) {

        $tboIndex = $result->getElementsByTagName("Index")->item(0)->nodeValue;
        $Rating = $result->getElementsByTagName("HotelInfo")->item(0)->getElementsByTagName('Rating')->item(0)->nodeValue;
        $HotelCode = $result->getElementsByTagName("HotelInfo")->item(0)->getElementsByTagName('HotelCode')->item(0)->nodeValue;
        $HotelName = $result->getElementsByTagName("HotelInfo")->item(0)->getElementsByTagName('HotelName')->item(0)->nodeValue;
        $HotelPicture = $result->getElementsByTagName("HotelInfo")->item(0)->getElementsByTagName('HotelPicture')->item(0)->nodeValue;
        $HotelLocation = chop($result->getElementsByTagName("HotelInfo")->item(0)->getElementsByTagName('HotelLocation')->item(0)->nodeValue, "|");
        $TotalRate = $result->getElementsByTagName("RoomDetails")->item(0)->getElementsByTagName('WSHotelRoomsDetails')->item(0)->getElementsByTagName('Rate')->item(0)->getElementsByTagName('TotalRate')->item(0)->nodeValue;
        $Currency = $result->getElementsByTagName("RoomDetails")->item(0)->getElementsByTagName('WSHotelRoomsDetails')->item(0)->getElementsByTagName('Rate')->item(0)->getElementsByTagName('Currency')->item(0)->nodeValue;
        $TotalRoomRate = $result->getElementsByTagName("RoomDetails")->item(0)->getElementsByTagName('WSHotelRoomsDetails')->item(0)->getElementsByTagName('RoomRate')->item(0)->getElementsByTagName('TotalRoomRate')->item(0)->nodeValue;
        ?>

        <tr>
            <td><?php echo $i; ?></td>	
            <td><img src="<?php echo $HotelPicture; ?>" title="<?php echo $HotelPicture; ?>" height="100" width="100" /></td>
            <td><?php echo $HotelName; ?></td>
            <td><?php echo $Rating; ?></td>		
            <td><?php echo $HotelLocation; ?></td>		
            <td><?php echo anchor("amar/get_hotel_details/$tboSessionId/$tboIndex", $TotalRate . ' ' . $Currency, array('title' => 'View Hotel Details', 'target' => '_blank')); ?></td>		
        </tr>

    <?php
    $i++;
}
?>
</table> 