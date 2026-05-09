<?php include 'header.php'; ?>

<div class="container mt-5">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $roomPrice = $_POST['room'];
        $checkin = new DateTime($_POST['checkin']);
        $checkout = new DateTime($_POST['checkout']);

        // Greeting Logic
        $greeting = "Guest";
        if (!empty($fname) || !empty($lname)) {
            $greeting = $fname . " " . $lname;
        } elseif (!empty($email)) {
            $greeting = $email;
        }

        // Date Logic
        $interval = $checkin->diff($checkout);
        $days = $interval->days;
        if ($days == 0) { $days = 1; } 

        // Calculation (Price * Days * 1.07 Tax)
        $subtotal = $roomPrice * $days;
        $tax = $subtotal * 0.07;
        $total = $subtotal + $tax;

        echo "<div class='alert alert-success'>";
        echo "<h3>Reservation Confirmed!</h3>";
        echo "<p>Dear $greeting, thank you for your reservation.</p>";
        echo "<p>Total Stay: $days day(s)</p>";
        echo "<p>Total Charge (including 7% tax): <strong>$" . number_format($total, 2) . "</strong></p>";
        echo "</div>";
    }
    ?>

    <h1>Reservation at Monica Resort</h1>
    <form method="post" action="reservations.php">
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">First Name</label>
                <input type="text" name="fname" class="form-control" autofocus required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" name="lname" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Address (Number & Street)</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label class="form-label">State</label>
                <input type="text" name="state" class="form-control" required>
            </div>
            <div class="col-md-1">
                <label class="form-label">Zip</label>
                <input type="text" name="zip" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Check-in Date</label>
                <input type="date" name="checkin" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Check-out Date</label>
                <input type="date" name="checkout" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Number of People</label>
                <input type="number" name="people" class="form-control" min="1" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Room Type</label>
                <select name="room" class="form-select" required>
                    <option value="200">King - $200/night</option>
                    <option value="150">Queen - $150/night</option>
                    <option value="300">Suite - $300/night</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Phone Number</label>
                <input type="tel" name="phone" class="form-control" placeholder="(123) 456-7890" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Payment Method</label>
                <select name="payment" class="form-select" required>
                    <option value="MC">MC</option>
                    <option value="VISA">VISA</option>
                    <option value="AMEX">AMEX</option>
                    <option value="Discover">Discover</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Card Number </label>
                <input type="text" name="card" class="form-control" pattern="\d{16}" maxlength="16" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Special Requests (Optional)</label>
            <textarea name="requests" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Reserve a room</button>
        <button type="reset" class="btn btn-success">Clear</button>
    </form>
</div>

<?php include 'footer.php'; ?>