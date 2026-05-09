<?php 
include 'header.php'; 

$conn = new mysqli("localhost", "root", "", "Monica_resort");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $comment = $conn->real_escape_string($_POST['comment']);
    $rating = (int)$_POST['rating'];

    $sql = "INSERT INTO comments (name, email, comment, rating) VALUES ('$name', '$email', '$comment', $rating)";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success mt-3'>Comment posted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
    }
}
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Guest Comments</h1>

    <div class="row">
        <div class="col-md-5">
            <div class="card shadow-sm p-4">
                <h3>Leave a Comment</h3>
                <form method="post" action="comments.php">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required placeholder="Your name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required placeholder="you@example.com">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Comment</label>
                        <textarea name="comment" class="form-control" rows="4" required placeholder="Tell us about your stay..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rating</label>
                        <select name="rating" class="form-select" required>
                            <option value="5">5 - Excellent</option>
                            <option value="4">4 - Very Good</option>
                            <option value="3">3 - Good</option>
                            <option value="2">2 - Fair</option>
                            <option value="1">1 - Poor</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Submit Comment</button>
                </form>
            </div>
        </div>

        <div class="col-md-7">
            <h3>Recent Feedback</h3>
            <hr>
            <?php
            $sql = "SELECT * FROM comments ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card mb-3 shadow-sm">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . htmlspecialchars($row['name']) . ' <span class="badge bg-warning text-dark">' . $row['rating'] . '/5 Stars</span></h5>';
                    echo '<h6 class="card-subtitle mb-2 text-muted">' . htmlspecialchars($row['email']) . '</h6>';
                    echo '<p class="card-text">"' . htmlspecialchars($row['comment']) . '"</p>';
                    echo '<small class="text-muted">' . $row['created_at'] . '</small>';
                    echo '</div></div>';
                }
            } else {
                echo "<p class='text-muted'>No comments yet. Be the first to tell us about your stay!</p>";
            }
            $conn->close();
            ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>