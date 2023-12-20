<?php defined('BASEPATH') OR exit('No direct script access allowed');
$files = array_diff(scandir(APPPATH .'views/template'), array('.', '..'));
?>
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Category</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('pages')?>">All Pages</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add new Page</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= admin_url('pages/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
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
      <?= form_open_multipart('admin/pages/process', 'class="custom-validation"');?>
      
         <div class="row">
            <div class="col-lg-9">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Add New Page
                  </div>
                  <div class="card-body">
                     <div class="mb-3">
                           <label class="form-label">Page Name</label>
                           <div>
                              <input data-parsley-type="text" type="text" class="form-control" required placeholder="Enter Page Name" name="page_name">
                           </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Title</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" required
                              placeholder="Enter Title" name="page_title">
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Description</label>
                        <div>
                           <textarea name="page_content" id="" class="form-control editor" rows="5"></textarea>
                        </div>
                     </div>
                     
                  </div>
               </div>
               <?php $this->load->view('admin/partials/custom_fields');?>
               <?php $this->load->view('admin/partials/_metaOptions');?>
            </div>
            <!-- end col -->
            <div class="col-lg-3">
            <?php $this->load->view('admin/partials/_input-image');?>
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Page Template
                  </div>
                  <div class="card-body">
                  <div class="mb-3">
                        <label class="form-label">Template</label>
                        <div>
                           <select class="form-select" name="page_template" aria-label="Default select example">
                           <option value="default" selected> Default</option>
                           <?php
                           foreach ($files as $file) {
                           $ext = pathinfo($file, PATHINFO_EXTENSION);
                           if($file!='default.php'){
                           if ($ext == 'php')
                           {
                                 $templatename=basename($file,'.php');
                                 $filename=str_replace('_',' ',$templatename);?>
                        <option value="<?= $filename;?>">
                        <?= ucwords($filename);?></option>
                           <?php
                           }
                           }
                           }?>
                           </select>
                        </div>
                  </div>
                  </div>
               </div>

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
                     <!-- <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Show on Home Page</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline11" name="is_home" class="form-check-input" value="1">
                           <label class="form-check-label" for="customRadioInline11">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline22" name="is_home" class="form-check-input" value="0" checked>
                           <label class="form-check-label" for="customRadioInline22">No</label>
                        </div>
                     </div> -->
                     <!-- <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Popular Category</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="pcy" name="is_popular" class="form-check-input" value="1">
                           <label class="form-check-label" for="pcy">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="pcn" name="is_popular" class="form-check-input" value="0" checked>
                           <label class="form-check-label" for="pcn">No</label>
                        </div>
                     </div> -->
                     <div class="mb-0">
                        <div>
                           <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                           Save & Publish
                           </button>
                           <!-- <button type="reset" class="btn btn-secondary waves-effect">
                              Cancel
                              </button> -->
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


                                            
