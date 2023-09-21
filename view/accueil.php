<?php include '../view/partial/header.php' ?>




<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->

  <?php foreach ($articles as $article) { ?>

    <article class="mySlides fade relative">
      <picture>
        <img src="https://source.unsplash.com/1600x900?meal,<?= $article['titre'] ?>" alt="Lorem" style="width:100%">
        <!-- <img src="https://source.unsplash.com/1600x900?meal&,1" style="width:100%"> -->
      </picture>
      <div class="slide__text">
        <div class="">
          <h2>
            <?= $article['titre'] ?>
          </h2>
          <a href="/ctrl/article-single.php?id=<?= $article['id'] ?>">En savoir plus</a>
        </div>
      </div>
    </article>
  <?php } ?>




  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
  <span class="dot" onclick="currentSlide(5)"></span>
</div>
<h1>
  <?= $pageTitle ?>
</h1>
<div class="coming-soon">
  <h2>Coming Soon</h2>
</div>


<div class="categorie">
<h2> categories </h2>
<div>
  <?php foreach ($categories as $categorie): ?>
    <a href="/ctrl/article.php?idCategorie=<?= $categorie['id'] ?>">
      <?= $categorie['nomCategorie'] ?>
    </a>
  <?php endforeach ?>
</div>
</div>


<script>
  console.log("script slider loaded");
  let slideIndex = 1;
  showSlides(slideIndex);

  // Next/previous controls
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  // Thumbnail image controls
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
  }

</script>

<?php include '../view/partial/footer.php' ?>