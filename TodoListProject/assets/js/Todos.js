//check specific todos by clicking
$('ul').on("click","li",function(){
    $(this).toggleClass('clicked');
});
//visible the dlt button on hover
$('ul').on("mouseenter","li",function(){
    $("span").slideri();
});
//click on x to dlt todo
$('ul').on("click","span",function(e){
    e.stopPropagation();
    $(this).parent().fadeOut(500,function(){
        $(this).remove();
    });
});
//event for adding new todo
$('input[type="text"]').on("keypress",function(e){
    if(e.which==13){
       var todoText= $(this).val();
        $(this).val("");
    console.log(todoText);
    $('ul').append('<li><span><i class="fa fa-trash"></i></span> '+todoText+'</li>');
   // $('ul li:last').html(todoText);
    
}
});