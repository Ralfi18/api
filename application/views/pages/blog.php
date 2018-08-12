<?php foreach($blog as $bl) : ?>
  <div class="">
    <?php echo $bl->title; ?>
  </div>
  <small><?php echo $bl->cteared; ?></small>
  <div class="">
    <?php echo $bl->text; ?>
  </div>
<?php endforeach; ?>

<?php echo $this->pagination->create_links(); ?>
