var lidiv=$(".side ul li .panel");
var lip=$(".side ul li p");
lip.click(
    function(){console.log("123");
        var k=$(this).index('.side ul li p');
        lidiv.css("display","none")
        console.log(k);
        lidiv.eq(k).css("display","block");
        lip.css("background-color","transparent");
        lip.eq(k).css("background-color","rgb(0,110,255)");
    }
)