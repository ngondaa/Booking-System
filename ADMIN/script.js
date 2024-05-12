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

// Function to open the popup
function openPopup() {
    var popup = document.getElementById('popup');
    popup.classList.add('open');
}

// Function to close the popup
function closePopup() {
    var popup = document.getElementById('popup');
    popup.classList.remove('open');
}

//Close popup button 
document.querySelector(".popup .close-btn") .addEventListener("click",function(){
	      document.querySelector(".popup").classList.remove("open");
		  document.querySelector('.popup').classList.reset('.popup');
});




// Add an event listener to the form submission
document.querySelector('.popup').addEventListener('submit', function(closePopup) {
    // Prevent the default form submission behavior
    closePopup.preventDefault();

    // Collect the values entered in the form fields
    const id = document.getElementById('alphanumericInput').value;
    const pickupLocation = document.getElementById('pickup').value;
    const dropoffLocation = document.getElementById('dropoff').value;
    // Collect other form values as needed...

    // Create a new card element dynamically
    const container = document.querySelector('.container'); 
             container.appendChild(card);


    // Populate the card with the submitted information
    card.innerHTML = `
        <h2>Booking Summary</h2>
        <p><strong>ID/RegNo:</strong> ${id}</p>
        <p><strong>Pick-up Location:</strong> ${pickupLocation}</p>
        <p><strong>Drop-off Location:</strong> ${dropoffLocation}</p>
        <!-- Add other form field values as needed -->
    `;

    // Append the card to the appropriate container in the DOM
    document.querySelector('.container').appendChild(card);

});






