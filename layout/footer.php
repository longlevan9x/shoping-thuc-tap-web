 <script type="text/javascript" charset="utf-8" async defer>
        // $(document).ready(function() {
        //     // $('li a').click(function(event) {
        //     //     var c = $(this).next('ul');
        //     //     if ($(c).is(':visible')) {
        //     //         $(c).slideToggle('slow');
        //     //         $(c).addClass('display');
        //     //     }
        //     //     else{
        //     //         $(c).slideToggle('slow');
        //     //         $(c).addClass('display');
        //     //     }
        //     //     return false;
        //     // });
        //     $('li').click(function(event) {
        //         $(this).children('ul').stop().show('slow');
        //         $(this).children('ul').addClass('display');
        //     });
        //     $('.img-properties').hover(function (event) {
        //         // $(this).slideToggle();
        //         $(this).children('div.properties').fadeToggle('slow');
        //     });
        // });
        $(document).ready(function() {
            $('li').hover(function(event) {
                $(this).children('ul').stop().slideToggle('slow');
                $(this).children('ul').addClass('display');
            });

            $('.img-properties').hover(function (event) {
                // $(this).slideToggle();
                $(this).children('div.properties').fadeToggle('slow');
            });
        });
    </script>
<footer style="background-color: #CAACAC;height: 50px;">
	<div>
		<address class="text-center">
			Copy right 2017 by Team - Tin 8a1 
		</address>
	</div>
</footer>
</div>
</body>

</html>
