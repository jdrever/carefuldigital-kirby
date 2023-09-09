<?php snippet('header') ?>
<h1>
  Contacting Careful Digital
</h1>
<p>
  For any information regarding the services we provide please feel free to
  contact us and we will be happy to help
</p>
<style>
.honeypot {
    position: absolute;
    left: -9999px;
}
</style>

<?php if($success): ?>
<div class="alert success">
  <p><?= $success ?></p>
</div>
<?php else: ?>
<?php if (isset($alert['error'])): ?>
<div><?= $alert['error'] ?></div>
<?php endif ?>
<form method="post" action="<?= $page->url() ?>">
  <div class="honeypot">
    <label for="website">Website <abbr title="required">*</abbr></label>
    <input type="url" id="website" name="website" tabindex="-1">
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">
      Name <abbr title="required">*</abbr>
    </label>
    <input type="text" id="name" name="name" class="form-item"  value="<?= esc($data['name'] ?? '', 'attr') ?>" required>
    <?= isset($alert['name']) ? '<span class="alert error">' . esc($alert['name']) . '</span>' : '' ?>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">
      Email <abbr title="required">*</abbr>
    </label>
    <input type="email" id="email" name="email" class="form-item" value="<?= esc($data['email'] ?? '', 'attr') ?>" required>
    <?= isset($alert['email']) ? '<span class="alert error">' . esc($alert['email']) . '</span>' : '' ?>
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">
      Message <abbr title="required">*</abbr>
    </label>
    <textarea id="text" name="text" class="form-item"  required><?= esc($data['text'] ?? '') ?></textarea>
    <?= isset($alert['text']) ? '<span class="alert error">' . esc($alert['text']) . '</span>' : '' ?>
  </div>
  *1<?= $turnstileDiv ?>
  <input type="submit" name="submit" value="Submit" class="btn">
</form>
<?php endif ?>
*2<?= $turnstileJs ?>

<?php snippet('footer') ?>