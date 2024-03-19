<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('inc/metatag.php'); ?>
  <?php include('inc/loadstyle.php'); ?>
</head>

<body>

  <div class="global-container">
    <?php include('inc/header.php'); ?>

    <section class="layout-body">

      <!-- <span class="material-symbols-rounded">
        chevron_right
      </span> -->
      <div class="top-graphic">
        <div class="swiper">
          <div class="swiper-wrapper">
            <?php for ($i = 1; $i <= 3; $i++) { ?>
              <div class="swiper-slide">
                <div class="item">
                  <figure class="cover">
                    <picture>
                      <img src="<?php echo $core_template; ?>/img/static/top-graphic.jpg" alt="" class="lazy">
                    </picture>
                  </figure>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>

    </section>

    <?php include('inc/footer.php'); ?>
  </div>

  <?php include('inc/loadscript.php'); ?>
  <?php include('inc/modal.php'); ?>

  <script>
    var tpgSwiper = new Swiper(".top-graphic .swiper", {
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });

    $('#popupModal').modal('show');
  </script>
</body>

</html>