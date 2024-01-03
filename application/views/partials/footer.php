<!-- Footer -->
<footer id="footer" class="footer-2">
                <div class="site-footer">
                    <div class="footer-top">
                        <div class="container">
                            <!-- Footer Links -->
                            <div class="row col-grid-5">
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2 custom-block">
                                    <div class="footer-logo"><img src="<?= get_logo(); ?>" alt="Diva Multipurpose Html Template" title="Diva Multipurpose Html Template" width="130" /></div>
                                    <div class="text mb-2 mb-md-0 mt-3">Style, elegance and sophistication. Everything in your wardrobe. Choose styles from some of the best italian designers who have...</div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2 footer-links">
                                    <h4 class="h4">Informations</h4>
                                    <ul>
                                        <li><a href="#">About us</a></li>
                                        <li><a href="#">Careers</a></li>
                                        <li><a href="#">Privacy policy</a></li>
                                        <li><a href="#">Terms &amp; condition</a></li>
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="#">Orders and Returns</a></li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2 footer-links">
                                    <h4 class="h4">Help</h4>
                                    <ul>
                                        <li><a href="#">FAQs</a></li>
                                        <li><a href="#">My Orders</a></li>
                                        <li><a href="#">Terms And Conditions</a></li>
                                        <li><a href="#">Shipping Policy</a></li>
                                        <li><a href="#">Returns &amp; Exchange</a></li>
                                        <li><a href="#">Ordering &amp; Payment</a></li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2 newsletter">
                                    <div class="display-table">
                                        <div class="display-table-cell footer-newsletter">
                                            <form>
                                                <label class="h4">Newsletter</label>
                                                <p>sign up for newsletter to know our latest news and offers.</p>
                                                <div class="input-group">
                                                    <input type="email" class="input-group__field newsletter__input" name="EMAIL" value="" placeholder="Email address" required />
                                                    <span class="input-group__btn">
                                                        <button type="submit" class="btn newsletter__submit" name="commit" id="Subscribe"><span class="newsletter__submit-text--large">Sign Up</span></button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-2 socialPayment">
                                    <div class="item">
                                        <h4 class="h4">Stay Connected</h4>
                                        <ul class="list--inline site-footer__social-icons social-icons">
                                            <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->facebook_url;?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook"><i class="icon an an-facebook"></i></a></li>
                                            <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->twitter_url;?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Twitter"><i class="icon an an-twitter"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                                            <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->pinterest_url;?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Pinterest"><i class="icon an an-pinterest-p"></i> <span class="icon__fallback-text">Pinterest</span></a></li>
                                            <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->instagram_url;?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram"><i class="icon an an-instagram"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                                            <li><a class="social-icons__link d-inline-block" href="<?= $this->settings->youtube_url;?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="YouTube"><i class="icon an an-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="item">
                                        <h4 class="h4 mt-lg-4">Payment Options</h4>
                                        <ul class="payment-icons list--inline">
                                            <li><i class="icon an an-cc-visa" aria-hidden="true"></i></li>
                                            <li><i class="icon an an-cc-mastercard" aria-hidden="true"></i></li>
                                            <li><i class="icon an an-cc-amex" aria-hidden="true"></i></li>
                                            <li><i class="icon an an-cc-paypal" aria-hidden="true"></i></li>
                                            <li><i class="icon an an-cc-discover" aria-hidden="true"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Footer Links -->
                        </div>
                    </div>

                    <div class="footer-bottom">
                        <div class="container">
                            <div class="row">
                                <!-- Footer Copyright -->
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 copyright text-center"><span>&copy; <script>document.write(new Date().getFullYear())</script> <?= $this->settings->application_name?> -</span> Crafted with <i class="mdi mdi-heart text-danger"></i> by <a style="font-weight:500;" href="https://codeofdolphins.com/">Code of Dolphins. </a></span>All Rights Reserved.</div>
                                <!-- End Footer Copyright -->
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer -->

            <!-- Scoll Top -->
            <div id="site-scroll"><i class="icon an an-angle-up"></i></div>
            <!-- End Scoll Top -->

            <!-- Minicart Drawer -->
            <div class="minicart-right-drawer right modal fade" id="minicart-drawer" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="minicart-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="an an-times" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="left" title="Close"></i></button>
                            <?php 
                                // $crtitm = $this->cart_model->get_cart_by_buyer();
                                // if(!empty($crtitm)):
                                //     $total =0;
                                //     $totalshippinhg= 0;			
							?>
                            <h4 class="modal-title" id="myModalLabel2">Shopping Cart items</h4>
                        </div>
                        <div class="minicart-body">
                            <div id="drawer-minicart" class="block block-cart">
                                <ul class="mini-products-list" id="listproduicttoggle"></ul>
                            </div>
                            <?php //else: ?>
                            <div class="empty-cart">
                                <p>You have no items in your shopping cart.</p>
                            </div>
                            <?php //endif; ?>
                        </div>
                        <div class="minicart-footer minicart-action">
                            <div class="total-in">
                                <p class="label"><b>Subtotal:</b><span class="item product-price"><span class="money" id="subtol">₹ </span></span></p>
                                <p class="label"><b>Shipping:</b><span class="item product-price"><span class="shipping">₹ 0.00</span></span></p>
                                <p class="label"><b>Tax:</b><span class="item product-price"><span class="tax">₹ 0.00</span></span></p>
                                <p class="label"><b>Total:</b><span class="item product-price"><span class="totals" id="tot">₹ </span></span></p>
                            </div>
                            <div class="buttonSet d-flex flex-row align-items-center text-center">
                                <a href="<?= base_url('/cart'); ?>" class="btn btn-secondary w-50 me-3">View Cart</a>
                                <a href="#" class="btn btn-secondary goCheckout w-50">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Sticky Cart -->
            <!-- <div class="stickyCart">
                <div class="container">
                    <form method="post" action="#" id="sticky-cart">
                        <div class="left">
                            <div class="img"><img src="assets/images/product-detail-page/cape-dress-1.jpg" class="product-featured-img" alt="product" /></div>
                            <div class="sticky-title ms-2">Women's Maxi Cape Dress</div>
                        </div>
                        <div class="right">
                            <div class="stickyOption float-start">
                                <select name="id" id="variantOptions1" class="product-form__variants selectbox no-js">
                                    <option selected="selected">Red / S - Rs. 35,643.51</option>
                                    <option disabled="disabled">Blue / S - Sold out</option>
                                    <option>Black / S - Rs. 35,643.51</option>
                                    <option>Pink / S - Rs. 35,643.51</option>
                                    <option>Red / M - Rs. 35,643.51</option>
                                    <option>Blue / M - Rs. 35,643.51</option>
                                    <option>Pink / M - Rs. 35,643.51</option>
                                    <option>Red / L - Rs. 35,643.51</option>
                                    <option>Blue / L - Rs. 35,643.51</option>
                                    <option>Black / L - Rs. 35,643.51</option>
                                </select>
                            </div>
                            <div class="wrapQtyBtn" title="Quantity">
                                <div class="qtyField">
                                    <a class="qtyBtn minus" href="javascript:void(0);"><i class="icon an an-minus" aria-hidden="true"></i></a>
                                    <input type="text" id="quantity1" name="quantity" value="1" class="product-form__input qty" />
                                    <a class="qtyBtn plus" href="javascript:void(0);"><i class="icon an an-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <button type="submit" name="add" class="btn product-form__cart-submit"><span>Add to cart</span></button>
                        </div>
                    </form>
                </div>
            </div> -->
            <!-- End Sticky Cart -->


            <div class="modal fade" id="register-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">Choose Register Option</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="an an-times" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="left" title="Close"></i></button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="register_button d-flex flex-column" stye>
                                <a href="<?= base_url('authentication/register_distributor'); ?>" class="btn btn-outline-primary mt-3 mb-3">Register as Distributer</a>
                                <a href="<?= base_url('authentication/register_teamlead'); ?>" class="btn btn-outline-success mt-3 mb-3">Register as Team Leader</a>
                                <a href="<?= base_url('/signup'); ?>" class="btn btn-outline-primary mt-3 mb-3">Register as Retailer</a>
                            </div>
                        </div>
                        
                        <!-- Modal footer -->
                        <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div> -->
                        
                    </div>
                </div>
            </div>
            <!-- End Minicart Drawer -->


            
            <!-- Including Javascript -->
        <!-- Plugins JS -->
        <script src="<?= base_url('assets/site/js/plugins.js') ?>"></script>
        <!-- Main JS -->
        <script src="<?= base_url('assets/site/js/main.js') ?>"></script>

        <!-- Photoswipe Gallery -->
        <script src="<?= base_url('assets/site/js/vendor/photoswipe.min.js') ?>"></script>
        <script src="<?= base_url('assets/site/js/vendor/photoswipe-ui-default.min.js') ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(function () {
                var $pswp = $('.pswp')[0],
                        image = [],
                        getItems = function () {
                            var items = [];
                            $('.lightboximages a').each(function () {
                                var $href = $(this).attr('href'),
                                        $size = $(this).data('size').split('x'),
                                        item = {
                                            src: $href,
                                            w: $size[0],
                                            h: $size[1]
                                        }
                                items.push(item);
                            });
                            return items;
                        }
                var items = getItems();
                
                $.each(items, function (index, value) {
                    image[index] = new Image();
                    image[index].src = value['src'];
                });
                $('.prlightbox').on('click', function (event) {
                    event.preventDefault();
                    
                    var $index = $(".active-thumb").parent().attr('data-slick-index');
                    $index++;
                    $index = $index - 1;
                    
                    var options = {
                        index: $index,
                        bgOpacity: 0.9,
                        showHideOpacity: true
                    }
                    var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
                    lightBox.init();
                });
            });
            </script>
            <script>
        $('.owl-carousel').owlCarousel({
            items:1,
            merge:true,
            loop:true,
            margin:10,
            video:true,
            lazyLoad:true,
            center:true,
            responsive:{
                480:{
                    items:2
                },
                600:{
                    items:4
                }
            }
        });
    </script>


        <!-- toast message -->
        <script src="<?= base_url('assets/admin/libs/toast/toastr.js');?>"></script>
        <script src="<?= base_url('assets/admin/js/pages/toastr.init.js');?>"></script>
        <!-- toast message -->
                                    
        <!-- Bootstrap rating js -->
        <script src="<?= base_url('assets/admin/libs/bootstrap-rating/bootstrap-rating.min.js');?>"></script>
                                    
        <script src="<?= base_url('assets/admin/js/pages/rating-init.js');?>"></script>
                                    
        <script src="<?= base_url('assets/admin/libs/sweetalert2/sweetalert2.min.js');?>"></script>
                                    
        <!-- Sweet alert init js-->
        <script src="<?= base_url('assets/admin/js/pages/sweet-alerts.init.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/select2/js/select2.full.min.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js');?>"></script>
        <script src="<?= base_url('assets/admin/js/pages/form-advanced.init.js');?>"></script>
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
</body>
</html>