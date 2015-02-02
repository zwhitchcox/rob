<!-- FOOTER -->
<div class="container">
<div id="footer">
        <?php get_sidebar ('footer') ; ?> 
	<div class="clear"></div>
      <footer>
       	<p class="copyright">
	  <a href="http://ashworthfirm.com/site-disclaimer/" rel="generator">Site Disclaimer</a>
		<span class="sep"> | </span>
		<a href="http://ashworthfirm.com/notice-of-association-and-disclaimer-of-partnership/">Notice of Association and Disclaimer of Partnership</a></p>
	
	  </footer>
    
    </div><!-- /.container -->

    <?php wp_footer(); ?>
	</div>
  </body>
</html>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
$.ajax("<?=plugins_url()?>/testimonials/testimonials.json").done(

	function(data) {
		var testimonialsObject = JSON.parse(data);
		var testimonials = "";
		for (var i = 0; i < testimonialsObject.length; i++) {
			testimonials+="<div class='testimonial hide'>"+testimonialsObject[i].str+"</div>";
			
		}
		$("#testimonials").html(testimonials);
		$(".testimonial:eq(0)").removeClass("hide");
		setTimeout(function(){fadeNext(0)},5000);
		
	}
);
var cur = 0;
function fadeNext(cur) {
	$(".testimonial:eq("+cur+")").fadeOut(5000);
	if (cur>=$(".testimonial").length-1) {
		cur=0;
	}else {cur++}
	$(".testimonial:eq("+cur+")").fadeIn(5000);
	
	setTimeout(function() {fadeNext(cur)}, 10000);
}
	
</script>