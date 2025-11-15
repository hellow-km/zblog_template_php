   function onWindowResize(){
        if(window.innerWidth<1810){
           $(".page-side").hide()
           $(".page-side1").hide()
           $(".page-side2").hide()
        }else{
           $(".page-side").show()
           $(".page-side1").show()
           $(".page-side2").show()
        }
        if(window.innerWidth<960){
            $(".header-navbar").removeClass("header-left-normal")
            $(".head-search").removeClass("header-right-normal")
        }else{
            if(!$(".header-navbar").hasClass("header-left-normal")){
                $(".header-navbar").addClass("header-left-normal")
            }

            if(!$(".head-search").hasClass("header-right-normal")){
                $(".head-search").addClass("header-right-normal")
            }
        }
    }
    window.addEventListener("resize",()=>{
        onWindowResize()
    })
    var sidebarsW=[0,0,0]
    window.addEventListener("DOMContentLoaded",()=>{
        sidebarsW[0]=$(".page-side").width()
        for (let i = 0; i < 2; i++) {
            
        }
        onWindowResize()
    })