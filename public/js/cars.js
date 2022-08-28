var url = $("#purl").val();
//  function validatedateExist() {
//   var startdate = $("#startDate").val();
//
//     $.get('/date-exist?startdate=' + startdate, function(data){
//       if(data.exist) {
//
//         $("#date_exist").val('1');
//         $("#date-exist").css('color','#ff0000');
//         $("#date-exist").html('This session is already taken');
//
//       } else {
//         $("#date-exist").html('');
//         $("#date_exist").val('');
//       }
//     })
//
//
// }


 $(".edit-btn").click(function () {
     showFormOverlay();
     var cars_id = $(this).attr('data-id');
     $(".edit-current-data").animate({
         width: "406px"
     }, {
         duration: 500,
     });

     $.get( url + '/getcar/' + cars_id, function(data){

         $(".loading-container").fadeOut();
         $(".form-content-box").fadeIn();

         var store;

         if(typeof data.cars != 'undefined'){
             cars = data.cars;

             $("#edit-cars_id").val(cars_id);
             $("#edit-cats").val(cars.cats);
             $("#edit-job_title").val(cars.job_title);
             $("#edit-color").val(cars.color);
             $("#edit-model").val(cars.model);
             $("#edit-make").val(cars.make);
             $("#edit-registration").val(cars.registration);

             $(".save-changes").removeClass('disable').removeAttr('disabled');
         }
     });
 });


$(".del-btn").click(function () {
    var cars_id = $(this).attr('data-id');
    $.get( url + '/car/' + cars_id, function(data){
        window.location.reload();
    });
});


// show add form
$(".add-button").click(function () {
  reset_form();
  showFormOverlay();

  $(".add-new-data").animate({
    width: "406px"
  }, {
    duration: 500,

  });
});

function reset_form() {
  $(".error").each(function(){
    $(this).removeClass('error');
  });
  $("#cats").val('');
  $("#job_title").val('');
  $("#color").val('');
  $("#model").val('');
  $("#make").val('');
  $("#registration").val('');
}

function checkenddate(){

var cats  = new Date($('#cats').val());
var job_title    = new Date($('#job_title').val());
var color    = new Date($('#color').val());
var model    = new Date($('#model').val());
var make    = new Date($('#make').val());
var registration    = new Date($('#registration').val());

}



function validate(type) {
  $(".error").each(function(){
    $(this).removeClass('error');
  });
  var errors = [];

    var cats  = $('#'+type+'cats').val();
    var job_title    = $('#'+type+'job_title').val();
    var color    = $('#'+type+'color').val();
    var model    = $('#'+type+'model').val();
    var make    = $('#'+type+'make').val();
    var registration    = $('#'+type+'registration').val();

  if(cats == '') {
    errors.push("#"+type+"cats");
  }

 if(job_title == '') {
    errors.push("#"+type+"job_title");
  }

 if(color == '') {
    errors.push("#"+type+"color");
  }

 if(model == '') {
    errors.push("#"+type+"model");
  }

 if(make == '') {
    errors.push("#"+type+"make");
  }

 if(registration == '') {
    errors.push("#"+type+"registration");
  }
console.log(errors);
  if(errors.length>0){
    for(i=0; i < errors.length; i++){
      $(errors[i]).addClass('error');
    }
    return false;
  }
  return true;
}
