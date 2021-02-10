<?php
    $fn = "no name";
    $ln = "no last name";
    $ci = "city";
    $em = "email@email.com";
    $ph = "123456789";
    $my_array_data = array("name" => array("first" => $fn, "last" => $ln), "address" => array("city" => $ci), "emails" => array("address" => $em, "addressType" => array("id" => 0)), "phones" => array("number" => $ph, "phoneType" => array("id" => 0)));
    $data = json_encode($my_array_data); 
    $value = 636;
    $url = "https://ICXCandidate:Welcome2021@imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts/$value"; 
    $headers = array('X-HTTP-Method-Override: POST');
    $headers = array('Content-Type: application/json');
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
    ?>
    <table class="table table-hover table-bordered">
    <div id="id_employee">
        <text type="number" name="id" min="1" max="5000" value="<?php echo (isset($_GET['id']) ? $_GET['id'] : '') ?>"  />
            <?php
            $url = "https://ICXCandidate:Welcome2021@imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts/$value"; 
            $fn = "no name";
    $ln = "no last name";
    $ci = "city";
    $em = "email@email.com";
    $ph = "123456789";
    $my_array_data = array("name" => array("first" => $fn, "last" => $ln), "address" => array("city" => $ci), "emails" => array("address" => $em, "addressType" => array("id" => 0)), "phones" => array("number" => $ph, "phoneType" => array("id" => 0)));
    $data = json_encode($my_array_data); 
            echo "<table>
                <tr>
                <tr>UPDATE EMPLOYEE</tr>
                <td>DATA:</td>
                <td>$data</td>
                </tr><tr>
                <td>Array<td>
                <td>$my_array_data</td>
                </tr>
            </table>";
            ?>
    </div>
</table>
    