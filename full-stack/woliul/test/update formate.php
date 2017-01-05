<?php
session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: dsave.php");
}
include_once 'dbconnect.php';
if (isset($_POST['btn-signup']))
{

#Variable names
$cmd = "SELECT * FROM appt";
$query = mysql_query($cmd);
$count = mysql_num_rows($query);
$dname = mysql_real_escape_string($_POST['dname']);
$uname = mysql_real_escape_string($_POST['pname']);
$sday = mysql_real_escape_string($_POST['sday']);
$time = mysql_real_escape_string($_POST['stime']);

#Function For Prevent Duplicate Entry

$result = mysql_query("SELECT * FROM appt");

echo " cfg $count";
    $j=0;$k=0;


        while($row = mysql_fetch_array($result))

      {

        $ad[$k]=$row['atime']; #Diclare an Array input
        $add[$k]=$row['adoctor'];
        $k++;
      }
      for($j=0;$j<=$k;)
      {
        if($ad[$j]==$time && $add[$j]==$dname) #Conditional for Checking Similer Input
         {
           ?>
             <script>alert('Slot was not Empty');</script>
           <?php

            $j=$k+1;
         }
         else
         {
           $inp="INSERT INTO `hospital`.`appt` (`adoctor`,`apatient`,`adate`,`atime`) VALUES('$dname','$uname','$sday','$time')";
           $ins=mysql_query($inp);
             ?>
               <script>alert('Successfully Apointed ');</script>
             <?php

             $j=$k+1;

         }
      }
}

    #Array output



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <meta name="spm" content="Hosita Management System">
  <title>Appointment for Doctor</title>
</head>
<body>
<table align=center width=750 cellspacing=0 cellpadding=5>
  <tr bgcolor=blue>
    <td align=center>
      <font SIZE=6 color=white>HOSPITAL MANAGEMENT SYSTEM</font>
    </td>
  </tr>

  <td>
    <table align=center width=750 cellspacing=0 cellpadding=5>
      <tr>
        <td align=center>
          <a href="index.php">Doctors</a>
        </td>
        <td align=center>
          <a href=plist.php>Patients</a>
        </td>
        <td align=center>
          <a href=alist.php>Appointments</a>
        </td>
      </tr>
    </table>
  </td>
<tr bgcolor=red>
  <td >
    <font size=4 color=white>New Doctor</font>
  </td>
</tr>
<form method=post >
<tr>
  <td>
    <table width=750 cellspacing=0 cellpadding=5>
      <tr>
        <td>Make an Appointment</td>

<!-- Doctor Info-->

        <td>
          <td>Doctor Name
            <select name="dname" required="">
              <option></option>
              <?php
                $query=mysql_query("select * from doct")or die(mysql_error());
                while($row=mysql_fetch_array($query))
                {
                  ?>
                  <option value="<?php echo $row['dname']?>">
                    <?php echo $row['dname']?>
                  </option>
                  <?php
                }
              ?>
            </select>
          </td>
        </td>

<!-- Patient Info-->

        <td>
          <td>Patient Name
            <select name="pname" required="">
              <option></option>
                <?php
                  $query=mysql_query("select * from patient")or die(mysql_error());
                    while($row=mysql_fetch_array($query))
                    {
                      ?>
                      <option value="<?php echo $row['pname']?>">
                        <?php
                        echo $row['pname']?>
                      </option>
                      <?php
                    }
                ?>
            </select>
          </td>
        </td>

<!-- Doctor Name Info-->

        <td>
          <td>Day
            <select name="sday" required="">
              <option></option>
                <?php
                  $query=mysql_query("select * from slot")or die(mysql_error());
                  while($row=mysql_fetch_array($query))
                    {
                      ?>
                      <option value="<?php echo $row['sday']?>">
                        <?php echo $row['sday']?>
                      </option>
                      <?php
                    }
                ?>
            </select>
          </td>
        </td>

<!-- Time Info-->

        <td>
          <td>Time
            <select name="stime" required="">
              <option></option>
              <?php
              $query=mysql_query("select * from slot")or die(mysql_error());
              while($row=mysql_fetch_array($query))
              {
                ?>
                <option value="<?php echo $row['stime']?>">
                  <?php echo $row['stime']?>
                </option>
                <?php
              }
              ?>
            </select>
          </td>
        </td>
<!-- **********************************-->
      </table>
    </td>
  </tr>
</tr>

<!-- Signup Post -->

<tr>
  <td align=center>
    <button type="submit" name="btn-signup">
      Sign Me Up
    </button>
  </td>
</tr>

</form>
</table>
</body>
</html>
