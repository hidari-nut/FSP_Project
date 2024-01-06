startC = 0;
startK = 0;
$( document ).ready(function() {
    $.post("user_story_ajax.php", {iduser: $("#user").val(), start: startC}).done(function(data){
        $(".cer-container").append(data);
    });
    $.post("get_story_ajax.php", {iduser: $("#user").val(), start: startK}).done(function(data){
        $(".kum-container").append(data);
    });
});

$("#kategori").change(function () { 
    if($(this).val() == "ceritaku"){
        $("#ceritaku").attr("class", "ceritaku")
        $("#kumpulan").attr("class", "hide")
    }
    if($(this).val() == "kumpulan"){
        $("#kumpulan").attr("class", "kumpulan")
        $("#ceritaku").attr("class", "hide")
    }
});

$("#tampilUser").click(function(){
    startC+=2;
    $.post("user_story_ajax.php", {iduser: $("#user").val(), start: startC}).done(function(data){
        $(".cer-container").append(data);
    });
})

$("#tampilKum").click(function(){
    startK+=4;
    $.post("get_story_ajax.php", {iduser: $("#user").val(), start: startK}).done(function(data){
        $(".kum-container").append(data);
    });
})

