<body>
  <?php

include "includes/admin_header.php";

?>
    <div id= "wrapper" >


    <?php

include "includes/admin_navigation.php";

?>


        <div id = "page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            welcome to admin
                            <small>author</small>
                        </h1>


                    <div class="col-xs-6">

                    <?php insert_categories();?>


                        <form action = "" method ="post"> <!--add category form -->

                        <div class="form-group">
                            <label for ="cat_title">add category</label>

                        <input type ="text" class="form-control" name = "cat_title">
                        </div>
                        <!--</form>-->

                        <div class="form-group">

                        <input class="btn btn-primary" type ="submit" name = "submit" value = "add category">


                        </div>
                        </form>

                        <?php

if (isset($_GET['edit'])) {

    $cat_id = $_GET['edit'];
    include "includes/update_category.php";
}

?>

                        </div>
                        <div class ="col-xs-6">

                            <table class ="table table-bordered table-hover">

                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>category title</th>

                            </tr>
                                </thead>

                                <tbody>
                                <tr>




                                    <?php findallcategories(); //FIND all categor?>


                                    <?php deletecategories(); //delete query ?>







                                    </tr>
                                </tbody>
                            </table>


                        </div>


                      <!-- </div>-->

                 </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


        <?php
include "includes/admin_footer.php";

?>
<!--</form>-->
  </body>




