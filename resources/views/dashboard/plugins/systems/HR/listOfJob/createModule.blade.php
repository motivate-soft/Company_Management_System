<div class="modal fade" id="createNewJob" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleStandardModalLabel">Add New Job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="#" method="post">


                <div class="modal-body">
                    <label for="" class="col-form-label">Select Employee</label>
                    <select name="" class="form-control"  required="">
                        <option value="0">Main</option>
                        <!-- For each loop start here -->
                            <option value=""></option>
                        <!-- For each loop end here -->
                    </select>

                    <label for="" class="col-form-label">Job Name</label>
                    <input type="text" name="" class="form-control" placeholder="Add Job Name" required="">

                    <label for="" class="col-form-label">Job Type</label>
                    <input type="text" name="" class="form-control" placeholder="Add Job Type" required="">

                    <label for="" class="col-form-label">Task Date</label>
                    <input type="date" name="" class="form-control" placeholder="Add Job Date" required="">

                    <label for="" class="col-form-label">Number Of Days</label>
                    <input type="number" name="" class="form-control" placeholder="Add Number Of Date" required="">

                    <label for="" class="col-form-label">Task Status</label>
                    <input type="text" name="" class="form-control" placeholder="Add Job Date" required="">

                    <label for="image_en" class="col-form-label">Notes</label>
                    <input type="file" name="image_en" id="image_en" class="form-control" required="">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>
