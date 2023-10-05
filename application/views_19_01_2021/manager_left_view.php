<div class="container main_container">
    <div class="main_body">

        <div class="row" id="bigCallout">
            <!--sidebar panel start -->
            <aside class="col-md-3">

                <!-- quick-manage-program menu start -->
                <div class="panel panel-primary border" id="quick-manage-program">
                    <!--            <div class="panel-heading">-->
                    <h4 class="quickpanelhead quiz_head">Quick Manage Content</h4>

                    <ul class="nav nav-pills nav-tabs nav-stacked nav-sidebar accordion">
                        <?php
//                if ($this->custom->validate_permissions("manage", "programs", "") == 7) {
//                    echo '<li><a href="' . base_url() . 'manage/programs">Manage Programs</a></li>';
//                }
//                if ($this->custom->validate_permissions("manage", "subprograms", "") == 7) {
//                    echo '<li><a href = "' . base_url() . 'manage/subprograms">Manage Subprograms</a></li>';
//                }
//                if ($this->custom->validate_permissions("manage", "lessons", "") == 7) {
//                    echo '<li><a href = "' . base_url() . 'manage/lessons">Manage Lessons</a></li>';
//                }
//                if ($this->custom->validate_permissions("manage", "pages", "") == 7) {
//                    echo '<li><a href = "' . base_url() . 'manage/pages">Manage Pages</a></li>';
//                }
                        if ($this->custom->validate_permissions("manage", "node", "") == 7) {
                            echo '<li><a href = "' . base_url() . 'manage/node">Manage Node</a></li>';
                        }
                        if ($this->custom->validate_permissions("manage", "quiz", "") == 7) {
                            echo '<li><a href = "' . base_url() . 'manage/quiz">Manage Quiz</a></li>';
                        }
                        if ($this->custom->validate_permissions("manage", "quiz_story", "") == 7) {
                            echo '<li><a href = "' . base_url() . 'manage/quiz_story">Manage Quiz Story</a></li>';
                        }
                        if ($this->custom->validate_permissions("manage", "category", "") == 7) {
                            echo '<li><a href="' . base_url() . 'manage/category">Manage Quiz Category</a></li>';
                        }
                        if ($this->custom->validate_permissions("manage", "questions", "") == 7) {
                            echo '<li><a href = "' . base_url() . 'manage/questions">Manage Questions</a></li>';
                        }
                        if ($this->custom->validate_permissions("manage", "news_letter", "") == 7) {
                            echo '<li><a href = "' . base_url() . 'manage/news_letter">Manage News Letter</a></li>';
                        }
                        if ($this->custom->validate_permissions("manage", "news_letter", "") == 7) {
                            echo '<li><a href = "' . base_url() . 'manage/blog">Manage Blog </a></li>';
                        }
                        if ($this->custom->validate_permissions("manage", "news_letter", "") == 7) {
                            echo '<li><a href = "' . base_url() . 'manage/blog_category">Manage Blog Category</a></li>';
                        }


