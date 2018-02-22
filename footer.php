	</div>
</body>
<script src="jquery.js"></script>
<script>
	$(function(){
		$('ul li h2').click(function(){
			var li = $(this).parents('li:first');
			var form = li.find('form:first');

			if(form.hasClass('active')){
				form.removeClass('active');
				form.fadeOut(100);
			}else{
				form.addClass('active');
				form.fadeIn(300);
			}
		});
	});
</script>
</html>