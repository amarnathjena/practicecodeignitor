<?php include_once VIEWS_DIR."header.php"; ?>

<form name="flight_form" id="flight_form" action="<?php echo base_url();?>index.php/arzooxml/flight_load">
    <h3>Flight Form</h3>
        <table class='tbl_list'>
            <tr>
                <td>
                    <input type="radio" value="domestic" name="trip_type" id="trip_type1"/>
                    <label for="trip_type1"> : Domestic</label>
                </td>
                <td>
                    <input type="radio" value="international" name="trip_type" id="trip_type2"/>
                    <label for="trip_type2"> : International</label>
                </td>
                <td>
                    <input type="radio" value="O" name="rnd_one" id="rnd_one1"/>
                    <label for="rnd_one1"> : One Way</label>
                </td>
                <td>
                    <input type="radio" value="R" name="rnd_one" id="rnd_one2"/>
                    <label for="rnd_one2"> : Round Way</label>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <table>
                        <tr>
                            <td>
                                <label for="from_city">From City</label>
                            </td>
                            <td onclick="javascript:$(this).find('input').select();">
                                <nobr> : <input type="text" name="from_city" id="from_city"/></nobr>
                            </td>
                            <td>
                                <label for="to_city">To City</label>
                            </td>
                            <td onclick="javascript:$(this).find('input').select();">
                                <nobr> : <input type="text" name="to_city" id="to_city"/></nobr>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="departure_dt">Departure Date</label>
                            </td>
                            <td onclick="javascript:$(this).find('input').select();">
                                <nobr> : <input type="text" name="departure_dt" id="departure_dt" /></nobr>
                            </td>
                            <td>
                                <label for="return_dt">Return Date</label>
                            </td>
                            <td onclick="javascript:$(this).find('input').select();">
                                <nobr> : <input type="text" name="return_dt" id="return_dt" /></nobr>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
             <tr>
                <td>
                    <label for="adults">Adult(12+ Years)</label>
                    <select name="adults" id="adults">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
                <td>
                    <label for="childs">Child(2-11 Years)</label>
                    <select name="childs" id="childs">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
                <td>
                    <label for="infants">Infants(0-2)</label>
                    <select name="infants" id="infants">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
                <td>
                    <label for="class">Class</label>
                    <select id="class" name="class">
                        <option value="E">Economy</option>
                        <option value="B">Business</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">
                    <input type="submit" value="Search"/>
                    <input type="button" value="Reset" class="resetbutton"/>
                </td>
            </tr>
        </table>
</form>
<script type='text/javascript'>
    $(function(){
         $("#flight_form").children().find("input:text:first").select();
         $("input:text").each(function(){
             $(this).attr("title",$(this).parents("td").prev().children("label").html());
         });
         $(".resetbutton").click(function(){
             $(this).parents("form").find("input:text").val("");
             $(this).parents("form").find("input:checkbox").prop("checked", false);
             $(this).parents("form").find("input:radio").prop("checked", false);
             $(this).parents("form").find("select").each(function(){
                 $(this).val($(this).find("option").first().val());
             });
         });
    });
</script>
<?php include_once VIEWS_DIR."footer.php"; ?>