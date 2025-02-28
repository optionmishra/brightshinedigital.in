<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bright Shine Publication</title>
  <link rel="stylesheet" href="assets/new-pages/css/style.css" />
  <style>
    main {
      background-image: url("assets/new-pages/img/bg.png");
    }
  </style>
  <script src="assets/new-pages/js/flowbite.min.js"></script>
</head>

<body>
  <main class="flex items-center justify-center w-screen min-h-screen p-5 bg-center bg-no-repeat bg-cover sm:p-10">
    <div class="flex shadow-lg flex-col sm:flex-row bg-white/10 backdrop-blur-lg rounded-[3rem] container mx-auto border-white/60 border">
      <div class="flex justify-end w-full p-5 pointer-events-none sm:pr-0 sm:w-1/2">
        <img class="rounded-[3rem]" src="assets/new-pages/img/img-left.png" alt="" />
      </div>
      <div class="w-full p-10 sm:w-1/2">
        <div class="flex justify-center w-full mb-5 font-semibold sm:justify-end">
          <div>
            <span>Not a member? </span><button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="text-[#6A3D1B]">Register now</button>
          </div>
        </div>
        <div class="flex flex-col items-center justify-center h-5/6">
          <h1 class="text-4xl font-semibold">Hello!</h1>
          <p class="mt-5 font-semibold text-center text-gray-500">
            Login to Enter the World of Innovative Learning
          </p>
          <form class="w-full mt-8 sm:w-1/2" action="<?= base_url('web/process') ?>" method="post">
            <div class="mt-5">
              <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-3.5" placeholder="Enter email" name="username" />
            </div>
            <div class="mt-5">
              <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-3.5" placeholder="Enter password" name="password" />
            </div>
            <div class="mt-5">
              <?php if ($this->session->flashdata('error')) : ?>
                <div class="text-[#6A3D1B]">
                  <strong><?php echo $this->session->flashdata('error'); ?></strong>
                </div>
                <?php $this->session->unset_userdata('error'); ?>
              <?php endif; ?>
            </div>
            <div class="flex justify-end mt-4">
              <a class="text-sm font-semibold text-gray-600" href="">Password Recovery</a>
            </div>
            <div class="mt-5">
              <button class="w-full text-white bg-[#6A3D1Bee] hover:bg-[#6A3D1Bff] focus:ring-4 rounded-lg text-sm px-5 py-3.5 text-center font-semibold">
                Sign In
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
        <div class="p-4 text-center md:p-5">
          <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Select Your Role</h3>
          <button data-modal-hide="popup-modal" type="button" class="bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800">

          </button>
          <a class="text-gray-900 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center  border border-gray-200 hover:bg-gray-100 hover:text-[#6A3D1B]" href="<?= base_url('teacher-registration') ?>">I'm Teacher</a>
          <a class="text-gray-900 font-medium  text-sm inline-flex items-center px-5 py-2.5 text-center rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-[#6A3D1B]" href="<?= base_url('student-registration') ?>">I'm Student</a>
        </div>
      </div>
    </div>
  </div>


</body>

</html>