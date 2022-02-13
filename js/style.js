var head_word=$(".head div ul li");
var side=$(".side .sidein");
head_word.click(
    function()
    {   head_word.removeClass();
        $(this).addClass("cross_word_change");
        var i=$(this).index('li');
        for(let j=0;j<4;j++)
        {
            if(i==j)
                side.eq(j).css("display","block");
            else
                side.eq(j).css("display","none");      
        }        
    }
)
//**************************点击侧边栏*********************************** */ 
var formulali1=$(".ul1 li");
var formuladiv1=$(".ul1 li div");
var flag1=$(".ul1 li a");
formulali1.click(
    function(){
        var k=$(this).index('.ul1 li');
        formuladiv1.css("display","none")
        formuladiv1.eq(k).css("display","block");
        flag1.css("background-color","transparent");
        flag1.eq(k).css("background-color","rgb(43,48,59)");
    }
)

var formulali2=$(".ul2 li");
var formuladiv2=$(".ul2 li div");
var flag2=$(".ul2 li a");
formulali2.click(
    function(){
        var k=$(this).index('.ul2 li');
        formuladiv2.css("display","none");
        formuladiv2.eq(k).css("display","block");
        flag2.css("background-color","transparent");
        flag2.eq(k).css("background-color","rgb(43,48,59)");
    }
)

var formulali3=$(".ul3 li");
var formuladiv3=$(".ul3 li div");
var flag3=$(".ul3 li a");
formulali3.click(
    function(){
        var k=$(this).index('.ul3 li');
        formuladiv3.css("display","none")
        formuladiv3.eq(k).css("display","block");
        flag3.css("background-color","transparent");
        flag3.eq(k).css("background-color","rgb(43,48,59)");
    }
)

var formulali4=$(".ul4 li");
var formuladiv4=$(".ul4 li div");
var flag4=$(".ul4 li a");
formulali4.click(
    function(){
        var k=$(this).index('.ul4 li');
        formuladiv4.css("display","none")
        formuladiv4.eq(k).css("display","block");
        flag4.css("background-color","transparent");
        flag4.eq(k).css("background-color","rgb(43,48,59)");
    }
)
// *********************************************************
//魔方
var close=false;
$(".cube_close").click(function(){
    if(close){
        $(".cube").animate({"right":"-300px"},800);
        close=false;
    }
    else{
        $(".cube").animate({"right":"0"},800);
        close=true;
    }
});
$(".fresh").click(
    function(){
        $('.cube_html').attr('src', $('.cube_html').attr('src'));

    }
)
//公式说明
var close1=false;
$(".intr_close").click(function(){
    if(close1){
        $(".intr").animate({"right":"-300px"},800);
        close1=false;
    }
    else{
        $(".intr").animate({"right":"-20"},800);
        close1=true;
    }
});