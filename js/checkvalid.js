
  $(document).ready(function() {
     $("form").submit(function(){
       var roll = true;
       $(':radio').each(function(){
         name= $(this).attr('name');
         if (roll && !$(':radio[name="'+ name +'"]:checked').length){
           // alert(name + "Roll Missing!");
           $('.hidden').show();
           roll = false;
         }
       });
       return roll;
     });
  });
