<form role="form" novalidate="novalidate" ng-submit="save()" class="form">

<div class="col-lg-10">

  <ul class="nav nav-tabs">
    <li><a data-toggle="tab" href="#home">Basic Detail</a></li>
    <li><a data-toggle="tab" href="#menu1">Seo Detail</a></li>
    <li class="active"><a data-toggle="tab" href="#composer">Composer</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade">
      <br/>
        <div class="form-group">
          {{ Form::label('title',null,['class'=>'control-label'])}}
          {{ Form::text('title',null,[
          'class'    => 'form-control',
          'ng-model' => 'pageService.page.title',
          'required' => 'required'
          ])}}
        </div>

        <div class="form-group">
          {{ Form::label('description',null,['class'=>'control-label'])}}
          {{ Form::textarea('description',null,[
          'class'=>'form-control',
          'ng-model' => 'pageService.page.description',
          'ui-tinymce' => "tinymceOptions",
          'required' => 'required'
          ])}}
        </div>

        <div class="form-group">
          {{ Form::label('banner',null,['class'=>'control-label'])}}
          {{ Form::file('banner',[
          'class'      => 'form-control',
          'file-model' => 'pageService.page.banner'
          ])}}
        </div>

        <div class="form-group">
          {{ Form::label('layout_id',null,['class'=>'control-label'])}}
          <select class="form-control" name="layout_id" ng-model="pageService.page.layout_id" required="required">
            <option value="">Select One</option>
            <option ng-repeat="option in layoutService.layouts" value="<% option.id %>">
              <% option.name %>
            </option>
          </select>
        </div>

        <div class="form-group">
          {{ Form::label('active',null,['class'=>'control-label'])}}
          <div class="">
            Yes
            {{ Form::radio('active',1,null,[
            'ng-model' => 'pageService.page.active',
            'required' => 'required'
            ]) }}
            No
            {{ Form::radio('active',0,null,[
            'ng-model' => 'pageService.page.active',
            'required' => 'required'
            ]) }}
          </div>
        </div>

    </div>

    <div id="menu1" class="tab-pane fade">
      <br/>
        <div class="form-group">
          {{ Form::label('uri',null,['class'=>'control-label'])}}
          {{ Form::text('uri',null,[
          'class'=>'form-control',
          'ng-model' => 'pageService.page.uri'
          ])}}
        </div>

        <div class="form-group">
          {{ Form::label('meta_title',null,['class'=>'control-label'])}}
          {{ Form::text('meta_title',null,[
          'class'=>'form-control',
          'ng-model' => 'pageService.page.meta_title'
          ])}}
        </div>

        <div class="form-group">
          {{ Form::label('meta_description',null,['class'=>'control-label'])}}
          {{ Form::textarea('meta_description',null,[
          'class'=>'form-control',
          'ng-model' => 'pageService.page.meta_description',
          'ui-tinymce' => "tinymceOptions"
          ])}}
        </div>
    </div>

    <div id="composer" class="tab-pane fade in active">

      <div class="">
        <div class="pull-left">
          <h3>Composer</h3>
        </div>
        <div class="pull-right">
           <div class="btn-group">
             <br/>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
              Add Row
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li ng-repeat="row in layoutService.rowsLayouts">
                <a ng-click="addRow(row)"><% row.title %></a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <br/>

      <pre class="hidden">
        <% pageComposer.rows | json %>
      </pre>

      <div class="row">

        <div class="col-md-12 composer-ul">

          <ul dnd-list="pageComposer.rows"
              dnd-allowed-types="['row']"
              dnd-external-sources="false"
              class="composer-ul"
              >
              <li
                dnd-draggable="row"
                dnd-type="'row'"
                dnd-moved="pageComposer.rows.splice($index, 1)"
                class=""
                ng-repeat="row in pageComposer.rows"
              >
              <span class="glyphicon glyphicon-move move custom_glyphicon" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-remove cross custom_glyphicon" ng-click="removeComposerRow(pageComposer.rows,$index)" aria-hidden="true"></span>
                <ul dnd-list="row.cols"
                    dnd-allowed-types="['col']"
                    dnd-external-sources="false"
                    dnd-horizontal-list="true"
                    class="composer-ul ul"
                    >
                    <li
                      dnd-draggable="col"
                      dnd-type="'col'"
                      dnd-moved="row.cols.splice($index, 1)"
                      class="<% col.class %> li"
                      ng-repeat="col in row.cols"
                    >
                    <span ng-click="selectWidget(col)" class="glyphicon glyphicon-plus plus custom_glyphicon" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-move move custom_glyphicon" aria-hidden="true"></span>
                    <ul dnd-list="col.widgets"
                        dnd-allowed-types="['widget']"
                        dnd-external-sources="false"
                        dnd-horizontal-list="true"
                        class="composer-ul widget-ctn"
                        >
                        <li
                          dnd-draggable="widget"
                          dnd-type="'widget'"
                          dnd-moved="col.widgets.splice($index, 1)"
                          class="<% col.class %> widget-container widget-li"
                          ng-repeat="widget in col.widgets"
                        >
                        <span class="glyphicon glyphicon-move move custom_glyphicon" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-remove cross custom_glyphicon" aria-hidden="true"></span>
                        <div>
                          <% widget.widget.name %>
                          <span
                          class="glyphicon glyphicon-edit custom_glyphicon"
                          ng-click="editWidget(col,widget,$index)"
                          aria-hidden="true"></span>
                        </div>

                        </li>
                    </ul>

                  </li>
                </ul>
              </li>
          </ul>

        </div>

      </div>


    </div>

    <div class="form-group">
      {{ Form::submit('Submit',['class'=>'form-control']) }}
    </div>

  </div>
</div>

</form>
