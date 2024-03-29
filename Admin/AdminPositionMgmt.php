<!DOCTYPE html>
<?php 
    include'../database/connect.php';
    session_start();
    if (!(isset($_SESSION['admin_id']) && isset($_SESSION['username']))) {
        header("location:../../DashboardAuthentication/Login UI v2/html/AdminLogin.php");
    }
    if(!$conn){
        echo "<script>alert('Cannot connect to database');
   			window.location.href = '../../index.html';
   			</script>";
    }
    
    if(isset($_SESSION['message']) && isset($_GET['id'])){
        unset($_SESSION['message']);
        unset($_SESSION['msg_typ']);
        header("location:../Admin/candidate.php");
    }
    
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../IMG/buceils-logo.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../CSS/style_AdminCandidMgmt.css.css">
    <link rel="stylesheet" href="../CSS/bootstrap_AdminCandidMgmt.css">
    <link rel="stylesheet" href="../CSS/font-awesome_AdminCandidMgmt.css">

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
    <!-- datatable scripts -->
    <script src="../JS/jQuery.dataTables_CandidMgmt.min.js"></script>
    <script src="../JS/dataTables.bootstrap_CandidMgmt.js"></script>
    <script src="../JS/bootstrap.min_CandidMgmt.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>    
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>   

    <title>BUCEILS Voting System</title>
</head>

<body>
    <nav>
        <input class="nav-toggle1" type="checkbox">
        <div class="aLogo">
            <h2 class="aLogo-txt1"><a href="adminDashboard.html">BUCEILS HS</a></h2>
            <h3 class="aLogo-txt2"><a href="adminDashboard.html">ONLINE VOTING SYSTEM</a></h3>
        </div>
        <label for="btn" class="ADicon"><span class="fa fa-bars"></span></label>
        <input class="nav-toggle2" type="checkbox" id="btn">
        <ul>
            <li>
                <label for="btn-1" class="Ashow">ACCOUNTS</label>
                <a href="#">ACCOUNTS</a>
                <input class="nav-toggle3" type="checkbox" id="btn-1">
                <ul>
                    <li><a href="#">Students</a></li>
                    <li><a href="#">Admin</a></li>
                </ul>
            </li>
            <li>
                <label for="btn-2" class="Ashow">ELECTION</label>
                <a href="#">ELECTION</a>
                <input class="nav-toggle4" type="checkbox" id="btn-2">
                <ul>
                    <li><a href="#">Archive</a></li>
                    <li><a href="#">Vote Status</a></li>
                    <li><a href="#">Vote Result</a>
                        <ul>
                            <li><a href="#">Make Report</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Configuration</a>
                        <ul>
                            <li><a href="#">Scheduler</a></li>
                            <li><a href="#">Signatory</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <label for="btn-3" class="Ashow">CANDIDATES</label>
                <a href="#">CANDIDATES</a>
                <input class="nav-toggle5" type="checkbox" id="btn-3">
                <ul>
                    <li><a href="#">Update Info</a></li>
                    <li><a href="#">Positions</a></li>
                </ul>
            </li>
            <li>
                <label for="btn-4" class="Ashow">LOGS</label>
                <a href="#">LOGS</a>
                <input class="nav-toggle6" type="checkbox" id="btn-4">
                <ul>
                    <li><a href="accessLogs-v2.0.html">Access Log</a></li>
                    <li><a href="#">Activity Log</a></li>
                    <li><a href="#">Vote Summary</a></li>
                </ul>
            </li>
            <li><a href="#">MESSAGES</a></li>
            <li>
                <label for="btn-5" class="Ashow">Admin Name</label>
                <a class="user" href="#"><img class="user-profile" src="../IMG/user.png"></a>
                <input class="nav-toggle7" type="checkbox" id="btn-5">
                <ul>
                    <li><a class="username" href="#">Admin Name</a></li>
                    <li class="logout">
                        <span class="fa fa-sign-out"></span><a href="#">LOGOUT</a></span>
                    </li>
                </ul>
            </li>
        </ul>
        <!--end of list-->
    </nav>
   <!-- The sidetable -->
      <div class="Uheader" id="CM_Header">
        <h2>Candidate Information Management</h2>
      </div>
      <div class="btn-toolbar" style="margin-left: 18px;">
          <button type="submit" id="defaultButton" name = "" 
                        class="btn btn-button1 btn-s">Load Default Positions</button>

          </div>
      
