<?php
@session_start();
if(isset($_REQUEST['q']))
{
    $suggestion=trim($_REQUEST['q']);
    $array=[];
    if($suggestion!="" )
    {
        $query="SELECT * FROM suggestion where location like '$suggestion%' ORDER BY location DESC";
        $connect = mysqli_connect('localhost', 'root', '', 'suggestion');
        if($result=$connect->query($query))
        {
            if($result->num_rows>0)
            {
                while($row=$result->fetch_assoc())
                {
                    $array=array_merge($array,[$row['location']]);
                }
                echo json_encode($array);
            }
            else
            {
                echo json_encode(["Not Found"]);
            }

        }
        else
        {
            echo json_encode(["Query Failed"]);
        }
    }
    else
    {
        echo json_encode([]);
    }
}
?>