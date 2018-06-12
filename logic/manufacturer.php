<?php include("../admin/includes/header.php"); ?>

        <!-- Navigation -->
             <?php include("../admin/includes/nav.php");?>
        <!-- End of Navigation -->

        <div id="page-wrapper"  style="width: 95%">
            <div class="container-fluid">
                <?php 

                if($database->connection)
                  echo "connected";
                else
                  echo "not connected";

                $manufacturer = new Manufacturer();
                $result_set = $manufacturer->get_all_manufacturers_list();
                $results = $database->fetch_array($result_set);
                

                
                ?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manufacturer 
                            <small>Details</small>
                       </h1>                     
                    </div>
                </div>
                <!-- /.row -->


<div class="row">
	     <div class="col-lg-12">
                  <button type="button" class="btn btn-primary pull-right btn-xs" data-title="Add" data-toggle="modal" data-target="#add"><span class="glyphicon glyphicon-plus-sign" ></span>Add Manufacturer</button>
         </div>

		        
        <div class="col-md-12">
           <div class="table-responsive">
              <table id="mytable" class="table table-bordred table-striped">
 
                   <thead>
                   
                   <th><input type="checkbox" id="checkall" /></th>
                   <th>Id</th>
                    <th>Name</th>
                    <th>Created On</th>
                    <th>Edit</th>
                    <th>Delete</th>
                   </thead>
    <tbody>
     <?php 
        if(!empty($results))
                               
                {
                  echo '<tr>
                        <td><input type="checkbox" class="checkthis" /></td>
    <td>'.$results['manufacturer_id'].'</td>
    <td>'.$results['manufacturer_name'].'</td>
    <td>'.$results['created_on'].'</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
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

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Add Manufacturer Details</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Name">
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
          <div class="form-group">
        <input class="form-control " type="text" placeholder="">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" placeholder="">
        </div>
        <div class="form-group">
        <input class="form-control" type="text" placeholder="" disabled="true">
    
        
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

  <?php include("../admin/includes/footer.php"); ?>

