<?php include("../admin/includes/header.php"); ?>

        <!-- Navigation -->
             <?php include("../admin/includes/nav.php");?>
        <!-- End of Navigation -->

           <div id="page-wrapper"  style="width: 95%">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Model 
                            <small>Details</small>
                       </h1>                     
                    </div>
                </div>
                <!-- /.row -->
<div class="row">
         <div class="col-lg-12">
                  <button type="button" class="btn btn-primary pull-right btn-xs" data-title="Add" data-toggle="modal" data-target="#add"><span class="glyphicon glyphicon-plus-sign" ></span>Add Model</button>
         </div>

                
        <div class="col-md-12">
           <div class="table-responsive">
              <table id="mytable" class="table table-bordred table-striped">
 
                   <thead>
                   <th>Id</th>
                   <th>Name</th>
                   <th>Available Count</th>
                   <th>Sold Count</th>
                   <th>Created On</th>
                   <th>Action</th>
                    
                   </thead>
    <tbody>
     <?php 
                
                $result_set = Model::get_all_model_list();
                if(!empty($result_set))                               
                {
                  foreach ($result_set as $res) 
                  {

                           echo '<tr>
                                 <td>'.$res->model_id.'</td>
                                 <td>'.$res->model_name.'</td>
                                 <td>'.$res->model_avaliable_count.'</td>
                                 <td>'.$res->model_sold_count.'</td>
                                 <td>'.$res->created_on.'</td>
                                 <td><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>
                                 <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></td>
                                 </tr>';
                  }
         
                }
                else
                {

                  echo '<tr>
                        <td colspan = "5">No record exists</td>
                       </tr>';
                }

     ?>
     </tbody>
</table>

<div class="clearfix"></div>
<ul class="pagination pull-right">
  <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul>
                
            </div>
            
        </div>
    </div>
    <?php 
     $results = Manufacturer::get_all_manufacturers_list();    
    ?>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Add Model Details</h4>
      </div>
          <div class="modal-body">
              <div class="row">
                    <div class="col-xs-6 col-md-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" required autofocus />
                    </div>
                    <div class="col-xs-6 col-md-6 form-group">
                    <select class="form-control" id="manufacturer_list" placeholder= "Select Manufacturer">
                      <option>Select Manufacturer</option>
                      <?php
                        if(!empty($results))
                            foreach ($results as $res)
                               echo '<option value = '.$res['manufacturer_id'].'>'.$res['manufacturer_name'].'</option>';
                         ?>
                        
                      
                    </select>
                    </div>
               </div>
              <div class="row">

                <div class="col-xs-6 col-md-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Color" type="color" required/>
                    </div>
                    <div class="col-xs-6 col-md-6 form-group">
                    <select class="form-control" id="manufacturer_list" placeholder= "Select Manufacturering Year">
                        <option>Select Manufacturing Year</option>
                        <?php 
                            foreach(range(1950, (int)date("Y")) as $year) 
                            {
                                         echo "\t<option value='".$year."'>".$year."</option>\n\r";
                            }

                        ?>
                    </select>
                    </div>
            
              </div>
               <div class="row">

                <div class="col-xs-6 col-md-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Registration Number" type="text" required/>
                    </div>
                    <div class="col-xs-6 col-md-6 form-group">
                    <textarea rows="3" class="form-control" id="notes" placeholder="Notes"></textarea>
                    </div>
            
              </div>
      
          <div class="modal-footer ">
        <button type="button" class="btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-ok-sign"></span>Add</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Manufacturer Details</h4>
      </div>
          <div class="modal-body">
         <div class="row">
                    <div class="col-xs-6 col-md-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" required autofocus />
                    </div>
                    <div class="col-xs-6 col-md-6 form-group">
                    <select class="form-control" id="manufacturer_list" placeholder= "Select Manufacturer">
                      <option>Select Manufacturer</option>
                      <?php
                        if(!empty($results))
                            foreach ($results as $res)
                               echo '<option value = '.$res['manufacturer_id'].'>'.$res['manufacturer_name'].'</option>';
                         ?>
                        
                      
                    </select>
                    </div>
               </div>
              <div class="row">

                <div class="col-xs-6 col-md-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Color" type="color" required/>
                    </div>
                    <div class="col-xs-6 col-md-6 form-group">
                    <select class="form-control" id="manufacturer_list" placeholder= "Select Manufacturering Year">
                        <option>Select Manufacturing Year</option>
                        <?php 
                            foreach(range(1950, (int)date("Y")) as $year) 
                            {
                                         echo "\t<option value='".$year."'>".$year."</option>\n\r";
                            }

                        ?>
                    </select>
                    </div>
            
              </div>
               <div class="row">

                <div class="col-xs-6 col-md-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Registration Number" type="text" required/>
                    </div>
                    <div class="col-xs-6 col-md-6 form-group">
                    <textarea rows="3" class="form-control" id="notes" placeholder="Notes"></textarea>
                    </div>
            
              </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>


    
    
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>

            </div>
            <!-- /.container-fluid -->
           <?php //include("../admin/includes/admin_content.php"); ?>

        </div>
        <!-- /#page-wrapper -->
        <!-- /#page-wrapper -->

  <?php include("../admin/includes/footer.php"); ?>

