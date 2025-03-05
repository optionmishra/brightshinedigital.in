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

    <div class="w-full h-full p-5 bg-white rounded-lg shadow-md">

      <div class="">
        <h1 class="text-2xl font-semibold text-center">Student Registration</h1>
      </div>
      <form action="<?= base_url('AuthController/studentRegistrationStore') ?>" method="POST">

        <!-- Personal Details -->
        <div class="mb-5">
          <div class="mb-2">
            <span class="text-xs uppercase">Personal Details</span>
            <hr>
          </div>

          <div class="flex flex-col gap-5">
            <div class="flex flex-wrap gap-5">
              <div class="flex flex-col w-full gap-2 mb-2 sm:w-1/4">
                <label class="text-sm" for="fullname">Full Name *</label>
                <input class="rounded-md" type="text" name="fullname" id="fullname" placeholder="Enter full name" required>
              </div>
              <div class="flex flex-col w-full gap-2 mb-2 sm:w-1/4">
                <label class="text-sm" for="email">Email *</label>
                <input class="rounded-md" type="email" name="email" id="email" placeholder="Enter email" required>
              </div>
              <div class="flex flex-col w-full gap-2 mb-2 sm:w-1/4">
                <label class="text-sm" for="phone">Phone *</label>
                <input class="rounded-md" type="tel" name="phone" id="phone" placeholder="Enter phone" required>
              </div>
            </div>
            <div class="flex flex-wrap gap-5">
              <div class="flex flex-col w-full gap-2 mb-2 sm:w-1/4">
                <label class="text-sm" for="password">Password *</label>
                <input class="rounded-md" type="password" name="password" id="password" placeholder="Enter password" required>
              </div>
              <!-- <div class="flex flex-col w-full gap-2 mb-2 sm:w-1/4">
                <label class="text-sm" for="confirmPassword">Confirm Password *</label>
                <input class="rounded-md" type="password" name="confirmPassword" id="confirmPassword" placeholder="Enter password">
              </div> -->
            </div>
          </div>
        </div>


        <!-- School Details -->
        <div class="mb-5">
          <div class="mb-2">
            <span class="text-xs uppercase">School Details</span>
            <hr>
          </div>

          <div class="flex flex-wrap gap-5">
            <div class="flex flex-col w-full gap-2 mb-2 sm:w-1/5">
              <label class="text-sm" for="class">Class *</label>
              <select class="rounded-md" name="class" id="class" required>
                <option value="">Select Class</option>
                <?php foreach ($classes as $class): ?>
                  <option value="<?= $class->id ?>"><?= $class->name ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="flex flex-col w-full gap-2 mb-2 sm:w-1/5">
              <label class="text-sm" for="teacherCode">Teacher Code *</label>
              <input class="rounded-md" type="text" name="teacherCode" id="teacherCode" placeholder="Enter teacher code" required>
            </div>

          </div>
        </div>

        <div class="flex justify-center my-10">
          <div class="flex w-full gap-5 sm:w-1/2">
            <a class="w-1/2 px-5 py-2 text-lg font-semibold text-center text-white bg-gray-500 rounded-md hover:bg-gray-800"
              href="<?= base_url() ?>">Home</a>
            <button class="w-1/2 px-5 py-2 text-lg font-semibold text-center text-white bg-blue-500 rounded-md hover:bg-blue-800" type="submit">Register</button>
          </div>
        </div>

      </form>
    </div>
  </div>

</main>

<script src="<?= base_url('assets/new-pages/js/registration.js') ?>"></script>