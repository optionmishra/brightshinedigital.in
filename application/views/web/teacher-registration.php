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
        <h1 class="text-2xl font-semibold text-center">Teacher Registration</h1>
      </div>
      <form action="<?= base_url('AuthController/teacherRegistrationStore') ?>" method="POST">

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
              <div class="flex flex-col w-full gap-2 mb-2 sm:w-1/4">
                <label class="text-sm" for="confirm_password">Confirm Password *</label>
                <input class="rounded-md" type="password" name="confirm_password" id="confirm_password" placeholder="Enter password">
              </div>
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
            <div class="flex flex-col flex-grow w-full gap-2 mb-2 sm:w-1/5">
              <label class="text-sm" for="schoolName">School Name *</label>
              <input class="rounded-md" type="text" name="schoolName" id="schoolName" placeholder="Enter school name" required>
            </div>
            <div class="flex flex-col w-full gap-2 mb-2 sm:w-1/5">
              <label class="text-sm" for="country">Country *</label>
              <select class="rounded-md" name="country" id="country" required>
                <option value="">Select Country</option>
                <? # foreach ($countries as $country) : 
                ?>
                <option value="<?= $countries[0]->id ?>"><?= $countries[0]->name ?></option>
                <? # endforeach; 
                ?>
              </select>
            </div>
            <div class="flex flex-col w-full gap-2 mb-2 sm:w-1/5">
              <label class="text-sm" for="state">State *</label>
              <select class="rounded-md" name="state" id="state" required>
                <option value="">Select State</option>
                <?php foreach ($states as $state) : ?>
                  <option value="<?= $state->id ?>"><?= $state->name ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="flex flex-col w-full gap-2 mb-2 sm:w-1/5">
              <label class="text-sm" for="district">District *</label>
              <select class="rounded-md" name="district" id="district" required>
                <option value="">Select District</option>
              </select>
            </div>


            <div class="flex flex-col flex-grow w-full gap-2 mb-2 sm:w-1/5">
              <label class="text-sm" for="address">Address *</label>
              <input class="rounded-md" type="text" name="address" id="address" placeholder="Enter address" required>
            </div>
            <div class="flex flex-col w-full gap-2 mb-2 sm:w-1/5">
              <label class="text-sm" for="pin">Pin *</label>
              <input class="rounded-md" type="text" name="pin" id="pin" placeholder="Enter pin" accept="number" required>
            </div>
            <div class="flex flex-col w-full gap-2 mb-2 sm:w-1/5">
              <label class="text-sm" for="principalName">Principal name *</label>
              <input class="rounded-md" type="text" name="principalName" id="principalName" placeholder="Enter principal name" required>
            </div>


            <div class="flex flex-col w-full gap-2 mb-2 sm:w-1/5">
              <label class="text-sm" for="board">Board *</label>
              <select class="rounded-md" name="board" id="board">
                <option value="CBSE" selected>CBSE</option>
                <option value="ICSE">ICSE</option>
                <option value="State">State</option>
              </select>
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