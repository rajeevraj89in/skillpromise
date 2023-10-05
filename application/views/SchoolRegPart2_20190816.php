<?php
//echo $id;
//die;
$this->load->view('home_header_view');
$this->load->library('cart');
//echo "<pre>";
//print_r($id);
//die;
?>

<script src="http://imsportal.in/assets/js/jquery.blockUI.js"></script>
<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">


            <aside class="col-md-3">

                <!--cart page-->
                <div class="panel panel-primary border">
                    <h4 class="quickpanelhead quiz_head">Cart Summary</h4>
                    <div class="cart-inner">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Program (s)</td>
                                    <td class="text-right"><?= $this->cart->total_items(); ?></td>
                                </tr>
                                <tr>
                                    <td class="no-border">Cost</td>
                                    <td class="no-border text-right">INR <?= $this->cart->total() + (($this->cart->total() / 100) * 18); ?></td>
                                </tr>
                            </table>
                        </div>
<!--                        <p class="text-center">

                            <button class="btn btn-warning">Proceed to Checkout</button></p>-->

                    </div>
                </div>
                <!--cart page end-->

                <?php $this->load->view('ProgramSideView'); ?>



            </aside>



            <section class="col-md-9" style="min-height: 395px;">

                <div class="panel">
                    <h1 class="header_text">Checkout</h1>
                </div>


                <div class="checkout">
                    <p><strong>Your Details - 2 of 3</strong></p>
                    <div class="row">
                        <form method="post" role="form" action=" <?php echo base_url() . 'UserRegPart3'; ?>">
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
<!--                            <input type="hidden" name="total_amount" id="total_amount" value="<?php echo $total_amount; ?>">-->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="Name"></label>
                                    <input id="org_name" type="text" name="org_name" placeholder="Name of the School" class="form-control" required="">
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label sr-only " for="Name"></label>
                                <input id="city" type="text" name="city" placeholder="City" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label sr-only " for="Name"></label>
                                <select class="form-control" required="" id="state" name="state">
                                    <option value="">State</option>
                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                    <option value="Daman and Diu">Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Orissa">Orissa</option>
                                    <option value="Pondicherry">Pondicherry</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttaranchal">Uttaranchal</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label sr-only " for="Name"></label>
                                <select class="form-control" required="" id="country" name="country">
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Åland Islands">Åland Islands</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antarctica">Antarctica</option>
                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Bouvet Island">Bouvet Island</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Territories">French Southern Territories</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guernsey">Guernsey</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guinea-bissau">Guinea-bissau</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India" selected="true">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jersey">Jersey</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                    <option value="Korea, Republic of">Korea, Republic of</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macao">Macao</option>
                                    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Pitcairn">Pitcairn</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russian Federation">Russian Federation</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Saint Helena">Saint Helena</option>
                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia">Saint Lucia</option>
                                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                    <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                    <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Timor-leste">Timor-leste</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Viet Nam">Viet Nam</option>
                                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                    <option value="Western Sahara">Western Sahara</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label required sr-only" for="select"></label>
                                <select class="form-control" required="" id="stream" name="stream">
                                    <!--<optgroup label="Category">-->
                                    <option value="">Stream</option>
                                    <option value="Commerce">Commerce</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Healthcare">Healthcare</option>
                                    <option value="Hotel Management">Hotel Management</option>
                                    <option value="Humanities">Humanities</option>
                                    <option value="Law">Law</option>
                                    <option value="Management">Management</option>
                                    <option value="Science">Science</option>
                                    <option value="Others">Others</option>
                                    <!--</optgroup>-->

                                </select>
                            </div>
                        </div>
                        <div id="other_stream" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:none">
                            <div class="form-group">
                                <label class="control-label sr-only " for="Name"></label>
                                <input  type="text" id="other_stream" name="other_stream" placeholder="Specify Stream if Other!" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label required sr-only" for="select"></label>
                                <select class="form-control" required="" id="course" name="course">
                                    <!--<optgroup label="Category">-->
                                    <option value="">Course</option>
                                    <option value="B. Com">B. Com </option>
                                    <option value="B.Sc">B.Sc.</option>
                                    <option value="B Tech">B Tech</option>
                                    <option value="BA">BA</option>
                                    <option value="BBA">BBA</option>
                                    <option value="BCA">BCA</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="M. Com">M. Com</option>
                                    <option value="M. Phil">M. Phil</option>
                                    <option value="M.Sc.">M.Sc.</option>
                                    <option value="M Tech">M Tech</option>
                                    <option value="MA">MA</option>
                                    <option value="MBA">MBA</option>
                                    <option value="PGDBM">PGDBM</option>
                                    <option value="PGDCA">PGDCA</option>
                                    <option value="MCA">MCA</option>
                                    <option value="PhD">PhD</option>
                                    <option value="LLB">LLB</option>
                                    <option value="LLM">LLM</option>
                                    <option value="Others">Others</option>
                                    <!--</optgroup>-->

                                </select>
                            </div>
                        </div>
                        <div id="other_course" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:none">
                            <div class="form-group">
                                <label class="control-label sr-only " for="Name"></label>
                                <input  type="text" id="other_course" name="other_course" placeholder="Specify Course if Other!" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class = "row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label required sr-only" for="select"></label>
                                <select class="form-control" required="" id="parent" name="specialization_area_parent">
                                    <!--<optgroup label="Category">-->
                                    <option value="0">Area of Specialization</option>
                                    <option value="1">Engineering</option>
                                    <option value="2">Business Administration</option>
                                    <option value="3">Science</option>
                                    <option value="4">Humanities</option>
                                    <option value="5">Law</option>
                                    <option value="6">Healthcare</option>
                                    <option value="7">Hotel Management</option>
                                    <!--</optgroup>-->

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label required sr-only" for="select"></label>
                                <select class="form-control" required="" id="child" name="specialization_area_child">
                                    <option class="0" value="0"></option>
                                    <option class="1" value="Aeronautical">Aeronautical</option>
                                    <option class="1" value="Biotechnology">Biotechnology</option>
                                    <option class="1" value="Chemical">Chemical</option>
                                    <option class="1" value="Civil">Civil</option>
                                    <option class="1" value="CS & IT">CS & IT</option>
                                    <option class="1" value="ECE">ECE</option>
                                    <option class="1" value="Electrical & Electronics">Electrical & Electronics</option>
                                    <option class="1" value="Instrumentation">Instrumentation</option>
                                    <option class="1" value="Mechanical">Mechanical</option>
                                    <option class="1" value="Metallurgy">Metallurgy</option>
                                    <option class="1" value="Nanotechnology">Nanotechnology</option>
                                    <option class="1" value="Other">Other</option>
                                    <option class="2" value="Agri-Business">Agri-Business</option>
                                    <option class="2" value="Entrepreneurship">Entrepreneurship</option>
                                    <option class="2" value="Finance">Finance</option>
                                    <option class="2" value="Health care">Health care</option>
                                    <option class="2" value="Hospital">Hospital</option>
                                    <option class="2" value="Human Resources">Human Resources</option>
                                    <option class="2" value="International Business">International Business</option>
                                    <option class="2" value="IT">IT</option>
                                    <option class="2" value="Marketing">Marketing</option>
                                    <option class="2" value="Operations">Operations</option>
                                    <option class="2" value="Retail">Retail</option>
                                    <option class="2" value="Rural Management">Rural Management</option>
                                    <option class="2" value="Supply Chain Management">Supply Chain Management</option>
                                    <option class="2" value="Telecom">Telecom</option>
                                    <option class="2" value="Other">Other</option>
                                    <option class="3" value="Biochemistry">Biochemistry</option>
                                    <option class="3" value="Biology">Biology</option>
                                    <option class="3" value="Botany">Botany</option>
                                    <option class="3" value="Chemistry">Chemistry</option>
                                    <option class="3" value="Electronics">Electronics</option>
                                    <option class="3" value="Mathematics">Mathematics</option>
                                    <option class="3" value="Microbiology">Microbiology</option>
                                    <option class="3" value="Physics">Physics</option>
                                    <option class="3" value="Zoology">Zoology</option>
                                    <option class="3" value="Agriculture">Agriculture</option>
                                    <option class="3" value="Horticulture">Horticulture</option>
                                    <option class="3" value="Other">Other</option>
                                    <option class="4" value="Archeology">Archeology</option>
                                    <option class="4" value="Economics">Economics</option>
                                    <option class="4" value="Geography">Geography</option>
                                    <option class="4" value="History">History</option>
                                    <option class="4" value="Library Sciences">Library Sciences</option>
                                    <option class="4" value="Literature">Literature</option>
                                    <option class="4" value="Philosophy">Philosophy</option>
                                    <option class="4" value="Political Science">Political Science</option>
                                    <option class="4" value="Psephology">Psephology</option>
                                    <option class="4" value="Psychology">Psychology</option>
                                    <option class="4" value="Public Administration">Public Administration</option>
                                    <option class="4" value="Sociology">Sociology</option>
                                    <option class="4" value="Statistics">Statistics</option>
                                    <option class="4" value="Other">Other</option>
                                    <option class="5" value="Civil">Civil</option>
                                    <option class="5" value="Corporate">Corporate</option>
                                    <option class="5" value="Criminal">Criminal</option>
                                    <option class="5" value="General">General</option>
                                    <option class="5" value="International">International</option>
                                    <option class="5" value="Labor">Labor</option>
                                    <option class="5" value="Patent">Patent</option>
                                    <option class="5" value="Real Estate">Real Estate</option>
                                    <option class="5" value="Tax">Tax</option>
                                    <option class="5" value="Other">Other</option>
                                    <option class="6" value="MBBS">MBBS</option>
                                    <option class="6" value="Nursing">Nursing</option>
                                    <option class="6" value="Nutrition and Dietetics">Nutrition and Dietetics</option>
                                    <option class="6" value="Civil">Civil</option>
                                    <option class="6" value="CS & IT">CS & IT</option>
                                    <option class="6" value="Pharmacy">Pharmacy</option>
                                    <option class="6" value="Physiotherapy">Physiotherapy</option>
                                    <option class="6" value="Other">Other</option>
                                    <option class="7" value="Accommodation">Accommodation</option>
                                    <option class="7" value="Bakery and Confectionary">Bakery and Confectionary</option>
                                    <option class="7" value="Food and Beverage">Food and Beverage</option>
                                    <option class="7" value="Food Production">Food Production</option>
                                    <option class="7" value="Front Office">Front Office</option>
                                    <option class="7" value="General">General</option>
                                    <option class="7" value="Housekeeping">Housekeeping</option>
                                    <option class="7" value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="other_specialization_area" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:none">
                        <div class="form-group">
                            <label class="control-label sr-only " for="Name"></label>
                            <input  type="text" id="other_specialization_area" name="other_specialization_area" placeholder="Specify Specialization if Other!" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label sr-only " for="Name"></label>
                                <input id="phone" type="number" name="phone" placeholder="Contact No." class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label sr-only " for="dob"></label>
                                <input type="date" id="dob" name="dob" placeholder="Date Of Birth" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label required sr-only" for="select"></label>
                                <select class="form-control" id="payment_method" required="" name="payment_method">
                                    <option value="online_payment">Online Payment</option>
                                    <option value="uid">Payment by UID</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                            <button type="submit" id="submit" class="btn btn-success btn-sm ">Continue</button>
                        </div>

                        </form>
                    </div>
                </div>
            </section><!-- end col-md-9 -->


        </div>

        <?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>
