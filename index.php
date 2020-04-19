<?php

	if (isset($_POST['submit'])) {
		extract($_POST);

		$dir='audio/';
    $audio_path=$dir.basename($_FILES['audioFile']['name']);
		if(move_uploaded_file($_FILES['audioFile']['tmp_name'],$audio_path))
    {
        echo "<script>alert('Data upload successful');</script>";
    }
    saveAudio($audio_path, $_POST);
	}

	function saveAudio($filename, $data)
	{
	    $mysqli = new mysqli("localhost","root","","akraman");

		if ($mysqli -> connect_errno)
		{
			echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
			exit();
		}

		try
		{
			extract($data);
			$query="insert into record values('$age', '$gender', '$fever','$lungs','$travel','$contact', '$filename')";

			$result=$mysqli->query($query);

			$mysqli->close();


		}
		catch(exception $e)
		{
			echo $e->getMessage();
		}
	}
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina+2&display=swap" rel="stylesheet">
    <meta charset="utf-8"> </meta>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Index Page</title>
    <style >
      body {
        margin : 0;
        font-family: 'Baloo Bhaina 2', cursive;
      }
      .nav-link {
        color : #b9ba03;
        font-weight: bold;
      }
      .nav-link:hover  {
        color : black;
        transition: 1s;
        color : black;
      }

      #header {
        border-radius: 10px;
        margin-top : 20px;
        background-color: white;
        padding-left: 20px;
      }
      .title {
        font-family: 'Anton', sans-serif;
        font-size: 60px;
        display: inline;
        color : #b40101;
      }
      .tagline {
        display: inline;
        font-size: 15px;
        color : #5f9e0b;
        font-family: 'Russo One', sans-serif;
      }

      #goto-sample {
        display: none;
      }

      .box {
        background-color: #f2e4f1;
        padding : 20px;
      }

      .content {
        align: left;
      }

      @media only screen and (max-width: 530px) {
        .title {
          font-size: 35px;
        }
        .tagline {
          font-size : 13px;
        }
        #goto-sample {
          display: block;
        }
      }

			@media only screen and (max-width: 400px) {
        .box {
					font-size: 10px;
				}
      }

      .navbar{
        border-bottom: 0.2px solid  #808080;
      }

      .jumbotron {
        background-color : #edf1f1;
      }

      .form-header-text {
        font-size: 30px;
        font-family: 'Russo One', sans-serif;
        color : #b40101;
      }

      .form-label {
          font-size: 20px;
          color : red;
      }

      .side-box {
        background-color: #e6ffcd;
        padding: 10px;
      }

      .form-header-caption {
        padding-bottom: 30px;
        margin-bottom: 20px;
      }

      .form-header {
        border-bottom: 0.1px solid  #808080;
        margin-bottom: 10px;
      }
			.data-table {
				width : 80%;
			}

      .form-table {
        margin-left: 10%;
        margin-right: 10%;
        width: 80%;
        padding : 20px;
      }

			.big-box {
				margin-bottom : 50px;
			}

      .form-box {
        margin-bottom: 10px;
        padding-top: 20px;
      }

			.button {
				margin-left: 60%;
			}
    </style>
  </head>
  <body>
      <div id = "inner" class = "container inner">
        <div id = "header" >
          <p class = "title">
            Aakraman
          </p>
          <p class="tagline">
            Let's fight Corona together..!!
          </p>
        </div>



        <!-- Jumbotron  -->
        <div class = "jumbotron" style = "margin-top : 10px">
          <p class="lead"> This contains information about the website </p>
        </div>

        <!--  Form to collect Samples  -->
        <div class="row big-box">

         <div class= "col-lg-6" style="margin-top : 10px">
           <div class = "side-box">
						 <div align = "center" class = "form-header" >
							 <div class = "form-header-text">
								 COVID-19 Statistics
							 </div>
							 <div class = "form-header-caption">
								 Progress on India's fight against Corona
							 </div>
						 </div>

						 <div>
							 <table class = "data-table" align = "center">
								 <th></th>
								 <th>State</th>
								 <th>Infecetd</th>
								 <th>Recovered</th>
								 <th>Deaths</th>
								 <?php
								 		$row = 1;

										if (($handle = fopen("cases.csv", "r")) !== FALSE) {
    									while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
												if($row == 1) {
													$row++;
													continue;
												}
        								$num = count($data);
        									//echo "<p> $num fields in line $row: <br /></p>\n";
        									$row++;
													echo "<tr>";
        									for ($c=0; $c < $num; $c++) {
            								echo "<td>".$data[$c] . "</td>\n";
        									}
													echo "</tr>";
    									}
    									fclose($handle);
										}
								?>
							 </table>
						 </div>


           </div>
         </div>


          <div id = "take-sample" class = "col-lg-6"  style="margin-top : 10px" >
            <div class= "box" >
              <div align = "center" class = "form-header" >
                <div class = "form-header-text">
                  Test Sample
                </div>
                <div class = "form-header-caption">
                  Record the voice sample of coughing
                </div>
              </div>

              <form method = "post"  enctype="multipart/form-data">
								<div class = "row form-box" >
                  <div class = "col-6 form-label " align = "center">
                    Your Age :
                  </div>
                  <div class = "col-6 " align = "center" >
                    <input required  type = "number" class = "form form-control" min ="1" autocomplete="off" name = "age"
										 	style = "width : 80%"		/>
                  </div>
                </div>
                <div class = "row form-box">
                    <div class = "col-6  form-label " align = "center">
                      Your Gender :
                    </div>
                    <div class = "col-3" align = "center">
                        <input required  type="radio" id="male" name="gender" value="male">
                        <label for="male">Male</label>
                      </div>
                      <div class="col-3">
                        <input required  type="radio" id="female" name="gender" value="female">
                        <label for="female">Female</label>
                    </div>

                </div>

								<div class = "row form-box">
                    <div class = "col-6 form-label " align = "center">
                      Do you have fever ?
                    </div>
                    <div class = "col-3" align = "center">
                        <input required  type="radio" id="fever_yes" name="fever" value="yes"/>
                        <label for="fever_yes">Yes</label>
                      </div>
                      <div class="col-3">
                        <input required  type="radio" id="fever_no" name="fever" value="no"/>
                        <label for="fever_no">No</label>
                    </div>

                </div>

                <div class = "row form-box">
                    <div class = "col-6 form-label " align = "center">
                      Do you have any lung infection ?
                    </div>
                    <div class = "col-3" align = "center">
                        <input required  type="radio" id="lungs_yes" name="lungs" value="yes"/>
                        <label for="lungs_yes">Yes</label>
                      </div>
                      <div class="col-3">
                        <input required  type="radio" id="lungs_no" name="lungs" value="no"/>
                        <label for="lungs_no">No</label>
                    </div>

                </div>

								<div class = "row form-box">
                    <div class = "col-6 form-label " align = "center">
                      Have you recently travelled abroad ?
                    </div>
                    <div class = "col-3" align = "center">
                        <input required  type="radio" id="travel_yes" name="travel" value="yes"/>
                        <label for="travel_yes">Yes</label>
                      </div>
                      <div class="col-3">
                        <input required  type="radio" id="travel_no" name="travel" value="no"/>
                        <label for="travel_no">No</label>
                    </div>

                </div>

                <div class = "row form-box">
                    <div class = "col-6 form-label " align = "center">
                      Have you had direct contact with the corona victim ?
                    </div>
                    <div class = "col-3" align = "center">
                        <input required  type="radio" id="contact_yes" name="contact" value="yes"/>
                        <label for="contact_yes">Yes</label>
                      </div>
                      <div class="col-3">
                        <input required  type="radio" id="contact_no" name="contact" value="no"/>
                        <label for="contact_no">No</label>
                    </div>

                </div>

                <div class = "row form-box" >
                  <div class = "col-6 form-label " align = "center">
                    Please Insert the input file :
                  </div>
                  <div class = "col-6 " align = "center" >
                    <input required  name = "audioFile" type = "file" accept="audio/*" />
                  </div>
                </div>

								<div class = "row form-box button" align = "center">
									<input required class = "btn btn-primary" name = "submit" type = "submit" value = "Conduct test" />
								</div>

             </form>
           </div>
         </div>

      </div>
  </body>
</html>
