<? include ROOT . '/views/layouts/header.php'; ?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                            <div class="panel-group category-products">
                                <?php

                                foreach ($categories as $categoryItem): ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a href="/category/<? echo $categoryItem['id']; ?>">
                                                    <? echo $categoryItem['name']; ?>
                                                </a></h4>
                                        </div>
                                    </div>

                                <? endforeach; ?>

                            </div>

                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Последние товары</h2>
                            <? foreach ($latestProducts as $product): ?>

                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">

                                            <img src="<? echo Instruments::getImage($product['id'])?>">

                                            <h2><? echo $product['price']; ?></h2>
                                            <p>ID: <? echo $product['id']; ?>
                                                <a href="/product/<? echo $product['id']; ?>">
                                                    <? echo $product['name']; ?></a></p>
                                            <a href="#" data-id="<? echo $product['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                        <? if ($product['is_new'] == 1):
                                        echo '<img src="/template/images/home/new.png" class="new" alt="">';
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <? endforeach; ?>

                            <!-- Постраничная навигация -->
                    <div class="col-md-4 col-md-offset-4">
                    <? //echo $pagination->get(); ?>
                    </div>

                        </div><!--features_items-->


                        </div><!--/recommended_items-->

                    </div>
                </div>
            </div>
        </section>

<? include ROOT . '/views/layouts/footer.php'; ?>
