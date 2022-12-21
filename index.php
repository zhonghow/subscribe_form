<?php

session_start();

require "includes/class-subscribe-form.php";
require "includes/functions.php";

if (class_exists('SubscribeForm'))
    $subscribeForm = new SubscribeForm();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];

    // Only change code below this line

    $auth = new SubscribeForm();
    $error = $auth->subscribe(
        $email
    );

    // Instruction: trigger the subscribe function in $subscribeForm, and store the message into $message variable

    // Only change code above this line
}

?>

<?php
require "parts/header.php";
?>

<div class="container mt-5 mb-2 mx-auto" style="max-width: 500px;">
    <div class="card">
        <div class="card-body">
            <h5 class="pb-2 text-center">Subscribe To My Newsletter</h5>
            <!-- Only change code below this line -->

            <!-- Instruction: Put error message or success message here -->
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php endif ?>
            <!-- Only change code above this line -->
            <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST">
                <div class="d-flex justify-content-between align-content-center gap-3">
                    <input type="email" name="email" class="form-control" placeholder="Enter your email address" />
                    <button type="submit" class="btn btn-primary">
                        Subscribe
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require "parts/footer.php";
?>