<footer class="site-footer">
	<hr>
	<p>&copy; <?= date("Y") ?>MovieDB. All rights reserved.</p>
</footer>

<!-- adding javascript for removing flash msg after 5 seconds -->

<script type="text/javascript">

	document.addEventListener('DOMContentLoaded', function () {
		const msg = document.querySelector('.flash-msg');
		if (!msg) return;

		if(window.history.replaceState) {
			const url = new URL(window.location);
			url.search = '';
			window.history.replaceState({}, document.title, url);
		}
	
	  setTimeout(() => {
        msg.style.opacity = '0';

        setTimeout(() => {
            msg.remove();
        }, 500);

    }, 5000);
});
</script>
</body>
</html>