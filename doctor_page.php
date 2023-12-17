<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@600&family=Open+Sans:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="icon" href="graphics/svasth_logo.svg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <header>
        <nav>
            <ul class="nav-ul">
                <li class="nav-icon"><span id="nav-icon" class="material-symbols-rounded" onclick="opensidebar()">menu</span></li>
				<li class="nav-li" id="logo-contain">
                    <div class="imgcontain">
                        <img onclick="imgredir()" src="graphics/svasth_logo.svg">
                    </div>
                    <div class="imgcontain" id="logo_title">
                        <img onclick="imgredir()" src="graphics/svasth_title.svg">
                    </div>
                </li>
                    <li class="nav-li"><a href="appointments.php" target="mainframe">Appointments</a></li>
                    <li class="nav-li"><a href="pid_entry.html" target="mainframe">Records</a></li>
                    <li class="nav-li"><a href="index.html" target="_top">Logout</a></li>
            </ul>
        </nav>
        <aside>
            <ul class="sidebar-ul">
                    <li class="sidebar-li"><a href="appointments.php" target="mainframe">Appointments</a></li>
                    <li class="sidebar-li"><a href="pid_entry.html" target="mainframe">Records</a></li>                    
                    <li class="sidebar-li"><a href="index.html" target="_top">Logout</a></li>
            </ul>
        </aside>
    </header>
	<main>
	<iframe id="mainframe"  name="mainframe" src="blank.html" width="100%" height="100%" frameborder="0"></iframe>
	</main>

    <footer>
        <div class="footer-content">
            <div class="footer-logo">
                <img src="graphics/svasth_logo.svg" alt="Svasth Logo">
            </div>
            <div class="footer-info">
                <h3>Contact Us</h3>
                <p>123 Hospital Road, Hyderabad</p>
                <p>Phone: 9948680040</p>
                <p>Email: help@svasth.com</p>
            </div>
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="appointments.php" target="mainframe">Appointments</a></li>        
                    <li><a href="pid_entry.html" target="mainframe">Records</a></li>
                    <li><a href="index.html" target="_top">Logout</a></li>
                </ul>
            </div>
            <div class="footer-social">
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 Svasth HMS. All Rights Reserved.</p>
        </div>
    </footer>
    

    <script>
    function opensidebar() {
    var sidebarElements = document.getElementsByClassName("sidebar-ul");
    var icon = document.getElementById("nav-icon");
    if (sidebarElements.length > 0) {
        var sidebar = sidebarElements[0];
		if(sidebar.style.display == "flex")
		{
		sidebar.style.display = "none";
        icon.innerHTML="menu";
		}
		else{
		sidebar.style.display = "flex";
        icon.innerHTML="close";

		}
        
    } else {
        console.error("Sidebar element not found");
    }
    }

	
	function imgredir() {
	  window.location.href="index.html";
	}
	
	window.addEventListener('resize', function() {
    var sidebarElements = document.getElementsByClassName("sidebar-ul");

    if (sidebarElements.length > 0) {
        var sidebar = sidebarElements[0];

        if (window.innerWidth > 945) {
            sidebar.style.display = "none";
        }
    }
    });


    </script>
    
</body>
</html>
