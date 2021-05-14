<?php





class record {
    public $transactionnum;
    public $date;
    public $productnumber;
    public $Description;
    public $customernumber;
    public $saleamount;
    public $email;



    public function __construct($transactionnum,$date,$productnumber,$description,$customernumber,$saleamount,$email)
    {
        $this->transactionnum =$transactionnum;
        $this->date = $date;
        $this->productnumber = $productnumber;
        $this->description = $description;
        $this->customernumber = $customernumber;
        $this->saleamount = $saleamount;
        $this->email = $email;

    }

    public function get_transactionnum()
    {
        return $this->transactionnum;
    }

    public function get_date()
    {
        return $this->date;
    }

    public function get_productnumber()
    {
        return $this->productnumber;
    }

    public function get_description()
    {
        return $this->description;
    }

    public function get_customernumber()
    {
        return $this->customernumber;
    }

    public function get_saleamount()
    {
        return $this->saleamount;
    }

     public function get_email()
    {
        return $this->email;
    }

}


class recordDTO extends record {


    public function displayrecord($idSALESRECORD)
    {
        $servername = "localhost";
        $user = "id16814382_root";
        $pass = "6r!TYM8NT(BA7Ep";
        $dbname = "id16814382_peopleshealthpharmacy";

        $tablename = "SALESRECORD";

        $conn = mysqli_connect($servername,$user,$pass,$dbname);

        $sql = "SELECT * FROM $tablename WHERE idSALESRECORD='$idSALESRECORD';";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            return false;
        }

        $holder = mysqli_fetch_assoc($result);
        $ID_hold = $holder["idSALESRECORD"];
        $transactionnum_hold = $holder["transactionnum"];
        $date_hold = $holder["date"];
        $productnumber_hold = $holder["productnumber"];
        $description_hold = $holder["description"];
        $customernumber_hold = $holder["customernumber"];
        $saleamount_hold = $holder["saleamount"];
        $email_hold = $holder["email"];

        $info_holder = array($ID_hold,$transactionnum_hold,$date_hold,$productnumber_hold,$description_hold,$customernumber_hold,$saleamount_hold,$email_hold);

        return $info_holder;
    }

    public function displayall()
    {
        $servername = "localhost";
        $user = "id16814382_root";
        $pass = "6r!TYM8NT(BA7Ep";
        $dbname = "id16814382_peopleshealthpharmacy";

        $tablename = "SALESRECORD";


        $conn = mysqli_connect($servername,$user,$pass,$dbname);

        $sql = "SELECT * FROM $tablename;";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            return false;
        }

        $x = 0;
        if(mysqli_num_rows($result) > 0)
        {
            while($holder = mysqli_fetch_assoc($result))
            {
                $ID_hold[$x] = $holder["idSALESRECORD"];
                $transactionnum_hold[$x] = $holder["transactionnum"];
                $date_hold[$x] = $holder["date"];
                $productnumber_hold[$x] = $holder["productnumber"];
                $description_hold[$x] = $holder["description"];
                $customernumber_hold[$x] = $holder["customernumber"];
                $saleamount_hold[$x] = $holder["saleamount"];
                $email_hold[$x] = $holder["email"];

                $x++;
            }
        }
        else
        {
            return false;
        }

        $info_holder = array($ID_hold,$transactionnum_hold,$date_hold,$productnumber_hold,$description_hold,$customernumber_hold,$saleamount_hold,$email_hold);

        return $info_holder;
    }

    public function addrecord()
    {
        $servername = "localhost";
        $user = "id16814382_root";
        $pass = "6r!TYM8NT(BA7Ep";
        $dbname = "id16814382_peopleshealthpharmacy";

        $tablename = "SALESRECORD";


        $conn = mysqli_connect($servername,$user,$pass,$dbname);


        $transactionnum_temp = $this->get_transactionnum();
        $date_temp = $this->get_date();
        $productnumber_temp = $this->get_productnumber();
        $description_temp = $this->get_description();
        $customernumber_temp = $this->get_customernumber();
        $saleamount_temp = $this->get_saleamount();
        $email_temp = $this->get_email();


        $sql = "INSERT INTO $tablename (`transactionnum`, `date`, `productnumber`, `description`, `customernumber`, `saleamount`, `email`) VALUES ('$transactionnum_temp', '$date_temp', '$productnumber_temp', '$description_temp', '$customernumber_temp', '$saleamount_temp', '$email_temp');";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            return false;
        }

        return true;
    }

    public function deleterecord($idSALESRECORD)
    {
        $servername = "localhost";
        $user = "id16814382_root";
        $pass = "6r!TYM8NT(BA7Ep";
        $dbname = "id16814382_peopleshealthpharmacy";

        $tablename = "SALESRECORD";


        $conn = mysqli_connect($servername,$user,$pass,$dbname);

        $sql = "DELETE FROM $tablename WHERE idSALESRECORD='$idSALESRECORD';";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            return false;
        }
        return true;
    }

    public function updaterecord($idSALESRECORD)
    {
        $servername = "localhost";
        $user = "id16814382_root";
        $pass = "6r!TYM8NT(BA7Ep";
        $dbname = "id16814382_peopleshealthpharmacy";

        $tablename = "SALESRECORD";


        $conn = mysqli_connect($servername,$user,$pass,$dbname);

        $transactionnum_temp = $this->get_transactionnum();
        $date_temp = $this->get_date();
        $productnumber_temp = $this->get_productnumber();
        $description_temp = $this->get_description();
        $customernumber_temp = $this->get_customernumber();
        $saleamount_temp = $this->get_saleamount();
        $email_temp = $this->get_email();

        $sql = "UPDATE $tablename SET transactionnum='$transactionnum_temp', date='$date_temp', productnumber='$productnumber_temp', description='$description_temp', customernumber='$customernumber_temp', saleamount='$saleamount_temp', email='$email_temp' WHERE idSALESRECORD='$idSALESRECORD';";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            return false;
        }

        return true;
    }

    public function sortbymonth($month)
    {
        $info_holder = $this->displayall();

        $ID_array = $info_holder[0];
        $transnum_array = $info_holder[1];
        $date_array = $info_holder[2];
        $productnumber_array = $info_holder[3];
        $description_array = $info_holder[4];
        $customernumber_array = $info_holder[5];
        $saleamount_array = $info_holder[6];
        $email_array = $info_holder[7];

        $x = 0;
        $y = 0;
        foreach($ID_array as $value)
        {
            if($this->datespliter($date_array[$x]) == $month)
            {
            $ID_array_sorted[$y] = $ID_array[$x];
            $transnum_array_sorted[$y] =  $transnum_array[$x];
            $date_array_sorted[$y] = $date_array[$x];
            $productnumber_array_sorted[$y] = $productnumber_array[$x];
            $description_array_sorted[$y] = $description_array[$x];
            $customernumber_array_sorted[$y] = $customernumber_array[$x];
            $saleamount_array_sorted[$y] = $saleamount_array[$x];
            $email_array_sorted[$y] = $email_array[$x];
            $y++;
            }

            $x++;
        }

        $recordarray = array($ID_array_sorted,$transnum_array_sorted,$date_array_sorted,$productnumber_array_sorted,$description_array_sorted,$customernumber_array_sorted,$saleamount_array_sorted,$email_array_sorted);
        return $recordarray;
    }

    public function datespliter($date)
    {
        $str = $date;

        $arr2 = str_split($str, 5);
        $arr3 = str_split($arr2[1], 2);

        return $arr3[0];
    }
}

?>