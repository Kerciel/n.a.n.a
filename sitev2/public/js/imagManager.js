var imgTodel = [];

$("#ImageOfgroup img").on("click", function(event){
    if($(this).hasClass("border-danger"))
    {
        $(this).removeClass('border-danger');
        $(this).css("border", "");
        var pos = imgTodel.indexOf(event.target.id);
        imgTodel.splice(pos, 1);
    }else {
        $(this).addClass('border-danger');
        $(this).css("border", "5px solid");
        imgTodel.push(event.target.id);

    }
    console.log(imgTodel);
    var list = "";
    for(var i = 0; i < imgTodel.length; i++)
    {
        list += imgTodel[i];
        if(i < imgTodel.length-1)
        {
            list +="-"
        }
    }
    $("#Imagetodelete").val(list);
});