//                if ($this->custom->validate_permissions("manage", "sheets", "") == 7) {
//                    echo '<li><a href = "' . base_url() . 'manage/sheets">Manage Action Sheets</a></li>';
//                }
//                if ($this->custom->validate_permissions("manage", "actionsheet_category", "") == 7) {
//                    echo '<li><a href = "' . base_url() . 'manage/actionsheet_category">Manage Action Sheet Category</a></li>';
//                }
//                if ($this->custom->validate_permissions("manage", "valuesheet", "") == 7) {
//                    echo '<li><a href = "' . base_url() . 'manage/valuesheet">Value Sheet</a></li>';
//                }
//                        echo '<li><a href = "' . base_url() . 'manage/package_category">Manage Packages Category</a></li>';
                        echo '<li><a href = "' . base_url() . 'manage/packages">Manage Packages</a></li>';

                        echo '<li><a href = "' . base_url() . 'manage/sheets">Manage Action Sheets</a></li>';
                        echo '<li><a href = "' . base_url() . 'manage/actionsheet_category">Manage Action Sheet Category</a></li>';

                        echo '<li><a href = "' . base_url() . 'manage/testimonials">Manage Testimonials</a></li>';

                        echo '<li><a href = "' . base_url() . 'couponGenerator/manage">Manage Coupon Generator</a></li>';
                        echo '<li><a href = "' . base_url() . 'manage/payment_details">Payment Reports</a></li>';
                        ?>

                    </ul>
                </div>

                <div class="panel panel-primary border" id="quick-manage-program">
                    <!--            <div class="panel-heading">-->
                    <h4 class="quickpanelhead quiz_head">Quick Manage Users</h4>

                    <ul class="nav nav-pills nav-tabs nav-stacked nav-sidebar accordion">
                        <?php
                        if ($this->custom->validate_permissions("manage", "users", "") == 7) {
                            echo '<li><a href = "' . base_url() . 'manage/users">Manage Users</a></li>';
                        }
                        if ($this->custom->validate_permissions("manage", "roles", "") == 7) {
                            echo '<li><a href = "' . base_url() . 'manage/roles">Manage Roles</a></li>';
                        }
                        if ($this->custom->validate_permissions("manage", "permission_groups", "") == 7) {
                            echo '<li><a href = "' . base_url() . 'manage/permission_groups">Manage Permission Groups</a></li>';
                        }
                        if ($this->custom->validate_permissions("manage", "control_points", "") == 7) {
                            echo '<li><a href = "' . base_url() . 'manage/control_points">Manage Control Points</a></li>';
                        }
                        if ($this->custom->validate_permissions("assign", "node-users", "") == 7) {
                            echo '<li><a href = "' . base_url() . 'assign/node-users">Assign Permission for Programs</a></li>';
                        }
                        if ($this->custom->validate_permissions("showcontent", "node-users", "") == 7) {
                            echo '<li><a href = "' . base_url() . 'showcontent/node-users">Assign Permission for Sub-Programs</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <!-- end quick-manage-program menu -->

                <!-- quick-add-program menu start -->
                <div class="panel panel-primary border" id="quick-manage-program">
                    <!--            <div class="panel-heading">-->
                    <h4 class="quickpanelhead quiz_head">Quick Add Content</h4>

                    <ul class="nav nav-pills nav-tabs nav-stacked nav-sidebar accordion">
                        <?php
//                if ($this->custom->validate_permissions("add", "programs", "") == 7) {
//                    echo '<li><a href="' . base_url() . 'add/programs">Add Program</a></li>';
//                }
//                if ($this->custom->validate_permissions("add", "subprograms", "") == 7) {
//                    echo '<li><a href="' . base_url() . 'add/subprograms">Add Subprogram</a></li>';
//                }
//                if ($this->custom->validate_permissions("add", "lessons", "") == 7) {
//                    echo '<li><a href="' . base_url() . 'add/lessons">Add Lesson</a></li>';
//                }
//                if ($this->custom->validate_permissions("add", "pages", "") == 7) {
//                    echo '<li><a href="' . base_url() . 'add/pages">Add Page</a></li>';
//                }
                        if ($this->custom->validate_permissions("add", "quiz", "") == 7) {
                            echo '<li><a href="' . base_url() . 'add/quiz">Add Quiz</a></li>';
                        }
                        if ($this->custom->validate_permissions("add", "category", "") == 7) {
                            echo '<li><a href="' . base_url() . 'add/category">Add Quiz Category</a></li>';
                        }
                        if ($this->custom->validate_permissions("add", "quiz_story", "") == 7) {
                            echo '<li><a href="' . base_url() . 'add/quiz_story">Add Quiz Story</a></li>';
                        }
                        if ($this->custom->validate_permissions("add", "questions", "") == 7) {
                            echo '<li><a href="' . base_url() . 'manage/questions">Add Question</a></li>';
                        }

                        echo '<li><a href="' . base_url() . 'manage/subjectivequestions">Add Subjective Question</a></li>';

                        if ($this->custom->validate_permissions("add", "node", "") == 7) {
                            echo '<li><a href="' . base_url() . 'add/node">Add Node</a></li>';
                        }

                        if ($this->custom->validate_permissions("add", "node", "") == 7) {
                            echo '<li><a href = "' . base_url() . 'create/blog_category">Add Blog Category</a></li>';
                        }
                        if ($this->custom->validate_permissions("add", "node", "") == 7) {
                            echo '<li><a href = "' . base_url() . 'add_blog">Add Blog </a></li>';
                        }

                        if ($this->custom->validate_permissions("add", "testimonials", "") == 7) {
                            echo '<li><a href = "' . base_url() . 'add/testimonials">Add Testimonials </a></li>';
                        }
                        ?>
                    </ul>
                </div>

                <div class="panel panel-primary border" id="quick-manage-program">
                    <!--            <div class="panel-heading">-->
                    <h4 class="quickpanelhead quiz_head">Quick Add Users</h4>

                    <ul class="nav nav-pills nav-tabs nav-stacked nav-sidebar accordion">
                        <?php
                        if ($this->custom->validate_permissions("add", "users", "") == 7) {
                            echo '<li><a href="' . base_url() . 'add/users">Add User</a></li>';
                        }
                        if ($this->custom->validate_permissions("add", "roles", "") == 7) {
                            echo '<li><a href="' . base_url() . 'add/roles">Add Roles</a></li>';
                        }
                        if ($this->custom->validate_permissions("add", "permission_groups", "") == 7) {
                            echo '<li><a href="' . base_url() . 'add/permission_groups">Add Permission Group</a></li>';
                        }
                        if ($this->custom->validate_permissions("add", "control_points", "") == 7) {
                            echo '<li><a href="' . base_url() . 'add/control_points">Add Control Point</a></li>';
                        }
                        ?>
                    </ul>
                </div>


            </aside><!-- end col-md-3 -->
            <!-- end sidebar panel -->