document.addEventListener('DOMContentLoaded', function() {
    const addVehicleButton = document.getElementById('addVehicleButton');
    const modal = document.getElementById('addVehicleModal');

    addVehicleButton.addEventListener('click', function() {
        modal.style.display = 'block';
    });

    modal.querySelector('.close').addEventListener('click', function() {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
});
