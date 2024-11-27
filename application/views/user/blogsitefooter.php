<link rel="stylesheet" href="<?php echo base_url('public/css/sitefooter.css'); ?>">
 <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3>About Us</h3>
                <p>We are a team of passionate individuals working to create a better online experience for everyone.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="<?php echo base_url('blogsite'); ?>">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="<?php echo base_url('UserController/blogsiteabout'); ?>">About</a></li>
                    <li><a href="<?php echo base_url('contactus'); ?>">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>Email: info@example.com</p>
                <p>Phone: +1 234 567 890</p>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <ul class="social-links">
                    <li><a href="#" target="_blank"><i class="fa-brands fa-facebook" style=""></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa-brands fa-twitter" style="";></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa-brands fa-square-instagram" style=""></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa-brands fa-linkedin" style=""></i></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 My Website. All rights reserved.</p>
        </div>
    </footer>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $(".review-card").slice(3).hide();
    
    $("#loadMore").on("click", function(e) {
      e.preventDefault();
      
      $(".review-card:hidden").slice(0, 3).slideDown();
      
      if ($(".review-card:hidden").length == 0) {
        $("#loadMore").hide();
      }
    });
  });



  document.querySelector('.dropbtn').addEventListener('click', function(event) {
        event.preventDefault();
        var dropdown = document.querySelector('.dropdown-content');
        dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
    });

    


</script>

</body>
</html>