<form autocomplete = "off" action = "<?php if(isset($_GET['id'])){$positionId =$_GET['id']; echo "../database/addPosition.php?id=".$positionId;}else{ echo "../database/addPosition.php";}?>" method ="POST">  
<div class ="wrapper">
  <div class = "left">
<div class = "center" id = "CPTable2">
      <div class="col-sm-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Add or Edit Position
          </div>
          <!-- Heirarchy ID Form group-->
          <div class="panel-body">
              <div class="form-group">
              <label for="heirarchy_id">
                Heirarchy ID
              </label>
              <input type="text" 
                     value= "<?php if(isset($_GET['heirarchy'])){ $heirarchyId = $_GET['heirarchy'];echo $heirarchyId;}?>"
                     class="form-control" 
                     placeholder="Heirarchy ID" 
                     id="heirarchy_id" 
                     name ="heirarchy">
                     
            </div>
            <!--Heirarchy ID From group-->
            <div class="form-group">
              <label for="position_name">
                Position Name
              </label>
              <input type="text"
                     value= "<?php if(isset($_GET['name'])){ $positionName = $_GET['name'];echo $positionName;}?>"
                     name ="positionname" 
                     class="form-control"
                     placeholder="Position Name" 
                     id="position_name"
                     >
            </div>
             <div class="form-group">
              <label for="position_description">
                Position Description
              </label>
              <input type="text"
                     value= "<?php if(isset($_GET['description'])){ $descriptionName = $_GET['description'];echo $descriptionName;}?>"
                     class="form-control"
                     placeholder="Position Description" 
                     id="position_description"
                     name = "positiondes">
            </div>
                <button type="submit" id="updateButton" name = "<?php if(isset($_GET['id'])){echo "editbtn";}else{echo "addbtn";}?>" 
                        class="btn btn-button1 btn-s" onclick = "positionDisplay(this)">
                  <?php if(isset($_GET['id'])){echo "Update";}else{echo "+ Add";}?>
                </button>
                
            
          </div>
              </div>
            </div>
          </div>
        </div>
</form>
        <div class = "right">
		<div class = "container">
			<div class = "row">
          <div class = "center" id = CPTable>
            <div class="col-md-12">
		    <div class ="table-responsive table-body">
              <table class= "center" id="datatable" width="100%" cellspacing="0" cellpadding="2px">
              <thead>
                              <tr> 
                                  <th class ="text-center">Heirarchy ID</th>
                                  <th class= "text-center">Position</th>
                                  <th class="padThisCell">Description</th>
                                  <th class = "text-center">Edit</th>
                                  <th class = "text-center">Delete</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                //retrieves data from database
                                
                                $sql = "SELECT * FROM `candidate_position` ORDER BY heirarchy_id";
                                $result = mysqli_query($conn,$sql);
                                $numrows = mysqli_num_rows($result);
                                
                                if($numrows > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<tr><td>".$row['heirarchy_id']."</td><td>".$row['position_name']."</td><td>".$row['position_description']."</td><td><a href=\"../database/updatePosition.php?edit=".$row['position_id']."\"><button type='button' class='btn btn-primary btn-xs'>EDIT</button></td><td><a href=\"../database/deletePosition.php?delete=".$row['position_id']."\"><button type='button' class='btn btn-danger btn-xs'>DELETE</button></td></tr>";
                                    }
                                }else{
                                    echo "<tr><td>no data inside position table.</td></tr>";
                                }
                                
                                
                              ?>
                              </tbody>
                            </table>
                          </div>
		        </div>
		      </div>
	             </div>
                   </div>
                 </div>
                </div>

