<main class="bg-gradient-to-r from-[#024aae] to-[#c86de6] min-h-[calc(100vh-9rem)] relative">
  <div class="container flex flex-col justify-center p-8 mx-auto">
    <div class="w-full">
      <form class="flex flex-wrap justify-center w-full gap-5" action="<?= base_url('admin_master/default_product') ?>" method="post">
        <div class="flex flex-col flex-grow w-full mb-5 sm:w-1/5">
          <label class="mb-2 text-white" for="select_series">Select your Series</label>
          <select class="w-full px-3 py-2 rounded-md" name="" id="select_series">
            <?php foreach ($selectableSeries as $series) : ?>
              <option value="<?= $series->id ?>" <?= $series->id == $this->session->userdata('selectedSeries') ? 'selected' : '' ?>><?= $series->name ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="flex flex-col flex-grow w-full mb-5 sm:w-1/5">
          <label class="mb-2 text-white" for="selectSubject">Select your Subject</label>
          <select class="w-full px-3 py-2 rounded-md" name="mainSubject" id="selectSubject">
            <?php foreach ($selectableSubjects as $subject) : ?>
              <option value="<?= $subject->id ?>" <?= $subject->id == $this->session->userdata('selectedSubject') ? 'selected' : '' ?>><?= $subject->name ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="flex flex-col flex-grow w-full mb-5 sm:w-1/5">
          <label class="mb-2 text-white" for="selectBook">Select your Class</label>
          <select class="w-full px-3 py-2 rounded-md" name="select_book" id="selectBook">
            <?php foreach ($selectableBooks as $book) : ?>
              <?php if ($book->sid == $this->session->userdata('selectedSubject')): ?>
                <option value="<?= $book->id ?>" <?= $book->id == $this->session->userdata('selectedBook') ? 'selected' : '' ?>><?= $book->name ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>
        <input id="selectedCategory" type="hidden" name="" value="<?= $this->session->userdata('selectedCategory') ?>">

        <div class="flex items-end justify-center flex-grow w-full mb-5 sm:w-1/5">
          <button class="w-full px-5 py-[0.55rem] font-semibold text-white bg-blue-600 rounded-md shadow-md hover:bg-blue-800" id="searchBtn">
            Search
          </button>
        </div>
      </form>
    </div>


    <!-- Categories -->
    <div class="flex justify-center mb-5 space-x-5 min-h-16" id="categoryBtns">
      <?php foreach ($selectableCategories as $category): ?>
        <button class="flex flex-col w-32 p-2 space-y-2 transition-colors duration-300 ease-in-out rounded-md shadow-md cursor-pointer <?= $category->id === $this->session->userdata('selectedCategory') ? 'text-white bg-blue-800' : 'bg-white' ?> hover:bg-blue-500" data-id="<?= $category->id ?>">
          <img src="<?= base_url("assets/new-pages/img/buttons/$category->img") ?>" alt="">
          <p class="text-sm font-semibold text-center"><?= $category->name ?></p>
        </button>
      <?php endforeach; ?>
    </div>

    <!-- Content -->
    <div class="w-full bg-gray-50 rounded-md shadow-md min-h-[33rem]">
      <ul class="flex flex-wrap justify-center gap-8 p-10">
        <?php if ($webUserContents): ?>

          <?php foreach ($webUserContents as $content): ?>
            <li class="flex flex-col w-1/6 px-4 py-3 transition-colors duration-300 ease-in-out bg-blue-100 rounded-md shadow-md cursor-pointer min-h-96">
              <div class="w-full h-full overflow-hidden">
                <img src="<?= base_url('assets/bookicon/' . $content->book_image) ?>" alt="">
              </div>
              <p class="px-2 py-3 text-lg font-semibold text-center"><?= $content->title ?></p>
              <a class="px-4 py-2 mt-auto font-semibold text-center text-white bg-blue-600 rounded-md shadow-md hover:bg-blue-800" href="<?= base_url("analytics/download_websupport/$content->id") ?>">Download</a>
            </li>
          <?php endforeach; ?>

        <?php else: ?>

          <p class="text-2xl font-semibold text-center text-red-800">No content found for selected criteria</p>

        <?php endif; ?>
      </ul>
    </div>
  </div>


  <!-- Loading -->
  <div class="absolute w-full h-full bg-[#9ca3afaa] top-0 hidden" id="loading">
    <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
      <svg aria-hidden="true" class="w-24 h-24 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
      </svg>
      <span class="sr-only">Loading...</span>
    </div>
  </div>

</main>

<script>
  const books = <?= json_encode($selectableBooks) ?>;
  const BASE_URL = "<?= base_url() ?>";
</script>
<script src="<?= base_url('assets/new-pages/js/dashboard.js') ?>" defer></script>