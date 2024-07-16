const sidebar = document.querySelector(".sidebar");
const sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function () {
	sidebar.classList.toggle("active");
	if (sidebar.classList.contains("active")) {
	 	sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
	} 
	else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

const select = document.getElementById('select')

if (select) {
	select.addEventListener('change', (e) => {
		if (e.target.value == "admin") window.location.href = "/"
		else window.location.href = "/users"
	})
}	