<style>


    .tooltip.top .tooltip-inner{

        max-width:250px;

        padding:3px 8px;

        color:#fff;

        text-align:center;

        background-color:rgb(1, 137, 123);

        border-radius:5px

    }


</style>
<script>
    $("#stream").on('change', function () {
        var stream = $("#stream").val();
        if (stream == "Others") {
            $("#other_stream").show();
        } else {
            $("#other_stream").hide();
        }

    });
    $("#course").on('change', function () {
        var course = $("#course").val();
        if (course == "Others") {
            $("#other_course").show();
        } else {
            $("#other_course").hide();
        }

    });
    $("#child").on('change', function () {
        var child = $("#child").val();
        if (child == "Others") {
            alert("other_specialization_area");
            $("#other_specialization_area").show();
        } else {
            $("#other_specialization_area").hide();
        }

    });
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip({
            placement: "top"
        });

    });
    function checkPass()
    {
        //Store the password field objects into variables ...
        var pass1 = document.getElementById('newPassword');
        var pass2 = document.getElementById('confirmPassword');
        //Store the Confimation Message Object ...
        var message = document.getElementById('confirmMessage');
        //Set the colors we will be using ...
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        //Compare the values in the password field
        //and the confirmation field
        if (pass1.value == pass2.value) {
            $('#confirmPassword').parent().removeClass("has-warning");
            message.style.color = goodColor;
            message.innerHTML = "Passwords Match!";
            $("#submit").prop('disabled', false);
        } else {
            $('#confirmPassword').parent().addClass("has-warning");
            message.style.color = badColor;
            message.innerHTML = "Passwords Do Not Match!";
            $("#submit").prop('disabled', true);
        }
    }
    function checkMail()
    {
        //Store the password field objects into variables ...
        var pass1 = document.getElementById('email');
        var pass2 = document.getElementById('confirmEmail');
        //Store the Confimation Message Object ...
        var message = document.getElementById('confirmEmailMessage');
        //Set the colors we will be using ...
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        //Compare the values in the password field
        //and the confirmation field
        if (pass1.value == pass2.value) {
            $('#confirmEmail').parent().removeClass("has-warning");
            message.style.color = goodColor;
            message.innerHTML = "Email Ids Match!";
            $("#submit").prop('disabled', false);
        } else {
            $('#confirmEmail').parent().addClass("has-warning");
            message.style.color = badColor;
            message.innerHTML = "Email Ids Do Not Match!";
            $("#submit").prop('disabled', true);
        }
    }

    $("form").submit(function () {
        $(this).find(":submit").prop('disabled', true);
        $(this).find(":submit").html("please wait....");
//        alert('Form is submitting....');
        $.blockUI({message: '<h1><img src="<?php echo base_url(); ?>/assets/img/ajax-loader.gif" /> </h1><h4>Please Wait...</h4>', css: {width: '18%', left: '40%'}});

//        alert('Form is submitting....');
// Or Do Something...
        return true;
    });
</script>
<script type="text/javascript">
//    $('#dob').datetimepicker({
//        allowInputToggle: true,
//        dateFormat: "dd-mm-yy",
//        altField: "#date_to",
//        altFormat: "yy-mm-dd"
//    });

//    $(document).ready(function () {
//        $("#Engineering").hide();
//        $("#Business_Administration").hide();
//    });
//
//    $("#parent").on('change', function () {
////        var child = $("#parent option:selected").text();
//        var child = $("#parent").val();
//
//
//
//        switch (child)
//        {
//            case 'Engineering':
////                $("#Engineering option").each(function ()
////                {
////                    var loop = $(this).val();
//////                    alert(loop);
////                    $("#child").val(loop);
////                });
//                break;
//            case 'Business_Administration':
////                $("#child").val($("#Business_Administration").val());
//                break;
//            default:
//                $("#child").val("");
//        }
//
//    }
//    );

    $("#parent").change(function () {
        if ($(this).data('options') === undefined) {
            /*Taking an array of all options-2 and kind of embedding it on the select1*/
            $(this).data('options', $('#child option').clone());
        }
        var id = $(this).val();
        var options = $(this).data('options').filter('[class=' + id + ']');
        $('#child').html(options);
    });
</script>


