function updateVisibility(animated)
{
  $(".question").each(function() {
    var $elem = $(this);
    
    if( !$elem.attr("data-depends-on") )
      return;
    
    var dependsOn = $elem.attr("data-depends-on").split(",");
    
    var visible = false;
    for(var i in dependsOn)
    {
      var $answer = $("#answer_"+ dependsOn[i]);
      if( $answer.is(":checked") )
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
      if( animated )
        $elem.slideUp();
      else
        $elem.hide();
  });
}

$(function() {
  updateVisibility(false);
  
  $(".question").delegate(".answer", "change", function() {
    updateVisibility(true);
  });
});
