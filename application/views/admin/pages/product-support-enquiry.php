<!-- 
   -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Product Support Enquiry</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="/Web Flowmechs/index.php/admin">Dashboard</a></li>
               <li class="breadcrumb-item active">Product Support Enquiry </li>
            </ol>
         </div>
      </div>
   </div>
</div>
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  
               </div>
               <div class="card-body">
                  <table class="table   table-bordered table-striped table-hover data_list">
                     <thead>
                        <tr>
                           <th>S.NO</th>
                           <th>Product Model  </th>
                         
                           <th>Phone Number  </th>
                           <th>Email Address </th>
                             <th>Issue in detail </th>


                  
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i=1;?>
                        <?php foreach ($productSupport->result_array() as $productSupport) :?>
                        <tr>
                           <td> <?php echo $i++;?></td>
                           <td> <?php echo $productSupport['product_model'];?></td>
                         
                           <td> <?php echo $productSupport['phone_number'];?></td>
                           <td> <?php echo $productSupport['email'];?></td>
                             <td> <?php echo $productSupport['issues_detail'];?></td>
                           
   

                        </tr>
                        <?php endforeach;?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
</section>
</div>
