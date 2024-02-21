<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Testimonial</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= admin_url('testimonial')?>">Testimonial</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add new Testimonial</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= admin_url('testimonial/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
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
      <?= form_open_multipart('admin/testimonial/process', 'class="custom-validation"');?>
      
         <div class="row">
            <div class="col-lg-9">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Add New Testimonial
                  </div>
                  <div class="card-body">
                     <div class="mb-3">
                        <label class="form-label">Name</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" required
                              placeholder="Ex : Jhon Doe" name="name" id="name">
                        </div>
                     </div>

                     <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <div>
                           <input data-parsley-type="text" type="text"
                              class="form-control" required
                              placeholder="Ex : We Love it" name="title" id="title">
                        </div>
                     </div>
                             
                     <div class="mb-3">
                        <label class="form-label">What he Saying</label>
                        <div>
                           <textarea name="desc"  class="form-control editor" rows="5"></textarea>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end col -->
            <div class="col-lg-3">
            <?php $this->load->view('admin/partials/_input-image');?>
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Publish
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                           <label class="form-label mb-3 d-flex">Rating</label>
                           <div class="rating-star">
                              <input type="hidden" class="rating" name="rating" data-filled="mdi mdi-star text-primary" data-empty="mdi mdi-star-outline text-muted" required/>
                           </div>
                            <!-- <div class="form-check form-check-inline" style="margin-right: 0!important;">
                                <input type="radio" id="customRadioInline1" name="rating" value="1" class="form-check-input" required>
                                <label class="form-check-label" for="customRadioInline1">1</label>
                            </div>
                            <div class="form-check form-check-inline" style="margin-right: 0!important;">
                                <input type="radio" id="customRadioInline2" name="rating" value="2" class="form-check-input" required>
                                <label class="form-check-label" for="customRadioInline2">2</label>
                            </div>
                            <div class="form-check form-check-inline" style="margin-right: 0!important;">
                                <input type="radio" id="customRadioInline3" name="rating" value="3" class="form-check-input" required>
                                <label class="form-check-label" for="customRadioInline3">3</label>
                            </div>
                            <div class="form-check form-check-inline" style="margin-right: 0!important;">
                                <input type="radio" id="customRadioInline4" name="rating" value="4" class="form-check-input" required>
                                <label class="form-check-label" for="customRadioInline4">4</label>
                            </div>
                            <div class="form-check form-check-inline" style="margin-right: 0!important;">
                                <input type="radio" id="customRadioInline5" name="rating" value="5" class="form-check-input" required>
                                <label class="form-check-label" for="customRadioInline5">5</label>
                            </div> -->
                        </div>
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

<script>
   function Clear(str)
      {  
         valu=document.getElementById(str).value;
         if(valu==='Untitled'){
            document.getElementById(str).value= "";
         }  
      }


      function Setvalue(str)
      {  
         valu=document.getElementById(str).value;
         if(valu===''){
            document.getElementById(str).value= "Untitled";
         }  
      }
</script>
