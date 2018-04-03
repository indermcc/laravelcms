<div class="">
  <h4> <% widgetService.selectedWidget.name %> settings </h4>
  <form class="form" method="post" novalidate="novalidate" ng-submit="saveAttributeSettings()">

    <ul class="nav nav-tabs">
      <li class="active">
        <a data-toggle="tab" href="#gernal_options">General</a>
      </li>
      <li>
        <a data-toggle="tab" href="#design_options">Design Options</a>
      </li>
    </ul>

    <div id="gernal_options" class="tab-pane fade in active">
      <br/>
      <div class="form-group" ng-repeat="attribute in widgetService.attributes">

        <label for="<% attribute.name %>"> <% attribute.name %> </label>

        <input ng-required="attribute.required" class="form-control"
        ng-if="attribute.type=='varchar'" type="text" name="<% attribute.key %>"
        ng-model="attribute.value" value=""/>

        <input ng-required="attribute.required" class="form-control" ng-if="attribute.type=='file'"
        type="file" name="<% attribute.key %>" ng-model="attribute.value" value=""/>

        <textarea ng-required="attribute.required" class="form-control"
        ng-if="attribute.type=='text'" name="name" rows="4" cols="50" name="<% attribute.key %>"
        ng-model="attribute.value"></textarea>

      </div>
    </div>

    <div id="design_options" class="tab-pane fade">
      <br/>
      <div class="main-div css-box pos-relative css-box-border css-box-dotted text-center"
      style="width:330px;height:330px;">
        <p class="pos-absolute" style="left: 5px;top: 5px;font-size: 11px;margin: 0;padding: 0;line-height: 11px;">
          margin
        </p>
        <div class="form-group">
          <input type="text" ng-model="widgetService.selectedWidget.design_options.margin.top"
          class="display-inline-block css-box-input text-center form-control" name="" value=""/>
          <input type="text" ng-model="widgetService.selectedWidget.design_options.margin.left"
          class="display-inline-block css-box-input left text-center form-control" name="" value=""/>
          <input type="text" ng-model="widgetService.selectedWidget.design_options.margin.right"
          class="display-inline-block css-box-input right text-center form-control" name="" value=""/>
          <input type="text" ng-model="widgetService.selectedWidget.design_options.margin.bottom"
          class="display-inline-block css-box-input bottom text-center form-control" name="" value=""/>
        </div>

        <div class="pos-absolute css-box-border pos-vertical-center col-box-auto-size">

          <div class="pos-relative css-box-full-width">

            <p class="pos-absolute" style="left: 5px;top: 5px;font-size: 11px;margin: 0;padding: 0;line-height: 11px;">
              border
            </p>
            <div class="form-group">
              <input type="text" ng-model="widgetService.selectedWidget.design_options.border.top"
              class="display-inline-block css-box-input text-center form-control" name="" value=""/>
              <input type="text" ng-model="widgetService.selectedWidget.design_options.border.left"
              class="display-inline-block css-box-input left text-center form-control" name="" value=""/>
              <input type="text" ng-model="widgetService.selectedWidget.design_options.border.right"
              class="display-inline-block css-box-input right text-center form-control" name="" value=""/>
              <input type="text" ng-model="widgetService.selectedWidget.design_options.border.bottom"
              class="display-inline-block css-box-input bottom text-center form-control" name="" value=""/>
            </div>

            <div class="pos-absolute css-box-border pos-vertical-center col-box-auto-size">
              <div class="pos-relative css-box-full-width">
                <p class="pos-absolute" style="left: 5px;top: 5px;font-size: 11px;margin: 0;padding: 0;line-height: 11px;">
                  padding
                </p>
                <div class="form-group">
                  <input type="text" ng-model="widgetService.selectedWidget.design_options.padding.top"
                  class="display-inline-block css-box-input text-center form-control" name="" value=""/>
                  <input type="text" ng-model="widgetService.selectedWidget.design_options.padding.left"
                  class="display-inline-block css-box-input left text-center form-control" name="" value=""/>
                  <input type="text" ng-model="widgetService.selectedWidget.design_options.padding.right"
                  class="display-inline-block css-box-input right text-center form-control" name="" value=""/>
                  <input type="text" ng-model="widgetService.selectedWidget.design_options.padding.bottom"
                  class="display-inline-block css-box-input bottom text-center form-control" name="" value=""/>
                </div>
              </div>
            </div>


          </div>

        </div>

      </div>
    </div>

    <div class="form-group">
      <button type="button" class="btn btn-danger" ng-click="resetAttributesSettings()" name="button">Cancel</button>
      <button type="submit" class="btn btn-primary" name="button">Save</button>
    </div>


  </form>

</div>
