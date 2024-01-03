<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Slider</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('slider')?>">Slider</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add new Slider</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= admin_url('sales-target/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                     <i class="fas fa-arrow-left me-2"></i> Back
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row mb-5">
      <?php $this->load->view('admin/partials/_messages');?>
      </div>
      <!-- end page title -->
      <?= form_open_multipart('admin/sales-terget/process', 'class="custom-validation"');?>
      
         <div class="row">
            <div class="col-lg-9">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                    Add Target
                  </div>
                  <div class="card-body">
                    <div class="row mb-3">
                        <label for="example-month-input" class="col-sm-2 col-form-label">Month</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="month" value="2020-08" id="example-month-input">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date Range</label>
                        <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                            <input type="text" class="form-control" name="start" placeholder="Start Date" />
                            <input type="text" class="form-control" name="end" placeholder="End Date" />
                        </div>
                    </div>
                    <div>
                        <label class="form-label">Multiple Select</label>

                        <select class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="Choose ...">
                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                <option value="AK">Alaska</option>
                                <option value="HI">Hawaii</option>
                            </optgroup>
                            <optgroup label="Pacific Time Zone">
                                <option value="CA">California</option>
                                <option value="NV">Nevada</option>
                                <option value="OR">Oregon</option>
                                <option value="WA">Washington</option>
                            </optgroup>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label class="form-label" id="tamo">Target Amount</label>
                        <div>
                           <input data-parsley-type="number" type="number" class="form-control" required placeholder="Enter Amount" name="target_amount" id="tamo">
                        </div>
                    </div>
                     <div class="mb-3">
                        <label class="form-label">Title</label>
                        <div>
                           <input data-parsley-type="text" type="text" class="form-control" required placeholder="Enter Title" name="name" id="name">
                        </div>
                     </div>
                             
                     <div class="mb-3">
                        <label class="form-label">Description</label>
                        <div>
                           <textarea name="desc"  class="form-control editor" rows="5"></textarea>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end col -->
            <div class="col-lg-3">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Publish
                  </div>
                  <div class="card-body">
                     <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Visiblity</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline1" name="is_visible" class="form-check-input" value="1" checked>
                           <label class="form-check-label" for="customRadioInline1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline2" name="is_visible" class="form-check-input" value="0">
                           <label class="form-check-label" for="customRadioInline2">Hide</label>
                        </div>
                     </div>

                     <div class="mb-0">
                        <div>
                           <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                           Save & Publish
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end col -->
         </div>
         <!-- end row -->
      <?= form_close();?>
   </div>
   <!-- container-fluid -->
</div>
