var item = '.sidenav a';

$(function(){
         $(item).click(function(){
            $(".desc").text($(this).text());
            $(item).removeClass('active');
            $(this).addClass('active');
         });
      });
      
