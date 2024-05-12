document.addEventListener('DOMContentLoaded', function() {
    const addDriverButton = document.getElementById('addDriverButton'); // Change to appropriate button ID
    const modal = document.getElementById('addDriverModal'); // Change to appropriate modal ID

    addDriverButton.addEventListener('click', function() {
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
