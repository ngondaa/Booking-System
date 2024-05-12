const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});

//TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .sidebar-icon');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function(){
    sidebar.classList.toggle('hide');
})

function generatePDF() {
    var request = new XMLHttpRequest();
    request.open("GET", "userspdf.php", true);
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            // Optional: Handle response from PHP script
            alert("PDF generated successfully!");
        }
    };
    request.send();
}
