<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Brightshine Publication</title>
  <link rel="stylesheet" href="assets/new-pages/css/style.css" />
  <script src="assets/new-pages/js/flowbite.min.js"></script>

</head>

<body>
  <header class="py-2 min-h-36 sm:py-0">
    <div class="container mx-auto">
      <div class="flex flex-col items-center justify-between sm:flex-row">
        <div class="logo">
          <img src="assets/new-pages/img/logo.png" alt="" />
        </div>
        <div>
          <img src="assets/new-pages/img/logo_text.png" alt="" />
        </div>

        <!-- <div class="flex flex-col items-center justify-center gap-2">
          <img src="" alt="" width="70" />
        </div> -->


        <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex flex-col items-center justify-center gap-2 text-sm rounded-full md:me-0" type="button">
          <span class="sr-only">Open user menu</span>
          <img class="w-16 h-16 rounded-full" src="assets/new-pages/img/no-avatar.png" alt="user photo">
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
      <div>
        <h1 class="p-8 text-3xl text-center text-white">
          Igniting the spark of GENIUS in YOUNG GENERATION
        </h1>
        <div class="flex flex-col-reverse items-center py-16 sm:flex-row">
          <div class="w-full sm:w-2/3 2xl:w-1/2">
            <ul class="flex flex-wrap justify-center gap-8">
              <?php foreach ($categories as $category) : ?>
                <?php foreach ($websupport_data as $data) : ?>
                  <?php if ($data->type == $category->id) : ?>
                    <li class="w-36 sm:w-auto">
                      <a href="<?= base_url("analytics/download_websupport/$data->id") ?>"><img src="assets/new-pages/img/buttons/<?= $category->img ?>" alt="" /></a>
                    </li>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="flex items-center justify-center w-full py-16 sm:w-1/3 xl:w-1/2">
            <img src="assets/new-pages/img/img_right.png" alt="" />
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>