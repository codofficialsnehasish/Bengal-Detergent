<!-- Page Title -->
<div class="page section-header text-center mb-0">
    <div class="page-title">
        <div class="wrapper">
            <h1 class="page-width">Dashboard - <?= $this->auth_user->full_name; ?></h1>
        </div>
    </div>
</div>
<!-- End Page Title --> 
<!-- Breadcrumbs -->
<div class="bredcrumbWrap bredcrumbWrapPage bredcrumb-style2 text-center mb-0">
    <div class="container breadcrumbs">
        <a href="<?= base_url(' ') ?>" title="Back to the home page">Home</a><span aria-hidden="true">|</span><a href="<?= base_url('/retailer/dashboard') ?>" title="Back to the home page">Dashboard</a><span aria-hidden="true">|</span><span class="title-bold">Active Orders</span>
    </div>
</div>
<!-- End Breadcrumbs -->
<link href="<?= base_url('assets/admin/css/bootstrap.min.css'); ?>" id="bootstrap-styles" rel="stylesheet" type="text/css">
<link href="<?= base_url('assets/admin/css/app.min.css');?>" id="app-style" rel="stylesheet" type="text/css">
<style>
    .activity-feed .feed-item-complete{
        position: relative;
        padding-bottom: 29px;
        padding-left: 30px;
        border-left: 2px solid #00a49a;
    }
    .activity-feed .feed-item-cancell{
        position: relative;
        padding-bottom: 29px;
        padding-left: 30px;
        border-left: 2px solid #ec4561;
    }
    .activity-feed .feed-item-cancell-l::after {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: -9px;
        width: 16px;
        height: 16px;
        border-radius: 30px;
        background: #ec4561;
    }
    .activity-feed .feed-item .date {
        text-transform: none;
    }
