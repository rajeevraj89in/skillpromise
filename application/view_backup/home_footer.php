<!-- Footer


  
<!--===================================================== -->
<!--<div class="container">-->
<div class="row">
    <div class="col-lg-12 ">
        <footer class="fill_footer">
            <div class="footer">
                <div class="row">
                    <div class="col-md-3">
                        <h4>About Skill Promise</h4>
                        <ul>
                            <li><a href="<?php echo(base_url() . "about-us"); ?>" >About Us</a></li>
                            <li><a href="<?php echo(base_url() . "our-values"); ?>">Our Core Values</a></li>
                            <li><a href="<?php echo(base_url() . "contact-us"); ?>" >Our Benefits</a></li>
                            <li><a href="<?php echo(base_url() . "contact-us"); ?>" >Contact Us</a></li>

                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h4>Programs</h4>
                        <ul>
                            <li><a href="#!">SANA for School Students</a></li>
                            <li><a href="#!">SANA for Higher Education Students</a></li>
                            <li><a href="#!">SANA for Professionals</a></li>

                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h4>Privacy</h4>
                        <ul>
                            <li><a href="<?php echo(base_url() . "privacy-policy"); ?>">Privacy Policy</a></li>
                            <li><a href="<?php echo(base_url() . "terms-of-use"); ?>">Terms of Use</a></li> 

                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h4>Testimonials</h4>
                        <ul>
                            <li><a href="#!">Corporate</a></li>
                            <li><a href="#!">Education</a></li> 
                            <li><a href="#!">User</a></li>

                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h4>Newsletter</h4>
                        <ul>
                            <li><a href="#!">Subscribe</a></li>
                            <li><a href="#!">Achieve</a></li> 

                        </ul>
                    </div>
                </div>  
                
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-6"><p>© by Skillcrop Pvt. Ltd. | All Rights Reserved. | Disclaimer</p></div>
                    <div class="col-md-6"><p class="text-right">Powered by <a style="color: #1b5e20;" href="http://www.lexiconconsultants.com/" id="myToolTip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lexicon Consultants Pvt. Ltd.">Lexicon Consultants Pvt. Ltd.</a></p></div>
                </div>
            </div>
        </footer> 
    </div>
</div>
<!---Modal-->
<div class="modal fade" id="myModal"> <!-- modal div start -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--                        <button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- End Footer
===================================================== -->
<!-- base_url() . 'assets/js/' section
===================================================== -->
<script type="text/javascript">



<?php
if ($_SESSION['msg_str'] != "") {
    echo "$(document).ready(function () {"
    . "$('#myModal').find('.modal-title').text('" . $_SESSION['msg_hdr'] . "');"
    . "$('#myModal').find('.modal-body').text('" . $_SESSION['msg_str'] . "');"
    . "$('#myModal').modal('show');"
    . " });";
    $_SESSION['msg_str'] = "";
}
?>

</script>
<style>
    .submenu {
        list-style-type: none;
    }
    .my_left_accordion {
        width: 100%;
        max-width: 360px;

        background: #FFF;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }

    .my_left_accordion .my_left_link {
        cursor: pointer;
        display: block;
        color: #777 !important;
        transition: all 0.4s ease;
    }

    .my_left_accordion li:last-child .my_left_link {
        border-bottom: 0;
    }

    .my_left_accordion li i {
        position: absolute;
        top: 16px;

        font-size: 18px;
        color: #6BA54A;
        -webkit-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        transition: all 0.4s ease;
    }

    .my_left_accordion li i.fa-chevron-down {
        right: 12px !important;
        left: auto;

        font-size: 12px;
        margin-top: -3px;

    }
    .my_left_accordion li.open i {
        color: #6AA139;
    }
    .my_left_accordion li.open i.fa-chevron-down {
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        transform: rotate(180deg);
    }

    .my_left_accordion li.default .submenu {display: block;}
    /**
     * Submenu
     -----------------------------*/
    .submenu {
        display: none;
        font-size: 14px;
    }
    .submenu a {
        display: block;
        text-decoration: none;
        color: #777;
        padding: 12px;
        transition: all 0.25s ease;
    }

    .submenu a:hover {
        text-decoration: none;
        border-radius: 5px;
        color: #5cb85c !important;
    }

</style>
<script>
    $(function () {
        var Accordion = function (el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;

            // Variables privadas
            var links = this.el.find('.my_left_link');
            // Evento
            links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
        }

        Accordion.prototype.dropdown = function (e) {
            var $el = e.data.el;
            $this = $(this),
                    $next = $this.next();

            $next.slideToggle();
            $this.parent().toggleClass('open');

            if (!e.data.multiple) {
                $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
            }
            ;
        }

        var accordion = new Accordion($('#my_left_accordion'), false);
    });
</script>