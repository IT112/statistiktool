function updateVisibility(animated)
{
  shadowedAnwsers = [];  
  
  $(".question").each(function() {
    var $elem = $(this);
    
    if( !$elem.attr("data-depends-on") )
      return;
    
    var visible = false;
    
    var $question = $("#question_" + $elem.attr("data-depends-on").split(","));
  
    for(var u = 0; u < $question[0].children[1].children.length; u++)  {
  	    var answer = $question[0].children[1].children[u].children[0].children[0];
	  
        if( shadowedAnwsers.indexOf(answer.id) < 0 &&  answer.checked ) {
            visible = true;
            break;
        }
    }
    
    if( visible )
      if( animated )
        $elem.slideDown();
      else
        $elem.show();
    else
    {
      if( animated )
        $elem.slideUp();
      else
        $elem.hide();
      
      $elem.find(".answer").each(function() {
        shadowedAnwsers.push($(this).attr("id"));
      });
    }
  });
}

$(function() {
  updateVisibility(false);
  
  $(".question").delegate(".answer", "change", function() {
    updateVisibility(true);
  });
});
