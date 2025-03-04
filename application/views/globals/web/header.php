<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="base_url" content="<?= base_url() ?>">
  <title>Bright Shine Education</title>
  <link rel="stylesheet" href="<?= base_url('assets/new-pages/css/style.css') ?>" />
  <script src="<?= base_url('assets/new-pages/js/flowbite.min.js') ?>"></script>

</head>

<body>
  <header class="py-2 min-h-36 sm:py-0">
    <div class="container mx-auto">
      <div class="flex flex-col items-center justify-between sm:flex-row">
        <div class="p-2 bg-white max-w-40 logo">
          <img src="<?= base_url('assets/new-pages/img/logo.png') ?>" alt="" />
        </div>
        <div class="max-w-64">
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