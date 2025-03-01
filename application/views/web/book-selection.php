<main class="bg-gray-200 min-h-[calc(100vh-9rem)]">

  <div class="container py-10 mx-auto">

    <?php if ($this->session->flashdata('error')) : ?>
      <div class="text-center text-red-500">
        <strong><?= $this->session->flashdata('error'); ?></strong>
        <?php $this->session->unset_userdata('error'); ?>
      </div>
    <?php endif; ?>


    <?php if ($this->session->flashdata('success')) : ?>
      <div class="text-center text-green-500">
        <strong><?= $this->session->flashdata('success'); ?></strong>
        <?php $this->session->unset_userdata('success'); ?>
      </div>
    <?php endif; ?>

    <div class="relative w-full h-full p-5 bg-white rounded-lg shadow-md">

      <div class="mb-2">
        <h1 class="text-2xl font-semibold text-center">Book Selection</h1>
      </div>
      <hr>
      <!-- Book Details -->
      <div id="bookSelection"></div>
    </div>
  </div>

</main>
<script src="<?= base_url('assets/new-pages/js/index.js') ?>" defer></script>