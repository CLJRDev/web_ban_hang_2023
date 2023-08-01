<script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
  var showNav = false;
    function toggleNav() {
      if (!showNav) {
        $('#menu').css('left','0px');
        if ($(window).width()>=992) 
            $('#main').css('margin-left','300px');
        else
            $('#main').css('margin-left','65px');    
        showNav = true;
      }
      else {
        $('#menu').css('left','-235px');
        if ($(window).width()>=992)
            $('#main').css('margin-left','65px');
        showNav = false;
      }
    }
  toggleNav();
</script>