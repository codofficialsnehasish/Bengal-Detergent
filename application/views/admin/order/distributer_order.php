<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
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
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Orders</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">All Orders</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                <th>Order</th>
                                                <th>Total</th>
                                                <!-- <th>Payment</th> -->
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1;
                                                foreach ($orders as $item): ?>
                                                <tr>
                                                <td>
                                                    <a href="<?php echo admin_url(); ?>orders/order-details/<?php echo html_escape($item->id); ?>">
                                                        #<?php echo html_escape($item->order_number); ?>
                                                    </a>
								                </td>
                                                <td><strong> <?php echo formatted_price($item->price_total, $item->price_currency,false); ?></strong></td>
                                                <!-- <td>
                                                    <?php //echo $item->payment_status; ?>
                                                </td> -->
                                                <!-- <td class="<?= $item->payment_status == 'payment_received'?'text-success':'text-danger';?>">
                                                    <?php if ($item->payment_status == 'payment_received'):
                                                        echo get_order_status("payment_received");
                                                    else:
                                                        echo get_order_status("awaiting_payment");
                                                    endif; ?>
                                                </td> -->
                                                <td class="<?= $item->payment_status == 'payment_received'?'text-success':'text-danger';?>">
                                                    
                                                    <?php if($item->is_canceled == 1){
                                                        echo '<label class="btn btn-danger btn-sm waves-effect">'.get_order_status("cancelled").'</label>';
                                                    }elseif ($item->payment_status == 'awaiting_payment'){
                                                        if ($item->payment_method == 'Cash On Delivery') {
                                                            echo get_order_status("order_processing");
                                                        } else {
                                                            echo get_order_status("awaiting_payment");
                                                        }
                                                    }else{
                                                        if ($item->status == 1):
                                                            echo get_order_status("completed");
                                                        else:
                                                            echo get_order_status("order_processing");
                                                        endif;
                                                    } ?>
                                                    
                                                </td>
                                                <!-- <td>
                                                    <?php //if ($item->status == 1): ?>
                                                        <label class="btn btn-secondary btn-sm waves-effect mt-2 btn btn-success">Completed</label>
                                                    <?php //else: ?>
                                                        <label class="btn btn-secondary btn-sm waves-effect mt-2 btn btn-secondary">Processing</label>
                                                    <?php //endif; ?>
                                                </td> -->
                                                <td> <?php echo formatted_date($item->created_at); ?></td>
                                                <!-- <td>
                                                    <?php echo form_open_multipart('admin/orders/order_options_post'); ?>
                                                    <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Options <i class="mdi mdi-chevron-down"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="<?php echo admin_url(); ?>orders/order-details/<?php echo html_escape($item->id); ?>">
                                                            <i class="fas fa-info-circle text-primary"></i> View Details</a>
                                                            <div class="dropdown-divider"></div>
                                                            <?php if ($item->payment_status != 'payment_received'): ?>
                                                                <button type="submit" name="option" value="payment_received" class="dropdown-item btn btn-primary btn-sm waves-effect waves-light btn btn-success">
                                                                    <i class="fas fa-check-circle"></i> Payment Received 
                                                                </button>
                                                                <div class="dropdown-divider"></div>
                                                            <?php endif; ?>
                                                            <a href="javascript:void(0)" class="dropdown-item" onclick="confirmDelete(this.id,'orders');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $item->id;?>"> <i class="fas fa-trash-alt text-danger" title="Remove"></i> Delete</a>
                                                        </div>
                                                    </div>
								                    <?php echo form_close(); ?>
								                </td> -->
                                                <td>
                                                    <!-- <a href="<php echo base_url("order-details") . "/" . $order->order_number; ?>"  class="link-underline view">Details</a> -->
                                                    <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable<?= $item->order_number;?>"  class="btn btn-success waves-effect waves-light" style="border:none;">Track Order</a> -->
                                                    <a href="<?= base_url(); ?>distributor-order-details/<?= $item->order_number ?>" class="btn btn-info view">Order Details</a>
                                                    <?php if($item->status == 1){ ?>
                                                        <a href="#" onclick="javascript:popupCenter({url: '<?= base_url(); ?>invoice/<?= $item->order_number.'/'.$item->id.'/'.$item->buyer_id; ?>', title: 'Invoise', w: 1000, h: 600});" class="btn btn-dark view">Download Invoice</a>
                                                    <?php }else{ 
                                                        if($item->is_canceled != 1){?>
                                                        <a href="#" onclick="cancelTotalOrder(<?= $item->id;?>,<?= $item->order_number; ?>,'admin/orders/dristibuter-order/');" class="btn btn-danger view">Cancel Order</a>
                                                    <?php }} ?>
                                                </td>
                                                <div class="col-xl-8">
                                                        <div class="modal fade" id="exampleModalScrollable<?= $item->order_number;?>" tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Track Order</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p style="text-align:center;">Order Number - <?= $item->order_number;?></p>
                                                                        <p style="text-align:center;">Payment Mode - Cash on Delevary</p>
                                                                        <?php 
                                                                            $trackingData = $this->select->select_single_data('order_tracking_status','order_id',$item->id); 
                                                                            $trackingData = $trackingData[0];
                                                                        ?>
                                                                        <div class="col-xl-12">
                                                                            <div class="card-body">
                                                                                <ol class="activity-feed">
                                                                                    <li class="feed-item <?= $trackingData->is_shipped == 1 ? 'feed-item-complete' : ''; ?> <?= $trackingData->is_cancelled == 1 ? 'feed-item-cancell' : ''; ?>">
                                                                                        <div class="feed-item-list">
                                                                                            <span class="activity-text">Order Processing</span>
                                                                                            <span class="date"><?= $trackingData->is_order_processing == 1 ? date("D, d F 'y - h:i a", strtotime($trackingData->is_order_processing_update)) : ''; ?></span>
                                                                                        </div>
                                                                                    </li>
                                                                                    <?php if($trackingData->is_cancelled != 1){ ?>
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
                                                                                    <?php } ?>
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
                                                                    <!-- <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                    </div> -->
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->
                                                    </div>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>

<script>
	const popupCenter = ({url, title, w, h}) => {
    // Fixes dual-screen position                             Most browsers      Firefox
    const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
    const dualScreenTop = window.screenTop !==  undefined   ? window.screenTop  : window.screenY;
    const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
    const systemZoom = width / window.screen.availWidth;
    const left = (width - w) / 2 / systemZoom + dualScreenLeft
    const top = (height - h) / 2 / systemZoom + dualScreenTop
    const newWindow = window.open(url, title, 
      `
      scrollbars=yes,
      width=${w / systemZoom}, 
      height=${h / systemZoom}, 
      top=${top}, 
      left=${left}
      `
    )
    if (window.focus) newWindow.focus();
    newWindow.print();
}
</script>