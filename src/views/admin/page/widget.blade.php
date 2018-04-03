<div class="">

  <div class="row">
    <h3 class="col-lg-8 widget-heading">
      Select Widget
    </h3>
    <div class="input-group col-lg-3">
      <span class="input-group-addon"> <span class="glyphicon glyphicon-search"></span> </span>
      <input type="text" class="form-control" ng-model="widgetService.search" placeholder="Search">
    </div>
  </div>

  <ul class="nav nav-tabs">
    <li class="active">
      <a data-toggle="tab" href="#allwidgets">All</a>
    </li>
    <li class="" ng-repeat="category in widgetService.categories">
      <a data-toggle="tab" href="#category<% category.id %>"><% category.name %></a>
    </li>
  </ul>

  <div class="tab-content">

    <div id="allwidgets" class="tab-pane fade in active">
      <br/>
      <div class="row">
        <div class="col-sm-6 col-md-4" ng-repeat="widget in widgetService.widgets | FilterWidgets: widgetService.search">
          <div class="thumbnail">
            <div class="caption">
              <h3 ng-bind="widget.name"></h3>
              <p ng-bind="widget.description"></p>
              <p>
                <button ng-click="widgetSelected(widget)" class="btn btn-primary" type="button" name="button">Add</button>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="category<% category.id %>" class="tab-pane" ng-repeat="category in widgetService.categories">
      <br/>
      <div class="row">
        <div class="col-sm-6 col-md-4" ng-repeat="widget in widgetService.widgets | FilterWidgets:widgetService.search:category.id">
          <div class="thumbnail">
            <div class="caption">
              <h3 ng-bind="widget.name"></h3>
              <p ng-bind="widget.description"></p>
              <p>
                <button ng-click="widgetSelected(widget)" class="btn btn-primary" type="button" name="button">Add</button>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
