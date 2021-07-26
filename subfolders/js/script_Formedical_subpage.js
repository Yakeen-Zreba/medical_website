/*Loading */
const loader = document.querySelector('.loader');
const main = document.querySelector('.main');
const loading = document.querySelector('.loading');
function init(){
  setTimeout(()=>{
  loader.style.opacity = 0;
  loader.style.display = 'none';
  
  main.style.display = 'block';
  main.style.opacity = 1;
  loading.style.display = 'none'
  }, 1000);
}
init();

/*Side_Nav_Bar */
var manubutton = document.getElementById("manubutton")
var sidenav = document.getElementById("sidenav")
var menu = document.getElementById("menu")

sidenav.style.right = "-250px"

manubutton.onclick = function(){
    if( sidenav.style.right == "-250px"){
         sidenav.style.right="0";
         menu.src="subfolders/image/close.png";
     }
    else{
         sidenav.style.right="-250px";
         menu.src="subfolders/image/menu.png";
    }
}


/*Nav-Bar */
$(document).ready(function(){
    $('.menu-toggle').on('click',function(){
        $('.nav').toggleClass('showing');
        $('.nav ul').toggleClass('showing');

    });
  });


/*article Side */
    $('.article-wrapper').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow:$('.next'),
        prevArrow:$('.prev'),

        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }

          ]
      });


/*ckeditor 5  create_topic*/