</style>
<section class="mt-5 mb-5 buy-dashboard">
		<div class="container ">
		    <div class="row">
		        <div class="col-xl-4">
                    <!-- Profile picture card-->
					<?php $this->load->view('auth/buyer/_profileImage');?>
					<?php $this->load->view("order/_order_tabs"); ?>
		        </div>
		         <div class="col-xl-8">
		            <!-- Account details card-->
		            <div class="card mb-4 ">
		                <div class="card-header">
		                	<div class="d-flex justify-content-between align-items-center">
			                	<span><?= $title;?></span>
			                </div>
		                </div>
			            <div class="card-body tab-content dashboard-content">
			            
                            <!-------------order------------->
                            <div id="orders" class="product-order">
                               
                                <div class="table-responsive order-table">
                          
                                <table class="table table-bordered table-hover align-middle text-center mb-0">
                                    <thead class="alt-font">
                                    <tr>
                                        <th scope="col">Order</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Options</th>

                                    </tr>
                                    </thead>
                                        <tbody>
                                        <?php if (!empty($orders)): ?>
                                            <?php foreach ($orders as $order): ?>
                                                <tr>
                                                    <td>#<?php echo $order->order_number; ?></td>
                                                    <td><?php echo formatted_price($order->price_total, $order->price_currency,false); ?></td>
                                                    <td class="<?= $order->payment_status == 'payment_received'?'text-success':'text-danger';?>">
                                                        <?php if ($order->payment_status == 'payment_received'):
                                                            echo get_order_status("payment_received");
                                                        else:
                                                            echo get_order_status("awaiting_payment");
                                                        endif; ?>
                                                    </td>
                                                    <td class="<?= $order->payment_status == 'payment_received'?'text-success':'text-danger';?>">
                                                    
                                                            <?php if ($order->payment_status == 'awaiting_payment'):
                                                                if ($order->payment_method == 'Cash On Delivery') {
                                                                    echo get_order_status("order_processing");
                                                                } else {
                                                                    echo get_order_status("awaiting_payment");
                                                                }
                                                            else:
                                                                if ($order->status == 1):
                                                                    echo get_order_status("completed");
                                                                else:
                                                                    echo get_order_status("order_processing");
                                                                endif;
                                                            endif; ?>
                                                        
                                                    </td>
                                                    <td><?php echo formatted_date($order->created_at); ?></td>
                                                    <td>
                                                        <!-- <a href="<php echo base_url("order-details") . "/" . $order->order_number; ?>"  class="link-underline view">Details</a> -->
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable<?= $order->order_number;?>"  class=" waves-effect waves-light" style="border:none;">Track Order</button>
                                                        <a href="<?= base_url(); ?>order-detailss/<?= $order->order_number ?>" class="btn btn-info view">Order Details</a>
                                                        
                                                    </td>
                                                    <div class="col-xl-8">
                                                        <div class="modal fade" id="exampleModalScrollable<?= $order->order_number;?>" tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Track Order</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p style="text-align:center;">Order Number - <?= $order->order_number;?></p>
                                                                        <p style="text-align:center;">Payment Mode - Cash on Delevary</p>
                                                                        <?php 
                                                                            $trackingData = $this->select->select_single_data('order_tracking_status','order_id',$order->id); 
                                                                            $trackingData = $trackingData[0];
                                                                        ?>
                                                                        <div class="col-xl-12">
                                                                            <div class="card-body">
                                                                                <ol class="activity-feed">
                                                                                    <li class="feed-item <?= $trackingData->is_shipped == 1 ? 'feed-item-complete' : ''; ?>">
                                                                                        <div class="feed-item-list">
                                                                                            <span class="activity-text">Order Processing</span>
                                                                                            <span class="date"><?= $trackingData->is_order_processing == 1 ? date("D, d F 'y - h:i a", strtotime($trackingData->is_order_processing_update)) : ''; ?></span>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="feed-item <?= $trackingData->is_payment_received == 1 ? 'feed-item-complete' : ''; ?>">
                                                                                        <div class="feed-item-list">
                                                                                            <span class="activity-text">Shipped</span>
                                                                                            <span class="date"><?= $trackingData->is_shipped == 1 ? date("D, d F 'y - h:i a", strtotime($trackingData->is_shipped_update)) : ''; ?></span>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="feed-item <?= $trackingData->is_completed == 1 ? 'feed-item-complete' : ''; ?>">
                                                                                        <div class="feed-item-list">
                                                                                            <span class="activity-text">Payment Recived</span>
                                                                                            <span class="date"><?= $trackingData->is_payment_received == 1? date("D, d F 'y - h:i a", strtotime($trackingData->is_payment_received_update)) : ''; ?></span>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="feed-item <?= $trackingData->is_cancelled == 1 ? 'feed-item-cancell' : ''; ?>">
                                                                                        <div class="feed-item-list">
                                                                                            <span class="activity-text">Completed</span>
                                                                                            <span class="date"><?= $trackingData->is_completed == 1? date("D, d F 'y - h:i a", strtotime($trackingData->is_completed_update)) : ''; ?></span>
                                                                                        </div>
                                                                                    </li>
                                                                                    <?php if($trackingData->is_cancelled == 1){ ?>
                                                                                    <li class="feed-item feed-item-cancell-l">
                                                                                        <div class="feed-item-list">
                                                                                            <span class="activity-text">Cancelled</span>
                                                                                            <span class="date"><?= date("D, d F 'y - h:i a", strtotime($trackingData->is_cancelled_update)); ?></span>
                                                                                        </div>
                                                                                    </li>
                                                                                    <?php } ?>
                                                                                </ol>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->
                                                    </div>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        </tbody>
							</table>
                            <?php if (empty($orders)): ?>
							<p class="text-center">
								No Records Found
							</p>
						     <?php endif; ?>
                                </div>
                            </div>
                            <!-------------address------------>
			            </div>
		            </div>
		        </div>
		    </div>
		</div>
</section>
