<?php
	echo"
	<!--===============================================================================================-->
		<script type='text/javascript' src='vendor/jquery/jquery-3.2.1.min.js'></script>
	<!--===============================================================================================-->
		<script type='text/javascript'  src='vendor/animsition/js/animsition.min.js'></script>
	<!--===============================================================================================-->
		<script type='text/javascript'  src='vendor/bootstrap/js/popper.js'></script>
		<script type='text/javascript'  src='vendor/bootstrap/js/bootstrap.min.js'></script>
	<!--===============================================================================================-->
		<script type='text/javascript'  src='vendor/select2/select2.min.js'></script>
	<!--===============================================================================================-->
		<script type='text/javascript'  src='vendor/slick/slick.min.js'></script>
		<script type='text/javascript'  src='js/slick-custom.js'></script>
	<!--===============================================================================================-->
		<script type='text/javascript'  src='vendor/parallax100/parallax100.js'></script>
		<script type='text/javascript' >
	        $('.parallax100').parallax100();
		</script>
	<!--===============================================================================================-->
		<script type='text/javascript'  src='vendor/countdowntime/countdowntime.js'></script>
	<!--===============================================================================================-->
		<script type='text/javascript'  src='vendor/lightbox2/js/lightbox.min.js'></script>
	<!--===============================================================================================-->
		<script type='text/javascript'  src='vendor/isotope/isotope.pkgd.min.js'></script>
	<!--===============================================================================================-->

	<!--===============================================================================================-->
		<script src='ckeditor/ckeditor.js'></script>
	<!--===============================================================================================-->
		<script src='js/main.js'></script>
		<script>

				// Get the button
				let mybutton = document.getElementById('myBtn');

				// When the user scrolls down 20px from the top of the document, show the button
				window.onscroll = function() {scrollFunction()};

				function scrollFunction() {
					if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
						mybutton.style.display = 'block';
					} else {
						mybutton.style.display = 'none';
					}
				}

				// When the user clicks on the button, scroll to the top of the document
				function topFunction() {
					document.body.scrollTop = 0;
					document.documentElement.scrollTop = 0;
				}

				<!--===============================================================================================-->

				function openNav() {
					document.getElementById('mySidenav').style.width = '300px';
				}

				function closeNav() {
					document.getElementById('mySidenav').style.width = '0';
				}

				<!--===============================================================================================-->

				$(document).ready(function(){
					$('#citizenTab').show();
					$('#adminTab').hide();
				});
				$(document).ready(function(){
					$('#citizenLogBtn').click(function(){
					$('#citizenTab').show();
					$('#adminTab').hide();
					});
					$('#adminLogBtn').click(function(){
					$('#adminTab').show();
					$('#citizenTab').hide();
					});
				});

				<!--===============================================================================================-->

	      // The function below will start the confirmation dialog
	      function confirmAction() {
	        let confirmAction = confirm('Are you sure to execute this action?');
	        if (confirmAction) {
	          alert('Action successfully executed');
	        } else {
	          alert('Action canceled');
	        }
	      }

			<!--===============================================================================================-->
			function goBack(){
				window.history.back();
			}

			<!--===============================================================================================-->

			function myDropnav() {
				document.getElementById('myDropdown').classList.toggle('show');
			}

			function myDropnav1() {
				document.getElementById('myDropdown1').classList.toggle('show');
			}

			function myDropnav2() {
				document.getElementById('myDropdown2').classList.toggle('show');
			}

			// Close the dropdown if the user clicks outside of it
			window.onclick = function(event) {
				if (!event.target.matches('.dropbtn')) {
					var dropdowns = document.getElementsByClassName('dropdown-content');
					var i;
					for (i = 0; i < dropdowns.length; i++) {
						var openDropdown = dropdowns[i];
						if (openDropdown.classList.contains('show')) {
							openDropdown.classList.remove('show');
						}
					}
				}
			}

			<!--===============================================================================================-->

			var dropdown = document.getElementsByClassName('sidenavdropdown-btn');
			var i;

			for (i = 0; i < dropdown.length; i++) {
			  dropdown[i].addEventListener('click', function() {
			    this.classList.toggle('active-sidenav');
			    var dropdownContent = this.nextElementSibling;
			    if (dropdownContent.style.display === 'block') {
			      dropdownContent.style.display = 'none';
			    } else {
			      dropdownContent.style.display = 'block';
			    }
			  });
			}

			function showTime(){
		    var date = new Date();
		    var h = date.getHours(); // 0 - 23
		    var m = date.getMinutes(); // 0 - 59
		    var s = date.getSeconds(); // 0 - 59
		    var session = 'AM';

		    if(h == 0){
		        h = 12;
		    }

		    if(h > 12){
		        h = h - 12;
		        session = 'PM';
		    }
		    h = (h < 10) ? '0' + h : h;
		    m = (m < 10) ? '0' + m : m;
		    s = (s < 10) ? '0' + s : s;
		    var time = h + ':' + m + ':' + s + ' ' + session;
		    document.getElementById('clock').innerText = time;
		    document.getElementById('clock').textContent = time;
		    setTimeout(showTime, 1000);
			}
			showTime();

			const monthNames = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN','JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];

			var today = new Date();
			var result = ('00' + today.getDate()).slice(-2)+' ' + monthNames[today.getMonth()] +' ' +today.getFullYear();
			$('#date').text(result);

			function changeDate(){
			  var From = result
			  const regex = /[-]+/g;
			  const subst = '';
			  var FromRegex = From.replace(regex, subst);
			  $('#date').text(FromRegex);
			}

			function addToCart(ISBN, Title) {
			    // Display an alert message.
			    alert('Item added to cart: ' + Title + ' (ISBN: ' + ISBN + ')');
			}

			function myShowPassword() {
			  var x = document.getElementById('showPassword');
			  if (x.type === 'password') {
			    x.type = 'text';
			  } else {
			    x.type = 'password';
			  }
			}

			function myShowPassword2() {
				var x = document.getElementById('showPassword2');
				if (x.type === 'password') {
					x.type = 'text';
				} else {
					x.type = 'password';
				}
			}
			
			function copyClipboard() {
				// Get the text field
				var copyText = document.getElementById('copyPassword');

				// Select the text field
				copyText.select();
				copyText.setSelectionRange(0, 99999); // For mobile devices

				 // Copy the text inside the text field
				navigator.clipboard.writeText(copyText.value);

				// Alert the copied text
				alert('Copied the password: ' + copyText.value);
			}

		</script>
	";
?>
