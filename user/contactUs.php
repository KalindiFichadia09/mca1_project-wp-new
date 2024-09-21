<?php 
    include_once('header.php');
?>
<section class="bg-light py-5">
<main class="container mt-1">
    <h1 class="mb-5 text-center">Contact Us</h1>

    <!-- Contact Form -->
    <section class="mb-5">
        <h2 class="mb-4">Get in Touch</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <img src="../images/contactUsImg.jpg" alt="Contact Us" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <form action="index.php" onsubmit="return contactValidaton()" method="get">
                    <div class="mb-3">
                        <label for="contactName" class="form-label">Name</label>
                        <input type="text" id="contactName" name="name" class="form-control">
                        <span id="contactNameMsg"></span>
                    </div>
                    <div class="mb-3">
                        <label for="contactEmail" class="form-label">Email</label>
                        <input type="email" id="contactEmail" name="email" class="form-control">
                        <span id="contactEmailMsg"></span>
                    </div>
                    <div class="mb-3">
                        <label for="contactMessage" class="form-label">Message</label>
                        <textarea id="contactMessage" name="message" class="form-control" rows="4"></textarea>
                        <span id="contactMessageMsg"></span>
                    </div>
                    <input type='submit' name='signin' value='Send Message' class="buy-now">
                </form>
            </div>
        </div>
    </section>

    <!-- Feedback Form -->
    <section>
        <h2 class="mb-4">Feedback</h2>
        <div class="row">
           
            <div class="col-md-6">
                <form action="index.php" onsubmit="return feedbackValidaton()" method="get">
                    <div class="mb-3">
                        <label for="feedbackName" class="form-label">Name</label>
                        <input type="text" id="feedbackName" name="name" class="form-control">
                        <span id="feedbackNameMsg"></span>
                    </div>
                    <div class="mb-3">
                        <label for="feedbackEmail" class="form-label">Email</label>
                        <input type="email" id="feedbackEmail" name="email" class="form-control">
                        <span id="feedbackEmailMsg"></span>
                    </div>
                    <div class="mb-3">
                        <label for="feedbackMessage" class="form-label">Feedback</label>
                        <textarea id="feedbackMessage" name="feedback" class="form-control" rows="4"></textarea>
                        <span id="feedbackMessageMsg"></span>
                    </div>
                    <input type='submit' name='Submit Feedback' value='Send Message' class="buy-now">
                    <!-- <button type="submit" class="btn btn-primary">Submit Feedback</button> -->
                </form>
            </div>
            <div class="col-md-6 mb-3">
                <img src="../images/feedbackImg.jpg" alt="Feedback" class="img-fluid rounded">
            </div>
        </div>
    </section>
</main>
</section>
<br/><br/>

<?php 
    include_once('footer.php');
?>
