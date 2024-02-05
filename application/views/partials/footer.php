        <footer>
            <div class="container">
                <div class="footer-content-container p-60">
                    <div class="container">

                        <div class="social-network pb-60 pt-0">
                            <div class="container d-block d-lg-flex justify-content-between align-items-center">
                                <h2 class="text-center text-lg-start">Lets Connect<span>Get in touch or just say Hi</span></h2>
                                <ul class="d-flex justify-content-center flex-wrap gap-20">
                                    <li><a href=""><i class="fa-brands fa-youtube"></i></a></li>
                                    <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href=""><i class="fa-brands fa-google"></i></a></li>
                                    <li><a href=""><i class="fa-solid fa-location-dot"></i></a></li>
                                    <li><a href=""><i class="fa-solid fa-location-dot"></i></a></li>
                                    <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>  

                        <div class="footer-content d-flex gap-50">
                            <div class="footer-logo">
                                <a href=""><img src="<?= base_url('assets/site/images/footer-logo.png'); ?>" alt=""></a>
                            </div>
                            <div class="footer-contact">
                                <h4>Pet Supply Shop</h4>
                                <ul>
                                    <li><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>185/A, PICNIC GARDEN ROAD, NEAR 39 BUS STAND MONGINIS CAKE SHOP, KOLKATA- 700039, WEST BENGAL, INDIA. </li>
                                    <li><span><i class="fa fa-volume-control-phone" aria-hidden="true"></i></span><a href="tel:+917595936132">+91 75959 36132 </a></li>
                                    <li><span><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="mailto:loveatpetside@gmail.com">loveatpetside@gmail.com</a></li>
                                </ul>
                            </div>
                            <div class="footer-link">
                                <h4>Information</h4>
                                <ul>
                                    <li><a href="">About Us</a></li>
                                    <li><a href="">Contact Us</a></li>
                                    <li><a href="">Terms & Conditions</a></li>
                                    <li><a href="">Faq</a></li>
                                </ul>
                            </div>
                            <div class="footer-link">
                                <h4>My Account</h4>
                                <ul>
                                    <li><a href="">Your Account</a></li>
                                    <li><a href="">Checkout</a></li>
                                    <li><a href="">Login</a></li>
                                    <li><a href="">Register</a></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </footer>
        <section class="footer-bottom p-0">
            <div class="container">
                <div class="copyright d-sm-block d-md-flex justify-content-between">
                    <p>&copy; <?php echo date("Y"); ?> talesofjoy. All rights reserved. </p>
                    <ul class="d-flex justify-content-center gap-20">
                        <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-google"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-youtube"></i></a></li>
                        <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Footer -->

        <!-- Including Javascript -->

        <!-- jQuery Master Plugin -->
        <script src="<?= base_url('assets/site/assets/vendors/jquery.min.js'); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/site/js/bootstrap.bundle.min.js'); ?>"crossorigin="anonymous"></script>        
        <!-- owl javascript -->
        
        <script src="<?= base_url('assets/site/assets/owlcarousel/owl.carousel.js'); ?>"></script>
 
        <!-- Coustom JS -->
        <script type="text/javascript" src="<?= base_url('assets/site/js/scripts.js'); ?>"></script>

        <!-- toast message -->
        <script src="<?= base_url('assets/admin/libs/toast/toastr.js');?>"></script>
        <script src="<?= base_url('assets/admin/js/pages/toastr.init.js');?>"></script>
        <!-- toast message -->

        <!-- My-zoom.js -->
        <script src="<?= base_url('assets/admin/libs/zoom/js/my-zoom.js');?>"></script> 
        <!-- My-zoom.js -->

        <!-- Bootstrap rating js -->
        <script src="<?= base_url('assets/admin/libs/bootstrap-rating/bootstrap-rating.min.js');?>"></script>
                                    
        <script src="<?= base_url('assets/admin/js/pages/rating-init.js');?>"></script>
                                    
        <script src="<?= base_url('assets/admin/libs/sweetalert2/sweetalert2.min.js');?>"></script>
                                    
        <!-- Sweet alert init js-->
        <script src="<?= base_url('assets/admin/js/pages/sweet-alerts.init.js');?>"></script>
        <!-- end -->
        
        <?php $this->load->view('partials/ajax');?>
        <?php $this->load->view('partials/_messages');?>
        <?php //$this->load->view('partials/modal');?>
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button><button class="pswp__button pswp__button--share" title="Share"></button><button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button><button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button><button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div>
        </div>
    </div>
    <!-- End Page Wrapper -->
    <script>
        (function () {
        'use strict'
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')
        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }else{
                // $(".animate-container").addClass("animation-added");
                    setInterval(function() { 
                //  $('#stepForm1').submit();
                }, 4000);  
                }
                
                form.classList.add('was-validated')
                
            }, false)
            })

        })()
    </script>
</body>
</html>