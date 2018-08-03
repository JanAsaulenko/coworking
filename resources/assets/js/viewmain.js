import Selector from "./Selector";
import DataPicker from './DataPicker';
let $onScreen = false;
let height_of_window;
if (document.body.clientWidth > 768) {
  height_of_window = "400px";
} else {
  height_of_window = "600px";
}
// function goToOrder() {
// if ($onScreen === false) {
//   $('.order-block').animate({height: height_of_window}, 400, function () {
//     let orderBlock = $('.block-with-form');
//     orderBlock.css({'display': 'block', 'position': 'relative', 'top': '140%'});
//     orderBlock.animate({left: '0%'}, 700);
//     $('#order-back-btn').css("display", "true");
//     if (document.body.clientWidth < 768) {
//       $('.order-block').css("height", "auto");
//     }
//   });
//   $onScreen = true;
// }
// }

window.onresize = function () {
  let formBlock = $('.order-block');
  formBlock.css("height", "auto");
  if (document.body.clientWidth > 980) {
    formBlock.css("height", "520px");
  }
};

$(document).ready(function () {

//SHOW FORM
  let formBlock = $(".block-with-form");
  let buttonBlock = $(".block-with-button");
  buttonBlock.animate({left: '0%'}, 1000);
  $("[href='#order-form'],#order-btn").click(function () {
    if (formBlock.is(':visible')) return;
    buttonBlock.animate({top: '-140%'}, 500, function () {
      buttonBlock.hide();
      formBlock.css({'display': 'block', 'position': 'relative', "left": '140%'});
      formBlock.animate({left: '0%'}, 1000);
    })
  });
//DATA PICKER
  const from = $('#fromMain');
  const to = $('#toMain');

  const mainDataPicker = new DataPicker();
  mainDataPicker.getDays(from,to);




  $("#order-back-btn").click(function () {
    if (buttonBlock.is(':visible')) return;
    formBlock.animate({left: '140%'}, 500, function () {
      formBlock.hide();
      buttonBlock.css({'display': 'block', 'left': '-140%'});
      buttonBlock.animate({left: '0%'}, 500);
    })
  });


// //SMOOTH SCROLL TO ANCHOR ON THE SAME PAGE (Add smooth scrolling to all links)
  $("a").on('click', function (event) {
    if (this.hash !== "") {    // Make sure this.hash has a value before overriding default behavior
      event.preventDefault();      // Prevent default anchor click behavior
      let hash = this.hash;        // Store hash
      $('html, body').animate({		// Using jQuery's animate() method to add smooth page scroll
        scrollTop: $(hash).offset().top
      }, 800, function () {			// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        window.location.hash = hash;        // Add hash (#) to URL when done scrolling (default click behavior)
      });
    }
  });


// //SELECT TOWN (JQUERY SELECT2)
  const selectTown = $('#town-select');
  const showPlaces = $('#place-select');
  const cities = new Selector(selectTown, {url: '/main/getPlaces', method: 'get', dataType: 'json'}, showPlaces);
  cities.request();
//SELECT PLACE (JQUERY SELECT2)
  showPlaces.select2({
    placeholder: "Оберіть простірs...",
    language: {
      noResults: function () {
        return "Співпадінь, не знайдено";
      }
    },
    width: "100%"
  });

// //SELECT DISCOUNT (JQUERY SELECT2)
  $("#discount-selector").select2({
    minimumResultsForSearch: Infinity,
    width: "100%"
  });

// //PROMO-CODE-DIV APPEARANCE
  $("#discount-selector").on("change", function () {
    if ($(this).val() === "6")
      $("#promo-code-div").show();
    else
      $("#promo-code-div").hide();
  });



//NUM-OF-PLACES-SELECTOR
  $("#plus-btn").click(function () {
    let value = $("#num-of-places-input").val();
    value = parseInt(value);
    if (!isNaN(value) && value >= 1)
      $("#num-of-places-input").val(++value);
    else
      $("#num-of-places-input").val(1);
  });
  $("#minus-btn").click(function () {
    let value = $("#num-of-places-input").val();
    value = parseInt(value);
    if (!isNaN(value) && value >= 2)
      $("#num-of-places-input").val(--value);
    else
      $("#num-of-places-input").val(1);
  });
//   $("#num-of-places-input").on("change", function () {
//     let value = $("#num-of-places-input").val();
//     value = parseInt(value);
//     if (isNaN(value) || value < 1)
//       $("#num-of-places-input").val(1);
//     else
//       $("#num-of-places-input").val(value);
//   })
});

