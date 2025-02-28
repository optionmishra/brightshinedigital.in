<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bright Shine Education</title>
  <link rel="stylesheet" href="<?= base_url('assets/new-pages/css/style.css') ?>" />
  <script src="<?= base_url('assets/new-pages/js/flowbite.min.js') ?>"></script>

</head>

<body>
  <header class="py-2 min-h-36 sm:py-0">
    <div class="container mx-auto">
      <div class="flex flex-col items-center justify-between sm:flex-row">
        <div class="logo">
          <img src="<?= base_url('assets/new-pages/img/logo.png') ?>" alt="" />
        </div>
        <div>
          <img src="<?= base_url('assets/new-pages/img/logo_text.png') ?>" alt="" />
        </div>

        <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex flex-col items-center justify-center gap-2 text-sm rounded-full md:me-0" type="button">
          <span class="sr-only">Open user menu</span>
          <img class="w-16 h-16 rounded-full" src="<?= base_url('assets/new-pages/img/no-avatar.png') ?>" alt="user photo">
          <span><?= $user->fullname ?></span>
        </button>

        <!-- Dropdown menu -->
        <div id="dropdownAvatar" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
          <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
            <div><?= $user->fullname ?></div>
            <div class="font-medium truncate"><?= $user->email ?></div>
          </div>
          <!-- <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
            </li>
          </ul> -->
          <div class="py-2">
            <a href="logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Log out</a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main class="bg-gradient-to-r from-[#024aae] to-[#c86de6] min-h-[calc(100vh-9rem)]">
    <div class="container flex justify-center p-8 mx-auto">
      <div class="w-full">
        <form class="flex flex-wrap w-full gap-2 sm:gap-0" action="<?= base_url('admin_master/default_product') ?>" method="post">
          <div class="flex flex-col w-full my-5 sm:w-1/3">
            <label class="my-2 text-white" for="select_book">Select your Book</label>
            <select class="w-5/6 px-3 py-2 rounded-md" name="" id="select_book">
              <option value="">Wonderspark</option>
            </select>
          </div>

          <div class="flex flex-col w-full my-5 sm:w-1/3">
            <label class="my-2 text-white" for="select_class">Select your Class</label>
            <select class="w-5/6 px-3 py-2 rounded-md" name="select_classes" id="select_class">
              <?php foreach ($selectable_classes as $class) : ?>
                <option value="<?= $class->id ?>"><?= $class->name ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="flex flex-col w-full my-5 sm:w-1/3">
            <label class="my-2 text-white" for="select_subject">Select your Subject</label>
            <select class="w-5/6 px-3 py-2 rounded-md" name="mainSubject" id="select_subject">
              <?php foreach ($selectable_subjects as $subject) : ?>
                <option value="<?= $subject->id ?>"><?= $subject->name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="flex justify-center w-full sm:mt-16">
            <button class="px-5 py-3 font-semibold text-white bg-blue-600 rounded-md shadow-md hover:bg-blue-800">
              Search
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>
</body>

</html>