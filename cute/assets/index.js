/**
 * Created by dell on 2018/7/25.
 */
$(".icon-liebiao").on("click",function () {
    $(".contain").fadeOut()
    $(".overlay").fadeIn()
    $(".overlay .body").addClass("click")
    $(".left").css("height","100%")
})
$(".icon-iconfontclose2").on("click",function () {
    $(".overlay .body").removeClass("click")
    $(".contain").delay(500).fadeIn()
    $(".overlay").fadeOut()
    $(".left").css("height","")
})
var odiv=document.querySelector(".hide div");
var owidth=odiv.offsetWidth;
$(window).resize(function() {
    owidth=odiv.offsetWidth;
});
var timer;
var num=0
timer=setInterval(function () {
    play();
},1500)
function play() {

    if (num > 3) {

            $(".hide").css("transition", "unset");
            $(".hide").css("transform", "translateX(0px)")
            num = 0;

    } else {
        $(".hide").css("transition", "all 0.5s ease");
        $(".hide").css("transform", "translateX(" + (-num * owidth) + 'px)');
        num++;
    }
}
$(".hero").hover(function () {
    clearInterval(timer);
    console.log("hhh")
},function () {
    timer=setInterval(function () {
        play();
    },1000)
})
$(".icon-youjiantou").on("click",function () {
    play();
})
var scrollBar=$(".scroll")[0];
$("#you").on("click",function () {
    run("left")
})
$("#zuo").on("click",function () {
    run("right")
})
function run(dire) {
    var scrollLeft = dire == "left" ? scrollBar.scrollLeft + 300 : scrollBar.scrollLeft - 300;
    $(".scroll").animate({
        scrollLeft:scrollLeft
    },500,function(){
        showArrow();
    });
}
function showArrow(){
    $("#zuo").add("#you").show();
    if(scrollBar.scrollLeft <= 0){
        $("#zuo").hide();
    }else if(scrollBar.scrollLeft >= scrollBar.scrollWidth-scrollBar.clientWidth){
        $("#you").hide();
    }
}

