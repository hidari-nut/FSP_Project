$("#kategori").change(function () { 
    if($(this).val() == "ceritaku"){
        $(".ceritaku").css("display", "block")
        $(".kumpulan").css("display", "none")
    }
    if($(this).val() == "kumpulan"){
        $(".kumpulan").css("display", "block")
        $(".ceritaku").css("display", "none")
    }
});