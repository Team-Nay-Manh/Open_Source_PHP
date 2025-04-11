<?php
$pg = isset($_GET['p']) ? $_GET['p'] : 1;
if ($pg < 1 || $pg == '' || !is_numeric($pg)) $pg = 1;
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : '';
?>
<!-- ==========Banner-Section========== -->
<section class="banner-section">
    <div class="banner-bg bg_img bg-fixed" data-background="./assets/images/banner/banner02.jpg"></div>
    <div class="container">
        <div class="banner-content">
            <h1 class="title bold">Đặt <span class="color-theme">vé phim</span> ngay hôm nay</h1>
            <p>Tiện lợi, nhanh chóng!</p>
        </div>
    </div>
</section>
<!-- ==========Banner-Section========== -->

<!-- ==========Ticket-Search========== -->
<section class="search-ticket-section padding-top pt-lg-0">
    <div class="container">
        <div class="search-tab bg_img" data-background="./assets/images/ticket/ticket-bg01.jpg">
            <div class="row align-items-center mb--20">
                <div class="col-lg-6 mb-20">
                    <div class="search-ticket-header">
                        <h6 class="category">welcome to Teamnaymanh</h6>
                        <!--<h3 class="title">what are you looking for</h3>-->
                    </div>
                </div>
                <div class="col-lg-6 mb-20">
                    <ul class="tab-menu ticket-tab-menu">
                        <li class="active">
                            <div class="tab-thumb">
                                <img src="./assets/images/ticket/ticket-tab01.png" alt="ticket">
                            </div>
                            <span>movie</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-area">
                <div class="tab-item active">
                    <form class="ticket-search-form" action="films.html" method="GET">
                        <div class="form-group large">
                            <input type="text" placeholder="Tìm phim" name="keyword" value="<?php echo htmlspecialchars($keyword); ?>" />
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                        <?php if ($pg > 1) { ?>
                            <input type="hidden" name="p" value="<?php echo $pg; ?>" />
                        <?php } ?>
                        <?php if ($category_id) { ?>
                            <input type="hidden" name="category_id" value="<?php echo $category_id; ?>" />
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Ticket-Search========== -->

<!-- ==========Movie-Section========== -->
<section class="movie-section padding-top padding-bottom">
    <div class="container">
        <div class="row flex-wrap-reverse justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-3">
                <div class="widget-1 widget-categories">
                    <div class="widget-header">
                        <h5 class="m-title">Thể loại</h5>
                    </div>
                    <div class="widget-1-body">
                        <ul class="categories">
                            <li>
                                <a href="films.html" class="<?php echo $category_id == '' ? 'active' : ''; ?>">
                                    <span>Tất cả</span>
                                </a>
                            </li>
                            <?php
                            $category = new Category();
                            $list_categories = $category->GetCategories();
                            foreach ($list_categories as $cat) {
                            ?>
                                <li>
                                    <a href="films.html?category_id=<?php echo $cat['id']; ?>" class="<?php echo $category_id == $cat['id'] ? 'active' : ''; ?>">
                                        <span><?php echo $cat['name']; ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="widget-1 widget-banner">
                    <div class="widget-1-body">
                        <a href="#0">
                            <img src="./assets/images/sidebar/banner/banner01.jpg" alt="banner" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 mb-50 mb-lg-0">
                <div class="filter-tab tab">
                    <div class="tab-area">
                        <div class="tab-item active">
                            <div class="row mb-10 justify-content-center">
                                <?php
                                $film = new Film();
                                if ($category_id) {
                                    $list_films = $film->GetFilmsByCategoryId($category_id, $pg);
                                    $total_count = $film->GetCountByCategoryId($category_id);
                                } else {
                                    $list_films = $film->GetFilms($pg, $keyword);
                                    $total_count = $keyword ? $film->GetCountByKeyword($keyword) : $film->GetCount();
                                }

                                if (count($list_films) > 0) {
                                    foreach ($list_films as $k => $v) {
                                ?>
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="movie-grid">
                                                <div class="movie-thumb c-thumb">
                                                    <a href="film-detail.html?id=<?php echo $v['id']; ?>">
                                                        <img src="<?php echo $v['poster']; ?>" alt="movie" height="357px" width="255px" />
                                                    </a>
                                                </div>
                                                <div class="movie-content bg-one">
                                                    <h5 class="title m-0" style="font-size: 18px;">
                                                        <a href="film-detail.html?id=<?php echo $v['id']; ?>"><?php echo $v['name']; ?></a>
                                                    </h5>
                                                    <ul class="movie-rating-percent">
                                                        <li>
                                                            <div class="thumb">
                                                                <img src="./assets/images/movie/tomato.png" alt="movie" />
                                                            </div>
                                                            <span class="content"><?php echo $v['duration']; ?> phút</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <div class="col-12 text-center">
                                        <h4>Không tìm thấy phim phù hợp!</h4>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="pagination-area text-center">
                        <?php
                        $end_page = ceil((float) $total_count / DATA_PER_PAGE);
                        for ($i = 1; $i <= $end_page; $i++)
                            if (abs($pg - $i) <= 3 || $i == 1 || $i == $end_page) {
                        ?>
                            <a href="javascript:" onclick="pagination(<?php echo $i; ?>)" class="<?php echo $pg == $i ? "active" : ""; ?>"><?php echo $i; ?></a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Movie-Section========== -->
<jsp:include page="footer.jsp" />