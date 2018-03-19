$(document).ready(function() {
  $('.custom_glyphicon').click(function() {
    fetchChildBlock();
  });
});

function fetchChildBlock() {
  var index = $('.nav-tabs li').length+1;
  // console.log(index);
  $.get(createUrl('/blocks/form'), {index}, function(response) {
    $('.nav-tabs').append(getTabLiHtml(index));
    $('.tab-content').append(getTabContent(index, response));
    tinymce.init({
      selector:'textarea',
    });
  });
}

function getTabLiHtml(random_number) {
  var html = `
  <li>
    <a data-toggle="tab" href="#block` + random_number + `">
      Basic Block
    </a>
  </li>
  `;
  return html;
}

function getTabContent(random_number, content) {
  var html = `
  <div id="block` + random_number + `" class="tab-pane fade">
  ` + content + `
  </div>
  `;
  return html;
}
