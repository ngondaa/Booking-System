<?php

class Feedback {
  
  public function addReview($username, $review) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['username'])) { // Check if the user is logged in
        $conn = new mysqli("localhost", "root", "", "tbis");
        $userName = mysqli_real_escape_string($conn, $username);
        $review = mysqli_real_escape_string($conn, $review);
        
        // Fetch the user ID based on the username/email
        $userQuery = "SELECT id FROM users WHERE userName = '$userName'";
        $userResult = mysqli_query($conn, $userQuery);
        $userData = mysqli_fetch_assoc($userResult);
        $userID = $userData['id'];
        
        $query = "INSERT INTO reviews (userID, userName, review) VALUES ('$userID', '$userName', '$review')";
        if (mysqli_query($conn, $query)) {
          echo "<script type='text/javascript'>
          var message = 'Review submission success';
          var popup = document.createElement('div');
          popup.innerHTML = message;
          popup.setAttribute('style', ' color: darkblue;');
          
          var targetElement = document.getElementById('response');
          response.appendChild(popup);
          </script>";
        } else {
            echo "<script>alert('Failed to insert Review')</script>";
        }
        mysqli_close($conn);
    } else {
        echo "<script>alert('Please log in to submit a review')</script>";
    }
}



  public function loadReviews($specify) {
    $conn = new mysqli("localhost", "root", "", "tbis");
    $specify = mysqli_real_escape_string($conn, $specify);
    if ($specify == "*") {
      $sql = "SELECT * FROM reviews";
    } else {
      $sql = "SELECT * FROM reviews WHERE userName='$specify'";
    }
    $result = mysqli_query($conn, $sql);
    $answers = $result;
    mysqli_close($conn);
    return $answers;
  }

  public function deleteReview($reviewId) {
    $conn = new mysqli("localhost", "root", "", "tbis");
    $reviewId = mysqli_real_escape_string($conn, $reviewId);
    $query = "DELETE FROM reviews WHERE reviewID='$reviewId'";
    if (mysqli_query($conn, $query)) {
      echo "<script type='text/javascript'>
            var message = 'REVIEW DELETED';
            var popup = document.createElement('div');
            popup.innerHTML = message;
            popup.setAttribute('style', ' color: red;');
            
            var targetElement = document.getElementById('deletion');
            deletion.appendChild(popup);
            </script>";
    } else {
      echo "<script>alert('Failed to delete review');</script>";
    }
    mysqli_close($conn);
  }
}

$feedback = new Feedback();

