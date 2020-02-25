/*
    validate
*/
function ValidateEmail(number_id) {
    var email = document.getElementById("exampleInputEmail" + number_id).value ;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(email)){
        document.getElementById("exampleInputEmail" + number_id).setAttribute("class" , "form-control has-error has-feedback");
    }
    else {
        document.getElementById("exampleInputEmail" + number_id).setAttribute("class" , "form-control has-success has-feedback") ;
    }
}
function ValidatePassword(number_id) {
    var password = document.getElementById("exampleInputPassword" + number_id).value ;
    var filter=  /^[A-Za-z]\w{7,14}$/;
    if (!password.match(filter)){
        document.getElementById("exampleInputPassword" + number_id).setAttribute("class" , "form-control has-error has-feedback bg-danger");
    }
    else {
        document.getElementById("exampleInputPassword" + number_id).setAttribute("class" , "form-control has-success has-feedback") ;
    }
}
function ValidateRepeatPassword(number_id) {
    var password = document.getElementById("exampleInputPassword" + number_id).value ;
    var confirm_password = document.getElementById("exampleInputRepeatPassword" + number_id).value ;
    if (password != confirm_password){
        document.getElementById("exampleInputRepeatPassword" + number_id).setAttribute("class" , "form-control has-error has-feedback bg-danger");
    }
    else {
        document.getElementById("exampleInputRepeatPassword" + number_id).setAttribute("class" , "form-control has-success has-feedback") ;
    }
}
/*
    End Validate
 */

/*
    Carousel
*/
$('#carousel-example').on('slide.bs.carousel', function (e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 5;
    var totalItems = $('.carousel-item').length;
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            }
            else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
});
/*
  End Carousel
*/
/*
start modal image
 */

// Get the modal
var modal1 = document.getElementById("myModal1");
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img1= document.getElementById("myImg1");
var modalImg1 = document.getElementById("img1");
var captionText1 = document.getElementById("caption1");
img1.onclick = function(){
    modal1.style.display = "block";
    modalImg1.src = this.src;
    captionText1.innerHTML = this.alt;
}



var modal2 = document.getElementById("myModal2");
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img2= document.getElementById("myImg2");
var modalImg2 = document.getElementById("img2");
var captionText2 = document.getElementById("caption2");
img2.onclick = function(){
    modal2.style.display = "block";
    modalImg2.src = this.src;
    captionText2.innerHTML = this.alt;
}



var modal3 = document.getElementById("myModal3");
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img3= document.getElementById("myImg3");
var modalImg3 = document.getElementById("img3");
var captionText3 = document.getElementById("caption3");
img3.onclick = function(){
    modal3.style.display = "block";
    modalImg3.src = this.src;
    captionText3.innerHTML = this.alt;
}




// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close1")[0];
var span2 = document.getElementsByClassName("close2")[0];
var span3 = document.getElementsByClassName("close3")[0];
// When the user clicks on <span> (x), close the modal

span1.onclick = function() {
    modal1.style.display = "none";
}
span2.onclick = function() {
    modal2.style.display = "none";
}
span3.onclick = function() {
    modal3.style.display = "none";
}

/*
end modal image
 */
