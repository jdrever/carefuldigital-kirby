<?php
if (!isset($fieldName))
{
  $fieldName="mainContent";
}
//seem to need to call the $page object before getting the field
$pageTitle=$page->title();
?>

<?php foreach ($page->content->get($fieldName)->toLayouts() as $layout) : ?>
  <?php foreach ($layout->columns() as $column) : ?>
      <?= $column->blocks() ?>
  <?php endforeach ?>
<?php endforeach ?>
