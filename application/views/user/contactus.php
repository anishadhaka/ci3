
  <!-- <header>
    <div class="logo">
      <h1>Watch My Review</h1>
    </div>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="contactus.html">Contact Us</a></li>
      </ul>
    </nav>
  </header> -->

  <section class="contact">
    <div class="contact-info">
      <h2>Contact Information</h2>
      <p>If you have any questions, feel free to reach out to us through the form below.</p>
      <ul>
        <li><strong>Email:</strong> support@watchmyreview.com</li>
        <li><strong>Phone:</strong> +123 456 789</li>
        <li><strong>Address:</strong> 123 Review Street, Suite 101, New York, NY</li>
      </ul>
    </div>

    <div class="contact-form">
      <h2>Get in Touch</h2>
      <form    method="post" action="<?php echo base_url('UserController/contactusdata');?>">
        <div class="input-group">
          <label for="name">Your Name</label>
          <input type="text" id="name" name="name" placeholder="Enter your name" required>
          <input type="hidden" id="id" name="id" placeholder="" required>

        </div>

        <div class="input-group">
          <label for="email">Your Email</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="input-group">
          <label for="message">Your Message</label>
          <textarea id="message" name="message" placeholder="Write your message here" required></textarea>
        </div>

        <button type="submit" class="submit-btn">Send Message</button>
      </form>
    </div>
  </section>

  <section class="map">
    <h2>Find Us</h2>
    <div id="map">
      <!-- You can embed a map here (e.g., Google Maps iframe) -->
      <p>Map integration goes here.</p>
    </div>
  </section>

