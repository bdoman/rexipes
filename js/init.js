var isiPhone = navigator.platform.toLowerCase().indexOf("iphone");
var isiPad = navigator.platform.toLowerCase().indexOf("ipad");
var isiPod = navigator.platform.toLowerCase().indexOf("ipod");
var isAndroidPhone = navigator.platform.toLowerCase().indexOf("linux");

$( document ).ready(function() {

        //Block Example

    $('.experienceBlock').on('click', function(){ // When you click ".block" execute this function
        var experienceBlock = $(this).text(); // blockContent is pulling the 'text' content from the block that's clicked
        $('.modal').fadeIn(300); //this is milliseconds; can use fast or slow as well
        $('.modal').html(experienceBlock);

    })

    $('.modal').on('click', function(){
        $(this).fadeOut(300); // This is referencing ".modal"
    })

$('.icon-cell').on('click', 'a', function(e) {
	e.preventDefault();

    var jqEl = $(e.currentTarget);
    var tag = jqEl.closest('tr');
    switch (jqEl.attr("data-action")) {
    case "add":
        tag.after(tag.clone().find("input").val("").end());

        break;
    case "delete":
        tag.remove();
        break;
    }
    var n = $( ".step-counter" ).length;
    $('.step-counter').each( function(i){
    	n = i + 1;
    	$(this).html('Step ' + n + ':')
    });

    return false;
}




	);


});