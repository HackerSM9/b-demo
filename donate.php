<?php
// Check if the form has been submitted
if (isset($_POST['name'], $_POST['email'], $_POST['amount'])) {

// Get the donation amount
$amount = $_POST['amount'];

// Send the donation via UPI
$upi_id = "x@bank";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://upi.icicibank.com/pay");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "amount=$amount&upi_id=$upi_id&sender_name=$_POST[name]&sender_email=$_POST[email]");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

// Check if the donation was successful
if ($response == "Success") {
echo "Thank you for your donation! Your donation has been processed successfully.";
} else {
echo "Sorry, there was an error processing your donation. Please try again later.";
}

} else {
echo "Please fill out the form and submit your donation.";
}
?>
