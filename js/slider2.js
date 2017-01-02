$(function() {
  $('.tabss nav a').on('click', function() {
    show_content($(this).index());
  });
  
  show_content(0);

  function show_content(index) {
    // Make the content visible
    $('.tabss .content.visible').removeClass('visible');
    $('.tabss .content:nth-of-type(' + (index + 1) + ')').addClass('visible');

    // Set the tab to selected
    $('.tabss nav a.selected').removeClass('selected');
    $('.tabss nav a:nth-of-type(' + (index + 1) + ')').addClass('selected');
  }
});