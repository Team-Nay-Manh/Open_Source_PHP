<?php
$film = new Film();
$f = $film->GetFilm(getGET('id'));
?>
<!-- ==========Banner-Section========== -->
<section class="details-banner bg_img" data-background="<?php echo $f['poster']; ?>">
    <div class="container">
        <div class="details-banner-wrapper">
            <div class="details-banner-thumb">
                <img src="<?php echo $f['poster']; ?>" alt="movie">
                <a href="<?php echo $f['trailer']; ?>" class="video-popup">
                    <img src="assets/images/movie/video-button.png" alt="movie">
                </a>
            </div>
            <div class="details-banner-content offset-lg-3">
                <h3 class="title"><?php echo $f['name']; ?></h3>
                <div class="tags">
                    <b><?php echo $f['rated_name']; ?></b>
                </div>
                <?php
                foreach ($category->GetCategoriesByFilmId(getGET('id')) as $k => $v) {
                ?>
                    <a href="films.html?category_id=<?php echo $v['id']; ?>" class="button"><?php echo $v['name']; ?></a>
                <?php } ?>
                <div class="social-and-duration">
                    <div class="duration-area">
                        <div class="item">
                            <i class="fas fa-calendar-alt"></i><span><?php echo $f['opening_day']; ?></span>
                        </div>
                        <div class="item">
                            <i class="far fa-clock"></i><span><?php echo $f['duration']; ?> phút</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ==========Banner-Section========== -->

<!-- ==========Book-Section========== -->
<section class="book-section bg-one">
    <div class="container">
        <div class="book-wrapper offset-lg-3">
            <a href="schedules.html?film_id=<?php echo $f['id']; ?>&date=<?php echo date('Y-m-d'); ?>" class="custom-button">Đặt vé</a>
        </div>
    </div>
</section>
<!-- ==========Book-Section========== -->

<!-- ==========Movie-Section========== -->
<section class="movie-details-section padding-top padding-bottom">
    <div class="container">
        <div class="row justify-content-center flex-wrap-reverse mb--50">
            <div class="col-lg-3 col-sm-10 col-md-6 mb-50">
                <div class="widget-1 widget-tags">
                    <ul>
                        <li>
                            <a href="#0">2D</a>
                        </li>
                    </ul>
                </div>
                <div class="widget-1 widget-banner">
                    <div class="widget-1-body">
                        <a href="#0">
                            <img src="assets/images/sidebar/banner/banner01.jpg" alt="banner">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 mb-50">
                <div class="movie-details">
                    <div class="tab summery-review">
                        <ul class="tab-menu">
                            <li class="active">Tóm tắt</li>
                        </ul>
                        <div class="tab-area">
                            <div class="tab-item active">
                                <div class="item">
                                    <p><?php echo $f['description']; ?></p>
                                </div>
                                <div class="item">
                                    <div class="header">
                                        <h5 class="sub-title">cast</h5>
                                        <div class="navigation">
                                            <div class="cast-prev"><i class="flaticon-double-right-arrows-angles"></i></div>
                                            <div class="cast-next"><i class="flaticon-double-right-arrows-angles"></i></div>
                                        </div>
                                    </div>
                                    <div class="casting-slider owl-carousel">
                                        <?php
                                        foreach (explode(',', $f['actor']) as $k => $v) {
                                        ?>
                                            <div class="cast-item">
                                                <div class="cast-thumb">
                                                    <a href="#0">
                                                        <img src="./assets/images/cast/cast01.jpg" alt="cast">
                                                    </a>
                                                </div>
                                                <div class="cast-content">
                                                    <h6 class="cast-title"><a href="#0"><?php echo trim($v); ?></a></h6>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Movie-Section========== -->