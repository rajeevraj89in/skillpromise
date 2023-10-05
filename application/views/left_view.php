<!-- Content and Sidebar
======================================================= -->

<div class="row" id="bigCallout">
    <!--sidebar panel start -->
    <aside class="col-md-3">

        <!-- programe menu start -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Our Program</h3>
            </div>
            <ul class="nav nav-pills nav-stacked nav-sidebar" id="accordion">
                <?php
//                echo $this->main_model->fill_node_li('node', 'name', 0, "parent_id", 0);
                $query['data'] = $this->main_model->get_records('node', 'parent_id', 0, 'sort_order, name');
                foreach ($query['data']->result() as $rec) {
                    echo '<li><a href="' . base_url() . "node/$rec->id" . '">' . "$rec->name .</a></li>";
                }
                ?>

            </ul>
        </div>
        <!-- end programe menu -->

        <!-- news letter subscribe start -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Free eNewsletter</h3>
            </div>
            <div class="panel-body">
                Learn new skills every month and get our Personal Selling Toolkit free as the Subscription bonus
            </div>
            <div class="panel-body text-center">
                <!-- Button trigger modal -->
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                    Click to subscribe
                </button>

                <!-- Modal -->
                <div class="modal fade text-left" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">Free eNewsletter</h4>
                            </div>
                            <div class="modal-body">
                                <form role="form">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div><!-- end Modal -->
            </div><!-- end panel body -->
        </div>
        <!-- end news letter subscribe -->

    </aside><!-- end col-md-3 -->
    <!-- end sidebar panel -->