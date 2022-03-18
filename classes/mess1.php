<?php
  include_once "inc/header.php";
  include_once "inc/sidebar.php";
?>

<h3 class="page-heading mb-4">Dashboard</h3>
          <div class="row">

             <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-primary">
                        <i class="fa fa-bell highlight-icon" aria-hidden="true"></i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Pending Loan Applications</p>
                      <h4 class="bold-text"><?php 

                        $all = $ml->getNotApproveLoan();
                        echo $all;
                       ?></h4>
                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Just Updated
                  </p>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-danger">
                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Borrowers</p>
                      <h4 class="bold-text"><?php
                         $all = $emp->viewBorrower();
                         if ($all) {
                           $count = $all->num_rows;
                           echo $count;
                         }else{
                            echo "0";
                         }
                  
                        ?>
                      </h4>
                    </div>
                  </div>
                
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-warning">
                        <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Active Loans</p>
                      <h4 class="bold-text"><?php 

                        $all = $ml->getAllApproveLoan();
                        echo $all;

                       ?></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-success">
                        <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Total Paid Money</p>
                      <h4 class="bold-text"><?php 
                         $money = $ml->totalPaidLoanAmount();
                         if ($money) {
                           $result = $money->fetch_assoc();
                           echo $result['total_money'];
                         }
                       ?> tk</h4>
                    </div>
                  </div>
              
                </div>
              </div>
            </div>
           
          </div>
		  
          <hr> <h5 class="card-title p-3 bg-info text-white rounded">Messages</h5><br>
          <div class="row">

            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 mb-4">
              <div id="accordion">

                  <?php 
                     $notify = $ml->getNotification3monthNotPaying();

                     

                     if ($notify) {

                       while($result = $notify->fetch_assoc()){

                        if ($result['next_date']) {
                           
                           $curren_date = date('d-m-Y');
                            //var_dump($curren_date);
                            //echo  date("Y-m-d", strtotime("-3 months"),strtotime($result['next_date']) );

                         $giveNotification = date('d-m-Y',strtotime('+3 months',strtotime($result['next_date'])));

                           if ($curren_date > $giveNotification) {

                   ?> 
				   
				   
<?php
include_once "inc/footer.php";
?>