ClassicEditor.create( document.querySelector( '#body' ), {
  toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
  heading: {
      options: [
          { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
          { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
          { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
      ]
  }
} )
.catch( error => {
  console.log( error );
} );

/*checks  */

function r_check(form)
{
  /*register */
  var r_userName = document.register.username.value;
  var r_userEmail = document.register.email.value;
  var r_pass = document.register.password.value;
  var r_passC = document.register.passwordConf.value;

  var foundAt = false ;
  var foundDot = false ;
  var atPosition = -1 ;
  var dotPosition = -1 ;

    if(r_userName=="")
    {
      document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;please must write the name."; 
      document.getElementById("demo").style.color = "red";
      return false ;
    }
    if(r_userEmail=="")
    {
      document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;please must write the Email."; 
      document.getElementById("demo").style.color = "red";
      return false ;
    }
    else{
      for (var i = 0; i <= r_userEmail.length; i++) 
      { 
          if (r_userEmail.charAt(i) == "@") 
          { 
              foundAt = true; 
              atPosition = i ;
          } 
              else if (r_userEmail.charAt(i) == ".") 
              { 
                  foundDot = true; 
                  dotPosition = i ;
              } 
      } 
      if ((dotPosition == -1) ||(atPosition == -1) || (atPosition > dotPosition)) 
      { 
        document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;There is Error in Format Of Email"; 
        document.getElementById("demo").style.color = "red";
        return false ;
      } 
    }

    if(r_pass=="")
    {
      document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;Please enter the password."; 
      document.getElementById("demo").style.color = "red";
      return false ;
    }
    if(r_passC=="")
    {
      document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;Please enter the Password Confirmation."; 
      document.getElementById("demo").style.color = "red";
      return false ;
    }
    if(r_pass!=r_passC){
      document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;the password don't match"; 
      document.getElementById("demo").style.color = "red";
      return false ;
    }
    
} 

function l_check(form){
      /*login */
      var l_userName = document.login.username.value;
      var l_pass = document.login.password.value;
      if(l_userName=="")
      {
        document.getElementById("demoo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;please must write the name."; 
        document.getElementById("demoo").style.color = "red";
        return false ;
      }
      if(l_pass=="")
      {
        document.getElementById("demoo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;Please enter the Passsword."; 
        document.getElementById("demoo").style.color = "red";
        return false ;
      }

}


function t_check(form){
  /*topic */
  var name = document.topic.name.value;
  if(name=="")
      {
        document.getElementById("demoo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;please must write the name."; 
        document.getElementById("demoo").style.color = "red";
        return false ;
      }
}

function a_check(form){
  /*Arricle */
  var title = document.article.title.value;
  var textContent = document.article.textContent.value;
  var topicID = document.article.topicID.value;

  if(title=="")
      {
        document.getElementById("demoo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;please must write the Title."; 
        document.getElementById("demoo").style.color = "red";
        return false ;
      }

  if(textContent==null)
    {
      document.getElementById("demoo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;The content text must be written."; 
      document.getElementById("demoo").style.color = "red";
      return false ;
    }

  if(topicID=="")
    {
      document.getElementById("demoo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;Please Select the topic."; 
      document.getElementById("demoo").style.color = "red";
      return false ;
    }


}

 function u_check(form)
{ 
  /* User */
  var u_userName = document.user.username.value;
  var u_userEmail = document.user.email.value;
  var u_pass = document.user.password.value;
  var u_passC = document.user.passwordConf.value;


  var foundAt = false ;
  var foundDot = false ;
  var atPosition = -1 ;
  var dotPosition = -1 ;

    if(u_userName=="")
    {
      document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;please must write the name."; 
      document.getElementById("demo").style.color = "red";
      return false ;
    }
    if(u_userEmail=="")
    {
      document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;please must write the Email."; 
      document.getElementById("demo").style.color = "red";
      return false ;
    }
    else{
      for (var i = 0; i <= u_userEmail.length; i++) 
      { 
          if (u_userEmail.charAt(i) == "@") 
          { 
              foundAt = true; 
              atPosition = i ;
          } 
              else if (u_userEmail.charAt(i) == ".") 
              { 
                  foundDot = true; 
                  dotPosition = i ;
              } 
      } 
      if ((dotPosition == -1) ||(atPosition == -1) || (atPosition > dotPosition)) 
      { 
        document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;There is Error in Format Of Email"; 
        document.getElementById("demo").style.color = "red";
        return false ;
      } 
    }

    if(u_pass=="")
    {
      document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;Please enter the password."; 
      document.getElementById("demo").style.color = "red";
      return false ;
    }
    if(u_passC=="")
    {
      document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;Please enter the Password Confirmation."; 
      document.getElementById("demo").style.color = "red";
      return false ;
    }
    if(u_pass!=u_passC){
      document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;the password don't match"; 
      document.getElementById("demo").style.color = "red";
      return false ;
    }
} 

function d_check(form){
  /*Doctor */
  var d_name = document.doctor.doctorname.value;
  var d_email = document.doctor.doctoremail.value;
  var d_phone = document.doctor.doctorphone.value;
  var d_location = document.doctor.location.value;
  var d_specialty = document.doctor.specialty.value;
  var d_description = document.doctor.description.value;


  var foundAt = false ;
  var foundDot = false ;
  var atPosition = -1 ;
  var dotPosition = -1 ;

  if(d_name=="")
      {
        document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;please must write the doctor name."; 
        document.getElementById("demo").style.color = "red";
        return false ;
      }

  if(d_email=="")
    {
      document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;Please write the email."; 
      document.getElementById("demo").style.color = "red";
      return false ;
    }
  else
  {
    for (var i = 0; i <= d_email.length; i++) 
    { 
        if (d_email.charAt(i) == "@") 
        { 
            foundAt = true; 
            atPosition = i ;
        } 
            else if (d_email.charAt(i) == ".") 
            { 
                foundDot = true; 
                dotPosition = i ;
            } 
    } 
    if ((dotPosition == -1) ||(atPosition == -1) || (atPosition > dotPosition)) 
    { 
      document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;There is Error in Format Of Email"; 
      document.getElementById("demo").style.color = "red";
      return false ;
    } 
  }
  if(d_phone=="")
  {
    document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;please must write the Phone."; 
    document.getElementById("demo").style.color = "red";
    return false ;
  }
  if(d_location=="")
  {
    document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;please must write the Locations."; 
    document.getElementById("demo").style.color = "red";
    return false ;
  }
  if(d_specialty=="")
  {
    document.getElementById("demo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;please must write the specialty."; 
    document.getElementById("demo").style.color = "red";
    return false ;
  }
  if(d_description==null)
        {
          document.getElementById("demoo").innerHTML = "<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;please must write the description."; 
          document.getElementById("demoo").style.color = "red";
          return false ;
        }
}

function onlyNumberKey(evt) {
  // Only ASCII character in that range allowed
  var ASCIICode = (evt.which) ? evt.which : evt.keyCode
  if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
      return false;
  return true;
}
