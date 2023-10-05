<?php
$this->load->view('header_view');
if ($_SESSION['role_name'] == "Student") {

    $this->load->view('home_left_view');
} else {
    $this->load->view('manager_left_view');
}
?>

<section class="col-md-9">
    <h1 class="page-header">Add Users by excel sheet</h1>
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">

            <div class="col-md-12">
                <form role="form" enctype="multipart/form-data" method="post" class="form-horizontal" action="<?php echo base_url(); ?>upload_applications">
                    <div class="row top-space">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group right"><label for="application_data2">Select Package</label></div>
                            </div>
                            <div class="col-md-4">
                                <select classs="" name="package" required>
                                    <option value=''>Select</option>
                                    <?php
                                     if(!empty($package)){
                                         foreach($package as $key => $value){
                                             ?>
                                             <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                             <?php
                                         }
                                     }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                    <div class="row top-space">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group right"><label for="application_data2">Set Default Password</label></div>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="password" required class="form-control"/>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                    <div class="row top-space">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group right"><label for="application_data2">Stream</label></div>
                            </div>
                            <div class="col-md-4">
                                <select class="stream" required="" id="parent" required name="stream">
                                    <!--<optgroup label="Category">-->
                                    <option value="0">Stream</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Management">Management</option>
                                    <option value="Science">Science</option>
                                    <option value="Humanities">Humanities</option>
                                    <option value="Law">Law</option>
                                    <option value="Healthcare">Healthcare</option>
                                    <option value="Hotel Management">Hotel Management</option>
                                    <option value="Commerce">Commerce</option>
                                    <option value="Journalism and Mass Communication">Journalism and Mass Communication</option>
                                    <!--<option value="9">Management</option>-->
                                    <!--</optgroup>-->
                                </select>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                    <div class="row top-space">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group right"><label for="application_data2">Course</label></div>
                            </div>
                            <div class="col-md-4">
                                <select class="course" required="" id="course" name="course">
                                    
                                </select>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                    <div class="row top-space">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group right"><label for="application_data">upload File</label></div>
                            </div>
                            <div class="col-md-4">
                                <input type="file"  name="application_data"><p class="help-block">upload Excel file</p>
                            </div>
                            <div class="col-md-4"><button type="submit" class="btn btn-success">Upload</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
       
    </div>
     <!-- panel start -->
        <div class="panel-group">
            
            <div class="panel panel-primary">
              <div class="panel-heading"><b>Excel Upload Guide & Information</b></div>
              <div class="panel-body">
                  <ol>
                      <li><b>Before Upload the excel please select Package.</b></li>
                      <li><b>Set the comman password for all the student.</b></li>
                      <li><b>Select the stream before upload the excel sheet.</b></li>
                      <li><b>select the Course respectively.</b></li>
                      <li><b>At the end of final stage while uploading the data plese verify the data, where all the data as per order at below table.</b></li>
                  </ol>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Email</th>
                        <th>Name</th>
                        <th>College Name</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Date of Birht</th>
                        <th>Role</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>example.at@gmail.com</td>
                        <td>Shubham Kumar</td>
                        <td>Ranchi University</td>
                        <td>Ranchi</td>
                        <td>0000000000</td>
                        <td>Male</td>
                        <td>24</td>
                        <td>28/07/1997</td>
                        <td>1</td>
                      </tr>
                      <tr>
                        <td>example.at@gmail.com</td>
                        <td>Ragini Kumari</td>
                        <td>Ranchi University</td>
                        <td>Ranchi</td>
                        <td>0000000000</td>
                        <td>Female</td>
                        <td>24</td>
                        <td>28/07/1997</td>
                        <td>1</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </div>
            
          </div>
        <!-- end of panel -->
