<div class="container">
  <div class="col-lg-12">
    
    <table class="table">
      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Layout</th>
          <th>Updated At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
            <tr ng-repeat="row in listingService.items">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <a href="">
                  <button type="button" class="btn btn-primary" name="button">
                    <span class="glyphicon glyphicon-eye-open"></span>
                    <span class="glyphicon glyphicon-eye-close"></span>
                  </button>
                </a>
                <a href="">
                  <button type="button" class="btn btn-primary" name="button">
                    <span class="glyphicon glyphicon-edit"></span>
                  </button>
                </a>
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
              </td>
            </tr>
      </tbody>
    </table>

    <div paging
      page="listingService.params.page"
      page-size="listingService.params.perPage"
      total="listingService.result.totalItems"
      paging-action="listingService.load()">
    </div>

    <a
    class="btn btn-primary"
    ui-sref="add"
    >
    Add
    </a>

  </div>
</div>
