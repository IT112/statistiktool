function updateVisibility(animated)
{
  shadowedAnwsers = [];  
  
  $(".question").each(function() {
    var $elem = $(this);
    
    if( !$elem.attr("data-depends-on") )
      return;
    
    var dependsOn = $elem.attr("data-depends-on").split(",");
    
    var visible = false;
    for(var i in dependsOn)
    {
      var answerId = "answer_"+ dependsOn[i];
      var $answer = $("#"+ answerId);
      if( shadowedAnwsers.indexOf(answerId) < 0 && $answer.is(":checked") )
      {
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
