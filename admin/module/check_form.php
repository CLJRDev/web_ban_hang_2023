<script>
  function check_require(){
    var elements = $('.require');
    var result = true;
    elements.each(function (){
      var element = $(this);
      element.css('border', '1px solid #ccc');
      if(element.val() == ''){
        element.css('border', '1px solid #b50000');
        element.after('<p class="error text-danger">Không được để trống</p>');
        result = false;
      }
    });
    return result;
  }
  function check_positive_number(){
    var elements = $('.positive_number');
    var result = true;
    elements.each(function (){
      var element = $(this);
      if(parseInt(element.val()) <= 0 ){
        element.after('<p class="error text-danger">Cần điền giá trị dương</p>')
        result = false;
      }
    });
    return result;
  }
  function check_form(){
    var result = true;
    $('.error').remove();
    if(check_require() == false)
      result = false;
    if(check_positive_number() == false)
      result = false;
    return result;
  }
</script>