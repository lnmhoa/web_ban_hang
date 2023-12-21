<div id="backtop"><i class="fas fa-arrow-up"></i></div>  
<div>
</div>

<script>
    $(document).ready(function() {
        $(window).scroll(function(){
            if($(this).scrollTop()){
                $('#backtop').fadeIn();
            }else{
                $('#backtop').fadeOut();
            }
        });
        $("#backtop").click(function(){
            $('html, body').animate({
                scrollTop: 0
            }, 400);
        });  
    });
</script>

<script src="view/js/open-dmsp.js"></script>
<script src="view/js/open-user.js"></script>
<script src="view/js/open-dmsp-tl__mb.js"></script>
<script src="view/js/open-search-tl__mb.js"></script>
<script src="view/js/dk-dn.js"></script>
<script src="view/js/ttdh.js"></script>
</body>
</html>