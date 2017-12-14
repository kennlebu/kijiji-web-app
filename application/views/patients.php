<!DOCTYPE html>
<html>
<head>
	<title>Kijiji Web Helper</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
</head>
<body>
<div class="container">

<div class="row">
  	<div class="col-lg-12 margin-tb">
  	  <div class="pull-left">
  	    <h2>Patients</h2>
  	  </div>
  	  <div class="pull-right">
  	    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-patient"> Add patient</button>
  	  </div>
  	</div>
</div>
<table class="table table-bordered">

	<thead>
	    <tr>
		      <th>Name</th>
		      <th>Date of Birth</th>
		      <th>Gender</th>
		      <th>Service</th>
		      <th width="200px">Action</th>
	    </tr>
	</thead>
	<tbody>
	</tbody>

</table>
<ul id="pagination" class="pagination-sm"></ul>

<!-- Create patient Modal -->
<div class="modal fade" id="create-patient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Create patient</h4>
      </div>
      <div class="modal-body">

            <form data-toggle="validator" action="patients/save" method="POST">
                <div class="form-group">
                    <label class="control-label" for="firstname">Firstname:</label>
                    <input type="text" name="firstname" class="form-control" data-error="Enter the patient's firstname." required />
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="lastname">Lastname:</label>
                    <input type="text" name="lastname" class="form-control" data-error="Enter the patient's lastname." required />
                    <div class="help-block with-errors"></div>
                </div>
                
                <div class="form-group">
                    <label class="control-label" for="dateOfBirth">Date of birth:</label>
                    <input type="text" name="dateOfBirth" class="form-control" data-error="Enter the date of birth" required placeholder="YYYY-MM-DD" />
                    <div class="help-block with-errors"></div>
                </div>
                <br/>
                <div class="form-group col-xs-6">
                <label class="css-input css-radio css-radio-default push-10-r">
                    <input type="radio" name="gender_id" value="1"><span></span> Male
                </label>
                <label class="css-input css-radio css-radio-default">
                    <input type="radio" name="gender_id" value="2"><span></span> Female
                </label>
            </div>
            <br/>
            <div class="form-group">
            <label class="col-xs-12" for="example-select">Service</label>
            <div class="col-sm-9">
                <select class="form-control" id="service" name="service_id" size="1">
                    <option value="0">Please select</option>
                    <option value="1">ART</option>
                    <option value="2">PREP</option>
                    <option value="3">PEP</option>
                    <option value="4">OI</option>
                </select>
            </div>
        </div>
                </div>

                <!-- <div class="form-group">
                    <label class="control-label" for="observation">Observations:</label>
                    <textarea name="observation" class="form-control" data-error="Please enter observations." required></textarea>
                    <div class="help-block with-errors"></div>
                </div> -->
                <div class="form-group">
                    <button type="submit" class="btn crud-submit btn-success">Submit</button>
                </div>

            </form>
      </div>

    </div>
  </div>
</div>
<!-- Edit patient Modal -->
<div class="modal fade" id="edit-patient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit patient</h4>
      </div>

      <div class="modal-body">
            <form data-toggle="validator" action="" method="put">

                <div class="form-group">
                    <label class="control-label" for="title">Title:</label>
                    <input type="text" name="title" class="form-control" data-error="Please enter title." required />
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="title">Description:</label>
                    <textarea name="description" class="form-control" data-error="Please enter description." required></textarea>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success crud-submit-edit">Submit</button>
                </div>
            </form>

      </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script type="text/javascript">
	var url = "patients";
</script>

<script src="/js/patient-ajax.js"></script> 

</body>
</html>