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
            <tr ng-repeat="row in listingService.result.items">
              <td><% row.title %></td>
              <td><% row.description %></td>
              <td><% row.layout.name %></td>
              <td><% row.updated_at | dateToISO | date:'dd-MM-yyyy HH:m' %></td>
              <td>
                <a href="">
                  <button ng-click="listingService.enableDisable(row)" ng-if="row.active=='0'" type="button" class="btn btn-success" name="button">
                    <span class="glyphicon glyphicon-eye-open"></span>
                  </button>
                  <button ng-click="listingService.enableDisable(row)" ng-if="row.active=='1'" type="button" class="btn btn-danger" name="button">
                    <span class="glyphicon glyphicon-eye-close"></span>
                  </button>
                </a>
                <a ui-sref="edit({id:row.id})">
                  <button type="button" class="btn btn-primary" name="button">
                    <span class="glyphicon glyphicon-edit"></span>
                  </button>
                </a>
                <a href="">
                  <button type="button" class="btn btn-danger" name="button">
                    <span class="glyphicon glyphicon-trash"></span>
                  </button>
                </a>
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
