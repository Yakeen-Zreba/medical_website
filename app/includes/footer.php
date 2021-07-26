
<section id="footer">
            
    <div class="footer-content">
        <div class="footer-section about">
            <div class="footer-logo">
                <img src="subfolders/image/logo.png" alt="">
                <h1 class="footer-logo-text">Take<span>C</span>are</h1>
            </div>
            <p class="about-parg">
                Bring your stories to life with accurate and unique healthcare data that grabs a reader's attention. Tap our team of experts to help fill in the blanks on pressing issues and trends in healthcare that make your stories stand out.
            </p>
            <div class="contact">
                <span><i class="fas fa-phone"> &nbsp; 092-1234567</i></span>
                <span><i class="fas fa-envelope"> &nbsp; info@yakenzr.com</i></span>
            </div>
            
            <div class="socials">
                
                <div class="social-button">
                    <div class="social-icon">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </div>
                    <span>Facebook</span>
                </div>

                <div class="social-button">
                    <div class="social-icon">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                    <span>Instagram</span>
                </div>

                <div class="social-button">
                    <div class="social-icon">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                    <span>Twitter</span>
                </div>

                <div class="social-button">
                    <div class="social-icon">
                        <a href="#"><i class="fab fa-dribbble"></i></a>
                    </div>
                    <span>Dribbble</span>
                </div>
        </div>
        
     </div>

        <div class="footer-section contact-form">
            <h2>Contact Us</h2>
            <br>
            <p id="demo"></p>
            
            <form name="comments" class="contact-f" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onsubmit="return check_comment(this)">
                <input type="text" name="email" class="text-input contact-input" placeholder="You email address...">
                <textarea rows="1" name="subject"  class="text-input contact-input" placeholder="The Supject..."></textarea>
                <textarea rows="3" name="comment"  class="text-input contact-input" placeholder="Your message..."></textarea>
                <button type="submit" id="send_comment" name="send_comment" class="btn btn-big contact-btn"><i class="fas fa-paper-plane"></i> &nbsp; Send</button>
            </form>
        </div>
    </div>
    
    <div class="footer-bottom">
        Copyright &copy; designed by <span>Yaken Zreba</span>
    </div>

</section>
        <?php

 if(isset($_POST['send_comment']))
{
    userOnly(); 
    unset($_POST['send_comment']);
    $commentID = create('comment',$_POST);
     ?>
    <script>
      alert(" Thanks For your Comment :) ");
    </script>
    
    <?php 
    exit();
} 
?>


        <script>
           function check_comment(form)
           {
            var em = document.comments.email.value;
            var c_text = document.comments.comment.value;
            var foundAt = false ;
            var foundDot = false ;
            var atPosition = -1 ;
            var dotPosition = -1 ;

            if(em=="")
            {
                document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;please must write the Email."; 
                document.getElementById("demo").style.color = "red";
                document.getElementById("demo").style.fontSize = "20px";
                document.getElementById("demo").style.textAlign = "center";

                return false ;
            }
            else
            {
                for (var i = 0; i <= em.length; i++) 
                { 
                    if (em.charAt(i) == "@") 
                    { 
                        foundAt = true; 
                        atPosition = i ;
                    } 
                        else if (em.charAt(i) == ".") 
                        { 
                            foundDot = true; 
                            dotPosition = i ;
                        } 
                } 
                if ((dotPosition == -1) ||(atPosition == -1) || (atPosition > dotPosition)) 
                { 
                document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;There is Error in Format Of Email"; 
                document.getElementById("demo").style.color = "red";
                document.getElementById("demo").style.fontSize = "20px";
                document.getElementById("demo").style.textAlign = "center";
                return false ;
                } 
            }
            if(c_text=="")
            {
                document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;please must write your Message."; 
                document.getElementById("demo").style.color = "red";
                document.getElementById("demo").style.fontSize = "20px";
                document.getElementById("demo").style.textAlign = "center";

                return false ;
            }
           }
        </script> 