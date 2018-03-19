<div class="container">
  <div class="col-lg-12">

    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="result in listingService.result.items">
          <td ng-bind="result.name"></td>
          <td ng-bind="result.description"></td>
          <td>
            <button ng-click="listingService.update(result)" ng-if="!result.active" type="button" class="btn btn-danger">
              <span class="glyphicon glyphicon-eye-close"></span>
            </button>
            <button ng-click="listingService.update(result)" ng-if="result.active" type="button" class="btn btn-green">
              <span class="glyphicon glyphicon-eye-open"></span>
            </button>
            <!-- <button type="button" class="btn btn-primary">Edit</button> -->
            <a type="button" ui-sref="select2({id:result.id})" class="btn btn-primary">Edit</a>
            <button type="button" ng-click="listingService.delete(result)" class="btn btn-danger">Delete</button>
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


  </div>
</div>
