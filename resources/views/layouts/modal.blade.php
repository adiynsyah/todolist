<!-- Modal -->
<div class="modal fade" id="modal-error" role="dialog">
  <div class="modal-dialog modal-sm">    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Error!</h4>
      </div>
      <div class="modal-body">
        <p style="color: red; text-align: center; font-size: 15px; font-weight: bold;" id="text-modal-error"></p>
      </div>        
    </div>      
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-success" role="dialog">
  <div class="modal-dialog modal-sm">    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Success!</h4>
      </div>
      <div class="modal-body">
        <p style="color: green; text-align: center; font-size: 15px; font-weight: bold;" id="text-modal-success"></p>
      </div>        
    </div>      
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-update" role="dialog">
  <div class="modal-dialog modal-sm">    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Data</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label>Name</label>
            <input type="hidden" class="form-control" id="txt-id">
            <input type="text" class="form-control" id="txt-name">
          </div>
        </form>
        <button type="submit" class="btn btn-primary" id="btn-update">Update</button>
          
      </div>        
    </div>      
  </div>
</div>