<?php
$name = $_POST['name'];
$email = $_POST['email'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];

$item1_quantity = $_POST['quantity_item1'];
$item2_quantity = $_POST['quantity_item2'];
$item3_quantity = $_POST['quantity_item3'];
$item4_quantity = $_POST['quantity_item4'];
$item5_quantity = $_POST['quantity_item5'];

$cardholder_name = $_POST['cardholder-name'];
$card_number = $_POST['card-number'];
$expiry_date = $_POST['expiry-date'];
$cvv = $_POST['cvv'];

echo "<h2>Order Summary</h2>";
echo "<p><strong>Name:</strong> $name</p>";
echo "<p><strong>Email:</strong> $email</p>";
echo "<p><strong>Billing Address:</strong> $street, $city, $state $zip</p>";


echo "<h3>Items Purchased</h3>";
echo "<ul>";
echo "<li>Item 1: $item1_quantity</li>";
echo "<li>Item 2: $item2_quantity</li>";
echo "<li>Item 3: $item3_quantity</li>";
echo "<li>Item 4: $item4_quantity</li>";
echo "<li>Item 5: $item5_quantity</li>";
echo "</ul>";


$item1_price = 10.00;
$item2_price = 50.00;
$item3_price = 100.00;
$item4_price = 250.00;
$item5_price = 1000.00;
$subtotal = ($item1_price * $item1_quantity) + ($item2_price * $item2_quantity) + ($item3_price * $item3_quantity) + ($item4_price * $item4_quantity) + ($item5_price * $item5_quantity);

$tax_rate = 0.06;
$total = $subtotal * (1 + $tax_rate);

echo "<p><strong>Subtotal:</strong> $" . number_format($subtotal, 2) . "</p>";
echo "<p><strong>Total:</strong> $" . number_format($total, 2) . "</p>";

if (isValidCreditCard($card_number)) {
    echo "<p>Credit card number is valid.</p>";
} else {
    echo "<p>Credit card number is invalid.</p>";
}

function isValidCreditCard($number) {
    $number = str_replace(' ', '', $number);
    $sum = 0;
    $numDigits = strlen($number);
    $parity = $numDigits % 2;
    for ($i = 0; $i < $numDigits; $i++) {
        $digit = $number[$i];
        if ($i % 2 == $parity) {
            $digit *= 2;
            if ($digit > 9) {
                $digit -= 9;
            }
        }
        $sum += $digit;
    }
    return ($sum % 10 == 0);
}

echo ",hr/>Last Modified: " . utctime('%a, %b %d, %Y at %I:%M %p', filetime($_SERVER['SCRIPT_FILENAME']));
?>