</section>
</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<script>
    $(".stream").change(function () {
        var stream1 = $("#parent option:selected").text();
        var series1 = [
            {stream: 'Engineering', course: 'B.Tech. Computer Science'},
            {stream: 'Engineering', course: 'B.Tech. Electronics & Communication'},
            {stream: 'Engineering', course: 'B.Tech. Electrical'},
            {stream: 'Engineering', course: 'B.Tech. Mechanical'},
            {stream: 'Engineering', course: 'B.Tech. Civil'},
            {stream: 'Engineering', course: 'B.Tech. Biotechnology'},
            {stream: 'Engineering', course: 'B.Tech. Aeronautical'},
            {stream: 'Engineering', course: 'B.Tech. Instrumentation & Control'},
            {stream: 'Engineering', course: 'B.Tech. Instrumentation & Control'},
            {stream: 'Law', course: 'LLB'},
            {stream: 'Law', course: 'LLM'},
            {stream: 'Law', course: 'PhD'},
            {stream: 'Management', course: 'BBA'},
            {stream: 'Management', course: 'BCA'},
            {stream: 'Management', course: 'MCA'},
            {stream: 'Management', course: 'MBA Marketing'},
            {stream: 'Management', course: 'MBA Finance'},
            {stream: 'Management', course: 'MBA Human Resources'},
            {stream: 'Management', course: 'MBA Analytics'},
            {stream: 'Management', course: 'MBA Retail'},
            {stream: 'Management', course: 'MBA International Business'},
            {stream: 'Management', course: 'MBA Operations'},
            {stream: 'Management', course: 'PGDM Marketing'},
            {stream: 'Management', course: 'PGDM Finance'},
            {stream: 'Management', course: 'PGDM Human Resources'},
            {stream: 'Management', course: 'PGDM Analytics'},
            {stream: 'Management', course: 'PGDM Retail'},
            {stream: 'Management', course: 'PGDM International Business'},
            {stream: 'Management', course: 'PGDM Operations'},
            {stream: 'Science', course: 'BSc Physics'},
            {stream: 'Science', course: 'BSc Chemistry'},
            {stream: 'Science', course: 'BSc Botany'},
            {stream: 'Science', course: 'BSc Zoology'},
            {stream: 'Science', course: 'BSc Biochemistry'},
            {stream: 'Science', course: 'BSc Statistics'},
            {stream: 'Science', course: 'BSc Environmental Science'},
            {stream: 'Science', course: 'BSc Agriculture'},
            {stream: 'Science', course: 'BSc Horticulture'},
            //{stream: 'Science', course: 'PhD'},
            {stream: 'Humanities', course: 'BA Pass'},
            {stream: 'Humanities', course: 'BA Psychology'},
            {stream: 'Humanities', course: 'BA Philosophy'},
            {stream: 'Humanities', course: 'BA Sociology'},
            {stream: 'Humanities', course: 'BA Political Science'},
            {stream: 'Humanities', course: 'BA Language & Literature'},
            {stream: 'Humanities', course: 'BA Economics'},
            {stream: 'Humanities', course: 'BA History'},
            {stream: 'Humanities', course: 'BA Geography'},
            //{stream: 'Hotel Management', course: 'Bachelor’s in Hotel Management'},
            //{stream: 'Hotel Management', course: 'Bachelor’s in Hotel Management and Catering Technology'},
            //{stream: 'Hotel Management', course: 'Master’s in Hotel Management'},
            //{stream: 'Hotel Management', course: 'Master’s in Hotel Management and Catering Technology'},
            //{stream: 'Hotel Management', course: 'PhD in Hotel Management'},
            {stream: 'Hotel Management', course: 'BA Hotel Management'},
            {stream: 'Hotel Management', course: 'BHM'},
            {stream: 'Healthcare', course: 'MBBS'},
            {stream: 'Healthcare', course: 'B. Pharm'},
            {stream: 'Healthcare', course: 'M. Pharm'},
            {stream: 'Healthcare', course: 'MD'},
            {stream: 'Healthcare', course: 'PhD'},
            {stream: 'Healthcare', course: 'MBBS'},
            {stream: 'Healthcare', course: 'B. Sc. Nursing'},
            {stream: 'Healthcare', course: 'B. Sc. Nutrition & Dietetics'},
            {stream: 'Healthcare', course: 'B. Sc. Physiotherapy'},
            {stream: 'Commerce', course: 'B. Com'},
            {stream: 'Commerce', course: 'M. Com'},
            {stream: 'Journalism and Mass Communication', course: 'BA Journalism & Mass Communication'},
            {stream: 'Journalism and Mass Communication', course: 'B.J.M.C'}
        ]

        var series2 = [
            {stream: 'Engineering', aos: 'Aeronautical'},
            {stream: 'Engineering', aos: 'Biotechnology'},
            {stream: 'Engineering', aos: 'Chemical'},
            {stream: 'Engineering', aos: 'Civil'},
            {stream: 'Engineering', aos: 'CS & IT'},
            {stream: 'Engineering', aos: 'ECE'},
            {stream: 'Engineering', aos: 'Electrical & Electronics'},
            {stream: 'Engineering', aos: 'Instrumentation'},
            {stream: 'Engineering', aos: 'Mechanical'},
            {stream: 'Engineering', aos: 'Metallurgy'},
            {stream: 'Engineering', aos: 'Nanotechnology'},
            {stream: 'Engineering', aos: 'Other'},
            {stream: 'Law', aos: 'Civil'},
            {stream: 'Law', aos: 'Corporate'},
            {stream: 'Law', aos: 'Criminal'},
            {stream: 'Law', aos: 'General'},
            {stream: 'Law', aos: 'International'},
            {stream: 'Law', aos: 'Labor'},
            {stream: 'Law', aos: 'Patent'},
            {stream: 'Law', aos: 'Real Estate'},
            {stream: 'Law', aos: 'Tax '},
            {stream: 'Law', aos: 'Other'},
            {stream: 'Management', aos: 'Agri-Business'},
            {stream: 'Management', aos: 'Entrepreneurship'},
            {stream: 'Management', aos: 'Finance'},
            {stream: 'Management', aos: 'Health care'},
            {stream: 'Management', aos: 'Hospitality, Travel and Tourism'},
            {stream: 'Management', aos: 'Hospital'},
            {stream: 'Management', aos: 'Hotel Management'},
            {stream: 'Management', aos: 'Human Resources'},
            {stream: 'Management', aos: 'International Business'},
            {stream: 'Management', aos: 'IT'},
            {stream: 'Management', aos: 'Marketing'},
            {stream: 'Management', aos: 'Operations'},
            {stream: 'Management', aos: 'Retail'},
            {stream: 'Management', aos: 'Rural Management'},
            {stream: 'Management', aos: 'Supply Chain Management'},
            {stream: 'Management', aos: 'Other'},
            {stream: 'Science', aos: 'Agriculture'},
            {stream: 'Science', aos: 'Animation'},
            {stream: 'Science', aos: 'Aquaculture'},
            {stream: 'Science', aos: 'Aviation'},
            {stream: 'Science', aos: 'Biochemistry'},
            {stream: 'Science', aos: 'Bioinformatics'},
            {stream: 'Science', aos: 'Biology'},
            {stream: 'Science', aos: 'Botany'},
            {stream: 'Science', aos: 'Chemistry'},
            {stream: 'Science', aos: 'Computer Science'},
            {stream: 'Science', aos: 'Dietetics'},
            {stream: 'Science', aos: 'Electronics'},
            {stream: 'Science', aos: 'Fashion Technology'},
            {stream: 'Science', aos: 'Food Technology'},
            {stream: 'Science', aos: 'Forensic Science'},
            {stream: 'Science', aos: 'Forestry'},
            {stream: 'Science', aos: 'Genetics'},
            {stream: 'Science', aos: 'Home Science'},
            {stream: 'Science', aos: 'Horticulture'},
            {stream: 'Science', aos: 'Hospitality and Hotel Administration'},
            {stream: 'Science', aos: 'Hospitality and Tourism Management'},
            {stream: 'Science', aos: 'Information Technology'},
            {stream: 'Science', aos: 'Interior Design'},
            {stream: 'Science', aos: 'Mathematics'},
            {stream: 'Science', aos: 'Medical Technology'},
            {stream: 'Science', aos: 'Microbiology'},
            {stream: 'Science', aos: 'Multimedia'},
            {stream: 'Science', aos: 'Nautical Science'},
            {stream: 'Science', aos: 'Nursing'},
            {stream: 'Science', aos: 'Physics'},
            {stream: 'Science', aos: 'Physiotherapy'},
            {stream: 'Science', aos: 'Psychology'},
            {stream: 'Science', aos: 'Statistics'},
            {stream: 'Science', aos: 'Zoology'},
            {stream: 'Science', aos: 'Other'},
            {stream: 'Humanities', aos: 'Archeology'},
            {stream: 'Humanities', aos: 'Economics'},
            {stream: 'Humanities', aos: 'General'},
            {stream: 'Humanities', aos: 'Geography'},
            {stream: 'Humanities', aos: 'History'},
            {stream: 'Humanities', aos: 'Hotel Management'},
            {stream: 'Humanities', aos: 'Library Sciences'},
            {stream: 'Humanities', aos: 'Literature'},
            {stream: 'Humanities', aos: 'Philosophy'},
            {stream: 'Humanities', aos: 'Political Science'},
            {stream: 'Humanities', aos: 'Psephology'},
            {stream: 'Humanities', aos: 'Psychology'},
            {stream: 'Humanities', aos: 'Public Administration'},
            {stream: 'Humanities', aos: 'Sociology'},
            {stream: 'Humanities', aos: 'Statistics'},
            {stream: 'Humanities', aos: 'Other'},
            {stream: 'Hotel Management', aos: 'Accommodation'},
            {stream: 'Hotel Management', aos: 'Bakery and Confectionary '},
            {stream: 'Hotel Management', aos: 'Food and Beverage'},
            {stream: 'Hotel Management', aos: 'Food Production'},
            {stream: 'Hotel Management', aos: 'Front Office'},
            {stream: 'Hotel Management', aos: 'General'},
            {stream: 'Hotel Management', aos: 'Housekeeping'},
            {stream: 'Hotel Management', aos: 'Other'},
            {stream: 'Healthcare', aos: 'Anesthesiology'},
            {stream: 'Healthcare', aos: 'Cardio-Thoracic surgery'},
            {stream: 'Healthcare', aos: 'Cardiology'},
            {stream: 'Healthcare', aos: 'Clinical Hematology'},
            {stream: 'Healthcare', aos: 'Craniologist'},
            {stream: 'Healthcare', aos: 'Dermatology'},
            {stream: 'Healthcare', aos: 'Endocrinology'},
            {stream: 'Healthcare', aos: 'ENT'},
            {stream: 'Healthcare', aos: 'Gastroenterology'},
            {stream: 'Healthcare', aos: 'General'},
            {stream: 'Healthcare', aos: 'General Medicine'},
            {stream: 'Healthcare', aos: 'General Surgery'},
            {stream: 'Healthcare', aos: 'Immunology'},
            {stream: 'Healthcare', aos: 'Nephrology'},
            {stream: 'Healthcare', aos: 'Neuro Surgery'},
            {stream: 'Healthcare', aos: 'Obstetrics and Gynecology'},
            {stream: 'Healthcare', aos: 'Oncology'},
            {stream: 'Healthcare', aos: 'Ophthalmology'},
            {stream: 'Healthcare', aos: 'Orthopedics'},
            {stream: 'Healthcare', aos: 'Pathologist'},
            {stream: 'Healthcare', aos: 'Pediatric surgery'},
            {stream: 'Healthcare', aos: 'Pediatrics'},
            {stream: 'Healthcare', aos: 'Plastic Surgery'},
            {stream: 'Healthcare', aos: 'Psychiatry'},
            {stream: 'Healthcare', aos: 'Rheumatology'},
            {stream: 'Healthcare', aos: 'Other'},
            {stream: 'Commerce', aos: 'Accounts and Finance'},
            {stream: 'Commerce', aos: 'Banking and Insurance'},
            {stream: 'Commerce', aos: 'Economics'},
            {stream: 'Commerce', aos: 'Entrepreneurship'},
            {stream: 'Commerce', aos: 'Financial Market'},
            {stream: 'Commerce', aos: 'General'},
            {stream: 'Commerce', aos: 'Investment Management'},
            {stream: 'Commerce', aos: 'Taxation'},
            {stream: 'Commerce', aos: 'Other'}
        ]


        switch (stream1) {
            case 'Engineering':

                var options = '<option value=""><strong>Course</strong></option>'; //create your "title" option
                $(series1).each(function (index, value) { //loop through your elements
                    if (value.stream == 'Engineering') { //check the company
                        options += '<option value="' + value.course + '">' + value.course + '</option>'; //add the option element as a string
                    }
                });

                $('#course').html(options);

                var options = '<option value=""><strong>Area of Specialization</strong></option>'; //create your "title" option
                $(series2).each(function (index, value2) { //loop through your elements
                    if (value2.stream == 'Engineering') { //check the company
                        options += '<option value="' + value2.aos + '">' + value2.aos + '</option>'; //add the option element as a string
                    }
                });

                $('#child').html(options);


                break;
            case 'Law':

                var options = '<option value=""><strong>Course</strong></option>'; //create your "title" option
                $(series1).each(function (index, value) { //loop through your elements
                    if (value.stream == 'Law') { //check the company
                        options += '<option value="' + value.course + '">' + value.course + '</option>'; //add the option element as a string
                    }
                });

                $('.course').html(options);

                var options = '<option value=""><strong>Area of Specialization</strong></option>'; //create your "title" option
                $(series2).each(function (index, value2) { //loop through your elements
                    if (value2.stream == 'Law') { //check the company
                        options += '<option value="' + value2.aos + '">' + value2.aos + '</option>'; //add the option element as a string
                    }
                });

                $('#child').html(options);

                break;
            case 'Management':

                var options = '<option value=""><strong>Course</strong></option>'; //create your "title" option
                $(series1).each(function (index, value) { //loop through your elements
                    if (value.stream == 'Management') { //check the company
                        options += '<option value="' + value.course + '">' + value.course + '</option>'; //add the option element as a string
                    }
                });

                $('#course').html(options);

                var options = '<option value=""><strong>Area of Specialization</strong></option>'; //create your "title" option
                $(series2).each(function (index, value2) { //loop through your elements
                    if (value2.stream == 'Management') { //check the company
                        options += '<option value="' + value2.aos + '">' + value2.aos + '</option>'; //add the option element as a string
                    }
                });

                $('#child').html(options);

                break;
            case 'Science':

                var options = '<option value=""><strong>Course</strong></option>'; //create your "title" option
                $(series1).each(function (index, value) { //loop through your elements
                    if (value.stream == 'Science') { //check the company
                        options += '<option value="' + value.course + '">' + value.course + '</option>'; //add the option element as a string
                    }
                });
                
            case 'Journalism and Mass Communication':

                var options = '<option value=""><strong>Course</strong></option>'; //create your "title" option
                $(series1).each(function (index, value) { //loop through your elements
                    if (value.stream == 'Journalism and Mass Communication') { //check the company
                        options += '<option value="' + value.course + '">' + value.course + '</option>'; //add the option element as a string
                    }
                });

                $('#course').html(options);

                var options = '<option value=""><strong>Area of Specialization</strong></option>'; //create your "title" option
                $(series2).each(function (index, value2) { //loop through your elements
                    if (value2.stream == 'Science') { //check the company
                        options += '<option value="' + value2.aos + '">' + value2.aos + '</option>'; //add the option element as a string
                    }
                });

                $('#child').html(options);

                break;
            case 'Humanities':

                var options = '<option value=""><strong>Course</strong></option>'; //create your "title" option
                $(series1).each(function (index, value) { //loop through your elements
                    if (value.stream == 'Humanities') { //check the company
                        options += '<option value="' + value.course + '">' + value.course + '</option>'; //add the option element as a string
                    }
                });

                $('#course').html(options);

                var options = '<option value=""><strong>Area of Specialization</strong></option>'; //create your "title" option
                $(series2).each(function (index, value2) { //loop through your elements
                    if (value2.stream == 'Humanities') { //check the company
                        options += '<option value="' + value2.aos + '">' + value2.aos + '</option>'; //add the option element as a string
                    }
                });

                $('#child').html(options);

                break;
            case 'Hotel Management':

                var options = '<option value=""><strong>Course</strong></option>'; //create your "title" option
                $(series1).each(function (index, value) { //loop through your elements
                    if (value.stream == 'Hotel Management') { //check the company
                        options += '<option value="' + value.course + '">' + value.course + '</option>'; //add the option element as a string
                    }
                });

                $('#course').html(options);

                var options = '<option value=""><strong>Area of Specialization</strong></option>'; //create your "title" option
                $(series2).each(function (index, value2) { //loop through your elements
                    if (value2.stream == 'Hotel Management') { //check the company
                        options += '<option value="' + value2.aos + '">' + value2.aos + '</option>'; //add the option element as a string
                    }
                });

                $('#child').html(options);

                break;
            case 'Healthcare':

                var options = '<option value=""><strong>Course</strong></option>'; //create your "title" option
                $(series1).each(function (index, value) { //loop through your elements
                    if (value.stream == 'Healthcare') { //check the company
                        options += '<option value="' + value.course + '">' + value.course + '</option>'; //add the option element as a string
                    }
                });

                $('#course').html(options);

                var options = '<option value=""><strong>Area of Specialization</strong></option>'; //create your "title" option
                $(series2).each(function (index, value2) { //loop through your elements
                    if (value2.stream == 'Healthcare') { //check the company
                        options += '<option value="' + value2.aos + '">' + value2.aos + '</option>'; //add the option element as a string
                    }
                });

                $('#child').html(options);

                break;
            case 'Commerce':

                var options = '<option value=""><strong>Course</strong></option>'; //create your "title" option
                $(series1).each(function (index, value) { //loop through your elements
                    if (value.stream == 'Commerce') { //check the company
                        options += '<option value="' + value.course + '">' + value.course + '</option>'; //add the option element as a string
                    }
                });

                $('#course').html(options);

                var options = '<option value=""><strong>Area of Specialization</strong></option>'; //create your "title" option
                $(series2).each(function (index, value2) { //loop through your elements
                    if (value2.stream == 'Commerce') { //check the company
                        options += '<option value="' + value2.aos + '">' + value2.aos + '</option>'; //add the option element as a string
                    }
                });

                $('#child').html(options);

                break;

            default :
                break;
        }
    });
</script>
<?php $this->load->view('html_end_view'); ?>
