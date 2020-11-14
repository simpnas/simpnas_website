</main><!-- /.container -->
<footer class="footer border-top" id="sticky-footer">
  <div class="container">
    <span class="text-muted">SimpNAS 2020</span>
    <span class="float-right">Sponsored by <a href="https://pittpc.com">PittPC</a></span>
  </div>
</footer>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
		$(function(){
			// Highlight the active nav link.
			var url = window.location.pathname;
			var filename = url.substr(url.lastIndexOf('/') + 1);
			$('.nav-item a[href$="' + filename + '"]').addClass("active");
		});

		//Prevents resubmit on forms
		if(window.history.replaceState){
		  window.history.replaceState(null, null, window.location.href);
		}

		//Slide alert up after 2 secs
		$("#alert").fadeTo(2000, 500).slideUp(500, function(){
			
		});

	</script>
    
  </body>
</html>