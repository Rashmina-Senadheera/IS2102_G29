<?php
session_start();
include('customer_sidenav.php');
include('customer_header.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../css/Custcss2.css">
</head>

<body>
 <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
                <div class="page-title"> Quotation Request </div>
                <div class="input-container">  
                </div>      
            </div>
        </div>
        <!--<div class="gridMain">-->
        <div class="other">
                <div class="info">
                    <div class="personal-info">
              <label class="control-label col-sm-4" for="email">Event Date:</label>
              <div class="col-sm-12">
                 <input type="date">
                    
              </div>
              <br>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Event type</label>
              <div class="col-sm-10">
                  <select name="cars" id="cars" class="form-control">
                      <option value="5">Select the event type</option>
                      <option value="6">Morning</option>
                      <option value="7">Evening</option>
                      <option value="8">Night</option>
                    </select>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Venue Type</label>
              <div class="col-sm-10">
                  <select name="cars" id="cars" class="form-control">
                      <option value="0">Select the venue type</option>
                      <option value="1">Out Door (A)</option>
                      <option value="2">Out Door(B)</option>
                      <option value="3">In Door(A)</option>
                      <option value="4">In Door(B)</option>
                    </select>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class="control-label col-sm-6" for="pwd">Number of participants</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="pwd" placeholder="Number of Tickets">
              </div>
            </div>
            <br>
            <div class="form-group">
                <label class="control-label col-sm-6" for="pwd">Time</label>
                <div class="col-sm-10">
                  <input type="time" class="form-control" id="pwd" placeholder="Number of Tickets">
                </div>
              </div>
              <br>
              <div class="form-group">
                <label class="control-label col-sm-4" for="email">Catering Type</label>
                <div class="col-sm-10">
                    <select name="cars" id="catering" class="form-control">
                        <option value="0">Select the catering type</option>
                        <option value="9">Buffet</option>
                        <option value="8">Set Meals</option>  
                    </select>      
                </div>
              </div>
              <br>   
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10">
             <br>
                <div>
                  <button type="submit" class="srcButton">Submit</button>
                </div><br > 
                </div>
            </div>
          </form>
        </div>
    </div>
</body>
</html>