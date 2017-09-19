var value = 0;
var num = 0;
var timer;
$(document).ready(function(){
  timer=setInterval(function(){
    console.log("넘기는값"+value);
    $.ajax({
      url:"../model/ajax.php?p="+value,
      type:"get",
      dataType:"text",
      async:true,
      success:function(data){
        $("#ajax").append(data);
        if(num<2) num++;
        else num==0;
        if(value<4) value++;
        else value=0;
      },
      error:function(){
        console.log("실패");
      }
    })
      $("#d").remove();
    $("#d").slideUp();
  },4000)
})
