<?php 

session_start() ;
if(isset($_SESSION['role']) &&  $_SESSION['role'] === 'admin'){
    header('location:/WIKI/Dashboard');
}
include __DIR__.'/../partials/navbar.php' ;

?>

<section class=" w-full h-5/6 z-0 ">

<div class="swiper">

  <div class="swiper-wrapper">
 
    <div class="swiper-slide"><img src="Public/images/reading.jpg" alt=""></div>
    <div class="swiper-slide"><img src="Public/images/books.jpg" alt=""></div>
    <div class="swiper-slide"><img src="Public/images/readingbook.jpg" alt=""></div>
    ...
  </div>

  <div class="swiper-pagination"></div>


  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
 
</div>
<section class="bg-gray-100 p-8">
<div class="max-w-2xl mx-auto text-center">
        <h1 class="text-4xl font-bold mb-6 text-gray-800">The Importance of Reading</h1>
        <p class="text-lg text-gray-700 mb-4">Reading is a journey that takes us to unexplored realms, expanding our horizons beyond the ordinary. It's a key that unlocks the doors to knowledge and imagination.</p>
        <p class="text-lg text-gray-700 mb-4">Through the pages of a book, we embark on adventures, witness historical events, and connect with characters that leave a lasting impact. It's a window to different worlds and diverse perspectives.</p>
        <p class="text-lg text-gray-700 mb-4">Beyond the joy of storytelling, reading enhances our cognitive abilities, sharpens our intellect, and fosters critical thinking. It's a constant exercise for the mind, keeping it agile and vibrant.</p>
        <p class="text-lg text-gray-700 mb-4">Every book, whether fiction or non-fiction, has the power to teach, inspire, and ignite creativity. It's a lifelong companion that encourages continuous learning and self-discovery.</p>
        <p class="text-lg text-gray-700">In a world filled with noise, reading is a sanctuary. It provides moments of reflection, introspection, and the pleasure of losing oneself in the beauty of words.</p>
    </div>

 
</section>
</section>
     <div class="max-w-2xl mx-auto text-center p-8">
        <h2 class="text-3xl font-bold mb-4 text-blue-500">OUR LAST ARTICLE</h2>
     </div>
<section class=" p-20 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-8 justify-around">

<a href="WIKIES" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="Public/images/readingbook.jpg" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
      <?php foreach($wiki as $wiki){ ?>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $wiki->title ?></h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?= $wiki->content ?></p>
        <?php }?>
    </div>
</a>

</section>

<div class=" p-20 flex justify-center items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
    <a type="button" href="CreatWiki" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ADD YOUR FIRST WIKI</a>
</div>


<?php include __DIR__.'/../partials/footer.php' ?>