<?php
session_start();
$connection = mysqli_connect("localhost", "root", "","iwt");
   //Auth
if(!isset($_SESSION['admin_id'])){
    header("location:loginadmin.php");
}

//Fetch Data
$editq = mysqli_query($connection, "select * from roles ") or 
die(mysqli_error($connection));
$editrow = mysqli_fetch_array($editq);
//print_r($editrow);

if($_POST){
 
    $role_name = $_POST['role_name'];
    $q = mysqli_query($connection, "insert into roles(role_name)
            values('{$role_name}')") or 
    die(mysqli_error($connection));
    if($q){
        echo "<script>alert('Record Updated');window.location='roles.php';</script>";
    }
}
?>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- comment -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=G5JCqywK_QCHpuKgVAcxnGTh7NrGa8SSURFAvVmBFYT0MiZ10XKNov3z4LkEz0s9BpOr2ZAFRhhevqV0RtQQ_PRgU0IzX62F1Sx0PM1M15NSmm4snRfsU7BAGtt4xwSX3eOqTniTplaKdg-XVITfnHyoI4yYSIn140FcxLB-soHNTMT5dT58F97XzAEASG3BWYZCNwSSZGNB2EMPATfzUoS-zfeovEBBD5vPs7G9ARAg52rYgN3PgO3-6v_4NmmiAmWkNhADsBQBtRR30aFSEZYVR0_PwPhapoQPDMEYnkI8hqzKVxClIDbrKmDezwErxKlnRGLd5LDnfbtaoGrqIZ8rWsyNwOLoENzPcj_IqPq-32Qd2BKD51gW6kZ_EjwHHQLCMiRlHs2jHzcZt0IYhLMqaZrm48W_gjQKPn946N0ShGMCFpJfkRSLlXfVDG1dbZolDyEV_UenUF2nZFqZqH5ZWRC8mAZZZkO_uwo9uKBqD6AntrbMXm7vczEfRpdabNeYrT-FUYiKMITYTVaj9cDu3vIU_L2IA_zLqMFh5qJGTmTGsWWaBQHOEGQhGnP37nS40RXnzuhLhnygjM_lKHKZ0w71SORdo_BCKTsd9kzVFuqcauElYEZyMm2tYUSZirNq5kcztEYnHNHT2vQWcFnXTA3RwmTSzzUF6kwt-GLx7eyKajkF0xJhGlh3kspX0crjuNJLEXal9NgFa2dvZx0xvPCsoC7Cw6YvpwTH4m6gnWYcA4hxO96Bpg500R1xPSE215dWQp1habdmPgMUpjRlztv_nFd_a_q_srUBSONwtpNiFpOTCjWgaM5hOheHXepGjC-B1NjHt-8sgukwn-V_6CWnfRhvGWsOVQQhzjwgdTAEZzhiF9m8ab9KbqL9NE6SIV35gpzJEEbl3HL14a2UX1yoqXWZ4P2qlxgUU3yqqWGe5BKeOvtTng4QeEykgwPkENtNi1gC_2nzTx8ec6A8ZmeG7DMt5rpWA8ojm45tU0ye-rZ3VJnEdX0nKb_xpYI_C7alg458zaAjVRZX5MdnMf2eSSBJ4YoJOUA3QT1RwMHfidxeV9OW9Qm5GbKUTImiowbW7BR0VPGokwIXm610C4wiYCfgyulfLO4GElPZKe3eLRd_E1WEyOurb8BwirKd117Am-ppjKC4w-kfvjpCDgZ85wLz57ND4AKrBgRN0cmGbPc01aYskoXIgi8fAxWNAurdpLK64mGPLXWRbQ" nonce="3474261ca1b17576021a513046c9aa12" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="https://gc.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cHM6Ly9tYWlsLWF0dGFjaG1lbnQuZ29vZ2xldXNlcmNvbnRlbnQuY29tL2F0dGFjaG1lbnQvdS8wLz91aT0yJmlrPTk0YWY3ODcwNjEmYXR0aWQ9MC4yJnBlcm1tc2dpZD1tc2ctZjoxNzEyODkyNDgzODQ2NjIzMjkyJnRoPTE3YzU2YWEzODYxZDUwM2Mmdmlldz1hdHQmZGlzcD1zYWZlJnJlYWxhdHRpZD1mX2t1ZnNnbnJvMSZzYWRkYmF0PUFOR2pkSl80STlSV2VIVUxSV1EwZmJ3YVZyZDBVaFRiY2taLXlSTGUxRlltQmxudnJLWXoyUE9rbTY4TXFxSXBGSW5pVHZsNTNmckhVdnhXRDJnTGozMFJGRWpGQ2FQMVFjZjYzWWw2NlAyc3V5ZnlacVZ0OVJPMk4yakxzRjh1RGI0WVBfQVU0NmJSQmZCNHB5YnRlaElTanVZbVQ0QXV1blRHZG9TNEM5anEyWHVxaFctdjEzTDU1RnpwYmlaRDRNWDl3ek5oMm1kVjlKSTJXNE16WUpCdS13ay0waW9CemkzMUxMODM5am5CR1FHeE5rRFRMaE9CQ1poWHNlRjNKWml4M25mWGhjc1FjaFV3cjJOa2RpMmNFZkNHRjBzMnpCbFBBWGZkZGUxdmJpVWlDT3YxeWNyYjZnTm4yNUgxRzk5S04zTC1DM1lVckpDNUs4OGl4V0M2ZU00WkI2NjQtZ09RSkFZMlVuU282bFFzcmZpT3NDTHVxYVdFRWxfRVFwTjNtd2E2SjJNamNtZUo2WXRxQVZ0WXhMLXRZUGp2LU5UYVpjSUtQZkhHVmoybEgxV05FY05wRDFmUXZScXQ0WmUtUkk1cjJET2tWOTdpd3lYUlQxV1ZkOUd3UHl6cklMVE1iWnB5THZuU0JyWlk0cTZIRG9xdkNCbVdUOFpvd003eGN5d2NpbEV2UzA0SEJzYTBDdzQxQmlxRDluUTlPSDhKZHNWdkVCVDNoWWhjbDVUYVdlanFTT2M0REFJeEZreERlemFPeXBDdUZfeFV5cGdxV1dWVm5MQmhTcGhpb2dEajM5c3Y2UXd6WkNqbFdqVm1QaWxneE1fejR6T1lMa0pDVVhEc2NRVzdET3BGUXVCTkMzb0lzbkRmVmdoZXNoY29WWXJKRUZhNVNfbnU2a2N5T3pVd1V0bk1CZkE"/><style>
            * {
    margin: 0;
    padding: 0
}

body {
        background: #f4f4f4 url("wave.png");
}

.card {
    width: 450px;
    background-color: #f4f4f4;
    border-radius: 10%;
    cursor: pointer;
    transition: all 0.5s;
    height: fit-content;
}

.image img {
    transition: all 0.5s
}

.card:hover .image img {
    transform: scale(1.5)
}

.btn {
    height: 200px;
    width: 200px;
    border-radius: 50%;
}

.name {
    font-size: 48px;
    font-weight: bold
}

.idd {
    font-size: 32px;
    font-weight: 600
}

.idd1 {
    font-size: 20px
}

.number {   
    font-size: 24px;
    font-weight: bold
}

.follow {
    font-size: 12px;
    font-weight: 500;
    color: #444444
}

.btn1 {
    height: 60px;
    border-radius: 5%;
    background-color: #000;
    color: #aeaeae;
    font-size: 22px;
    padding: 5px 5px 5px 5px;
}

.text span {
    font-size: 13px;
    color: #545454;
    font-weight: 500
}

.icons i {
    font-size: 19px
}

hr .new1 {
    border: 1px solid
}

.join {
    font-size: 14px;
    color: #a0a0a0;
    font-weight: bold
}

.date {
    background-color: #ccc
}
a{
    color: white;
}

.cta {
    background-color:#02d5fa;
    padding: 1em;
    color: #000;
    font-weight: bold;
    margin-right: 5em;
    display: inline-block;
    border-radius: 5px;
    text-decoration: none;
    box-shadow: 0 0 0 0 rgba(7, 7, 7, 0.2);
}

.cta{
  -webkit-animation: pulse 1.25s infinite cubic-bezier(0.50, 0, 0, 1);
  -moz-animation: pulse 1.25s infinite cubic-bezier(0.50, 0, 0, 1);
  -ms-animation: pulse 1.25s infinite cubic-bezier(0.50, 0, 0, 1);
  animation: pulse 1.25s infinite cubic-bezier(0.50, 0, 0, 1);
}
input{
    border-radius: 10px; 
}

.logout{
    margin-right: 0%;
    margin-left: 80%;
}
        </style>

        <script>

        </script>
    </head>

    <body>
        


        
        
        
        
        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
            <div class="card p-4">
                <form method="post">
                <div class=" image d-flex flex-column justify-content-center align-items-center"> 
                    <div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span class="idd1">&nbsp;&nbsp;Role Name:<input type="varchar" value="" name="role_name"/></div><br/>
                   

                    <input type="submit" value="Edit" class="btn1 btn-dark">
                    <a href="roles.php" style="color: black; font-size: 20"> Cancel </a>
                    <!--<div class="text mt-3"> <span>Eleanor Pena is a creator of minimalistic x bold graphics and digital artwork.<br><br> Artist/ Creative Director by Day #NFT minting@ with FND night. </span> </div>
                    <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> <span><i class="fa fa-twitter"></i></span> <span><i class="fa fa-facebook-f"></i></span> <span><i class="fa fa-instagram"></i></span> <span><i class="fa fa-linkedin"></i></span> </div>
                    <div class=" px-2 rounded mt-4 date "> <span class="join">Joined May,2021</span> </div>-->
                </div>
            </div>
                </form>
        </div>
        
       
    </body>
    
    <!DOCTYPE html>
<html lang="en">


</html>