<!--Start of form panel scripts
<script>
   // Current product being edited
    var editRow = null;
    
    function positionDisplay(ctl) {
    document.getElementById("heirarchy_id").disabled = true; /*Disables Heirarchy ID input field when editing*/
      editRow = $(ctl).parents("tr");
      var cols = editRow.children("td");

      $("#heirarchy_id").val($(cols[0]).text());
      $("#position_name").val($(cols[1]).text());
      $("#position_description").val($(cols[2]).text()); /*Just change to proper database name*/
        
      // Change Update Button Text
      $("#updateButton").text("Update");
    }

    function positionUpdate() {
      if ($("#updateButton").text() == "Update") {
        positionUpdateInTable();
        document.getElementById("heirarchy_id").disabled = false; /*Re-enables position input field after*/
      }                                                           /*so admins can continue adding*/
      else {
        positionAddToTable();
      }

      // Clear form fields
      formClear();

      // Focus to product name field
      $("#position_name").focus();
            $("#position_description").focus();
    }

    // Add product to <table>
    function positionAddToTable() {
      // First check if a <tbody> tag exists, add one if not
      if ($("#datatable tbody").length == 0) {
        $("#datatable").append("<tbody></tbody>");
      }

      // Append product to table
      $("#datatable tbody").append(
        positionBuildTableRow());
    }

    // Update product in <table>
    function positionUpdateInTable() {
      // Add changed product to table
      $(editRow).after(positionBuildTableRow());

      // Remove original product
      $(editRow).remove();

      // Clear form fields
      formClear();

      // Change Update Button Text
      $("#updateButton").text("Add");
    }

    // Build a <table> row of Product data
    function positionBuildTableRow() {
      var ret =
      "<tr>" +
        "<td>" + $("#heirarchy_id").val() + "</td>" + /*Just change to proper database name*/
        "<td>" + $("#position_name").val() + "</td>" +
        "<td class = 'padThisCell'>" + $("#position_description").val() + "</td>" +

        "<td>"  +
          "<button type='button' " +
                  "onclick='positionDisplay(this);' " + /*'positionDisplay is for editing"*/
                  "class='btn btn-primary btn-xs'>" +
                  "EDIT" +
          "</button>" +
          "</td>"+

          "<td>"+
          "<button type='button' " +
                  "onclick='positionDelete(this);' " +
                  "class='btn btn-danger btn-xs'>" +
                   "DELETE"+
                   "</button>"+
                   "</td>" 
      "</tr>"
      return ret;
    }

    // Delete product from <table>
    function positionDelete(ctl) {
      $(ctl).parents("tr").remove();
    }
    //saving data from data table to database
    function saveToDatabase(){
     $(document).ready(function() {
	$('#butsave').on('click', function() {
		var positionname = $('#position_name').val();
		var position_description = $('#position_description').val();
		if(position_name!="" && position_description!=""){
			$.ajax({
				url: "../database/save.php",
				type: "POST",
				data: {
					position_name: position_name,
					position_description: position_description,
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#butsave").removeAttr("disabled");
						$('#fupForm').find('input:text').val('');
						$("#success").show();
						$('#success').html('Data added successfully !');
						alert("Data added successfully !");
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
    }
    // Clear form fields
    function formClear() {
      $("#heirarchy_id").val("");
      $("#position_name").val("");
      $("#position_description").val("");
    }
  </script>
</script>
 <!--script for form panel functionality-->


    <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div>

    <script>
        $('.icon').click(function () {
            $('span').toggleClass("cancel");
        });
	    /**Added this move to edit/add panel function for mobile QoL**/
        $("button").click(function() {
    	$('html,body').animate({
        scrollTop: $(".left").offset().top},
        'slow');
});
    </script>

</body>
</html>
