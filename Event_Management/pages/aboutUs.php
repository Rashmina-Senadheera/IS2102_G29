<?php 
include('constants.php');
if(isset($_SESSION['user_id'])){
    include('reg_header.php');
}
else{
    include('unreg_header.php');
}

?>

<body>
    <main  class="contact-main flex-column-center font-poppins">
    <h2>About Us</h2>
    <div class="about">
        <div class="about-image">
            <img src="../images/event-about.jpg" alt="">
            <img src="../images/event-about2.jpg" alt="">
            <img src="../images/event-about3.jpg" alt="">
            <img src="../images/event-about4.jpg" alt="">
        </div>
    </div>
    
        <div class="about-descrip">
            <p>
                Lassana Events was established with the aim of making any dream occasion possible; a reality that exceeds expectations.

A subsidiary of Lassana Flora founded by Dr. Lasantha Malavige (MBBS, DIPM, PhD) in 1998, today Lassana Events caters to a spectrum of occasions, servicing clients through our branches based in Colombo 07, Nawala, Negambo, Panadura and Kandy and Jaffna

From intimate parties to large scale gatherings, inclusive of local and international conferences and weddings – no event large or small is beyond the scope of our dedicated team of Event Managers who ensure that every little detail is taken care of, as our focus has always been ensuring the highest of quality, safety and reliability.

From the moment the initial briefings are carried out, you can simply sit back relax and count on our experienced and dedicated team of Event Planners to create a stress free and tailor made event. Our team will take you through each aspect leading to the event, from deciding on venues and themes to other useful information to provide you with a comprehensive and customized result that only the best in the island can provide.

Speak to our experienced, committed and enthusiastic team today regarding your upcoming event!
            </p>
        </div>


    </main>
    
</body>
<?php 
    include("footer.php");
?>
</html>