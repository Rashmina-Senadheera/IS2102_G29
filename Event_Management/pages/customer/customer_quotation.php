<?php 
session_start();
include('customer_sidenav.php');
include('customer_header.php');
include('header.php');
include('../controllers/commonFunctions.php');



?>
<main>

<div class="quotation">
    <h3>Customer Quotation</h3>
    <form class="quote_form" action="" method="POST">
        
        <h4>GENERAL</h4>
        <div class="general">
            <!-- <div class="error_txt fields_error">All fields are required</div> -->
            <div class="flex-row">
                <div class="input_box">
                    <label class="label flex-row">Event Type<div class="error">&nbsp;*</div></label>
                    <select name="event-type" id="event-type" required>
                        <option> </option>
                        <option value="Birthday">Birthday</option>
                        <option value="Wedding">Wedding</option>
                        <option value="Anniversary">Anniversary</option>
                        <option value="Gender Reveal">Gender Reveal</option>
                        <option value="Corporate Event">Corporate Event</option>
                        <option value="Conference">Conference</option>
                        <option value="Exhibition">Exhibition</option>
                        <option value="Other">Other</option>   
                    </select>
                    <div class="error_txt event_type_error">Event Type is Required</div>
                </div>

                <div class="input_box">
                    <label class="label flex-row">Number of Participants<div class="error">&nbsp;*</div></label>
                    <input type="number" name="no-pax" required>
                    <div class="error_txt no_pax_error">Number of participants is required</div>
                </div>
            </div>
            <div class="input_box">
                <label class="label flex-row">Theme <div class="error">&nbsp;*</div></label>
                <input type="text" name="theme" required>
                <div class="error_txt theme_error">Theme is Required</div>
            </div>
            <div class="flex-row">
                <div class="input_box">
                    <label class="label flex-row">Tentative Date<div class="error_txt">&nbsp;*</div></label>
                    
                    
                    <div class="date">
                        <label>From</label>
                        <input type="date" name="from-date" required>
                        <label>To</label>
                        <input type="date" name="to-date" required>
                    </div>
                    <div class="error_txt date_error">Date is Required</div>
                    <div class="error_txt from_date_error">Invalid From Date</div>
                    <div class="error_txt to_date_error">Invalid To Date</div>
                </div>

                

                <div class="input_box">
                    <label class="label flex-row">Budget<div class="error">&nbsp;*</div></label>
                    <div class="budget">
                        <label>Min</label>
                        <input type="number" name="min-budget" required>
                        <label>Max</label>
                        <input type="number" name="max-budget" required>
                    </div>
                    <div class="error_txt budget_error">Budget is Required</div>
                    <div class="error_txt min_budget_error">Min budget must be less than Max budget</div>
                </div>
            </div>

            <div class="input_box">
                <label class="label flex-row">Time<div class="error">&nbsp;*</div></label>
                
                
                <div class="time">
                    <label>From</label>
                    <input type="time" name="from-time" required>
                    <label>To</label>
                    <input type="time" name="to-time" required>
                </div>
                <div class="error_txt time_error">Time is Required</div>
                
            </div>

            
        </div>
        <h4>EVENT DETAILS</h4>
        <p>Please select the needed services</p>
            <div class="event_details">
                <div class="venue">
                    <div class="flex-row-sb v">
                        <label class="label">Venue</label>
                        <div class="radio-btns">
                            <input type="radio" id="venue_needed" name="venue" class="venue_needed" value="Venue_Needed" >
                            <label onclick="venue_check(0)" for="venue_needed" >Needed</label>
                            <input type="radio" id="venue_not_needed" name="venue" class="venue_not_needed" value="Venue_Not_Needed">
                            <label onclick="venue_check(1)" for="venue_not_needed" >Not Needed</label>
                        </div>
                    </div>
                    <div class="error_txt venue_error">Please indicate the needed and not needed services</div>
                
                    <div class="input_box">
                        <div class="venue_details">
                            <div class="venue-radiobtns">
                                <input type="radio" id="indoor" name="venue_type" value="indoor" >
                                <label onclick="showVenue(0)" for="indoor" class="indoor">Indoor</label>
                                <input type="radio" id="outdoor" name="venue_type" value="outdoor" >
                                <label onclick="showVenue(1)" for="outdoor" class="outdoor">Outdoor</label>
                            </div>
                            <div class="venue_img">
                                <div class="img flex-column">
                                    <div class="flex-row-sb">
                                        <input type="radio" value="auditorium" name="indoor" id="auditorium" >
                                        <label for="auditorium" class="flex-column"><img src="../../images/customer_quote/indoor/auditorium.jfif">Auditorium</label>
                                        <input type="radio" value="conference" name="indoor" id="conference" >
                                        <label for="conference" class="flex-column"><img src="../../images/customer_quote/indoor/conference.jpg">Conference Room</label> 
                                        <input type="radio" value="banquet" name="indoor" id="banquet" >
                                        <label for="banquet" class="flex-column"><img src="../../images/customer_quote/indoor/banquet.jpg">Banquet Hall</label>
                                        <input type="radio" value="stadium" name="indoor" id="stadium" >
                                        <label for="stadium" class="flex-column"><img src="../../images/customer_quote/indoor/indoor_stadium.png">Indoor Stadium</label>                                   
                                    </div>
                                    <div class="venue_remarks flex-column">
                                        <label class="label">Remarks</label>
                                        <textarea class="txt_remarks" rows="4" cols="20" placeholder="Any remarks regarding the 'Other' options chosen" name="indoor_remarks"></textarea>
                                        <div class="error_txt indoor_remarks_error">Please select a venue or enter any remarks</div>
                                        <div class="error_txt venue_type_error">Please select a venue type or enter any remarks</div>

                                    </div>
                                </div>

                                <div class="img flex-column">
                                    <div class="flex-row-sb">
                                        <input type="radio" value="ground" name="outdoor" id="ground" >
                                        <label for="ground" class="flex-column"><img src="../../images/customer_quote/outdoor/ground.jpeg">Ground</label>
                                        <input type="radio" value="beach" name="outdoor" id="beach" >
                                        <label for="beach" class="flex-column"><img src="../../images/customer_quote/outdoor/beach.jpg">Open Beach</label> 
                                        <input type="radio" value="beach_tent" name="outdoor" id="beach_tent" >
                                        <label for="beach_tent" class="flex-column"><img src="../../images/customer_quote/outdoor/tented_beach.jpg">Tented Beach</label>
                                        <input type="radio" value="tented" name="outdoor" id="tented" >
                                        <label for="tented" class="flex-column"><img src="../../images/customer_quote/outdoor/tenetd_ground.jpg">Tented Ground</label>                                   
                                    </div>
                                    <div class="venue_remarks flex-column">
                                        <label class="label">Remarks</label>
                                        <textarea class="txt_remarks" rows="4" cols="20" placeholder="Any remarks regarding the 'Other' options chosen" name="outdoor_remarks"></textarea>
                                        <div class="error_txt outdoor_remarks_error">Please select a venue or enter any remarks</div>
                                        <div class="error_txt venue_type_error">Please select a venue type or enter any remarks</div>


                                    </div>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>
                <!-- foods and  beverages -->
                <div class="food_bev">
                    <div class="flex-row-sb f_b">
                        <label class="label">Food & Beverages</label>
                        <div class="radio-btns ">
                            <input type="radio" id="food_bev_needed" name="food" value="food_bev_needed" >
                            <label onclick="food_check(0)" for="food_bev_needed">Needed</label>
                            <input type="radio" id="food_bev_not_needed" name="food" value="food_bev_not_needed">
                            <label onclick="food_check(1)" for="food_bev_not_needed">Not Needed</label>
                        </div>
                    </div>
                    <div class="error_txt food_error">Please indicate the needed and not needed services</div>
                    
                    <div class="food_info">
                        <div class="flex-row">
                            <div class="input_box">
                                <label class="label">Available In</label>
                                <select name="food-availability" id="food-availability">
                                <option> </option>
                                <option value="Buffet">Buffet</option>
                                <option value="Packets">Packets</option>
                                <option value="Other">Other</option>   
                                </select>
                            </div>
                            <div class="input_box">
                                <label class="label">Available At</label>
                                <select name="food-type" id="food-type">
                                <option> </option>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Lunch">Lunch</option>
                                <option value="Dinner">Dinner</option>
                                <option value="Brunch">Brunch</option>
                                <option value="High-Tea">High-Tea</option>
                                <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- <div class="input_box">
                        <label class="label">Preferences</label>
                            <select name="food-type" id="food-type">
                            <option value="Veg">Veg</option>
                            <option value="Non-Veg">Non-Veg</option>
                            <option value="Other">Other</option>
                        </div> -->
                        <div class="input_box">
                            <label class="label">Preferences</label>
                            <select name="food-pref" id="food-pref">
                            <option> </option>
                            <option value="Veg">Veg</option>
                            <option value="Non-Veg">Non-Veg</option>
                            <option value="Non-Veg">Veg & Non-Veg</option>
                            <option value="Other">Other</option>
                            </select>
                        </div>  
                        <div class="f_b_remarks">
                        <label class="label">Remarks</label>
                        <textarea class="txt_remarks" rows="4" name="food_remarks" cols="20" placeholder="Any remarks regarding the 'Other' options chosen"></textarea>
                        <div class="error_txt food_remarks_error">Please enter details or enter any remarks</div>

                        </div>
                    </div>
                </div>
                <!-- sounds and light -->
                <div class="sound_light">
                    <div class="flex-row-sb s_l">
                        <label class="label">Sound & Lighting</label>
                        <div class="radio-btns">
                            <input type="radio" id="s&l_needed" name="s_l" value="s_l_needed">
                            <label onclick="s_l_check(0)" for="s&l_needed">Needed</label>
                            <input type="radio" id="s&l_not_needed" name="s_l" value="s&l_not_needed">
                            <label onclick="s_l_check(1)" for="s&l_not_needed">Not Needed</label>
                        </div> 
                    </div>
                    <div class="error_txt s_l_error">Please indicate the needed and not needed services</div>

                    <div class="s_l_info">
                        <div class="sound">
                            <div class="flex-row-sb">  
                                <label class="label">Sound</label>
                                <div class="radio-btns">
                                        <input type="radio" id="s_needed" name="sound" value="s_needed">
                                        <label onclick="sound_check(0)" for="s_needed">Needed</label>
                                        <input type="radio" id="s_not_needed" name="sound" value="s_not_needed">
                                        <label onclick="sound_check(1)" for="s_not_needed">Not Needed</label>
                                </div>
                            </div>
                            <div class="input_box">
                                <label class="label">Type</label>
                                <select name="sound-type" id="sound-type">
                                <option value="None"></option>
                                <option value="DJ">DJ</option>
                                <option value="Live_Music">Live Music</option>
                                <option value="Band">Band</option>
                                <option value="Other">Other</option>
                            </select>
                            </div>  
                        </div>
                        <div class="light">
                            <div class="flex-row-sb">  
                                <label class="label">Light</label>
                                <div class="radio-btns">
                                        <input type="radio" id="l_needed" name="light" value="l_needed">
                                        <label onclick="light_check(0)" for="l_needed">Needed</label>
                                        <input type="radio" id="l_not_needed" name="light" value="l_not_needed">
                                        <label onclick="light_check(1)" for="l_not_needed">Not Needed</label>
                                </div>
                            </div>
                            <div class="input_box">
                                <label class="label">Type</label>
                                <div class="flex-row-se light_type">
                                    <input type="checkbox" value="LED" name="light_type[]">
                                    <label for="LED">LED</label>
                                    <input type="checkbox" value="Spotlight" name="light_type[]">
                                    <label for="spotlight">Spotlight</label>
                                    <input type="checkbox" value="Laser" name="light_type[]">
                                    <label for="laser">Laser</label>
                                    <input type="checkbox" value="DimLights" name="light_type[]">
                                    <label for="DimLights">Dim&nbsp;Lights</label>
                                    <input type="checkbox" value="Other" name="light_type[]">
                                    <label for="Other">Other</label>
                                </div>
                            </div>  
                        </div>
                        <div class="s_l_remarks">
                        <label class="label">Remarks</label>
                        <textarea class="txt_remarks" rows="4" name="s_l_remarks" cols="20" placeholder="Any remarks regarding the 'Other' options chosen"></textarea>
                        <div class="error_txt s_l_remarks_error">Please select the needed services or enter any remarks</div>
                        </div>
                    </div>

                </div>
                <!-- photography and videography -->
                <div class="photo_video">
                    <div class="flex-row-sb p_v">
                        <label class="label">Photography & Videography</label>
                        <div class="radio-btns">
                            <input type="radio" id="p_v_needed" name="pv" value="p_v_needed">
                            <label onclick="p_v_check(0)" for="p_v_needed">Needed</label>
                            <input type="radio" id="p_v_not_needed" name="pv" value="p_v_not_needed">
                            <label onclick="p_v_check(1)" for="p_v_not_needed">Not Needed</label>
                        </div> 
                    </div>
                    <div class="error_txt p_v_error">Please indicate the needed and not needed services</div>

                    <div class="p_v_info">
                        <div class="photo">
                            <div class="flex-row-sb">  
                                <label class="label">Photography</label>
                                <div class="radio-btns">
                                        <input type="radio" id="photo_needed" name="photo" value="photo_needed">
                                        <label onclick="photo_check(0)" for="photo_needed">Needed</label>
                                        <input type="radio" id="photo_not_needed" name="photo" value="photo_not_needed">
                                        <label onclick="photo_check(1)" for="photo_not_needed">Not Needed</label>
                                </div>
                            </div>
                            <div class="input_box">
                                <label class="label">Preferences</label>
                                <input type="text" name="photo_pref">
                            </div>  
                        </div>
                        <div class="video">
                            <div class="flex-row-sb">  
                                <label class="label">Videography</label>
                                <div class="radio-btns">
                                        <input type="radio" id="video_needed" name="video" value="video_needed">
                                        <label onclick="video_check(0)" for="video_needed">Needed</label>
                                        <input type="radio" id="video_not_needed" name="video" value="video_not_needed">
                                        <label onclick="video_check(1)" for="video_not_needed">Not Needed</label>
                                </div>
                            </div>
                            <div class="input_box">
                                <label class="label">Preferences</label>
                                <input type="text" name="video_pref">
                            </div> 
                        </div>
                        <div class="s_l_remarks">
                        <label class="label">Remarks</label>
                        <textarea class="txt_remarks" rows="4" name="p_v_remarks" cols="20" placeholder="Any remarks regarding the 'Other' options chosen"></textarea>
                        <div class="error_txt p_v_remarks_error">Please select the needed services or enter any remarks</div>


                        </div>
                    </div>
                </div>
                <div class="remarks">
                <label class="label">Remarks</label>
                <textarea class="txt_remarks" rows="4" cols="20" placeholder="Additional remarks" name="additional_remarks"></textarea>
                </div>
            </div>
            
        <div class="submit-btn">
        <input type="submit" value="Submit" class="btn-submit">
        </div>


    </form>
</div>
<script src="../../js/customer_quotation.js"></script>
</main>
